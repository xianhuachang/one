<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
} 
global $_W, $_GPC;
$operation = !empty($_GPC['op'])? $_GPC['op'] : 'display';
$openid = m('user') -> getOpenid();
if (empty($openid)) {
	$openid = $_GPC['openid'];
}

/*
$setdata = pdo_fetch("select * from " . tablename('ewei_shop_sysset') . ' where uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
$sets=unserialize($setdata['sets']);
unset($setdata);
list($matchMoney,$extraMoney)=explode('_', $sets['trade']['rechargemoney']);
$current=time();
var_dump($sets['trade']['withrecharge']&&($current>=$sets['trade']['rechargestart']&&$current<=$sets['trade']['rechargend']));exit; 
*/
$uniacid = $_W['uniacid'];
if ($operation == 'display' && $_W['isajax']) {
	$set = m('common') -> getSysset(array('shop', 'pay'));
	pdo_delete('ewei_shop_member_log', array('openid' => $openid, 'status' => 0, 'type' => 0, 'uniacid' => $_W['uniacid']));
	$logno = m('common') -> createNO('member_log', 'logno', 'RC');
	$log = array('uniacid' => $_W['uniacid'], 'logno' => $logno, 'title' => $set['shop']['name'] . "会员充值", 'openid' => $openid, 'type' => 0, 'createtime' => time(), 'status' => 0);
	pdo_insert('ewei_shop_member_log', $log);
	$logid = pdo_insertid();
	$credit = m('member') -> getCredit($openid, 'credit2');
	$wechat = array('success' => false);
	if (is_weixin()) {
		if (isset($set['pay']) && $set['pay']['weixin'] == 1) {
			load() -> model('payment');
			$setting = uni_setting($_W['uniacid'], array('payment'));
			if (is_array($setting['payment']['wechat']) && $setting['payment']['wechat']['switch']) {
				$wechat['success'] = true;
			} 
		} 
	} 
	$alipay = array('success' => false);
	if (isset($set['pay']['alipay']) && $set['pay']['alipay'] == 1) {
		load() -> model('payment');
		$setting = uni_setting($_W['uniacid'], array('payment'));
		if (is_array($setting['payment']['alipay']) && $setting['payment']['alipay']['switch']) {
			$alipay['success'] = true;
		} 
	} 
	show_json(1, array('set' => $set, 'logid' => $logid, 'isweixin' => is_weixin(), 'wechat' => $wechat, 'alipay' => $alipay, 'credit' => $credit));
} else if ($operation == 'recharge' && $_W['ispost']) {
	$logid = intval($_GPC['logid']);
	if (empty($logid)) {
		show_json(0, '充值出错, 请重试!');
	} 
	$money = floatval($_GPC['money']);
	if (empty($money)) {
		show_json(0, '请填写充值金额!');
	} 
	$type = $_GPC['type'];
	if (!in_array($type, array('weixin', 'alipay'))) {
		show_json(0, '未找到支付方式');
	} 
	$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_member_log') . ' WHERE `id`=:id and `uniacid`=:uniacid limit 1', array(':uniacid' => $uniacid, ':id' => $logid));
	if (empty($log)) {
		show_json(0, '充值出错, 请重试!');
	} 
	pdo_update('ewei_shop_member_log', array('money' => $money), array('id' => $log['id']));
	$set = m('common') -> getSysset(array('shop', 'pay'));
	if ($type == 'weixin') {	
		if (!is_weixin()) {
			show_json(0, '非微信环境!');
		} 
		if (empty($set['pay']['weixin'])) {
			show_json(0, '未开启微信支付!');
		} 
		$wechat = array('success' => false);
		$params = array();
		$params['tid'] = $log['logno'];
		$params['user'] = $openid;
		$params['fee'] = $money;
		$params['title'] = $log['title'];
		load() -> model('payment');
		$setting = uni_setting($_W['uniacid'], array('payment'));
		if (is_array($setting['payment'])) {
			$options = $setting['payment']['wechat'];
			$options['appid'] = $_W['account']['key'];
			$options['secret'] = $_W['account']['secret'];
			$wechat = m('common') -> wechat_build($params, $options, 1);
			$wechat['success'] = false;
			if (!is_error($wechat)) {
				$wechat['success'] = true;
			} else {
				show_json(0, $wechat['message']);
			} 
		} 
		if (!$wechat['success']) {
			show_json(0, '微信支付参数错误!');
		} 
		show_json(1, array('wechat' => $wechat));
	} else if ($type == 'alipay') {
		$alipay = array('success' => false);
		$params = array();
		$params['tid'] = $log['logno'];
		$params['user'] = $openid;
		$params['fee'] = $money;
		$params['title'] = $log['title'];
		load() -> func('communication');
		load() -> model('payment');
		$setting = uni_setting($_W['uniacid'], array('payment'));
		if (is_array($setting['payment'])) {
			$options = $setting['payment']['alipay'];
			$alipay = m('common') -> alipay_build($params, $options, 1, $openid);
			if (!empty($alipay['url'])) {
				$alipay['success'] = true;
			} 
		} 
		show_json(1, array('alipay' => $alipay));
	} 
} else if ($operation == 'complete' && $_W['ispost']) {
	$logid = intval($_GPC['logid']);
	$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_member_log') . ' WHERE `id`=:id and `uniacid`=:uniacid limit 1', array(':uniacid' => $uniacid, ':id' => $logid));
	if (!empty($log) && empty($log['status'])) {
		pdo_update('ewei_shop_member_log', array('status' => 1, 'rechargetype' => $_GPC['type']), array('id' => $logid));
		
		//TODO 判断用户是否符合充值送钱活动
		$setdata = pdo_fetch("select * from " . tablename('ewei_shop_sysset') . ' where uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
		$sets=unserialize($setdata['sets']);
		unset($setdata);
		$money=$log['money'];
		$current=time();
		if($sets['trade']['withrecharge'] && ( $current>=$sets['trade']['rechargestart'] && $current <= $sets['trade']['rechargend'])){
			list($matchMoney,$extraMoney)=explode('_', $sets['trade']['rechargemoney']);
			if($money >= $matchMoney){
				$money+=$extraMoney;
			}
		}
		//TODO END
		m('member') -> setCredit($openid, 'credit2', $money);
		m('member') -> setRechargeCredit($openid, $log['money']);
		m('member') -> setDiscount($openid, $log['money']);//TODO 充值给折扣
		m('notice') -> sendMemberLogMessage($logid);
	} 
	show_json(1);
} else if ($operation == 'return') {
	$logno = trim($_GPC['out_trade_no']);
	if (empty($logno)) {
		die('充值出现错误，请重试!');
	} 
	$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_member_log') . ' WHERE `logno`=:logno and `uniacid`=:uniacid limit 1', array(':uniacid' => $uniacid, ':logno' => $logno));
	if (!empty($log) && empty($log['status'])) {
		pdo_update('ewei_shop_member_log', array('status' => 1, 'rechargetype' => 'alipay'), array('id' => $log['id']));
		//TODO 判断用户是否符合充值送钱活动
		$setdata = pdo_fetch("select * from " . tablename('ewei_shop_sysset') . ' where uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
		$sets=unserialize($setdata['sets']);
		unset($setdata);
		$money=$log['money'];
		$current=time();
		if($sets['trade']['withrecharge']&&($current>=$sets['trade']['rechargestart']&&$current<=$sets['trade']['rechargend'])){
			list($matchMoney,$extraMoney)=explode('_', $sets['rechargemoney']);
			if($money>=$matchMoney){
				$money+=$extraMoney;
			}
		}
		//TODO END
		m('member') -> setCredit($openid, 'credit2', $money);
		m('member') -> setRechargeCredit($openid, $log['money']);
		m('member') -> setDiscount($openid, $log['money']);//TODO 充值给折扣
		m('notice') -> sendMemberLogMessage($log['id']);
	} 
	die('<div style="width:94%;padding:0 3%px;font-size:24px;">充值成功, 请关闭到浏览器, 返回到微信点击返回!</div>');
} 
if ($operation == 'display') {
	include $this -> template('member/recharge');
} 
