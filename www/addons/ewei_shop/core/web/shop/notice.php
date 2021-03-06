<?php
global $_W, $_GPC;
//check_shop_auth('http://120.26.212.219/api.php');
$operation = !empty($_GPC['op'])? $_GPC['op'] : 'display';
if ($operation == 'display') {
	ca('shop.notice.view');
	if (!empty($_GPC['displayorder'])) {
		ca('shop.notice.edit');
		foreach ($_GPC['displayorder'] as $id => $displayorder) {
			pdo_update('ewei_shop_notice', array('displayorder' => $displayorder), array('id' => $id));
		} 
		plog('shop.notice.edit', '批量修改公告排序');
		message('公告排序更新成功！', $this -> createWebUrl('shop/notice', array('op' => 'display')), 'success');
	} 
	$list = pdo_fetchall("SELECT * FROM " . tablename('ewei_shop_notice') . " WHERE uniacid = '{$_W['uniacid']}' ORDER BY displayorder DESC");
} elseif ($operation == 'post') {
	$id = intval($_GPC['id']);
	if (empty($id)) {
		ca('shop.notice.add');
	} else {
		ca('shop.notice.edit|shop.notice.view');
	} 
	if (checksubmit('submit')) {
		$data = array('uniacid' => $_W['uniacid'], 'displayorder' => intval($_GPC['displayorder']), 'title' => trim($_GPC['title']), 'thumb' => save_media($_GPC['thumb']), 'link' => trim($_GPC['link']), 'detail' => htmlspecialchars_decode($_GPC['detail']), 'status' => intval($_GPC['status']), 'createtime' => time());
		if (!empty($id)) {
			pdo_update('ewei_shop_notice', $data, array('id' => $id));
			plog('shop.notice.edit', "修改公告 ID: {$id}");
		} else {
			pdo_insert('ewei_shop_notice', $data);
			$id = pdo_insertid();
			plog('shop.notice.add', "修改公告 ID: {$id}");
		} 
		message('更新健康资源成功！', $this -> createWebUrl('shop/notice', array('op' => 'display')), 'success');
	} 
	$notice = pdo_fetch("SELECT * FROM " . tablename('ewei_shop_notice') . " WHERE id = '$id' and uniacid = '{$_W['uniacid']}'");
} elseif ($operation == 'delete') {
	ca('shop.notice.delete');
	$id = intval($_GPC['id']);
	$notice = pdo_fetch("SELECT id,title  FROM " . tablename('ewei_shop_notice') . " WHERE id = '$id' AND uniacid=" . $_W['uniacid'] . "");
	if (empty($notice)) {
		message('抱歉，健康资源不存在或是已经被删除！', $this -> createWebUrl('shop/notice', array('op' => 'display')), 'error');
	} 
	pdo_delete('ewei_shop_notice', array('id' => $id));
	plog('shop.notice.delete', "删除公告 ID: {$id} 标题: {$notice['title']}");
	message('健康资源删除成功！', $this -> createWebUrl('shop/notice', array('op' => 'display')), 'success');
} 
load() -> func('tpl');
include $this -> template('web/shop/notice');
