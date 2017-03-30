<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
} 
class Ewei_DShop_Goods {
	public function getOption($goodsid = 0, $optionid = 0) {
		global $_W;
		return pdo_fetch('select * from ' . tablename('ewei_shop_goods_option') . ' where id=:id and goodsid=:goodsid and uniacid=:uniacid', array(':id' => $optionid, ':uniacid' => $_W['uniacid'], ':goodsid' => $goodsid));
	} 
	public function getList($args = array()) {
		global $_W;
		$page = !empty($args['page'])? intval($args['page']): 1;
		$pagesize = !empty($args['pagesize'])? intval($args['pagesize']): 10;
		$random = !empty($args['random'])? $args['random'] : false;
		$order = !empty($args['order'])? $args['order'] : ' displayorder desc,createtime desc';
		$orderby = !empty($args['by'])? $args['by'] : '';
		$ids = !empty($args['ids'])? trim($args['ids']): '';
		$condition = ' and `uniacid` = :uniacid AND `deleted` = 0 and status in (1,2) ';
		$params = array(':uniacid' => $_W['uniacid']);
		if (!empty($ids)) {
			$condition .= " and id in ( " . $ids . ")";
		} 
		$isnew = !empty($args['isnew'])? 1 : 0;
		if (!empty($isnew)) {
			$condition .= " and isnew=1";
		} 
		$ishot = !empty($args['ishot'])? 1 : 0;
		if (!empty($ishot)) {
			$condition .= " and ishot=1";
		} 
		$isrecommand = !empty($args['isrecommand'])? 1 : 0;
		if (!empty($isrecommand)) {
			$condition .= " and isrecommand=1";
		} 
		$isdiscount = !empty($args['isdiscount'])? 1 : 0;
		if (!empty($isdiscount)) {
			$condition .= " and isdiscount=1";
		} 
		$istime = !empty($args['istime'])? 1 : 0;
		if (!empty($istime)) {
			$condition .= " and istime=1 and " . time() . ">=timestart and " . time() . "<=timeend";
		} 
		$keywords = !empty($args['keywords'])? $args['keywords'] : '';
		if (!empty($keywords)) {
			$condition .= ' AND `title` LIKE :title';
			$params[':title'] = '%' . trim($keywords) . '%';
		} 
		$tcate = !empty($args['tcate'])? intval($args['tcate']): 0;
		if (!empty($tcate)) {
			$condition .= ' AND `tcate` = :tcate';
			$params[':tcate'] = intval($tcate);
		} 
		$ccate = !empty($args['ccate'])? intval($args['ccate']): 0;
		if (!empty($ccate)) {
			$condition .= ' AND `ccate` = :ccate';
			$params[':ccate'] = intval($ccate);
		} 
		$pcate = !empty($args['pcate'])? intval($args['pcate']): 0;
		if (!empty($pcate)) {
			$condition .= ' AND `pcate` = :pcate';
			$params[':pcate'] = intval($pcate);
		} 
		$openid = m('user') -> getOpenid();
		$member = m('member') -> getMember($openid);
		$levelid = $member['level'];
		$groupid = $member['groupid'];
		$condition .= " and ( ifnull(showlevels,'')='' or FIND_IN_SET( {$levelid},showlevels)<>0 ) ";
		$condition .= " and ( ifnull(showgroups,'')='' or FIND_IN_SET( {$groupid},showgroups)<>0 ) ";
		if (!$random) {
			$sql = "SELECT id,title,thumb,marketprice,productprice,sales,total,status FROM " . tablename('ewei_shop_goods') . " where 1 {$condition} ORDER BY {$order} {$orderby} LIMIT " . ($page - 1) * $pagesize . ',' . $pagesize;
		} else {
			$sql = "SELECT id,title,thumb,marketprice,productprice,sales,total,status FROM " . tablename('ewei_shop_goods') . " where 1 {$condition} ORDER BY rand() LIMIT " . $pagesize;
		}
		$list = pdo_fetchall($sql, $params);
		foreach($list as &$v){
			if($v['status']==2){
				$v['marketprice']='???';
				$v['productprice']='???';
			}
		}
		$list = set_medias($list, 'thumb');
		return $list;
	} 
	public function getComments($goodsid = '0', $args = array()) {
		global $_W;
		$page = !empty($args['page'])? intval($args['page']): 1;
		$pagesize = !empty($args['pagesize'])? intval($args['pagesize']): 10;
		$condition = ' and `uniacid` = :uniacid AND `goodsid` = :goodsid and deleted=0';
		$params = array(':uniacid' => $_W['uniacid'], ':goodsid' => $goodsid);
		$sql = "SELECT id,nickname,headimgurl,content,images FROM " . tablename('ewei_shop_goods_comment') . " where 1 {$condition} ORDER BY createtime desc LIMIT " . ($page - 1) * $pagesize . ',' . $pagesize;
		$list = pdo_fetchall($sql, $params);
		foreach ($list as &$row) {
			$row['images'] = set_medias(unserialize($row['images']));
		} 
		unset($row);
		return $list;
	} 
} 
