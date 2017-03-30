<?php
global $_W, $_GPC;
$mid = intval($_GPC['mid']);
$openid = m('user') -> getOpenid();
$member = m('member') -> getInfo($openid);
//$memberIsBuyed=pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_order') . ' where openid=:openid and status=3 and refundid=0 and uniacid=:uniacid limit 1', array(':openid'=>$openid,':uniacid'=>$_W['uniacid']));
$shop_set = m('common') -> getSysset('shop');
$can = false;
//分享 一种是管家  第二种 已购买用户
if (($member['isagent'] == 1 && $member['status'] == 1)|| isset($_GPC['f'])) {
	$can = true;
}
if (!$can) {
	header("location: " . $this -> createPluginMobileUrl('commission/register'));
	exit ;
}
$returnurl = urlencode($this -> createPluginMobileUrl('commission/shares', array('goodsid' => $_GPC['goodsid'])));
$infourl = "";
$set = $this -> set;

if (empty($set['become_reg'])&&!isset($_GPC['f'])) {
	if (empty($member['realname']) || empty($member['mobile'])) {
		$infourl = $this -> createMobileUrl('member/info', array('returnurl' => $returnurl));
	}
}
if (empty($infourl)) {
	$myshop = $this -> model -> getShop($member['id']);
	$share_goods = false;
	$share = array();
	$goodsid = intval($_GPC['goodsid']);
	if (!empty($goodsid)) {
		$goods = pdo_fetch('select * from ' . tablename('ewei_shop_goods') . ' where uniacid=:uniacid and id=:id limit 1', array(':uniacid' => $_W['uniacid'], ':id' => $goodsid));
		$goods = set_medias($goods, 'thumb');
		if (!empty($goods)) {
			$commission = number_format($this -> model -> getCommission($goods), 2);
			$share_goods = true;
			$_W['shopshare'] = array('title' => !empty($goods['share_title']) ? $goods['share_title'] : $goods['title'], 'imgUrl' => !empty($goods['share_icon']) ? tomedia($goods['share_icon']) : tomedia($goods['thumb']), 'desc' => !empty($goods['description']) ? $goods['description'] : $myshop['name'], 'link' => $this -> createMobileUrl('shop/detail', array('id' => $goods['id'], 'mid' => $myshop['mid']), true));
		}
	}
	if (!$share_goods) {
		if (!empty($_GPC['mid'])) {
			$shop = $this -> model -> getShop($_GPC['mid']);
			$_W['shopshare'] = array('imgUrl' => $shop['logo'], 'title' => $shop['name'], 'desc' => $shop['desc'], 'link' => $this -> createMobileUrl('shop', array('mid' => $shop['mid']), true));
		} else {
			//现在不能有个人小店
			//$_W['shopshare'] = array('imgUrl' => $myshop['logo'], 'title' => $myshop['name'], 'desc' => $myshop['desc'], 'link' => $this -> createPluginMobileUrl('commission/myshop', array('mid' => $myshop['mid']), true));
			$shop = $this -> model -> getShop(0);
			$_W['shopshare'] = array('imgUrl' => $myshop['logo'], 'title' => "我是 {$member['nickname']},我为\"{$shop['name']}\"代言", 'desc' => $shop['desc'], 'link' => $this -> createMobileUrl('shop', array('mid' => $myshop['mid']), true));
		}
	}
}
if (empty($infourl) && $_W['isajax']) {
	$p = p('poster');
	if ($share_goods) {
		if ($p) {
			$img = $p -> createCommissionPoster($openid, $goods['id']);
		}
		if (empty($img)) {
			$img = $this -> model -> createGoodsImage($goods, $shop_set);
		}
	} else {
		if ($p) {
			$img = $p -> createCommissionPoster($openid);
		}
		if (empty($img)) {
			$img = $this -> model -> createShopImage($shop_set);
		}
	}
	die($img);
}
include $this -> template('shares');
