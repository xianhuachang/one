<?php
error_reporting(0);
require '../../../../../framework/bootstrap.inc.php';
require '../../../../../addons/ewei_shop/defines.php';
require '../../../../../addons/ewei_shop/core/inc/functions.php';
require '../../../../../addons/ewei_shop/core/inc/plugin/plugin_model.php';
global $_W, $_GPC;
ignore_user_abort();
set_time_limit(0);
$sets = pdo_fetchall('select uniacid from ' . tablename('ewei_shop_sysset'));
foreach ($sets as $set) {
	$_W['uniacid'] = $set['uniacid'];
	if (empty($_W['uniacid'])) {
		continue;
	} 
	$trade = m('common') -> getSysset('trade', $_W['uniacid']);
	if ($trade['receive'] == '-1') {
		continue;
	} 
	$days = intval($trade['receive']);
	if (empty($days)) {
		$days = 9;
	} 
	$daytimes = 86400 * $days;
	$p = p('commission');
	$orders = pdo_fetchall("select id from " . tablename('ewei_shop_order') . " where uniacid={$_W['uniacid']} and status=2 and sendtime + {$daytimes} <=unix_timestamp() ");
	if (!empty($orders)) {
		$last = false;
		foreach ($orders as $order) {
			$orderid = $order['id'];
			pdo_update('ewei_shop_order', array('status' => 3, 'finishtime' => time()), array('id' => $orderid));
			m('notice') -> sendOrderMessage($orderid);
			if ($p) {
				$p -> checkOrderFinish($orderid);
			} 
		} 
	} 
} 
