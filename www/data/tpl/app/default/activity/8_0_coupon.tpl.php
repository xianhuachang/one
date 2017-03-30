<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	ul,li {padding:0; margin:0; border:0;}
	body{background:#d2e6e9; padding-bottom:63px;}
	.btn-group-top-box{padding:10px 0; border-bottom:1px solid #a5d7de; font-family:Helvetica, Arial, sans-serif; text-align:center; width:100%;}
	.btn-group-top{overflow:hidden;}
	.btn-group-top .btn{ -webkit-box-shadow:none; box-shadow:none; border-color:#5ac5d4; color:#5ac5d4; background:#d1e5e9; padding:6px;}
	.btn-group-top .btn:hover{color:#FFF; background:#addbe1;}
	.btn-group-top .btn.active{color:#FFF; background:#5ac5d4;}
	.btn.use{background:#56c6d6; color:#FFF; border:0; border-radius:4px;}
	
	/*折扣券*/
	.coupon-main{overflow:hidden;}
	.coupon-main .list-coupon{width:270px; margin:10px auto; overflow:hidden; padding:0px; background:transparent;}
	.coupon-main .list-coupon li{background:#FFF; margin-bottom:15px; overflow:hidden;}
	.coupon-main .list-coupon li .list-coupon-hd{padding:0 10px 0 15px; height:35px; line-height:35px; overflow:hidden;}
	.coupon-main .list-coupon li .list-coupon-hd .pull-left,.coupon-main .list-coupon li .list-coupon-hd .pull-right{font-size:14px;}
	.coupon-main .list-coupon li .list-coupon-content{width:96%; height:95px; margin:0 2% 5px 2%; overflow:hidden; background:#5ac5d4; position:relative;}
	.coupon-main .list-coupon li .list-coupon-content a{text-decoration:none; font-size:14px; color:#FFF; display:block; width:100%;}
	.coupon-main .list-coupon li .list-coupon-content img{width:70%; margin:0 auto; height:95px;}
	.coupon-main .list-coupon li .list-coupon-content span{display:inline-block; text-align:center; line-height:95px; float:right; width:28%;}
	.coupon-main .list-coupon li .list-coupon-content i{position:absolute; right:30%; top:45%; font-size:18px; color:#5ac5d4;}
	.coupon-main .list-coupon li .list-coupon-ft{border-top:1px #DDD dashed; padding:0 15px;}
	.coupon-main .list-coupon li .list-coupon-ft > span{display:block; font-size:14px; font-weight:bold; padding:10px 0;}
	.coupon-main .list-coupon li .list-coupon-ft > div{display:none; padding:10px 0; border-top:1px #DDD solid;}
	.coupon-main .list-coupon li .list-coupon-ft-bg{width:270px; background:url('resource/images/coupon-ft-bg.png') repeat-x center bottom; -webkit-background-size:100% auto; height:4px; position:absolute;}
	.coupon-main .list-coupon li.used .list-coupon-content{background:#BBB;}
	.coupon-main .list-coupon li.used .list-coupon-content i{color:#BBB;}
	
	.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus{background-color:#5ac5d4; border-color:#5ac5d4;}
	.pagination>li>a, .pagination>li>span{color:#5ac5d4; border:1px solid #a5d7de;}
</style>
<?php  if($do == 'display') { ?>
<style media="all" type="text/css">
	.scroll-container .list-group {list-style:none; padding:0; margin:0; width:100%; text-align:left;}
	.scroll-container .list-group .list-group-item{border:none; background:#d2e6e9;}
	.scroll-container .list-group .list-group-item .con{background:#ffffff; width:280px; margin:0 auto;}
	.scroll-container .list-group .list-group-item .list-hd{padding:5px 20px;}
	.scroll-container .list-group .list-group-item .list-hd h5{font-weight:bold; margin-bottom:2px; font-size:16px; color:#444444;}
	.scroll-container .list-group .list-group-item .list-hd p{color:#b8b8b9;}
	.scroll-container .list-group .list-group-item .list-con img{display:block; width:90%; margin:0 auto;}
	.scroll-container .list-group .list-group-item .list-con .derpn{padding:10px 10px 0 10px; border-top:1px dotted rgb(204, 204, 204); margin-top:10px;display:none;}
	.scroll-container .list-group .list-group-item .list-ft{width:290px; background: transparent url('resource/images/ft-bg.png') no-repeat 0 0; background-size: 100% auto; height: 44px; line-height: 48px; overflow: hidden; position:relative; left:-5px; top:5px; padding:0 0 0 15px;}
	.scroll-container .list-group .list-group-item .list-ft b{color: #56c6d6; font-size: 30px; margin-right:5px;}
	.scroll-container .list-group .list-group-item .list-ft .btns{width:105px; text-align:center; font-size:18px; color:#ffffff; line-height:44px;}
	.scroll-container .list-group .list-group-item .list-ft .btns a{color:#ffffff;}
	.scroll-container .load-more{padding:10px;text-align:center;font-size:1em;}
</style>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('activity/nav', TEMPLATE_INCLUDEPATH)) : (include template('activity/nav', TEMPLATE_INCLUDEPATH));?>
<div class="scroll-container">
	<div class="wrapper">
		<ul class="list-group" >
			<?php  if(is_array($lists)) { foreach($lists as $list) { ?>
				<li class="list-group-item">
					<div class="con">
						<div class="list-hd">
							<h5><?php  echo $list['title'];?>(折扣券)</h5>
							<p>有效期至<?php  echo date('Y年m月d日', $list['endtime']);?></p>
						</div>
						<div class="list-con">
							<img src="<?php  echo tomedia($list['thumb'])?>">
							<div class="derpn">
								<?php  echo htmlspecialchars_decode($list['description'])?>
							</div>
						</div>
						<div class="list-ft">
							<div class="pull-left"><?php  echo $creditnames[$list['credittype']];?>:<b><?php  echo $list['credit'];?></b></div>
							<div class="pull-right btns"><a href="javascript:;" data-id="<?php  echo $list['couponid'];?>" class="use-token">立即兑换</a></div>
						</div>
					</div>
				</li>
			<?php  } } ?>
		</ul>
		<div class="btn-group-top-box">
			<div class="btn-group btn-group-top">
				<?php  echo $pager;?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	require(['util'], function(u){
		$('.con').click(function(){
			var description = $(this).find('.derpn').text();
			if (description.indexOf('<') >= 0) {
				$(this).find('.derpn').html(description);
			}
			$(this).find('.derpn').slideToggle(500);
		});

		$('.use-token').click(function(){
			var id = parseInt($(this).data('id'));
			if(!id) {
				return false;
			}
			$.post("<?php  echo url('activity/coupon/post');?>", {'id':id}, function(data) {
				var data = $.parseJSON(data);
				if(data.message.errno < 0) {
					u.message(data.message.message, '', 'error');
				} else {
					u.message(data.message.message, "<?php  echo url('activity/coupon/mine');?>", 'success');
				}
				return false;
			});
		});
	});
</script>
<?php  } else if($do == 'mine') { ?> 
<script>
	$(".list-coupon").delegate("li","click",function(){
		$(this).find(".list-coupon-ft > div").slideToggle();
	});
</script>
<div class="coupon-main">
	<div class="btn-group-top-box">
		<div class="btn-group btn-group-top">
			<a href="<?php  echo url('activity/coupon/mine/', array('type' => ''))?>" class="btn btn-default <?php  if(($_GPC['type'] != 'used')) { ?>active<?php  } ?>">未使用</a>
			<a href="<?php  echo url('activity/coupon/mine/', array('type' => 'used'))?>" class="btn btn-default <?php  if(($_GPC['type'] == 'used')) { ?>active<?php  } ?>">已使用</a>
		</div>
	</div>
	<div class="coupon-box">
		<ul class="list-coupon">
			<?php  if(is_array($data)) { foreach($data as $row) { ?>
				<?php  if($row['endtime'] > TIMESTAMP) { ?>
					<?php  if($row['status'] == 1) { ?>
						<li>
							<div class="list-coupon-hd">
								<span class="pull-left"><?php  echo $row['title'];?>【折扣券】</span>
								<span class="pull-right">剩余<?php  echo $row['cototal'];?>张 </span>
							</div>
							<div class="list-coupon-content">
								<a href="<?php  echo url('activity/coupon/use', array('id' => $row['couponid'], 'recid' => $row['recid'], 'page' => $_GPC['page']))?>">
									<img src="<?php  echo $row['thumb'];?>">
									<span>马上使用</span>
								</a>
								<i class="fa fa-caret-left"></i>
							</div>
							<div class="list-coupon-ft">
								<span>有效期至<?php  echo date('Y年m月d日', $row['endtime'])?></span>
								<div>
									<?php  echo $row['description'];?>
								</div>
							</div>
							<div class="list-coupon-ft-bg"></div>
						</li>
					<?php  } else { ?>
						<li class="used">
							<div class="list-coupon-hd">
								<span class="pull-left"><?php  echo $row['title'];?>【折扣券】</span>
								<span class="pull-right">已使用<?php  echo $row['cototal'];?>张 </span>
							</div>
							<div class="list-coupon-content">
								<!-- <a href="<?php  echo url('activity/coupon/use', array('id' => $row['couponid'], 'page' => $_GPC['page'], 'type' => 'used'))?>"> -->
								<a>
									<img src="<?php  echo $row['thumb'];?>">
									<span>已经使用</span>
								</a>
								<i class="fa fa-caret-left"></i>
							</div>
							<div class="list-coupon-ft">
								<span>有效期至<?php  echo date('Y年m月d日', $row['endtime'])?></span>
								<div>
									<?php  echo $row['description'];?>
								</div>
							</div>
							<div class="list-coupon-ft-bg"></div>
						</li>
					<?php  } ?>
				<?php  } else { ?>
					<li class="used">
						<div class="list-coupon-hd">
							<span class="pull-left"><?php  echo $row['title'];?>【折扣券】</span>
						</div>
						<div class="list-coupon-content">
							<!-- <a href="<?php  echo url('activity/coupon/use', array('id' => $row['couponid'], 'page' => $_GPC['page'], 'type' => 'used'))?>"> -->
							<a href="javascript:;" onclick="alert('该折扣券已过期')">
								<img src="<?php  echo $row['thumb'];?>">
								<span>已过期</span>
							</a>
							<i class="fa fa-caret-left"></i>
						</div>
						<div class="list-coupon-ft">
							<span>有效期至<?php  echo date('Y年m月d日', $row['endtime'])?></span>
							<div>
								<?php  echo $row['description'];?>
							</div>
						</div>
						<div class="list-coupon-ft-bg"></div>
					</li>
				<?php  } ?>
			<?php  } } ?>
		</ul>
		<div class="btn-group-top-box">
			<div class="btn-group btn-group-top">
				<?php  echo $pager;?>
			</div>
		</div>
	</div>
</div>
<?php  } else if($do == 'use') { ?>
<style media="all" type="text/css">
	.read-coupon{padding:10px;}
	.read-coupon .coupon-title{font-size:14px; color:#444; padding:20px 15px 10px; margin:0;}
	.read-coupon .coupon-content{background:url('resource/images/coupon02.png') no-repeat center bottom; -webkit-background-size:100% auto; padding-bottom:2%; min-height:100px;}
	.read-coupon .coupon-content > img{width:85%; max-width:595px; max-height:320px; display:block; margin:0 auto; border:8px solid transparent; border-width:10px 0 0 0; border-image:url('resource/images/coupon-hd-bg.png') 31;}
	.read-coupon .coupon-sn{height:55px; padding:8px 15px; -webkit-box-sizing:border-box; background:#5ac5d4; color:#d0f2f7; line-height:20px; font-size:14px; vertical-align:middle;}
	.read-coupon .coupon-sn p:first-of-type{font-size:14px;}
	.read-coupon .coupon-sn p:first-of-type span{color:#FFF; font-size:18px;}
	.coupon-form{padding:30px 5px 0 5px;}
	.coupon-form .form-group{margin:10px 0;}
	.coupon-form .form-group .btn{border-radius:2px;}
	.coupon-form .form-group:first-child .btn{background:#5ac5d4; border-color:#5ac5d4; color:#FFF;}
</style>
	<div class="read-coupon">
		<h4 class="coupon-title"><?php  echo $data['title'];?></h4>
		<div class="coupon-content">
			<?php  if(!empty($data['thumb'])) { ?>
			<img src="<?php  echo tomedia($data['thumb']);?>">
			<?php  } else { ?>
			<img src="resource/images/coupon.jpg">
			<?php  } ?>
		</div>
  		<div class="coupon-sn">
			<p>序列号：<?php  echo $data['code'];?><span></span><br>请提供序列号给工作人员或在当前页面消费</p>
		</div>
		<div class="coupon-form">
			<form role="form" action="" method="post" class="form-horizontal" >
			<input type="hidden" name="id" value="<?php  echo $id;?>">
				<?php  if(($data['endtime'] > time()) && ($data['status'] == 1)) { ?>
					<div class="form-group">
						<input class="form-control" type="password" name="password" placeholder="请输入您的消费密码（向店员索要）" />
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-default btn-block use" value="确定使用" />
						<input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
					</div>
					<div class="form-group">
						<a href="javascript:;" data-toggle="modal" data-target="#qrcode-modal" class="btn btn-warning btn-block">生成核销二维码</a>
					</div>
				<?php  } else if($data['status'] == 2) { ?>
					<a class="btn btn-default btn-block use">该优惠券已使用</a>
				<?php  } else { ?>
					<a class="btn btn-default btn-block use">该优惠券已过期</a>
				<?php  } ?>
			</form>
			<div class="form-group">
				<?php  if(($_GPC['type'] == 'used')) { ?>
					<a href="<?php  echo url('activity/coupon/mine', array('type' => 'used'));?>" class="btn btn-default btn-block">返回</a>
				<?php  } else { ?>
					<a href="<?php  echo url('activity/coupon/mine');?>" class="btn btn-default btn-block">返回</a>
				<?php  } ?>
			</div>
		</div>
	</div>
<?php  } ?>

<div class="modal fade modal-code" id="qrcode-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="code-img text-center" data-dismiss="modal">
		<div class="qr">
			<img style="-webkit-user-select: none" src="<?php  echo url('activity/token/token_qrcode', array('id' => $id, 'recid' => $recid, 'type' => '1'));?>">
		</div>
		<div class="text-center tip">核销时请交给店员扫一扫。该功能只能在微信中使用</div>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/toolbar', TEMPLATE_INCLUDEPATH)) : (include template('common/toolbar', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
