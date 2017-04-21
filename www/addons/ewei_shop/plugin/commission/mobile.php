<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
} 
function sortByCreateTime($a, $b) {
	if ($a['createtime'] == $b['createtime']) {
		return 0;
	} else {
		return ($a['createtime'] < $b['createtime'])? 1 : -1;
	} 
} 
class CommissionMobile extends Plugin {
	protected $set = null;
	public function __construct() {
		parent :: __construct('commission');
		$this -> set = $this -> getSet();
		global $_GPC,$_W;
		if ($_GPC['method'] != 'register' && $_GPC['method'] != 'myshop') {
			$openid = m('user') -> getOpenid();
			$member = m('member') -> getMember($openid);
			//$sql='select count(*) from ' . tablename('ewei_shop_order') . ' where openid=:openid and status=3 and refundid=0 and uniacid=:uniacid limit 1';
			//$memberIsBuyed=pdo_fetchcolumn($sql, array(':openid'=>$openid,':uniacid'=>$_W['uniacid']));
			if (($member['isagent'] != 1 || $member['status'] != 1) && !isset($_GPC['f'])) {
				header('location:' . $this -> createPluginMobileUrl('commission/register'));
				exit;
			} 
		} 
	} 
	public function index() {
		$this -> _exec_plugin(__FUNCTION__, false);
	} 
	public function team() {
		$this -> _exec_plugin(__FUNCTION__, false);
	} 
	public function order() {
		$this -> _exec_plugin(__FUNCTION__, false);
	} 
	public function withdraw() {
		$this -> _exec_plugin(__FUNCTION__, false);
	} 
	public function apply() {
		$this -> _exec_plugin(__FUNCTION__, false);
	} 
	public function shares() {
		$this -> _exec_plugin(__FUNCTION__, false);
	} 
	public function register() {
		$this -> _exec_plugin(__FUNCTION__, false);
	} 
	public function myshop() {
		$this -> _exec_plugin(__FUNCTION__, false);
	} 
	public function log() {
		$this -> _exec_plugin(__FUNCTION__, false);
	} 
} 
