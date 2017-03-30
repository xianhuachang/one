<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>自检报告</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<link href="./resource/css/bootstrap.min.css" rel="stylesheet">
		<script src="../addons/lrj_guide/recouse/js/jquery-3.1.0.min.js"></script>
		<link href="../addons/lrj_guide/recouse/css/selfinspectionresult.min.css" rel="stylesheet">
		<script src="./resource/js/lib/bootstrap.min.js"></script>
		<script src="https://qiyukf.com/script/949319e231213aff0052a508fb9b3443.js" defer async></script>
	</head>
	<body>
		<div class="header">
			<h3>自检结果</h3>
		</div>
		<div class="gender-div">
			<h3>您的性别:<?php echo $_SESSION['gender']==1 ?'男':'女';?></h3>
		</div>
		<div class="content">
			<?php  if(is_array($parts)) { foreach($parts as $item) { ?>
			<section style="text-align: center;padding: 5px;">
				<span class="part_name"><?php  if($_SESSION['gender']==1 && $item['name']=="胸部") { ?>
								心肺
							<?php  } else { ?>
								<?php  echo $item['name'];?>
							<?php  } ?></span>
				<?php  if(is_array($item['questions'])) { foreach($item['questions'] as $q_item) { ?>
				<p class="top"><?php  echo $q_item['name'];?></p>
				<p class="topP"><?php  echo $q_item['solution'];?><?php /*$resultArr=explode(';',$q_item['solution']); echo empty($q_item['detail']) ?$resultArr[1] : $resultArr[0];*/ ?></p>
				<?php  } } ?>
			</section>
			 <?php  } } ?>
			 <hr />
			 <div class="product-recommend">
			 <a href="http://mp.weixin.qq.com/s/h59xr4ELWYS1IG3ZhE8GRQ"><div class="clickviewss">推荐产品说明</div></a>
			 	<h3 style="color: black;">为您推荐:</h3>
			 	<h4 style="text-indent: 2em;">您可选择由上而下做顺应调理</h4>
			 	<?php  if(is_array($products)) { foreach($products as $item) { ?>
			 	<section class="product-item" data-productid="<?php  echo $item['id'];?>">
			 		<a href="<?php  echo url('entry//shop',array('p'=>'detail','id'=>$item['id'],'my'=>'','m'=>'ewei_shop'));?>">
			 			<div class="clickviewdiv" style="background-image: url(<?php  echo $_W['attachurl'];?><?php  echo $item['thumb'];?>);">
			 				<div class="clickview">点击查看</div>
			 			</div>
			 			<!--<img class="product-img" src="<?php  echo $_W['attachurl'];?><?php  echo $item['thumb'];?>" />-->
			 		</a>		 		
			 		<p class="p-title"><?php  echo $item['title'];?></p>
			 		<!--<p>￥<?php  echo $item['marketprice'];?></p>
			 		<div data-itemid="<?php  echo $item['id'];?>" class="addtocart">加入购物车<span class="glyphicon glyphicon-shopping-cart red" aria-hidden="true"></span></div>-->
                    <a href="<?php  echo url('entry//shop',array('p'=>'detail','id'=>$item['id'],'my'=>'','m'=>'ewei_shop'));?>">

					<div class="clickviews">选择购买</div>
                    </a>
			 		<div class="clearfix"></div>
			 	</section>
			 	<?php  } } ?>
			 </div>
		</div>
		<div class="footer">
			<ul>
				<!--<a href="http://chat.v5kf.com/desk/kehu.html?site=131938&human=0&group_id=100397"></a>-->
				<li style="background-color: #F5721A;"><span>咨询</span></li>
				<!--<li style="background-color: #FECE00;"><a href="<?php  echo url('entry//shop',array('p'=>'cart','m'=>'ewei_shop'));?>"><span>购买<span class="badge">0</span></span></a></li>-->
			</ul>			
		</div>
		
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <span id="addToCartResult">数据提交中，请稍候</span>
		      </div>
		    </div>
		  </div>
		</div>		
	</body>
	<style>
		/*#YSF-BTN-HOLDER{
			    position: absolute;
    height: 50px;
    width: 180px;
    left: 0px;
    opacity: 0;
		}
		#YSF-CUSTOM-ENTRY-1{bottom: 0px;width: 180px;}
		#YSF-CUSTOM-ENTRY-1 img{height: 50px;width: 180px;}*/


        #YSF-BTN-HOLDER{position: fixed;height: 45px;width: 300px;left: 10%;opacity: 0;}
		#YSF-CUSTOM-ENTRY-1{bottom: 0px;width: 300px;}
		#YSF-CUSTOM-ENTRY-1 img{height: 45px;width: 100%;}


	</style>
	<script>
		$(function(){
			$(".addtocart").click(function(){
				id=$(this).data("itemid");
				post_url="<?php  echo url('entry//shop',array('p'=>'cart','m'=>'ewei_shop'),false);?>";
			   $('#myModal').modal({
					  'keyboard': false,
					  'backdrop':'static',
					  'show':true
					});
				$.post(post_url,
				{"op":"add","id":id,"optionid":"id","total":1},
				function(data){
					if(data.status==1){
						$('#addToCartResult').text(data.result.message);
						$('.badge').text(data.result.cartcount).css("display","inline-block");
						setTimeout(function(){
							$('#myModal').modal('hide');
						},1000);
					}else{
						$('#addToCartResult').text(data.result);
						setTimeout(function(){
							$('#myModal').modal('hide');
						},1000);
					}
				},
				"json"
				)
			});
			
			$("#YSF-BTN-HOLDER").css({"width":"180px"});
		})
	</script>
</html>