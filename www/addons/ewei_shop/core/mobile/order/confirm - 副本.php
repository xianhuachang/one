<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
} 
global $_W, $_GPC;
$operation = !empty($_GPC['op'])? $_GPC['op'] : 'display';
$openid = m('user') -> getOpenid();
$uniacid = $_W['uniacid'];
$fromcart = 0;
$trade = m('common') -> getSysset('trade');
if (!empty($trade['shareaddress'])) {
	if (!$_W['isajax']) {
		$shareAddress = m('common') -> shareAddress();
		if (empty($shareAddress)) {
			exit;
		} 
	} 
} 
load()->model('mc');
$uid = $member['uid'];
echo var_dump($uid);ecit;
if (!$_W['isajax']) {
	 
	if ($operation == 'display') {
		$id = intval($_GPC['id']);
		$optionid = intval($_GPC['optionid']);
		$total = intval($_GPC['total']);
		$ids = '';
		empty($total) && $total = 1;
		$isverify = false;
		$goods = array();
		if (empty($id)) {
			$condition = '';
			$cartids = $_GPC['cartids'];
			if (!empty($operation)) {
				$condition = ' and c.id in (' . $cartids . ')';
			} 
			$sql = 'SELECT c.goodsid,c.total,g.maxbuy,g.issendfree,g.isnodiscount,g.weight,o.productsn as sendNum, g.title,g.thumb,ifnull(o.marketprice, g.marketprice) as marketprice,o.title as optiontitle,c.optionid,g.storeids,g.isverify,g.deduct FROM ' . tablename('ewei_shop_member_cart') . ' c ' . ' left join ' . tablename('ewei_shop_goods') . ' g on c.goodsid = g.id ' . ' left join ' . tablename('ewei_shop_goods_option') . ' o on c.optionid = o.id ' . " where c.openid=:openid and  c.deleted=0 and c.uniacid=:uniacid {$condition} order by c.id desc";
			$goods = pdo_fetchall($sql, array(':uniacid' => $uniacid, ':openid' => $openid));
			
			if (empty($goods)) {
				show_json(-1, array('url' => $this -> createMobileUrl('shop/cart')));
			} 
			$fromcart = 1;
		} else {
			$sql = 'SELECT id as goodsid,title,weight,issendfree,isnodiscount, thumb,marketprice,storeids,isverify,deduct FROM ' . tablename('ewei_shop_goods') . ' where id=:id and uniacid=:uniacid  limit 1';
			$data = pdo_fetch($sql, array(':uniacid' => $uniacid, ':id' => $id));
			$data['total'] = $total;
			if (!empty($optionid)) {
				$option = pdo_fetch('select id,title,marketprice,goodssn,productsn from ' . tablename('ewei_shop_goods_option') . ' where id=:id and goodsid=:goodsid and uniacid=:uniacid  limit 1', array(':uniacid' => $uniacid, ':goodsid' => $id, ':id' => $optionid));
				if (!empty($option)) {
					$data['optionid'] = $optionid;
					$data['optiontitle'] = $option['title'];
					$data['marketprice'] = $option['marketprice'];
					$data['sendNum'] = $option['productsn'];   //TODO  修改了逻辑，用这个字段表示邮寄次数
				} 
			} 
			$goods[] = $data;
		} 
		$goods = set_medias($goods, 'thumb');
		$sendNum=0;
		foreach ($goods as $g) {
			if ($g['isverify'] == 2) {
				$isverify = true;
			}
			if($g['sendNum']>$sendNum){
				$sendNum=$g['sendNum'];
			} 
		} 
		$member = m('member') -> getMember($openid);
		$stores = array();
		$address = false;
		$carrier = false;
		$carrier_list = array();
		$dispatch = false;
		$dispatch_list = false;
		$sale_plugin = p('sale');
		$saleset = false;
		if ($sale_plugin) {
			$saleset = $sale_plugin -> getSet();
		} 
		if ($isverify) {
			$storeids = array();
			foreach ($goods as $g) {
				if (!empty($g['storeids'])) {
					$storeids = array_merge(explode(',', $g['storeids']), $storeids);
				} 
			} 
			if (empty($storeids)) {
				$stores = pdo_fetchall('select * from ' . tablename('ewei_shop_store') . ' where  uniacid=:uniacid and status=1', array(':uniacid' => $_W['uniacid']));
			} else {
				$stores = pdo_fetchall('select * from ' . tablename('ewei_shop_store') . ' where id in (' . implode(',', $storeids) . ') and uniacid=:uniacid and status=1', array(':uniacid' => $_W['uniacid']));
			} 
		} else {
			$address = pdo_fetch('select id,realname,mobile,address,province,city,area from ' . tablename('ewei_shop_member_address') . ' where openid=:openid and deleted=0 and isdefault=1  and uniacid=:uniacid limit 1' , array(':uniacid' => $uniacid, ':openid' => $openid));
			$carrier = false;
			$carrier_list = array();
			$weight = 0;
			foreach ($goods as $g) {
				if (empty($g['issendfree'])) {
					$weight += $g['weight'] * $g['total'];
				} 
			} 
			$dispatch = false;
			$dispatch_list = pdo_fetchall("select id,dispatchname,dispatchtype,firstprice,firstweight,secondprice,secondweight,areas,carriers from " . tablename("ewei_shop_dispatch") . " WHERE enabled=1 and uniacid = {$_W['uniacid']}  order by displayorder desc");
			foreach ($dispatch_list as &$d) {
				$d['price'] = 0;
				if ($d['dispatchtype'] == 1) {
					$clist = unserialize($d['carriers']);
					if (is_array($clist)) {
						$carrier_list = array_merge($carrier_list, $clist);
					} 
					continue;
				} 
				$areas = unserialize($d['areas']);
				if ($weight > 0) {
					if (!empty($address)) {
						$setprice = false;
						if (is_array($areas) && count($areas) > 0) {
							foreach ($areas as $area) {
								$citys = explode(";", $area['citys']);
								if (in_array($address['city'], $citys)) {
									$d['price'] = m('order') -> getDispatchPrice($weight, $area);
									$setprice = true;
									break;
								} 
							} 
						} 
						if (!$setprice) {
							$d['price'] = m('order') -> getDispatchPrice($weight, $d);
						} 
					} else if (empty($member['city'])) {
						$d['price'] = m('order') -> getDispatchPrice($weight, $d);
					} else if (!empty($member['city'])) {
						$setprice = false;
						if (is_array($areas) && count($areas) > 0) {
							foreach ($areas as $area) {
								$citys = explode(";", $areas['citys']);
								if (in_array($member['city'], $citys)) {
									$d['price'] = m('order') -> getDispatchPrice($weight, $area);
									$setprice = true;
									break;
								} 
							} 
						} 
						if (!$setprice) {
							$d['price'] = m('order') -> getDispatchPrice($weight, $d);
						} 
					} 
				} 
				if (!$dispatch) {
					$dispatch = $d;
				} 
			} 
			unset($d);
			if (!empty($carrier_list)) {
				$carrier = $carrier_list[0];
			} 
		} 
		$level = m('member') -> getLevel($openid);
		$total = 0;
		$goodsprice = 0;
		$realprice = 0;
		$deductprice = 0;
		$discountprice = 0;
		$commission_sum=0;//TODO 后改的，用于分销的总价格
		foreach ($goods as $g) {
			$gprice = $g['marketprice'] * $g['total'];
			if (empty($g['isnodiscount']) && !empty($level['id'])) {
				$price = $level['discount'] / 10 * $gprice;
				$discountprice += ($gprice - $price);
			} else {
				$price = $gprice;
			} 
			$realprice += $price;
			$commission_sum += $g['commission_sum'];
			$goodsprice += $gprice;
			$total += $g['total'];
			$deductprice += $g['deduct'];
			/*$gprice = $g['marketprice'] * $g['total'];
			if (empty($g['isnodiscount']) && !empty($level['id'])) {
				$discount =$level['discount'] / 10 * $gprice;
				$discountprice += ($discount);
				$price=$gprice-	$discount;		
			} else {
				$price = $gprice;
			} 
			$realprice += $price;
			$goodsprice += $gprice;
			$total += $g['total'];
			$deductprice += $g['deduct'];*/
		}
		if ($saleset) {
			if (!empty($saleset['enoughfree'])) {
				if (floatval($saleset['enoughorder']) <= 0) {
					foreach($dispatch_list as &$d) {
						$d['price'] = 0;
					} 
					if (!empty($dispatch)) {
						$dispatch['price'] = 0;
					} 
				} else {
					if ($realprice >= floatval($saleset['enoughorder'])) {
						foreach ($dispatch_list as &$d) {
							if ($d['price'] > 0) {
								if (empty($saleset['enoughareas'])) {
									$d['price'] = 0;
									if (!empty($dispatch)) {
										$dispatch['price'] = 0;
									} 
								} else {
									$areas = explode(",", $saleset['enoughareas']);
									if (!empty($address)) {
										if (!in_array($address['city'], $areas)) {
											$d['price'] = 0;
											if ($dispatch['id'] == $d['id']) {
												$dispatch['price'] = 0;
											} 
										} 
									} else if (empty($member['city'])) {
										$d['price'] = 0;
										if ($dispatch['id'] == $d['id']) {
											$dispatch['price'] = 0;
										} 
									} else if (!empty($member['city'])) {
										if (!in_array($member['city'], $areas)) {
											$d['price'] = 0;
											if ($dispatch['id'] == $d['id']) {
												$dispatch['price'] = 0;
											} 
										} 
									} 
								} 
							} 
						} 
						unset($d);
					} 
				} 
			} 
			if ($realprice >= floatval($saleset['enoughmoney']) && floatval($saleset['enoughdeduct']) > 0) {
				$saleset['showenough'] = true;
				$realprice -= floatval($saleset['enoughdeduct']);
			} 
		} 
		if (!empty($dispatch)) {
			$realprice += $dispatch['price'];
		} 
		$deductcredit = 0;
		$deductmoney = 0;
		$deductcredit2 = 0;
		if ($sale_plugin) {
			$credit = m('member') -> getCredit($openid, 'credit1');
			if (!empty($saleset['creditdeduct'])) {
				$pcredit = intval($saleset['credit']);
				$pmoney = round(floatval($saleset['money']), 2);
				if ($pcredit > 0 && $pmoney > 0) {
					if ($credit % $pcredit == 0) {
						$deductmoney = round(intval($credit / $pcredit) * $pmoney, 2);
					} else {
						$deductmoney = round((intval($credit / $pcredit) + 1) * $pmoney, 2);
					} 
				} 
				if ($deductmoney > $deductprice) {
					$deductmoney = $deductprice;
				} 
				if ($deductmoney > $realprice) {
					$deductmoney = $realprice;
				} 
				$deductcredit = $deductmoney / $pmoney * $pcredit;
			} 
			if (!empty($saleset['moneydeduct'])) {
				$deductcredit2 = m('member') -> getCredit($openid, 'credit2');
				if ($deductcredit2 > $realprice) {
					$deductcredit2 = $realprice;
				} 
			} 
		} 
		show_json(1, array('member' => $member,'sendNum'=>$sendNum, 'deductcredit' => $deductcredit, 'deductmoney' => $deductmoney, 'deductcredit2' => $deductcredit2, 'saleset' => $saleset, 'goods' => $goods, 'weight' => $weight, 'set' => m('common') -> getSysset('shop'), 'fromcart' => $fromcart, 'haslevel' => !empty($level['id']), 'total' => $total, 'dispatchprice' => !empty($dispatch)? number_format($dispatch['price'], 2): 0, 'totalprice' => number_format($totalprice, 2), 'goodsprice' => number_format($goodsprice, 2), 'discountprice' => number_format($discountprice, 2), 'discount' => $level['discount'], 'realprice' => number_format($realprice, 2), 'address' => $address, 'carrier' => $carrier, 'carrier_list' => $carrier_list, 'dispatch' => $dispatch, 'dispatch_list' => $dispatch_list, 'isverify' => $isverify, 'stores' => $stores));
	} else if ($operation == 'getdispatchprice') {
		$totalprice = floatval($_GPC['totalprice']);
		$addressid = intval($_GPC['addressid']);
		$dispatchid = intval($_GPC['dispatchid']);
		$weight = $_GPC['weight'];
		if (empty($weight)) {
			show_json(1, array('price' => 0));
		} 
		$address = pdo_fetch('select id,realname,mobile,address,province,city,area from ' . tablename('ewei_shop_member_address') . ' where  id=:id and openid=:openid and uniacid=:uniacid limit 1' , array(':uniacid' => $uniacid, ':openid' => $openid, ':id' => $addressid));
		$sale_plugin = p('sale');
		$saleset = false;
		if ($sale_plugin) {
			$saleset = $sale_plugin -> getSet();
			if ($saleset) {
				if (!empty($saleset['enoughfree'])) {
					if (floatval($saleset['enoughorder']) <= 0) {
						show_json(1, array('price' => 0));
					} 
				} 
				if (!empty($saleset['enoughfree']) && $totalprice >= floatval($saleset['enoughorder'])) {
					if (!empty($saleset['enoughareas'])) {
						$areas = explode(";", $saleset['enoughareas']);
						if (!in_array($address['city'], $areas)) {
							show_json(1, array('price' => 0));
						} 
					} else {
						show_json(1, array('price' => 0));
					} 
				} 
			} 
		} 
		$dispatch = pdo_fetch("select id,dispatchname,dispatchtype,firstprice,firstweight,secondprice,secondweight,areas,carriers from " . tablename("ewei_shop_dispatch") . " " . " WHERE id=:id and uniacid =:uniacid limit 1" , array(':uniacid' => $uniacid, ':id' => $dispatchid));
		$areas = unserialize($dispatch['areas']);
		$setprice = false;
		if (is_array($areas) && count($areas) > 0) {
			foreach ($areas as $area) {
				$citys = explode(";", $area['citys']);
				if (in_array($address['city'], $citys)) {
					$price = m('order') -> getDispatchPrice($weight, $area);
					$setprice = true;
					break;
				} 
			} 
		} 
		if (!$setprice) {
			$price = m('order') -> getDispatchPrice($weight, $dispatch);
		} 
		show_json(1, array('price' => $price));
	} else if ($operation == 'create' && $_W['ispost']) {
		//TODO kim 2016_09_16 
		//1,根据optionid找到对应的规格产品的数量，然后扣减  
		//2,TOTAL修改了 库存由total改为sale_quotas
		//3,确认用于佣金计算的金额，销售价-成本 * 佣金利润比例 
		
		//TODO 判断是否客服为他人下单
		$addressid = intval($_GPC['addressid']);
		$csOpenid='';
		if(!empty($_GPC['customPhone'])){
			//TODO 是则修改下单的OPENID 跟收货地址id
			$custome=pdo_get('ewei_shop_member',array("mobile"=>$_GPC['customPhone'],"uniacid"=>$_W['uniacid']),array("openid"));
			if(empty($custome)){
				show_json(-2, '请确认客户的电话是否正确');
				exit;
			}
			$csOpenid=$openid;
			$openid=$custome['openid'];
		}
		$member = m('member') -> getMember($openid);
		$dispatchtype = intval($_GPC['dispatchtype']);		
		if (!empty($addressid) && $dispatchtype == 0) {
			$address = pdo_fetch('select id,realname,mobile,address,province,city,area from ' . tablename('ewei_shop_member_address') 
				. ' where id=:id and openid=:openid and uniacid=:uniacid   limit 1' ,
				 array(':uniacid' => $uniacid, ':openid' => !empty($csOpenid)? $csOpenid : $openid, ':id' => $addressid));
			if (empty($address)) {
				show_json(0, '未找到地址');
			} 
		}
		$dispatchid = intval($_GPC['dispatchid']);
		$dispatch = pdo_fetch("select id,dispatchname,dispatchtype,firstprice,firstweight,secondprice,secondweight,areas,carriers from " . tablename("ewei_shop_dispatch") . " " . " WHERE id=:id and uniacid =:uniacid limit 1" , array(':uniacid' => $uniacid, ':id' => $dispatchid));
		if (empty($dispatch) && $dispatchtype == 0) {
		} 
		$goods = $_GPC['goods'];
		if (empty($goods)) {
			show_json(0, '未找到任何商品');
		} 
		$allgoods = array();
		$totalprice = 0;
		$goodsprice = 0;
		$weight = 0;
		$discountprice = 0;
		$goodsarr = explode('|', $goods);
		$cash = 1;
		$level = m('member') -> getLevel($openid);
		$deductprice = 0;
		$sale_plugin = p('sale');
		$saleset = false;
		$commission_sum_all=0; //TODO 
		if ($sale_plugin) {
			$saleset = $sale_plugin -> getSet();
		} 
		$isverify = false;
		foreach ($goodsarr as $g) {
			if (empty($g)) {
				continue;
			} 
			$goodsinfo = explode(',', $g);
			$goodsid = !empty($goodsinfo[0])? intval($goodsinfo[0]): '';
			$optionid = !empty($goodsinfo[1])? intval($goodsinfo[1]): 0;
			$goodstotal = !empty($goodsinfo[2])? intval($goodsinfo[2]): '1';
			if (empty($goodsid)) {
				show_json(0, '参数错误，请刷新重试');
			} 
			$sql = 'SELECT id as goodsid,title,commission_sum,sale_quotas, weight,total,issendfree,isnodiscount, thumb,marketprice,cash,isverify,goodssn,productsn,istime,timestart,timeend,usermaxbuy,maxbuy,unit,buylevels,buygroups,deleted,status,deduct FROM ' . tablename('ewei_shop_goods') . ' where id=:id and uniacid=:uniacid  limit 1';
			$data = pdo_fetch($sql, array(':uniacid' => $uniacid, ':id' => $goodsid));
			if (empty($data['status']) || !empty($data['deleted'])) {
				show_json(-1, $data['title'] . '<br/> 已下架!');
			} 
			$data['total'] = $goodstotal;
			if ($data['cash'] != 2) {
				$cash = 0;
			} 
			$unit = empty($data['unit'])? '件' : $data['unit'];
			if ($data['maxbuy'] > 0) {
				if ($goodstotal > $data['maxbuy']) {
					show_json(-1, $data['title'] . '<br/> 一次限购 ' . $data['maxbuy'] . $unit . "!");
				} 
			} 
			if ($data['usermaxbuy'] > 0) {
				$order_goodscount = pdo_fetchcolumn('select ifnull(sum(og.total),0)  from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_order') . ' o on og.orderid=o.id ' . ' where og.goodsid=:goodsid and  o.status>=1 and o.openid=:openid  and og.uniacid=:uniacid ', array(':goodsid' => $data['goodsid'], ':uniacid' => $uniacid, ':openid' => $openid));
				if ($order_goodscount >= $data['usermaxbuy']) {
					show_json(-1, $data['title'] . '<br/> 最多限购 ' . $data['usermaxbuy'] . $unit . "!");
				} 
			} 
			if ($data['istime'] == 1) {
				if (time() < $data['timestart']) {
					show_json(-1, $data['title'] . '<br/> 限购时间未到!');
				} 
				if (time() > $data['timeend']) {
					show_json(-1, $data['title'] . '<br/> 限购时间已过!');
				} 
			} 
			$levelid = $member['level'];
			$groupid = $member['groupid'];
			if ($data['buylevels'] != '') {
				$buylevels = explode(',', $data['buylevels']);
				if (!in_array($levelid, $buylevels)) {
					show_json(-1, '您的会员等级无法购买<br/>' . $data['title'] . '!');
				} 
			} 
			if ($data['buygroups'] != '') {
				$buygroups = explode(',', $goods['buygroups']);
				if (!in_array($groupid, $buygroups)) {
					show_json(-1, '您所在会员组无法购买<br/>' . $data['title'] . '!');
				} 
			}
			if (!empty($optionid)) {
				$option = pdo_fetch('select id,title,productnum,marketprice,costprice,goodssn,productsn,stock from ' . tablename('ewei_shop_goods_option') . ' where id=:id and goodsid=:goodsid and uniacid=:uniacid  limit 1', array(':uniacid' => $uniacid, ':goodsid' => $goodsid, ':id' => $optionid));
				if (!empty($option)) {
					/*if ($option['stock'] != -1) {
						if (empty($option['stock'])) {
							show_json(-1, $data['title'] . "<br/>" . $option['title'] . " 库存不足!");
						} 
					}*/ 
					$data['optionid'] = $optionid;
					$data['optiontitle'] = $option['title'];
					$data['marketprice'] = $option['marketprice'];
					if (!empty($option['goodssn'])) {
						$data['goodssn'] = $option['goodssn'];
					} 
					if (!empty($option['productsn'])) {
						$data['productsn'] = $option['productsn'];
					}
					//TODO 计算佣金金额
					$data['commission_sum'] =(($option['marketprice']-$option['costprice'])*$data['commission_sum']/100);
					//$data['productnum']=$option['productnum'];
				} 
			} /*else {*/
				// TODO 判断库存是否充足
				if ($data['sale_quotas'] <= 0) {
					//if (empty($data['sale_quotas'])) {
						show_json(-1, $data['title'] . "<br/>库存不足!");
					//} 
				} 
			/*} */
			$gprice = $data['marketprice'] * $goodstotal;
			$goodsprice += $gprice;
			$commission_sum_all +=($data['commission_sum']*$goodstotal);
			if (empty($data['isnodiscount']) && !empty($level['id'])) {
				$dprice = $gprice * $level['discount'] / 10;
				$discountprice += ($gprice - $dprice);
				$totalprice += $dprice;
				/*$dprice = $gprice * $level['discount'] / 10;
				$discountprice += ($dprice);
				$totalprice +=($gprice -  $dprice);*/
			} else {
				$totalprice += $gprice;
			} 
			if (empty($data['issendfree'])) {
				$weight += $data['weight'] * $goodstotal;
			} 
			if ($data['isverify'] == 2) {
				$isverify = true;
			}
			$deductprice += $data['deduct'];
			$allgoods[] = $data;
		} 
		if (empty($allgoods)) {
			show_json(0, '未找到任何商品');
		} 
		$deductenough = 0;
		if ($saleset && $totalprice >= floatval($saleset['enoughmoney']) && floatval($saleset['enoughdeduct']) > 0) {
			$deductenough = floatval($saleset['enoughdeduct']);
			if ($deductenough > $totalprice) {
				$deductenough = $totalprice;
			} 
		} 
		$dispatchprice = 0;
		//TODO 分批发货的次数
		$sendNum=intval($_GPC['sendNum']);
		if ($weight > 0) {
			$zeroprice = false;
			if ($saleset) {
				if (!empty($saleset['enoughfree']) && floatval($saleset['enoughorder']) <= 0) {
					$zeroprice = true;
				} else {
					if (!empty($saleset['enoughfree']) && $totalprice >= floatval($saleset['enoughorder'])) {
						if (!empty($saleset['enoughareas'])) {
							$areas = explode(";", $saleset['enoughareas']);
							if (!in_array($address['city'], $areas)) {
								$zeroprice = true;
							} 
						} else {
							$zeroprice = true;
						} 
					} 
				} 
			} 
			if (!$zeroprice) {
				if (empty($dispatchtype)) {
					$areas = unserialize($dispatch['areas']);
					$setprice = false;
					if (is_array($areas) && count($areas) > 0) {
						foreach ($areas as $area) {
							$citys = explode(";", $area['citys']);
							if (in_array($address['city'], $citys)) {
								$dispatchprice = m('order') -> getDispatchPrice($weight, $area);
								$setprice = true;
								break;
							} 
						} 
					} 
					if (!$setprice) {
						$dispatchprice = m('order') -> getDispatchPrice($weight, $dispatch);
					} 
				} 
			} 
		} 
		//TODO 修改了发货金额，后期还需修改
		$dispatchprice=($sendNum*$dispatchprice);
		$totalprice -= $deductenough;
		$totalprice += $dispatchprice;
		$deductcredit = 0;
		$deductmoney = 0;
		$deductcredit2 = 0;
		if ($sale_plugin) {
			if (!empty($_GPC['deduct'])) {
				$credit = m('member') -> getCredit($openid, 'credit1');
				$saleset = $sale_plugin -> getSet();
				if (!empty($saleset['creditdeduct'])) {
					$pcredit = intval($saleset['credit']);
					$pmoney = round(floatval($saleset['money']), 2);
					if ($pcredit > 0 && $pmoney > 0) {
						if ($credit % $pcredit == 0) {
							$deductmoney = round(intval($credit / $pcredit) * $pmoney, 2);
						} else {
							$deductmoney = round((intval($credit / $pcredit) + 1) * $pmoney, 2);
						} 
					} 
					if ($deductmoney > $deductprice) {
						$deductmoney = $deductprice;
					} 
					if ($deductmoney > $totalprice) {
						$deductmoney = $totalprice;
					} 
					$deductcredit = $deductmoney / $pmoney * $pcredit;
				} 
			} 
			$totalprice -= $deductmoney;
			if (!empty($_GPC['deduct2'])) {
				$deductcredit2 = m('member') -> getCredit($openid, 'credit2');
				if ($deductcredit2 > $totalprice) {
					$deductcredit2 = $totalprice;
				} 
			} 
			$totalprice -= $deductcredit2;
		} 
		$ordersn = m('common') -> createNO('order', 'ordersn', 'SH');
		$verifycode = "";
		if ($isverify) {
			$verifycode = random(8, true);
			while (1) {
				$count = pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_order') . ' where verifycode=:verifycode and uniacid=:uniacid limit 1', array(':verifycode' => $verifycode, ':uniacid' => $_W['uniacid']));
				if ($count <= 0) {
					break;
				} 
				$verifycode = random(8, true);
			} 
		}
		$order = array('uniacid' => $uniacid,'csopenid'=>$csOpenid,'sendNum'=>$sendNum, 'delivertype' =>intval($_GPC['deliverType']), 'openid' => $openid, 'ordersn' => $ordersn,'commission_sum'=>$commission_sum_all, 'price' => $totalprice, 'cash' => $cash, 'discountprice' => $discountprice, 'deductprice' => $deductmoney, 'deductcredit' => $deductcredit, 'deductcredit2' => $deductcredit2, 'deductenough' => $deductenough, 'status' => 0, 'paytype' => 0, 'transid' => '', 'remark' => $_GPC['remark'], 'addressid' => empty($dispatchtype)? $addressid : 0, 'goodsprice' => $goodsprice, 'dispatchprice' => $dispatchprice, 'dispatchtype' => $dispatchtype, 'dispatchid' => $dispatchid, 'carrier' => is_array($_GPC['carrier'])? iserializer($_GPC['carrier']): iserializer(array()), 'createtime' => time(), 'isverify' => $isverify ? 1 : 0, 'verifycode' => $verifycode);
		$ordergoods = pdo_insert('ewei_shop_order', $order);
	   
		$orderid = pdo_insertid();
		if ($_GPC['fromcart'] == 1) {
			$cartids = $_GPC['cartids'];
			if (!empty($cartids)) {
				pdo_query('update ' . tablename('ewei_shop_member_cart') . ' set deleted=1 where id in (' . $cartids . ') and openid=:openid and uniacid=:uniacid ', array(':uniacid' => $uniacid, ':openid' => $openid));
			} else {
				pdo_query('update ' . tablename('ewei_shop_member_cart') . ' set deleted=1 where openid=:openid and uniacid=:uniacid ', array(':uniacid' => $uniacid, ':openid' => $openid));
			} 
		} 
		foreach ($allgoods as $goods) {
			//TODO 新增佣金费率
			$order_goods = array('uniacid' => $uniacid, 'orderid' => $orderid,'commission_sum' => $goods['commission_sum']* $goods['total'], 'goodsid' => $goods['goodsid'], 'price' => $goods['marketprice'] * $goods['total'], 'total' => $goods['total'], 'optionid' => $goods['optionid'], 'createtime' => time(), 'optionname' => $goods['optiontitle'], 'goodssn' => $goods['goodssn'], 'productsn' => $goods['productsn']);
			if (empty($goods['isnodiscount']) && !empty($level['id'])) {
				$order_goods['realprice'] = $order_goods['price'] * $level['discount'] / 10;
			} else {
				$order_goods['realprice'] = $order_goods['price'];
			} 
		 pdo_insert('ewei_shop_order_goods', $order_goods);
		} 
		if ($deductcredit > 0) {
			$shop = m('common') -> getSysset('shop');
			m('member') -> setCredit($openid, 'credit1', - $deductcredit, array('0', $shop['name'] . "购物积分抵扣 消费积分: {$deductcredit} 抵扣金额: {$deductmoney} 订单号: {$ordersn}"));
		}
		//TODO 更新库存 
		m('order') -> setStocksAndCredits($orderid, 0);
		m('notice') -> sendOrderMessage($orderid);
		if (p('commission')) {
			p('commission') -> calculate($orderid);
			p('commission') -> checkOrderConfirm($orderid);
		} 
		show_json(1, array('orderid' => $orderid));
	} 
} 

include $this -> template('order/confirm');

