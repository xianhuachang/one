<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>自诊系统</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" href="../addons/lrj_guide/recouse/css/jquery.mobile-1.4.5.min.css" />
		<script src="../addons/lrj_guide/recouse/js/jquery-1.11.1.min.js"></script>
		<script src="../addons/lrj_guide/recouse/js/jquery.mobile-1.4.5.min.js"></script>
	</head>
	<body>	
		<?php  if(is_array($parts)) { foreach($parts as $index => $pitem) { ?>
		<div data-role="page" id="page_<?php  echo $index;?>">
			<div data-role="header" data-position="fixed">
				<?php  if($index>0) { ?>
				<a href="#page_<?php  echo $index-1?>" class="ui-btn-icon-left ui-btn ui-icon-arrow-l ui-btn-icon-left"><?php $key=$index-1; echo $t==1&& $parts[$key]['name']=='胸部'?'心肺':$parts[$key]['name']?></a>
				<?php  } ?>
				<?php  if(6-$index>0) { ?>
				<a href="#page_<?php  echo $index+1?>" class="ui-btn-right ui-btn ui-icon-arrow-r ui-btn-icon-right"><?php $key=$index+1; echo $t==1&& $parts[$key]['name']=='胸部'?'心肺':$parts[$key]['name']?></a>
				<?php  } ?>
				<h1><?php  if($t==1 && $pitem['name']=="胸部") { ?>心肺<?php  } else { ?><?php  echo $pitem['name'];?><?php  } ?> 
				</h1>
			</div>
			<div role="main" class="ui-content">
				<div  data-role="collapsibleset" data-theme="a" data-inset="false" data-iconpos="right">
					<?php  if(is_array($newQuestions[$parts[$index]['id']])) { foreach($newQuestions[$parts[$index]['id']] as $item) { ?>
						<div data-role="collapsible">
						<h2 style="background-image: url(<?php  echo $_W['attachurl'];?><?php  echo $item['sickImg'];?>);background-repeat: no-repeat;background-size: 1.7em;background-position: 0.8em 0.1em;padding-left: 60px;background-color: #78b0df;padding-top: 2px;padding-bottom: 2px;border: 1px solid silver;}"><?php  echo $item['name'];?></h2>
							<ul data-role="listview">
								<li>
									<a href="#"   data-value="<?php  echo $pitem['id'];?>_<?php  echo $item['id'];?>" style="overflow: initial;white-space: inherit;background: #b7d3eb;text-shadow: none;" class="ui-btn none-symptom  ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">0.无以下特征</a>
								</li>
								<?php  if(is_array($item['desc'])) { foreach($item['desc'] as $desc_index => $descItem) { ?>
									<li>
										<a href="#" data-value="<?php  echo $pitem['id'];?>_<?php  echo $item['id'];?>_<?php  echo $desc_index;?>" style="overflow: initial;white-space: inherit;background: #b7d3eb;text-shadow: none;" class="ui-btn  ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right"><?php  echo $descItem;?></a>
									</li>
								<?php  } } ?>
							</ul>
						</div>
					<?php  } } ?>
				</div>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar">
					<ul><?php  if($index>0) { ?>
						<li><a href="#page_<?php  echo $index-1?>">返回<br/>
							<?php $key=$index-1; echo $t==1&& $parts[$key]['name']=='胸部'?'心肺':$parts[$key]['name']?></a>
						</li><?php  } ?><?php  if(6-$index>0) { ?><li>
							<a href="#page_<?php  echo $index+1?>" >继续<br/>
								<?php $key=$index+1; echo $t==1&& $parts[$key]['name']=='胸部'?'心肺':$parts[$key]['name']?></a>
						</li><?php  } ?>
						<li>
							<a href="#" onclick="checkSumit()">自诊完毕<br/>确定</a>				
						</li></ul></div></div></div>
		<?php  } } ?>	
			<input type="hidden" name="parent" value="" />
			<input type="hidden" name="child" value="" />
			<input type="hidden" name="t" value="<?php  echo $t;?>" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			<input type="hidden" name="pid" value="<?php  echo $pid;?>" />
		</form>
		<div id="model">数据上传中...</div>
		<style>
			.ui-listview a{padding-left:40px ;}
			.ui-icon-check:after{background-color: green;display: none;}
			.ui-icon-check.change:after {display: block;}
			.ui-navbar li .ui-btn{font-size: 1.2em;}
			.ui-collapsible-heading-toggle{background: none;border: none;}
			#model{display:none;text-align:center;line-height:20em;width: 100%;height: 100%;overflow: hidden;position: absolute;top: 0;left: 0;background-color: rgba(0,0,0,0.8);color: white;font-size: 2em;z-index: 99999;}
		</style>
		<script>
			$(function(){				
				var siteUrl="<?php  echo $this->createMobileUrl('selfinspection')?>";
				$("div[data-role=page]").on('pageshow',function(){
				var timer=setInterval(function(){
					if($('.ui-collapsible-heading-toggle').length>0){
						$('.ui-collapsible-heading-toggle').css({"background":'none','border':'none','text-shadow':'none'});
						clearInterval(timer);
					};
				},1);
					$(".ui-listview li").each(function(){
						$(this).on("tap",function(){
							var _this=$(this).find(".ui-icon-check:first");
							if(_this.hasClass("none-symptom")){
								_this.toggleClass("change").parent().siblings().find(".ui-icon-check:first").removeClass("change");
							}else{
								_this.toggleClass("change");
								var $none_symptom=_this.parent().siblings().find(".none-symptom:first");
								if($none_symptom.hasClass("change")){
									$none_symptom.removeClass("change");
								}
							}
						});
					});					
				});
				var timer=	setInterval(function(){
					if($('.ui-collapsible-heading-toggle').length>0){
						$('.ui-collapsible-heading-toggle').css({"background":'none','border':'none'});
						clearInterval(timer);
					};
				},1);				
				$(".ui-listview li").each(function(){
						$(this).on("tap",function(){
							var _this=$(this).find(".ui-icon-check:first");							
							if(_this.hasClass("none-symptom")){
								_this.toggleClass("change").parent().siblings().find(".ui-icon-check:first").removeClass("change");
							}else{
								_this.toggleClass("change");
								var $none_symptom=_this.parent().siblings().find(".none-symptom:first");
								if($none_symptom.hasClass("change")){
									$none_symptom.removeClass("change");
								}
							}
							
						});
				});
			});
			
			function checkSumit(){
					if($(".change").length==0){
						alert("没做任何选择");
						window.location.reload();
						return false;
					}
					$("#model").show();
					//串联数据  如果选择的是无症状，放到parent中   否则放到child中
					var parent_str="";
					var child_str="";
					$(".change").each(function(){
						if($(this).hasClass("none-symptom")){
							parent_str+=($(this).data("value")+";");
						}else{
							child_str+=($(this).data("value")+";");
						}
					});
					$("input[name=parent]").val(parent_str);
					$("input[name=child]").val(child_str);
					
					$.post(
						"<?php  echo $this->createMobileUrl('selfinspection',array('op'=>'post'))?>",
						{"parent":parent_str,"child":child_str,"t":$("input[name=t]").val(),
						"token":$("input[name=token]").val(),"pid":$('input[name=pid]').val()},
						function(data){
							window.location.href=data.returnUrl;
						},
						"json"
					);
			}
		</script>
	</body>
</html>