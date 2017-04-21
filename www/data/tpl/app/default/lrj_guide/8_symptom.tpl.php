<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>具体自检内容</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<META   HTTP-EQUIV="Pragma"   CONTENT="no-cache">    
		<META   HTTP-EQUIV="Cache-Control"   CONTENT="no-cache">    
		<META   HTTP-EQUIV="Expires"   CONTENT="0">    
		<link href="./resource/css/bootstrap.min.css" rel="stylesheet">
		<script src="../addons/lrj_guide/recouse/js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="../addons/lrj_guide/recouse/js/yxMobileSlider.js"></script>
		<script type="text/javascript" src="../addons/lrj_guide/recouse/js/jquery.lazyload.min.js"></script>
		<link href="../addons/lrj_guide/recouse/css/symptom.min.css" rel="stylesheet">
	</head>

	<body>
		<div class="header">
			<ul>
			    <li><a href="http://mp.angelbeautyinc.com/app/index.php?i=8&c=entry&do=shop&m=ewei_shop" target="_blank"><img src="../addons/lrj_guide/recouse/images/2.jpg" alt="网站建设团队"></a></li>
				<li><a href="http://mp.angelbeautyinc.com/app/index.php?i=8&c=entry&do=shop&m=ewei_shop" target="_blank"><img src="../addons/lrj_guide/recouse/images/3.jpg" alt="网页特效集锦"></a></li>
				<li><a href="http://mp.angelbeautyinc.com/app/index.php?i=8&c=entry&do=shop&m=ewei_shop" target="_blank"><img src="../addons/lrj_guide/recouse/images/4.jpg" alt="JS代码素材库"></a></li>
		   </ul>
		</div>
		<div class="content">
			<div class="left-nav">
					<?php  if(is_array($parts)) { foreach($parts as $index => $item) { ?>
					<div class="nav-item <?php  if($item['id']==$pid) { ?>active<?php  } ?>" data-pid="<?php  echo $item['id'];?>">
							<?php  if($t==1 && $item['name']=="胸部") { ?>
								心肺
							<?php  } else { ?>
								<?php  echo $item['name'];?>
							<?php  } ?>
					</div>
					<?php  } } ?>
			</div>
			<form method="post" action="<?php  echo $this->createMobileUrl('selfinspection',array('op'=>'post'))?>">				
					<?php  if(is_array($newQuestions)) { foreach($newQuestions as $question_index => $question_item) { ?>
					<div class="right-title <?php  if($question_index==$pid) { ?>title-active<?php  } ?>" data-titleid="<?php  echo $question_index;?>">
						<?php  if(is_array($question_item)) { foreach($question_item as $item) { ?>
						<div class="item-title" >
						<img data-original="<?php  echo $_W['attachurl'];?><?php  echo $item['sickImg'];?>"  class="sickImg lazy"/>
						<div  style="float: left;text-align: left;margin-left: 6px;">
							<span style="display: block;margin-top: 5px;color: white;font-size: 12px;"><?php  echo $item['name'];?></span>
							<input class="symptomid" type="checkbox" <?php echo empty($selected[$question_index]) ? "" : in_array($item['id'], array_keys($selected[$question_index])) ?"checked":"";?> id="<?php  echo $item['id'];?>" name="parent[]" value="<?php  echo $question_index;?>_<?php  echo $item['id'];?>" />
						</div>
						<span class="glyphicon glyphicon-chevron-down" data-pid="<?php  echo $item['id'];?>" aria-hidden="true"></span>
						</div>
						<div class="detailDiv" data-parent="<?php  echo $item['id'];?>">
								<ul class="list-group">
									<?php  if(is_array($item['desc'])) { foreach($item['desc'] as $index => $descItem) { ?>
									<li class="list-group-item">
										<input data-symptomid="<?php  echo $item['id'];?>" <?php echo empty($selected[$question_index][$item['id']]) ? "" : in_array($index, array_keys($selected[$question_index][$item['id']])) ?"checked":"";?>
											 type="checkbox" name="child[]" class="child-checkbox" value="<?php  echo $question_index;?>_<?php  echo $item['id'];?>_<?php  echo $index;?>" id="<?php  echo $item['id'];?>_<?php  echo $index;?>"/>
										<label for="<?php  echo $item['id'];?>_<?php  echo $index;?>"><?php  echo $descItem;?></label>
										<div class="fix"></div>
									</li>
									<?php  } } ?>
								</ul>
						</div>
						<div class="clearfix"></div>
						<hr>
						<?php  } } ?>
					</div>
					<?php  } } ?>
			<div class="clearfix"></div>
		</div>	
		<div class="clearfix"></div>
		<div class="footer">
			<input type="hidden" name="t" value="<?php  echo $t;?>" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			<input type="hidden" name="pid" value="<?php  echo $pid;?>" />
			<input type="submit" value="确定" name="submit" />
			</form>
		</div>
	</body>
  <script>
    $(".header").yxMobileSlider({width:640,height:320,during:3000}); 
    $(function(){
    	$("img.lazy").lazyload({effect: "fadeIn"});
    	
    	window.history.forward(1);
    	temp=-1;
    	title_temp=-1;
    	$glys=$('.glyphicon');
    	$details=$('.detailDiv');
    	$glys.click(function(){
    		var	pid=$(this).data('pid');
    		if(temp==pid){
    			$(this).toggleClass("detailToggle");
    			detail_selected="[data-parent='"+pid+"']";
    			$(detail_selected).fadeToggle();
    		}else{
    		temp=pid;
	    		$glys.removeClass("detailToggle");
	    		$(this).addClass("detailToggle");
	    		$details.fadeOut("fast");  		
	    		detail_selected="[data-parent='"+pid+"']";
	    		$(detail_selected).fadeIn("slow");
    		}
    	});	
    	
    	$nav_items=$('.nav-item ');
    	$right_titles=$('.right-title ');
    	$nav_items.click(function(){
    		var	pid=$(this).data('pid');
    		if(title_temp==pid){
    			return;
    		}
    		title_temp=pid;
    		$nav_items.removeClass('active');
    		$right_titles.removeClass('title-active');
    		$(this).addClass('active');
    		title_select="[data-titleid='"+pid+"']";
    		$(title_select).addClass('title-active');
    	});
    	
    	$('input[data-symptomid]').click(function(){
    		if($(this).prop("checked")){
    		  var symptomid=$(this).data('symptomid');
    		  var $id="#"+symptomid;
    		   $($id).prop("checked",true);
    		}
    	});
    	
    	$(".symptomid").click(function(){
    		if(!$(this).prop("checked")){
    			var symptomid=$(this).prop("id");
    			var selects="[data-symptomid='"+symptomid+"']";
    			$(selects).prop("checked",false);
    		}
    	});
    });
  </script>

</html>