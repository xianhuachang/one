<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
} 
global $_W, $_GPC;
//check_shop_auth('http://120.26.212.219/api.php');
$op = $operation = $_GPC['op'] ? $_GPC['op'] : 'display';
$groups = m('member') -> getGroups();
$levels = m('member') -> getLevels();
$shop = m('common') -> getSysset('shop');
if ($op == 'display') {
	ca('member.member.view');
	$pindex = max(1, intval($_GPC['page']));
	$psize = 20;
	$condition = ' and dm.uniacid=:uniacid';
	$params = array(':uniacid' => $_W['uniacid']);
	if (!empty($_GPC['mid'])) {
		$condition .= ' and dm.id=:mid';
		$params[':mid'] = intval($_GPC['mid']);
	} 
	if (!empty($_GPC['realname'])) {
		$_GPC['realname'] = trim($_GPC['realname']);
		$condition .= ' and ( dm.realname like :realname or dm.nickname like :realname or dm.mobile like :realname)';
		$params[':realname'] = "%{$_GPC['realname']}%";
	} 
	if (empty($starttime) || empty($endtime)) {
		$starttime = strtotime('-1 month');
		$endtime = time();
	} 
	if (!empty($_GPC['time'])) {
		$starttime = strtotime($_GPC['time']['start']);
		$endtime = strtotime($_GPC['time']['end']);
		if ($_GPC['searchtime'] == '1') {
			$condition .= " AND dm.createtime >= :starttime AND dm.createtime <= :endtime ";
			$params[':starttime'] = $starttime;
			$params[':endtime'] = $endtime;
		} 
	} 
	if ($_GPC['level'] != '') {
		$condition .= ' and dm.level=' . intval($_GPC['level']);
	} 
	if ($_GPC['groupid'] != '') {
		$condition .= ' and dm.groupid=' . intval($_GPC['groupid']);
	} 
	if ($_GPC['followed'] != '') {
		if ($_GPC['followed'] == 2) {
			$condition .= ' and f.follow=0 and dm.uid<>0';
		} else {
			$condition .= ' and f.follow=' . intval($_GPC['followed']);
		} 
	} 
	$sql = "select dm.*,l.levelname,g.groupname from " . tablename('ewei_shop_member') . " dm " . " left join " . tablename('ewei_shop_member_group') . " g on dm.groupid=g.id" . " left join " . tablename('ewei_shop_member_level') . " l on dm.level =l.id" . " left join " . tablename('mc_mapping_fans') . "f on f.openid=dm.openid  and f.uniacid={$_W['uniacid']}" . " where 1 {$condition}  ORDER BY dm.id DESC";
	if (empty($_GPC['export'])) {
		$sql .= " limit " . ($pindex - 1) * $psize . ',' . $psize;
	} 
	$list = pdo_fetchall($sql, $params);
	foreach ($list as &$row) {
		$row['levelname'] = empty($row['levelname'])? (empty($shop['levelname'])?'普通会员':$shop['levelname']):$row['levelname'];
		$row['ordercount'] = pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_order') . ' where uniacid=:uniacid and openid=:openid and status=3', array(':uniacid' => $_W['uniacid'], ':openid' => $row['openid']));
		$row['ordermoney'] = pdo_fetchcolumn('select sum(goodsprice) from ' . tablename('ewei_shop_order') . ' where uniacid=:uniacid and openid=:openid and status=3', array(':uniacid' => $_W['uniacid'], ':openid' => $row['openid']));
		$row['credit1'] = m('member') -> getCredit($row['openid'], 'credit1');
		$row['credit2'] = m('member') -> getCredit($row['openid'], 'credit2');
		$row['followed'] = m('user') -> followed($row['openid']);
	} 
	unset($row);
	if ($_GPC['export'] == '1') {
		ca('member.member.export');
		plog('member.member.export', '导出会员数据');
		foreach ($list as &$row) {
			$row['createtime'] = date('Y-m-d H:i', $row['createtime']);
			$row['groupname'] = empty($row['groupname'])?'无分组':$row['groupname'];
			$row['levelname'] = empty($row['levelname'])?'普通会员':$row['levelname'];
		} 
		unset($row);
		m('excel') -> export($list, array("title" => "会员数据-" . date('Y-m-d-H-i', time()), "columns" => array(array('title' => '昵称', 'field' => 'nickname', 'width' => 12), array('title' => '姓名', 'field' => 'realname', 'width' => 12), array('title' => '手机号', 'field' => 'mobile', 'width' => 12), array('title' => '会员等级', 'field' => 'levelname', 'width' => 12), array('title' => '会员分组', 'field' => 'groupname', 'width' => 12), array('title' => '注册时间', 'field' => 'createtime', 'width' => 12), array('title' => '积分', 'field' => 'credit1', 'width' => 12), array('title' => '余额', 'field' => 'credit2', 'width' => 12), array('title' => '成交订单数', 'field' => 'ordercount', 'width' => 12), array('title' => '成交总金额', 'field' => 'ordermoney', 'width' => 12))));
	} 
	$total = pdo_fetchcolumn("select count(*) from" . tablename('ewei_shop_member') . " dm " . " left join " . tablename('ewei_shop_member_group') . " g on dm.groupid=g.id" . " left join " . tablename('ewei_shop_member_level') . " l on dm.level =l.id" . " left join " . tablename('mc_mapping_fans') . "f on f.openid=dm.openid" . " where 1 {$condition} ", $params);
	$pager = pagination($total, $pindex, $psize);
} else if ($op == 'detail') {
	ca('member.member.view');
	$id = intval($_GPC['id']);
	if (checksubmit('submit')) {
		ca('member.member.edit');
		//TODO 判断总店管家人数是否已经超过设置的人数		
		$data = is_array($_GPC['data'])? $_GPC['data'] : array();
		if(!empty($data['agentid'])){
			$sysset=pdo_get('ewei_shop_sysset',array('uniacid'=>$_W['uniacid']));
			$set=iunserializer($sysset['sets']);
		 	$steward_total = pdo_fetchcolumn("SELECT COUNT(*) FROM ".tablename('ewei_shop_member').' WHERE agentid=-1');
			if(intval($steward_total)>=$set['shop']['steward']){
				message('保存失败!管家人数已满，此用户不能成为总店管家。', $this -> createWebUrl('member/list'), 'error');
				exit;
			}
			$data['status']=1;
			$data['isagent']=1;
			$data['inviter']=-1;
			$data['agenttime']=time();
		}	
		pdo_update('ewei_shop_member', $data, array('id' => $id, 'uniacid' => $_W['uniacid']));
		$member = m('member') -> getMember($id);
		plog('member.member.edit', "修改会员资料  ID: {$member['id']} <br/> 会员信息:  {$member['openid']}/{$member['nickname']}/{$member['realname']}/{$member['mobile']}");
		message('保存成功!', $this -> createWebUrl('member/list'), 'success');
	} 
	$member = m('member') -> getInfo($id);
	$member['ordercount'] = pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_order') . ' where uniacid=:uniacid and openid=:openid and status=3', array(':uniacid' => $_W['uniacid'], ':openid' => $member['openid']));
	$member['ordermoney'] = pdo_fetchcolumn('select sum(goodsprice) from ' . tablename('ewei_shop_order') . ' where uniacid=:uniacid and openid=:openid and status=3', array(':uniacid' => $_W['uniacid'], ':openid' => $member['openid']));
} else if ($op == 'delete') {
	ca('member.member.delete');
	$id = intval($_GPC['id']);
	$isagent = intval($_GPC['isagent']);
	$member = pdo_fetch("select * from " . tablename('ewei_shop_member') . " where uniacid=:uniacid and id=:id limit 1 ", array(':uniacid' => $_W['uniacid'], ':id' => $id));
	if (empty($member)) {
		message('会员不存在，无法删除!', $this -> createWebUrl('member/list'), 'error');
	} 
	if (p('commission')) {
		$agentcount = pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_member') . ' where  uniacid=:uniacid and agentid=:agentid limit 1 ', array(':uniacid' => $_W['uniacid'], ':agentid' => $id));
		if ($agentcount > 0) {
			message('此会员有下线存在，无法删除!', '', 'error');
		} 
	} 
	pdo_delete('ewei_shop_member', array('id' => $_GPC['id']));
	plog('member.member.delete', "删除会员  ID: {$member['id']} <br/>会员信息: {$member['openid']}/{$member['nickname']}/{$member['realname']}/{$member['mobile']}");
	message('删除成功！', $this -> createWebUrl('member/list'), 'success');
}

load() -> func('tpl');
include $this -> template('web/member/list');
