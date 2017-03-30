<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
} 
global $_W, $_GPC;
//check_shop_auth('http://120.26.212.219/api.php');
$operation = !empty($_GPC['op'])? $_GPC['op'] : 'display';
if ($operation == 'display') {
	ca('member.level.view');
	$list = pdo_fetchall("SELECT * FROM " . tablename('ewei_shop_member_level') . " WHERE uniacid = '{$_W['uniacid']}' ORDER BY level asc");
} elseif ($operation == 'post') {
	$id = intval($_GPC['id']);
	if (empty($id)) {
		ca('member.level.add');
	} else {
		ca('member.level.edit|member.level.view');
	} 
	$level = pdo_fetch("SELECT * FROM " . tablename('ewei_shop_member_level') . " WHERE id = '$id'");
	if (checksubmit('submit')) {
		if (empty($_GPC['levelname'])) {
			message('抱歉，请输入分类名称！');
		}
		//TODO 修改了orderrechargemoney 用于充值送折扣 
		$data = array('uniacid' => $_W['uniacid'], 'level' => intval($_GPC['level']), 'levelname' => trim($_GPC['levelname']), 'ordercount' => intval($_GPC['ordercount']), 'ordermoney' => $_GPC['ordermoney'], 'orderrechargemoney' => $_GPC['orderrechargemoney'],'discount' => $_GPC['discount']);
		if (!empty($id)) {
			pdo_update('ewei_shop_member_level', $data, array('id' => $id, 'uniacid' => $_W['uniacid']));
			plog('member.level.edit', "修改会员等级 ID: {$id}");
		} else {
			pdo_insert('ewei_shop_member_level', $data);
			$id = pdo_insertid();
			plog('member.level.add', "添加会员等级 ID: {$id}");
		} 
		message('更新等级成功！', $this -> createWebUrl('member/level', array('op' => 'display')), 'success');
	} 
} elseif ($operation == 'delete') {
	ca('member.level.delete');
	$id = intval($_GPC['id']);
	$level = pdo_fetch("SELECT id,levelname FROM " . tablename('ewei_shop_member_level') . " WHERE id = '$id'");
	if (empty($level)) {
		message('抱歉，等级不存在或是已经被删除！', $this -> createWebUrl('member/level', array('op' => 'display')), 'error');
	} 
	pdo_delete('ewei_shop_member_level', array('id' => $id, 'uniacid' => $_W['uniacid']));
	plog('member.level.delete', "删除会员等级 ID: {$id} 等级名称: {$level['levelname']}");
	message('等级删除成功！', $this -> createWebUrl('member/level', array('op' => 'display')), 'success');
} 
load() -> func('tpl');
include $this -> template('web/member/level');
