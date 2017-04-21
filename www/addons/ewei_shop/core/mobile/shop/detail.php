<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
}
global $_W, $_GPC;
$openid = m('user') -> getOpenid();
$member = m('member') -> getMember($openid);
$uniacid = $_W['uniacid'];
$goodsid = intval($_GPC['id']);
$goods = pdo_fetch("SELECT * FROM " . tablename('ewei_shop_goods') . " WHERE id = :id limit 1", array(':id' => $goodsid));
$shop = set_medias( m('common') -> getSysset('shop'), 'logo');
$shop['url'] = $this -> createMobileUrl('shop');
$opencommission = false;


$uncomfortable_place = isset($_SESSION['uncomfortable_place']) ? $_SESSION['uncomfortable_place'] : '' ;
$recommend_products = isset($_SESSION['recommend_products']) ? $_SESSION['recommend_products'] : '' ; 
//var_dump($_SESSION['uncomfortable_place']);exit;
//TODO 这里逻辑需要更改 打开分销插件 并且当前用户是管家
if (p('commission')&&($member['isagent'] == 1 && $member['status'] == 1)) {
	$cset = p('commission') -> getSet();
	$opencommission = intval($cset['level']) > 0;
	if ($opencommission) {
		if (empty($mid)) {
			if ($member['isagent'] == 1 && $member['status'] == 1) {
				$mid = $member['id'];
			}
		}
		//TODO
		/* 
		if (!empty($mid)) {
			$shop = set_medias( p('commission') -> getShop($mid), 'logo');
			$shop['url'] = $this -> createPluginMobileUrl('commission/myshop', array('mid' => $mid));
		}*/
		$commission_text = empty($cset['buttontext']) ? '我要推广' : $cset['buttontext'];
	}
}
//TODO 
$mid = intval($_GPC['mid']);
$html = $goods['content'];
preg_match_all('/<img.*?src=[\\\\\'| \\"](.*?(?:[\\.gif|\\.jpg]?))[\\\\\'|\\"].*?[\\/]?> / ', $html, $imgs);
if (isset($imgs[1])) {
    foreach($imgs[1] as $img) {
        $im = array("old" => $img, "new" => tomedia($img));
        $images[] = $im;
    }
    if (isset($images)) {
        foreach($images as $img) {
            $html = str_replace($img['old'], $img['new'], $html);
        }
    }
    $goods['content'] = $html;
}
if ($_W['isajax']) {
    if (empty($goods)) {
        show_json(0);
    }
    $goods = set_medias($goods, 'thumb');
    $goods['canbuy'] = !empty($goods['status']) && empty($goods['deleted']);
    $goods['timebuy'] = '0';
    if ($goods['istime'] == 1) {
        if (time() < $goods['timestart']) {
            $goods['timebuy'] = '-1';
        }
        if (time() > $goods['timeend']) {
            $goods['timebuy'] = '1';
        }
    }
    $goods['userbuy'] = '1';
    if ($goods['usermaxbuy'] > 0) {
        $order_goodscount = pdo_fetchcolumn('select ifnull(sum(og.total),0)  from '.tablename('ewei_shop_order_goods').
            ' og '.
            ' left join '.tablename('ewei_shop_order').
            ' o on og.orderid=o.id '.
            ' where og.goodsid=:goodsid and  o.status>=1 and o.openid=:openid  and og.uniacid=:uniacid ', array(':goodsid' => $goodsid, ':uniacid' => $uniacid, ':openid' => $openid));
        if ($order_goodscount >= $goods['usermaxbuy']) {
            $goods['userbuy'] = 0;
        }
    }
    $levelid = $member['level'];
    $groupid = $member['groupid'];
    $goods['levelbuy'] = '1';
    if ($goods['buylevels'] != '') {
        $buylevels = explode(',', $goods['buylevels']);
        if (!in_array($levelid, $buylevels)) {
            $goods['levelbuy'] = 0;
        }
    }
    $goods['groupbuy'] = '1';
    if ($goods['buygroups'] != '') {
        $buygroups = explode(',', $goods['buygroups']);
        if (!in_array($groupid, $buygroups)) {
            $goods['groupbuy'] = 0;
        }
    }
    $pics = array($goods['thumb']);
    $thumburl = unserialize($goods['thumb_url']);
    if (is_array($thumburl)) {
        $pics = array_merge($pics, $thumburl);
    }
    unset($thumburl);
    $pics = set_medias($pics);
    $marketprice = $goods['marketprice'];
    $productprice = $goods['productprice'];
    $maxprice = $marketprice;
    $minprice = $marketprice;
    $stock = $goods['total'];
    $allspecs = array();
    if (!empty($goods['hasoption'])) {
        $allspecs = pdo_fetchall("select * from ".tablename('ewei_shop_goods_spec').
            " where goodsid = :id order by displayorder asc", array(':id' => $goodsid));
        foreach($allspecs as & $s) {
            $items = pdo_fetchall("select * from ".tablename('ewei_shop_goods_spec_item').
                " where `show` = 1 and specid = :specid order by displayorder asc", array(":specid" => $s['id']));
            $s['items'] = set_medias($items, 'thumb');
        }
        unset($s);
    }
    $options = array();
    if (!empty($goods['hasoption'])) {
        $options = pdo_fetchall("select id, title, thumb, marketprice, productprice, costprice, stock, weight, specs from ".tablename('ewei_shop_goods_option').
            " where goodsid = :id order by id asc", array(':id' => $goodsid));
        $options = set_medias($options, 'thumb');
        foreach($options as &$o) {
            if ($maxprice < $o['marketprice']) {
                $maxprice = $o['marketprice'];
            }
            if ($minprice > $o['marketprice']) {
                $minprice = $o['marketprice'];
            }
            //TODO 控制产品规格的库存
            $o['stock'] = $goods['sale_quotas'];
        }
        //var_dump($options);exit;
        $goods['maxprice'] = $maxprice;
        $goods['minprice'] = $minprice;
    }
    $specs = array();
    if (!empty($goods['hasoption'])) {
        if (count($options) > 0) {
            $specitemids = explode("_", $options[0]['specs']);
            foreach($specitemids as $itemid) {
                foreach($allspecs as $ss) {
                    $items = $ss['items'];
                    foreach($items as $it) {
                        if ($it['id'] == $itemid) {
                            $specs[] = $ss;
                            break;
                        }
                    }
                }
            }
        }
    }
    $params = pdo_fetchall("SELECT * FROM ".tablename('ewei_shop_goods_param').
        " WHERE uniacid = :uniacid and goodsid = :goodsid order by displayorder asc", array(':uniacid' => $uniacid, ":goodsid" => $goods['id']));
    $fcount = pdo_fetchcolumn('select count(*) from '.tablename('ewei_shop_member_favorite').
        ' where uniacid=:uniacid and openid=:openid and goodsid=:goodsid and deleted=0 ', array(':uniacid' => $uniacid, ':openid' => $openid, ':goodsid' => $goods['id']));
    pdo_query('update '.tablename('ewei_shop_goods').
        " set viewcount = viewcount + 1 where id = :id and uniacid = '{$uniacid}' ", array(":id" => $goodsid));
    $history = pdo_fetchcolumn('select count(*) from '.tablename('ewei_shop_member_history').
        ' where goodsid=:goodsid and uniacid=:uniacid and openid=:openid and deleted=0 limit 1', array(':goodsid' => $goodsid, ':uniacid' => $uniacid, ':openid' => $openid));
    if ($history <= 0) {
        $history = array('uniacid' => $uniacid, 'openid' => $openid, 'goodsid' => $goodsid, 'deleted' => 0, 'createtime' => time());
        pdo_insert('ewei_shop_member_history', $history);
    }
    $level = m('member') -> getLevel($openid);
    $stores = array();
    if ($goods['isverify'] == 2) {
        $storeids = array();
        if (!empty($goods['storeids'])) {
            $storeids = array_merge(explode(',', $goods['storeids']), $storeids);
        }
        if (empty($storeids)) {
            $stores = pdo_fetchall('select * from '.tablename('ewei_shop_store').
                ' where  uniacid=:uniacid and status=1', array(':uniacid' => $_W['uniacid']));
        } else {
            $stores = pdo_fetchall('select * from '.tablename('ewei_shop_store').
                ' where id in ('.implode(',', $storeids).
                ') and uniacid=:uniacid and status=1', array(':uniacid' => $_W['uniacid']));
        }
    }
    $followed = m('user') -> followed($openid);
    $followurl = empty($goods['followurl']) ? $shop['followurl'] : $goods['followurl'];
    $followtip = empty($goods['followtip']) ? '如果您想要购买此商品，需要您关注我们的公众号，点击【确定】关注后再来购买吧~' : $goods['followtip'];
    $sale_plugin = p('sale');
    $saleset = false;
    if ($sale_plugin) {
        $saleset = $sale_plugin -> getSet();
    }
    $ret = array('uncomfortable_place' => $uncomfortable_place, 'recommend_products' => $recommend_products, 'goods' => $goods, 'followed' => $followed ? 1 : 0, 'followurl' => $followurl, 'followtip' => $followtip, 'saleset' => $saleset, 'pics' => $pics, 'options' => $options, 'specs' => $specs, 'params' => $params, 'commission' => $opencommission, 'commission_text' => $commission_text, 'level' => $level, 'shop' => $shop, 'goodscount' => pdo_fetchcolumn('select count(*) from '.tablename('ewei_shop_goods').
        ' where uniacid=:uniacid and status=1 and deleted=0 ', array(':uniacid' => $uniacid)), 'cartcount' => pdo_fetchcolumn('select sum(total) from '.tablename('ewei_shop_member_cart').
        ' where uniacid=:uniacid and openid=:openid and deleted=0 ', array(':uniacid' => $uniacid, ':openid' => $openid)), 'isfavorite' => $fcount > 0, 'stores' => $stores);
    $commission = p('commission');
    if ($commission) {
        $shopid = $shop['mid'];
        if (!empty($shopid)) {
            $myshop = set_medias($commission -> getShop($shopid), array('img', 'logo'));
        }
    }
    if (!empty($myshop['selectgoods']) && !empty($myshop['goodsids'])) {
        $ret['goodscount'] = count(explode(", ", $myshop['goodsids']));
    }
    show_json(1, $ret);
}
$_W['shopshare'] = array('title' => !empty($goods['share_title']) ? $goods['share_title'] : $goods['title'], 'imgUrl' => !empty($goods['share_icon']) ? tomedia($goods['share_icon']) : tomedia($goods['thumb']), 'desc' => !empty($goods['description']) ? $goods['description'] : $shop['name'], 'link' => $this -> createMobileUrl('shop/detail', array('id' => $goods['id'])));
if (p('commission')) {
    $cset = p('commission') -> getSet();
    if (!empty($cset)) {
        $member = m('member') -> getMember($openid);
        if ($member['isagent'] == 1 && $member['status'] == 1) {
            $_W['shopshare']['link'] = $this -> createMobileUrl('shop/detail', array('id' => $goods['id'], 'mid' => $member['id']));
            if (empty($this -> set['become_reg']) && (empty($member['realname']) || empty($member['mobile']))) {
                $trigger = true;
            }
        } else if (!empty($_GPC['mid'])) {
            $_W['shopshare']['link'] = $this -> createMobileUrl('shop/detail', array('id' => $goods['id'], 'mid' => $_GPC['mid']));
        }
    }
}
$this -> setHeader();


include $this -> template('shop/detail');