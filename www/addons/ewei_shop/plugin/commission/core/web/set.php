<?php
global $_W, $_GPC;
//check_shop_auth('http://120.26.212.219/api.php', $this -> pluginname);
ca('commission.set');
$set = $this -> getSet();
if (checksubmit('submit')) {
	$data = is_array($_GPC['setdata'])?array_merge($set, $_GPC['setdata']): array();
	$this -> updateSet($data);
	$datapath = IA_ROOT . "/addons/ewei_shop/data/template";
	if (!is_dir($datapath)) {
		load() -> func('file');
		@mkdirs($datapath, "777");
	} 
	file_put_contents($datapath . "/plugin_" . $this -> pluginname . "_" . $_W['uniacid'], $data['style']);
	plog('commission.set', '修改基本设置');
	message('设置保存成功!', referer(), 'success');
} 
$styles = array();
$dir = IA_ROOT . "/addons/ewei_shop/plugin/" . $this -> pluginname . "/template/mobile/";
if ($handle = opendir($dir)) {
	while (($file = readdir($handle)) !== false) {
		if ($file != ".." && $file != ".") {
			if (is_dir($dir . "/" . $file)) {
				$styles[] = $file;
			} 
		} 
	} 
	closedir($handle);
} 
load() -> func('tpl');
include $this -> template('set');
