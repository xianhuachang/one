<?php
	$server="localhost";
	$username="wxgdlrj";
	$password="wxgdlrj";
	$uniacid=8;
    $con=mysql_connect($server,$username,$password) or die("<h1>数据库链接失败</h1>");
    mysql_select_db("wxgdlrj",$con);
    mysql_query("set names utf8",$con);
	$sql="select quotas,id from ims_ewei_shop_goods where uniacid={$uniacid}";
	$result=mysql_query($sql,$con);
	if($result){
		while($row=mysql_fetch_assoc($result)){
			$quotas=$row['quotas'];
			$goods_id=$row['id'];
			//查找 option_id
			$sql="SELECT COUNT(o.id) as deduction FROM ims_ewei_shop_order_goods as o LEFT JOIN ims_ewei_shop_goods_option as go on o.optionid=go.id WHERE o.goodsid={$goods_id} 
			 and go.productnum>1 and (o.createtime + go.productnum*3600*24) >=".time();
			 $result2=mysql_query($sql,$con);
			 $deduction=0;
			 if($result2){
			 	while($row=mysql_fetch_assoc($result2)){
			 		$deduction+=$row['deduction'];
			 	}
			 }
			 $quotas-=$deduction;
			 //更新库存
			 $sql="UPDATE ims_ewei_shop_goods SET sale_quotas={$quotas} WHERE id={$goods_id}";
			 mysql_query($sql,$con);
			 //写LOG
		}
	}
	
?>