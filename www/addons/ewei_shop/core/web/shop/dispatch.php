<?php
global $_W, $_GPC;
//check_shop_auth('http://120.26.212.219/api.php');
$operation = !empty($_GPC['op'])? $_GPC['op'] : 'display';
if ($operation == 'display') {
	ca('shop.dispatch.view');
	if (!empty($_GPC['displayorder'])) {
		ca('shop.dispatch.edit');
		foreach ($_GPC['displayorder'] as $id => $displayorder) {
			pdo_update('ewei_shop_dispatch', array('displayorder' => $displayorder), array('id' => $id));
		} 
		plog('shop.dispatch.edit', '批量修改配送方式排序');
		message('分类排序更新成功！', $this -> createWebUrl('shop/dispatch', array('op' => 'display')), 'success');
	} 
	$list = pdo_fetchall("SELECT * FROM " . tablename('ewei_shop_dispatch') . " WHERE uniacid = '{$_W['uniacid']}' ORDER BY id asc");
} elseif ($operation == 'post') {
	$id = intval($_GPC['id']);
	if (empty($id)) {
		ca('shop.dispatch.add');
	} else {
		ca('shop.dispatch.edit|shop.dispatch.view');
	} 
	if (checksubmit('submit')) {
		$areas = array();
		$randoms = $_GPC['random'];
		if (is_array($randoms)) {
			foreach($randoms as $random) {
				$areas[] = array('citys' => $_GPC['citys'][$random], 'firstprice' => $_GPC['firstprice'][$random], 'firstweight' => $_GPC['firstweight'][$random], 'secondprice' => $_GPC['secondprice'][$random], 'secondweight' => $_GPC['secondweight'][$random]);
			} 
		} 
		$carriers = array();
		$addresses = $_GPC['address'];
		if (is_array($addresses)) {
			foreach($addresses as $key => $address) {
				$carriers[] = array('address' => $_GPC['address'][$key], 'realname' => $_GPC['realname'][$key], 'mobile' => $_GPC['mobile'][$key], 'content' => $_GPC['content'][$key]);
			} 
		} 
		$data = array('uniacid' => $_W['uniacid'], 'displayorder' => intval($_GPC['displayorder']), 'dispatchtype' => intval($_GPC['dispatchtype']), 'dispatchname' => trim($_GPC['dispatchname']), 'express' => trim($_GPC['express']), 'firstprice' => trim($_GPC['default_firstprice']), 'firstweight' => trim($_GPC['default_firstweight']), 'secondprice' => trim($_GPC['default_secondprice']), 'secondweight' => trim($_GPC['default_secondweight']), 'areas' => iserializer($areas), 'carriers' => iserializer($carriers), 'enabled' => intval($_GPC['enabled']));
		if (!empty($id)) {
			plog('shop.dispatch.edit', "修改配送方式 ID: {$id}");
			pdo_update('ewei_shop_dispatch', $data, array('id' => $id));
		} else {
			pdo_insert('ewei_shop_dispatch', $data);
			$id = pdo_insertid();
			plog('shop.dispatch.add', "添加配送方式 ID: {$id}");
		} 
		message('更新配送方式成功！', $this -> createWebUrl('shop/dispatch', array('op' => 'display')), 'success');
	} 
	$dispatch = pdo_fetch("SELECT * FROM " . tablename('ewei_shop_dispatch') . " WHERE id = '$id' and uniacid = '{$_W['uniacid']}'");
	if (!empty($dispatch)) {
		$dispatch_areas = unserialize($dispatch['areas']);
		$dispatch_carriers = unserialize($dispatch['carriers']);
	} 
	$areafile = IA_ROOT . "/addons/ewei_shop/data/areas";
	$areas = json_decode(@file_get_contents($areafile), true);
	if (!is_array($areas)) {
		require_once EWEI_SHOP_INC . 'json/xml2json.php';
		$file = IA_ROOT . "/addons/ewei_shop/static/js/dist/area/Area.xml";
		$content = file_get_contents($file);
		$json = xml2json :: transformXmlStringToJson($content);
		$areas = json_decode($json, true);
		file_put_contents($areafile, $json);
	} 
} elseif ($operation == 'delete') {
	ca('shop.dispatch.delete');
	$id = intval($_GPC['id']);
	$dispatch = pdo_fetch("SELECT id,dispatchname FROM " . tablename('ewei_shop_dispatch') . " WHERE id = '$id' AND uniacid=" . $_W['uniacid'] . "");
	if (empty($dispatch)) {
		message('抱歉，配送方式不存在或是已经被删除！', $this -> createWebUrl('shop/dispatch', array('op' => 'display')), 'error');
	} 
	pdo_delete('ewei_shop_dispatch', array('id' => $id));
	plog('shop.dispatch.delete', "删除配送方式 ID: {$id} 名称: {$dispatch['dispatchname']} ");
	message('配送方式删除成功！', $this -> createWebUrl('shop/dispatch', array('op' => 'display')), 'success');
} else if ($operation == 'tpl') {
	$random = random(16);
	ob_clean();
	ob_start();
	include $this -> template('web/shop/tpl/dispatch');
	$contents = ob_get_contents();
	ob_clean();
	die(json_encode(array('random' => $random, 'html' => $contents)));
} else if ($operation == 'tpl1') {
	$random = random(16);
	ob_clean();
	ob_start();
	include $this -> template('web/shop/tpl/carrier');
	$contents = ob_get_contents();
	ob_clean();
	die(json_encode(array('random' => $random, 'html' => $contents)));
} 
include $this -> template('web/shop/dispatch');
