<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
}
global $_W, $_GPC;
$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
//TODO 写日志函数: plog('shop.goods.edit', '批量修改商品排序');
if ($operation == 'post') {
	$id = intval($_GPC['id']);
	if (checksubmit()) {
		$gid = intval($_GPC['goods']);
		$lot_number = $_GPC['lot_number'];
		$quantity = intval($_GPC['quantity']);
		$goods = pdo_fetch('SELECT  title,thumb,total FROM ' . tablename('ewei_shop_goods') . ' WHERE id=:id', array(':id' => $gid));
		$data = array('uniacid' => $_W['uniacid'], 'gid' => $gid, 'title' => $goods['title'], 'thumb' => $goods['thumb'], 'lot_number' => $lot_number, 'quantity' => $quantity);
		if ($id) {
			$old_quantity = pdo_fetch('select quantity from ' . tablename('ewei_shop_stock') . ' where id=:id', array(':id' => $id));
			//更新
			$result = pdo_update('ewei_shop_stock', $data, array('id' => $id));

			pdo_update('ewei_shop_goods', array('total' => $goods['total'] - intval($old_quantity['quantity']) + $quantity), array('id' => $gid));
		} else {
			//新增
			$data['createtime'] = time();
			$result = pdo_insert('ewei_shop_stock', $data);
			$id = pdo_insertid();
			pdo_update('ewei_shop_goods', array('total' => $goods['total'] + $quantity), array('id' => $gid));
		}
		if ($result) {
			plog('shop.stock.edit', "修改进货单成功 ID: {$id}");
			//TODO 更新产品库存信息
			message("编辑进货单成功", $this -> createWebUrl('shop/stock', array('op' => 'display')), "success");
		} else {
			message("编辑进货单失败", $this -> createWebUrl('shop/stock', array('op' => 'display')), "error");
		}
	}
	if ($id) {
		$item = pdo_fetch("SELECT * FROM " . tablename('ewei_shop_stock') . " WHERE id = :id and uniacid=:uniacid", array(':id' => $id, ':uniacid' => $_W['uniacid']));
	}
	//TODO	查找出所有的产品
	$all_goods = pdo_fetchall('SELECT id, title FROM ' . tablename('ewei_shop_goods') . ' WHERE uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));	
} elseif ($operation == 'display') {
	ca('shop.stock.view');
	$pindex = max(1, intval($_GPC['page']));
	$psize = 20;
	$sql = 'SELECT COUNT(*) FROM ' . tablename('ewei_shop_stock');
	$total = pdo_fetchcolumn($sql);
	if (!empty($total)) {
		$sql = 'SELECT s.*,s.quantity-ifnull(sso.alloutput,0) as balance FROM ' . tablename('ewei_shop_stock') . ' as s left join (select sum(number) as alloutput,stock_id from '.tablename('ewei_shop_stock_output')
						.' group by stock_id) as sso on s.id=sso.stock_id LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
		$list = pdo_fetchall($sql);
		foreach($list  as &$row){
			//TODO 找到出库明细
			$row['output']=pdo_getall('ewei_shop_stock_output',array('stock_id'=>$row['id'],'uniacid'=>$_W['uniacid']));
		}
		//var_dump($list);exit;	 
		$pager = pagination($total, $pindex, $psize);
	}
} elseif ($operation == 'delete') {
	ca('shop.stock.delete');
	$id = intval($_GPC['id']);
	$row = pdo_fetch("SELECT gid,quantity,title,lot_number FROM " . tablename('ewei_shop_stock') . " WHERE id = :id", array(':id' => $id));
	if (empty($row)) {
		message('抱歉，进货单不存在或是已经被删除！');
	}
	$old_total = pdo_fetch("SELECT total FROM " . tablename('ewei_shop_goods') . " WHERE id = :id and uniacid=:uniacid", array(':id' => $row['gid'],':uniacid'=>$_W['uniacid']));
	pdo_delete('ewei_shop_stock',array('id'=>$id));
	pdo_update('ewei_shop_goods', array('total' => $old_total['total']-$row['quantity']), array('id' => $row['gid']));
	plog('shop.stock.delete', "删除进货单 ID: {$id} 品名: {$row['title']} 批号: {$row['lot_number']} 数量: {$row['quantity']}");
	message('删除进货单成功！', referer(), 'success');
}elseif($operation=='output'){
	ca('shop.stock.output');
	$pid=intval($_GPC['pid']);
	$output_number = intval($_GPC['output_number']);
	$row = pdo_fetch("SELECT s.gid,s.quantity,s.title,s.lot_number,s.quantity -ifnull(sso.alloutput,0) as balance FROM " . tablename('ewei_shop_stock') 
						. " as s left join (select sum(number) as alloutput,stock_id from ".tablename('ewei_shop_stock_output')." group by stock_id)as sso on s.id=sso.stock_id
						  WHERE id = :id and uniacid=:uniacid", array(':id' => $pid,':uniacid'=>$_W['uniacid']));
	if(empty($row)){
		die(json_encode(array(
			'status'=>404,
			'msg'=>'查无此产品'	
		)));
	}
	if($output_number>$row['balance']){
		die(json_encode(array(
			'status'=>201,
			'msg'=>'请输入正确的出库数量'
		)));		
	};
	$data=array(
		'stock_id'=>$pid,
		'number'=>$output_number,
		'createtime'=>time(),
		'uniacid'=>$_W['uniacid']
	);
	$result=pdo_insert('ewei_shop_stock_output',$data);
	if($result){
		plog('shop.stock.output', "添加进货单 ID: {$pid} 品名: {$row['title']} 批号: {$row['lot_number']} 数量: {$output_number} 日期:".date('Y-m-d H:i'));
		die(json_encode(array(
			'status'=>200
		)));
	}else{
		die(json_encode(array(
			'status'=>202,
			'msg'=>'系统异常，请稍候再试'
		)));	
	}					  				  
}
load() -> func('tpl');
include $this -> template('web/shop/stock');
