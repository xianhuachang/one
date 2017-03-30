<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
} 
global $_W, $_GPC;
$operation = !empty($_GPC['op'])? $_GPC['op'] : 'display';
if ($operation == 'category') {
	$category = m('shop') -> getCategory();
	//TODO START
	$recommend_products=m('goods')->getList(array('isrecommand'=>1));
	$second_categoris = m('shop') -> getSecondCategory();
	foreach($second_categoris as &$v){
		//找产品
		$goods=m('goods')->getList(array('ccate'=>$v['id']));
		$v['goods']=$goods;
	}	
	//TODO END	
	show_json(1, array('category' => $category,'recommend_products'=>$recommend_products,'second_categoris'=>$second_categoris));
} else if ($operation == 'areas') {
	require_once EWEI_SHOP_INC . 'json/xml2json.php';
	$file = IA_ROOT . "/addons/ewei_shop/static/js/dist/area/Area.xml";
	$content = file_get_contents($file);
	$json = xml2json :: transformXmlStringToJson($content);
	die(json_encode($json));
} else if ($operation == 'search') {
	$keywords = trim($_GPC['keywords']);
	$goods = m('goods') -> getList(array('pagesize' => 100000, 'keywords' => trim($_GPC['keywords'])));
	show_json(1, array('list' => $goods));
} else if ($operation == 'comment') {
	$goodsid = intval($_GPC['goodsid']);
	$pindex = max(1, intval($_GPC['page']));
	$psize = 5;
	$condition = ' and oc.uniacid = :uniacid and oc.goodsid=:goodsid and oc.deleted=0 and oc.status=1';
	$params = array(':uniacid' => $_W['uniacid'], ':goodsid' => $goodsid);
	$sql = 'SELECT oc.id,oc.ext,oc.nickname,oc.headimgurl,oc.level,sm.career,sm.birthyear,sm.gender,oc.content,oc.createtime, oc.images,oc.append_images,oc.append_content,oc.reply_images,oc.reply_content,oc.append_reply_images,oc.append_reply_content ' . ' FROM '
				 . tablename('ewei_shop_order_comment') . ' as oc left join '.tablename('ewei_shop_member').' as sm on oc.openid=sm.openid  where 1 ' . $condition . ' ORDER BY `id` DESC LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
	$list = pdo_fetchall($sql, $params);
	foreach($list as &$row) {
		$row['headimgurl'] = tomedia($row['headimgurl']);
		$row['createtime'] = date('Y-m-d H:i', $row['createtime']);
		$images = unserialize($row['images']);
		$row['images'] = is_array($images)? set_medias($images):array();
		$append_images = unserialize($row['append_images']);
		$row['append_images'] = is_array($append_images)? set_medias($append_images):array();
		$reply_images = unserialize($row['reply_images']);
		$row['reply_images'] = is_array($reply_images)? set_medias($reply_images):array();
		$append_reply_images = unserialize($row['append_reply_images']);
		$row['append_reply_images'] = is_array($append_reply_images)? set_medias($append_reply_images):array();
		$nameLen= mb_strlen($row['nickname'],'utf-8');
		if($nameLen==2){
			$row['nickname']=mb_substr($row['nickname'], 0,1,'utf-8').'*';
		}elseif($nameLen>=3){
			$row['nickname']=mb_substr($row['nickname'], 0,1,'utf-8').str_repeat('*', 3).mb_substr($row['nickname'], -1,1,'utf-8');
		}
		if(!empty($row['ext'])){
			list($age,$gender,$career)=explode('_', $row['ext']);
			$row['age']=$age;
			$row['gender']=$gender;
			$row['career']=$career;	
		}else{
			$row['age']=date('Y')-$row['birthyear'];
			$row['gender']=$row['gender']==1?'男':'女';
		}
	} 
	unset($row);
	show_json(1, array('list' => $list, 'pagesize' => $psize));
} else if ($operation == 'recommand') {
	$goods = m('goods') -> getList(array('pagesize' => 4, 'isrecommand' => true, 'random' => true));
	show_json(1, array('list' => $goods));
}