<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>健康小测试</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" href="../addons/lrj_guide/recouse/css/jquery.mobile-1.4.5.min.css" />
		<script src="../addons/lrj_guide/recouse/js/jquery-1.11.1.min.js"></script>
		<script src="../addons/lrj_guide/recouse/js/jquery.mobile-1.4.5.min.js"></script>
	</head>
	<body>
		<div data-role="page" id="index">
			<div data-role="header" data-position="fixed"><h1>1、晚上通常几点入睡</h1></div>
			<div role="main" class="ui-content">
				<img src="../addons/lrj_guide/recouse/images/associate/1.jpg"/>
				<ul data-role ="listview">
					<li data-value="1"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">A.2点钟后</a></li>
					<li data-value="2"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">B.凌晨1-2点</a></li>
					<li data-value="3"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">C.11-12点</a></li>
					<li data-value="4"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">D.11点前</a></li>
				</ul>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar"><ul><li><a class="next" href="#second">下一题(1/6)</a></li></ul></div>
			</div>
		</div>
		<div data-role="page" id="second">
			<div data-role="header" data-position="fixed"><h1>2、您的睡眠品质如何</h1></div>
			<div role="main" class="ui-content">
				<img src="../addons/lrj_guide/recouse/images/associate/2.jpg"/>
				<ul data-role ="listview">
					<li data-value="1"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">A.睡不稳，时醒时睡</a></li>
					<li data-value="2"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">B.有梦且梦境清晰</a></li>
					<li data-value="3"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">C.有梦，醒来不记得</a></li>
					<li data-value="4"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">D.深度睡眠，醒后精神好</a></li>
				</ul>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar"><ul><li><a class="next" href="#thrild">下一题(2/6)</a></li></ul></div>
			</div>
		</div>
		<div data-role="page" id="thrild">
			<div data-role="header" data-position="fixed"><h1>3、是否有手脚冰凉的状况</h1></div>
			<div role="main" class="ui-content">
				<img src="../addons/lrj_guide/recouse/images/associate/3.jpg"/>
				<ul data-role ="listview">
					<li data-value="1"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">A.经常</a></li>
					<li data-value="2"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">B.偶尔</a></li>
					<li data-value="3"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">C.有，只在冬天</a></li>
					<li data-value="4"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">D.从不</a></li>
				</ul>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar"><ul><li><a class="next"  href="#four">下一题(3/6)</a></li></ul></div>
			</div>
		</div>
		<div data-role="page" id="four">
			<div data-role="header" data-position="fixed"><h1>4、您的排便情况</h1></div>
			<div role="main" class="ui-content">
				<img src="../addons/lrj_guide/recouse/images/associate/4.jpg"/>
				<ul data-role ="listview">
					<li data-value="1"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">A.没规律，不好说</a></li>
					<li data-value="2"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">B.不保证每天有</a></li>
					<li data-value="3"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">C.每天3次以上</a></li>
					<li data-value="4"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">D.每天1-2次，畅顺</a></li>
				</ul>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar"><ul><li><a class="next" href="#five">下一题(4/6)</a></li></ul></div>
			</div>
		</div>
		<div data-role="page" id="five">
			<div data-role="header" data-position="fixed"><h1>5、您的感冒情况：</h1></div>
			<div role="main" class="ui-content">
				<img src="../addons/lrj_guide/recouse/images/associate/5.jpg"/>
				<ul data-role ="listview">
					<li data-value="1"><a style="overflow: initial;white-space: inherit;" href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">A.一年4次以上，10天以上康复/两年以上没有任何感冒现象</a></li>
					<li data-value="2"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">B.一年2~4次，10天以上康复</a></li>
					<li data-value="3"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">C.一年3~4次，一周左右康复</a></li>
					<li data-value="4"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">D.一年1~2次，一周左右康复</a></li>
				</ul>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar"><ul><li><a class="next" href="#end">下一题(5/6)</a></li></ul></div>
			</div>
		</div>
		<div data-role="page" id="end">
			<div data-role="header" data-position="fixed"><h1>6、您平常喜欢的口味</h1></div>
			<div role="main" class="ui-content">
				<img src="../addons/lrj_guide/recouse/images/associate/6.jpg"/>
				<ul data-role ="listview">
					<li data-value="1"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">A.辣</a></li>
					<li data-value="2"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">B. 偏咸/甜</a></li>
					<li data-value="3"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">C.油多一点</a></li>
					<li data-value="4"><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-check ui-btn-icon-right">D.清淡</a></li>
				</ul>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar"><ul><li><a href="#" id="commit">提交</a></li></ul></div>
			</div>
		</div>
		<style>
			.ui-header .ui-title{margin: 0 20%;}
			.ui-icon-check:after{
					background-color: green;
				    display: none;
			}
			.ui-icon-check.change:after {
			    	display: block;
			}
			.ui-listview{padding: 1em;}
			.ui-listview li{margin: 0.5em 0;border: 1px solid silver;}
			.ui-navbar li:last-child .ui-btn{font-size: 1em;}
			.ui-content img{width: 100%;}
		</style>
		<script>
			$(function(){
				var siteUrl="<?php  echo $this->createMobileUrl('associate')?>";
				$("div[data-role=page]").on('pageshow',function(){
					
					$(".ui-listview li").each(function(){
						$(this).on("tap",function(){
							var _this=$(this);
							_this.find(".ui-icon-check:first").addClass('change').parent().siblings().find(".ui-icon-check:first").removeClass('change');
						});
					});	
					//提交
					if($(this).prop("id")=="end"){
						$("#commit").bind("tap",function(){
							//ajax请求
							if($(".change").length<6){
								alert("还有题目没做选择");
								return false;
							}
							var selected_str='';
							var score=0;
							$('.change').each(function(i){
								var index=$(this).parent().data('value');
								if(i==5&&index!=4){
									score+=1;	
								}else{
									score+=index;	
								}	
								selected_str+=(index+"_");
							});
							$.post(
								siteUrl,
								{"data":selected_str},
								function(data){
									var msg="您好,系统异常,请稍候再试。感想您的支持与理解!";
									if(data.status==200){
										if(score>=21&&score<=24){
											msg=("恭喜您获得'健康达人'称号!\n您现在的生活模式对健康有帮助，继续保持！为让身体得到全面呵护，请进入会员专属的“健康扫描”，让健康无死角！");
										}else if(score>=16&&score<=20){
											msg=("恭喜您获得'健康渐变者'称号!\n您的亚健康状态模式已经开启，留意健康动态并及时修正，甩掉亚健康的尾巴！快去进行健康扫描，恢复健康本色！");
										}else if(score>=11&&score<=15){
											msg=("很遗憾您获得'亚健康代言人'称号!\n您目前处于明显亚健康状态，趁系统机能还有机会回归正轨，赶紧进入健康扫描，查找问题的所在并扭转下滑趋势。");
										}else{
											msg=("很遗憾您获得'逆流勇士'称号!\n您是一个很刚性的个体，目前初始健康信号有点弱哦。平时记得多关爱自己，诚邀您进入整体健康扫描，回归健康轨道！");
										}
									}
									alert(msg);
									window.location.href="<?php  echo $this->createMobileUrl('selfinspection')?>";
								},
								"json"
							);						
						});
					}					
				});
				
				
				$("#end").on("pagehide",function(){
					$("#commit").unbind("tap");
				});
				
				$(".ui-listview li").each(function(){
						$(this).on("tap",function(){
							var _this=$(this);
							_this.find(".ui-icon-check:first").addClass('change').parent().siblings().find(".ui-icon-check:first").removeClass('change');
						});
					});	
			});
		</script>
	</body>
</html>