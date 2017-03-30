<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
} 
class Ewei_DShop_Order {
	 
	function getDispatchPrice($weight, $d) {
		if (empty($d)) {
			return 0 ;
		} 
		
        //$premium = $d['firstprice'] - $d['secondprice'];	
        //var_dump($this->expressprice);die;         
		$price = 0;
		if ($weight <= $d['firstweight']) {
			$price = intval($d['firstprice']);
		} else {
			
			$price = intval($d['firstprice']);
			$secondweight = $weight - intval($d['firstweight']);
			$dsecondweight = intval($d['secondweight']) <= 0?1:intval($d['secondweight']);
			$secondprice = 0;
			if ($secondweight % $dsecondweight == 0) {
				$secondprice = ($secondweight / $dsecondweight) * intval($d['secondprice']);
			} else {
				$secondprice = ((int) ($secondweight / $dsecondweight) + 1) * intval($d['secondprice']);
			} 
			$price += $secondprice;
		} 
		return $price;		
	} 



   function getDispatchPrices($weight, $d) {
		if (empty($d)) {
			return 0 ;
		} 
		
        $premium = $d['firstprice'] - $d['secondprice'];	
        //var_dump($premium);die;         
		return $premium;		
	} 










	public function payResult($params) {
		global $_W;
		$fee = intval($params['fee']);
		$data = array('status' => $params['result'] == 'success' ? 1 : 0);
		$ordersn = $params['tid'];
		$order = pdo_fetch('select id,ordersn, price,openid,dispatchtype,addressid,carrier,status,isverify,deductcredit2 from ' . tablename('ewei_shop_order') . ' where  ordersn=:ordersn and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':ordersn' => $ordersn));
		$orderid = $order['id'];
		if ($params['from'] == 'return') {
			$address = false;
			if (empty($order['dispatchtype'])) {
				$address = pdo_fetch('select realname,mobile,address from ' . tablename('ewei_shop_member_address') . ' where id=:id limit 1', array(':id' => $order['addressid']));
			} 
			$carrier = false;
			if ($order['dispatchtype'] == 1) {
				$carrier = unserialize($order['carrier']);
			} 
			if ($params['type'] == 'cash') {
				show_json(2, array('order' => $order, 'address' => $address, 'carrier' => $carrier));
			} else {
				if ($order['status'] == 0) {
					pdo_update('ewei_shop_order', array('status' => 1, 'paytime' => time()), array('id' => $orderid));
					if ($order['deductcredit2'] > 0) {
						$shopset = m('common') -> getSysset('shop');
						m('member') -> setCredit($order['openid'], 'credit2', - $order['deductcredit2'], array(0, $shopset['name'] . "余额抵扣: {$order['deductcredit2']} 订单号: " . $order['ordersn']));
					} 
					$this -> setStocksAndCredits($orderid, 1);
					$url = "./index.php?i={$_W['uniacid']}&c=entry&m=ewei_shop&do=order&t=detail&id={$orderid}";
					m('notice') -> sendOrderMessage($orderid);
					if (p('commission')) {
						p('commission') -> checkOrderPay($order['id']);
					} 
				} 
				show_json(1, array('order' => $order, 'address' => $address, 'carrier' => $carrier));
			} 
		} 
	} 
	//TODO 修改了佣金计算方式
	function setStocksAndCredits($orderid = '', $type = 0) {
		global $_W;
		$order = pdo_fetch('select id,price,commission_sum,openid,dispatchtype,addressid,carrier,status from ' . tablename('ewei_shop_order') . ' where id=:id limit 1', array(':id' => $orderid));
		$goods = pdo_fetchall("select og.goodsid,og.total,g.totalcnf,g.credit,og.optionid,g.total as goodstotal,g.sale_quotas,og.optionid,g.sales,g.salesreal from " . tablename('ewei_shop_order_goods') . " og " . " left join " . tablename('ewei_shop_goods') . " g on g.id=og.goodsid " . " where og.orderid=:orderid and og.uniacid=:uniacid ", array(':uniacid' => $_W['uniacid'], ':orderid' => $orderid));
		
		$credits = 0;
		foreach ($goods as $g) {
			$stocktype = 0;
			if ($type == 0) {
				if ($g['totalcnf'] == 0) {
					$stocktype = -1;
				} 
			} else if ($type == 1) {
				if ($g['totalcnf'] == 1) {
					$stocktype = -1;
				} 
			} else if ($type == 2) {
				if ($order['status'] >= 1) {
					if ($g['totalcnf'] == 1) {
						$stocktype = 1;
					} 
				} else {
					if ($g['totalcnf'] == 0) {
						$stocktype = 1;
					} 
				} 
			}
			if (!empty($stocktype)) {
				//TODO 不需要 现在库存跟这个不挂钩
				if (!empty($g['optionid'])) {
					$option = m('goods') -> getOption($g['goodsid'], $g['optionid']);
					/*if (!empty($option) && $option['stock'] != -1) {
						$stock = -1;
						if ($stocktype == 1) {
							$stock = $option['stock'] + $g['total'];
						} else if ($stocktype == -1) {
							$stock = $option['stock'] - $g['total'];
							$stock <= 0 && $stock = 0;
						} 
						if ($stock != -1) {
							pdo_update('ewei_shop_goods_option', array('stock' => $stock), array('uniacid' => $_W['uniacid'], 'goodsid' => $g['goodsid'], 'id' => $g['optionid']));
						} 
					}*/
					if(!empty($option)){
						$g['total']=$option['productnum'];
					} 
				}
				
				//TODO kim 2016_9_16 可销售库存从total变为 sales_quotas,total是实际库存数 =>出库的时候才扣减
				if (!empty($g['goodstotal']) && $g['goodstotal'] != -1) {
					$totalstock = -1;
					if ($stocktype == 1) {
						$totalstock = $g['goodstotal'] + $g['total'];
					} else if ($stocktype == -1) {
						//$totalstock = $g['goodstotal'] - $g['total'];					
						$totalstock=$g['sale_quotas']-$g['total'];
						$totalstock <= 0 && $totalstock = 0;
					}
					if ($totalstock != -1) {
						//pdo_update('ewei_shop_goods', array('total' => $totalstock), array('uniacid' => $_W['uniacid'], 'id' => $g['goodsid']));
						//更新实际销售库存 
						pdo_update('ewei_shop_goods', array('sale_quotas' => $totalstock), array('uniacid' => $_W['uniacid'], 'id' => $g['goodsid']));
					} 
				} 
			} 
			$credits += $g['credit'] * $g['total'];
			if ($type == 0) {
				pdo_update('ewei_shop_goods', array('sales' => $g['sales'] + $g['total']), array('uniacid' => $_W['uniacid'], 'id' => $g['goodsid']));
			} elseif ($type == 1) {
				if ($order['status'] >= 1) {
					pdo_update('ewei_shop_goods', array('salesreal' => $g['salesreal'] + $g['total']), array('uniacid' => $_W['uniacid'], 'id' => $g['goodsid']));
				} 
			} 
		} 
		$shopset = m('common') -> getSysset('shop');
		if ($type == 1) {
			m('member') -> setCredit($order['openid'], 'credit1', $credits, array(0, $shopset['name'] . '购物积分 订单号: ' . $order['ordersn']));
		} elseif ($type == 2) {
			if ($order['status'] >= 1) {
				m('member') -> setCredit($order['openid'], 'credit1', - $credits, array(0, $shopset['name'] . '购物取消订单扣除积分 订单号: ' . $order['ordersn']));
			} 
		} 
	} 
} 
