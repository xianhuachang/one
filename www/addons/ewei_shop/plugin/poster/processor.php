<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
} 
require IA_ROOT . '/addons/ewei_shop/defines.php';
require EWEI_SHOP_INC . 'plugin/plugin_processor.php';
class PosterProcessor extends PluginProcessor {
	public function __construct() {
		parent :: __construct('poster');
	} 
	public function respond($obj = null) {
		global $_W;
		$message = $obj -> message;
		$msgtype = strtolower($message['msgtype']);
		$event = strtolower($message['event']);
		$obj -> member = $this -> model -> checkMember($message['from']);
		if ($msgtype == 'text' || $event == 'click') {
			return $this -> responseText($obj);
		} else if ($msgtype == 'event') {
			if ($event == 'scan') {
				return $this -> responseScan($obj);
			} else if ($event == 'subscribe') {
				return $this -> responseSubscribe($obj);
			} 
		} 
	} 
	private function responseText($obj) {
		global $_W;
		$timeout = 4;
		load() -> func('communication');
		ihttp_request($_W['siteroot'] . 'app/index.php?i=' . $_W['uniacid'] . '&c=entry&m=ewei_shop&do=plugin&p=poster&method=build', array("openid" => $obj -> message['from'], "content" => urlencode($obj -> message['content']),), null, $timeout);
		return $this -> responseEmpty();
	} 
	private function responseEmpty() {
		ob_clean();
		ob_start();
		echo '';
		ob_flush();
		ob_end_flush();
		exit(0);
	} 
	private function responseDefault($obj) {
		global $_W;
		return $obj -> respText('感谢您的关注!');
	} 
	private function responseScan($obj) {
		global $_W;
		$openid = $obj -> message['from'];
		$sceneid = $obj -> message['eventkey'];
		if (empty($sceneid)) {
			return $this -> responseDefault($obj);
		} 
		$qr = $this -> model -> getQRBySceneid($sceneid);
		if (empty($qr)) {
			return $this -> responseDefault($obj);
		} 
		$poster = pdo_fetch('select * from ' . tablename('ewei_shop_poster') . ' where type=4 and isdefault=1 and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
		if (empty($poster)) {
			return $this -> responseDefault($obj);
		} 
		$this -> model -> scanTime($openid, $qr['openid'], $poster);
		$qrmember = m('member') -> getMember($qr['openid']);
		$url = trim($poster['respurl']);
		if (empty($url)) {
			if ($qrmember['isagent'] == 1 && $qrmember['status'] == 1) {
				$url = $_W['siteroot'] . "app/index.php?i={$_W['uniacid']}&c=entry&m=ewei_shop&do=plugin&p=commission&method=myshop&mid=" . $qrmember['id'];
			} else {
				$url = $_W['siteroot'] . "app/index.php?i={$_W['uniacid']}&c=entry&m=ewei_shop&do=shop&mid=" . $qrmember['id'];
			} 
		} 
		$news = array(array('title' => $poster['resptitle'], 'description' => $poster['respdesc'], 'picurl' => tomedia($poster['respthumb']), 'url' => $url));
		return $obj -> respNews($news);
	} 
	private function responseSubscribe($obj) {
		global $_W;
		$openid = $obj -> message['from'];
		$keys = explode('_', $obj -> message['eventkey']);
		$sceneid = isset($keys[1])? $keys[1] : '';
		if (empty($sceneid)) {
			return $this -> responseDefault($obj);
		} 
		$qr = $this -> model -> getQRBySceneid($sceneid);
		if (empty($qr)) {
			return $this -> responseDefault($obj);
		} 
		$poster = pdo_fetch('select * from ' . tablename('ewei_shop_poster') . ' where type=4 and isdefault=1 and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
		if (empty($poster)) {
			return $this -> responseDefault($obj);
		} 
		$member = $obj -> member;
		if ($member['isnew']) {
			pdo_update('ewei_shop_poster', array('follows' => $poster['follows'] + 1), array('id' => $poster['id']));
		} 
		$qrmember = m('member') -> getMember($qr['openid']);
		$log = pdo_fetch('select * from ' . tablename('ewei_shop_poster_log') . ' where openid=:openid and posterid=:posterid and uniacid=:uniacid limit 1', array(':openid' => $openid, ':posterid' => $poster['id'], ':uniacid' => $_W['uniacid']));
		if (empty($log) && $openid != $qr['openid']) {
			$log = array('uniacid' => $_W['uniacid'], 'posterid' => $poster['id'], 'openid' => $openid, 'from_openid' => $qr['openid'], 'subcredit' => $poster['subcredit'], 'submoney' => $poster['submoney'], 'reccredit' => $poster['reccredit'], 'recmoney' => $poster['recmoney'], 'createtime' => time());
			pdo_insert('ewei_shop_poster_log', $log);
			$log['id'] = pdo_insertid();
			$subpaycontent = $poster['subpaycontent'];
			if (empty($subpaycontent)) {
				$subpaycontent = '您通过 [nickname] 的推广二维码扫码关注的奖励';
			} 
			$subpaycontent = str_replace("[nickname]", $qrmember['nickname'], $subpaycontent);
			$recpaycontent = $poster['recpaycontent'];
			if (empty($recpaycontent)) {
				$recpaycontent = '推荐 [nickname] 扫码关注的奖励';
			} 
			$recpaycontent = str_replace("[nickname]", $member['nickname'], $subpaycontent);
			if ($poster['subcredit'] > 0) {
				m('member') -> setCredit($openid, 'credit1', $poster['subcredit'], array(0, '扫码关注积分+' . $poster['subcredit']));
			} 
			if ($poster['submoney'] > 0) {
				$pay = $poster['submoney'];
				if ($poster['paytype'] == 1) {
					$pay *= 100;
				} 
				m('finance') -> pay($openid, $poster['paytype'], $pay, '', $subpaycontent);
			} 
			if ($poster['reccredit'] > 0) {
				m('member') -> setCredit($qr['openid'], 'credit1', $poster['reccredit'], array(0, '推荐扫码关注积分+' . $poster['reccredit']));
			} 
			if ($poster['recmoney'] > 0) {
				$pay = $poster['recmoney'];
				if ($poster['paytype'] == 1) {
					$pay *= 100;
				} 
				m('finance') -> pay($qr['openid'], $poster['paytype'], $pay, '', $recpaycontent);
			} 
			if (!empty($poster['subtext'])) {
				$subtext = $poster['subtext'];
				$subtext = str_replace("[nickname]", $member['nickname'], $subtext);
				$subtext = str_replace("[credit]", $poster['reccredit'], $subtext);
				$subtext = str_replace("[money]", $poster['recmoney'], $subtext);
				if (!empty($poster['templateid'])) {
					m('message') -> sendTplNotice($qr['openid'], $poster['templateid'], array('first' => array('value' => "推荐关注奖励到账通知", "color" => "#4a5077"), 'keyword1' => array('value' => '推荐奖励', "color" => "#4a5077"), 'keyword2' => array('value' => $subtext, "color" => "#4a5077"), 'remark' => array('value' => "\r\n谢谢您对我们的支持！", "color" => "#4a5077"),), '');
				} else {
					m('message') -> sendCustomNotice($qr['openid'], $subtext);
				} 
			} 
			if (!empty($poster['entrytext'])) {
				$entrytext = $poster['entrytext'];
				$entrytext = str_replace("[nickname]", $qrmember['nickname'], $entrytext);
				$entrytext = str_replace("[credit]", $poster['subcredit'], $entrytext);
				$entrytext = str_replace("[money]", $poster['submoney'], $entrytext);
				if (!empty($poster['templateid'])) {
					m('message') -> sendTplNotice($openid, $poster['templateid'], array('first' => array('value' => "关注奖励到账通知", "color" => "#4a5077"), 'keyword1' => array('value' => '关注奖励', "color" => "#4a5077"), 'keyword2' => array('value' => $entrytext, "color" => "#4a5077"), 'remark' => array('value' => "\r\n谢谢您对我们的支持！", "color" => "#4a5077"),), '');
				} else {
					m('message') -> sendCustomNotice($openid, $subtext);
				} 
			} 
		} 
		$p = p('commission');
		if ($p) {
			$cset = $p -> getSet();
			if (!empty($cset)) {
				if ($member['isagent'] != 1 && $member['status'] != 1) {
					$time = time();
					if (!empty($poster['bedown']) && $qrmember['isagent'] == 1 && $qrmember['status'] == 1 && empty($member['agentid']) && $member['id'] != $qrmember['id']) {
						pdo_update('ewei_shop_member', array('agentid' => $qrmember['id'], 'childtime' => $time), array('id' => $member['id']));
						$p -> sendMessage($qrmember['openid'], array('nickname' => $member['nickname'], 'childtime' => $time), TM_COMMISSION_AGENT_NEW);
					} 
					if (!empty($poster['beagent'])) {
						pdo_update('ewei_shop_member', array('isagent' => 1, 'status' => intval($cset['become_check']), 'agenttime' => $time), array('id' => $member['id']));
						$p -> sendMessage($member['openid'], array('nickname' => $member['nickname'], 'agenttime' => $time), TM_COMMISSION_BECOME);
					} 
				} 
			} 
		} 
		$url = trim($poster['respurl']);
		if (empty($url)) {
			if ($qrmember['isagent'] == 1 && $qrmember['status'] == 1) {
				$url = $_W['siteroot'] . "app/index.php?i={$_W['uniacid']}&c=entry&m=ewei_shop&do=plugin&p=commission&method=myshop&mid=" . $qrmember['id'];
			} else {
				$url = $_W['siteroot'] . "app/index.php?i={$_W['uniacid']}&c=entry&m=ewei_shop&do=shop&mid=" . $qrmember['id'];
			} 
		} 
		$news = array(array('title' => $poster['resptitle'], 'description' => $poster['respdesc'], 'picurl' => tomedia($poster['respthumb']), 'url' => $url));
		return $obj -> respNews($news);
	} 
} 
