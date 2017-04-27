<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<title>健康小测试</title>
		<style>
			*{padding: 0;margin: 0;font-size: 16px;font-size: 100%;font-size: 1em;border: none;}
			html{width: 100%;}
			body{width: 100%;overflow-x:hidden;position: relative;}
			#content{width: 95%;z-index: 10;margin: 0 auto;padding-top: 22%;font-size: 2em;margin-bottom: 45px;}
			li{list-style: none;margin-top: 12px;}
			dl{line-height:15px;padding-left: 20px;}
			dd{height: 20px;width: 50%;float: left; padding: 3px 0px;}
			input[type=radio]{width: 11px;height: 11px;}
			#footer{z-index:11;width:100%;text-align:center;color:white;position: fixed;bottom: 0;height:40px;background-color: rgba(0,0,0,0.7);}
			#footer span{font-size:2em;letter-spacing: 3px;}
			h4,label{font-size: 0.5em;}
			.clearfix{clear: both;}
		</style>
	</head>
	<body>
		<h3 style="position: absolute;font-size: 1.3em;left: 40%;top: 8%;">健康小测试</h3>
		<!--<img src="../addons/lrj_guide/recouse/images/background.png" style="position: absolute;width: 100%;height: 100%;z-index: -1;"/>-->
		<div id="content">
			<ul>
				<li>
					<h4>1、您每周在家吃饭次数：</h4>
					<dl>
						<dd><input type="radio" name="first" id="1_1" checked value="1"><label for="1_1">A.5次以下</label></dd>
						<dd><input type="radio" name="first" id="1_2"  value="2"><label for="1_2">B.5-10次</label></dd>
						<dd><input type="radio" name="first" id="1_3" value="3"><label for="1_3">C.10-15次</label></dd>
						<dd><input type="radio" name="first" id="1_4" value="4"><label for="1_4">D.15次以上</label></dd>
					<div class="clearfix"></div>
					</dl>
				</li>
				<li>
					<h4>2、晚上通常几点入睡：</h4>
					<dl>
						<dd><input type="radio" name="se" id="2_1" checked value="1"><label for="2_1">A.2点钟后</label></dd>
						<dd><input type="radio" name="se" id="2_2"  value="2"><label for="2_2">B.凌晨1-2点</label></dd>
						<dd><input type="radio" name="se" id="2_3"  value="3"><label for="2_3">C.11-12点</label></dd>
						<dd><input type="radio" name="se" id="2_4" value="4"><label for="2_4">D.11点前</label></dd>
						<div class="clearfix"></div>
					</dl>
				</li>
				<li>
					<h4>3、您的睡眠品质如何：</h4>
					<dl>
						<dd><input type="radio" name="third" id="3_1" checked value="1"><label for="3_1">A.睡不稳，时醒时睡</label></dd>
						<dd><input type="radio" name="third" id="3_2"   value="2"><label for="3_2">B.有梦且梦境清晰</label></dd>
						<dd><input type="radio" name="third" id="3_3" value="3"><label for="3_3">C.有梦，醒来不记得</label></dd>
						<dd><input type="radio" name="third" id="3_4"  value="4"><label for="3_4">D.深度睡眠</label></dd>
						<div class="clearfix"></div>
					</dl>
				</li>
				<li>
					<h4>4、是否有手脚冰凉的状况：</h4>
					<dl>
						<dd><input type="radio" name="four" id="4_1" checked value="1"><label for="4_1">A.经常</label></dd>
						<dd><input type="radio" name="four" id="4_2"  value="2"><label for="4_2">B.偶尔</label></dd>
						<dd><input type="radio" name="four" id="4_3"  value="3"><label for="4_3">C.有，只在冬天</label></dd>
						<dd><input type="radio" name="four" id="4_4" value="4"><label for="4_4">D.从不</label></dd>
						<div class="clearfix"></div>
					</dl>
				</li>
				<li>
					<h4>5、您的排便情况：</h4>
					<dl>
						<dd><input type="radio" name="five" id="5_1" checked value="1"><label for="5_1">A.没规律，不好说</label></dd>
						<dd><input type="radio" name="five" id="5_2"  value="2"><label for="5_2">B.不保证每天有 </label></dd>
						<dd><input type="radio" name="five" id="5_3" value="3"><label for="5_3">C.每天3次以上</label></dd>
						<dd><input type="radio" name="five" id="5_4"  value="4"><label for="5_4">D.每天1-2次，畅顺</label></dd>
						<div class="clearfix"></div>
					</dl>
				</li>
				<li>
					<h4>6、您平常喜欢的口味：</h4>
					<dl>
						<dd><input type="radio" name="six" id="6_1" checked value="1"><label for="6_1">A.辣</label></dd>
						<dd><input type="radio" name="six" id="6_2"  value="1"><label for="6_2">B.偏咸/甜 </label></dd>
						<dd><input type="radio" name="six" id="6_3" value="1"><label for="6_3">C.油多一点</label></dd>
						<dd><input type="radio" name="six" id="6_4" value="4"><label for="6_4">D.清淡</label></dd>
						<div class="clearfix"></div>
					</dl>
				</li>
			</ul>
		</div>
		<div id="footer">
			<span>提交</span>
		</div>
		<script src="../addons/lrj_guide/recouse/js/jquery-3.1.0.min.js"></script>
		<script>
			$(function(){				
				$("#footer span").on("click",function(){
					var score=0;
					$("input:checked").each(function(){
						score+=(parseInt($(this).val()));
					});
					if(score>=20&&score<=24){
						alert("恭喜您获得'健康达人'称号!\n您现在的生活模式对健康有帮助，继续保持！为让身体得到全面呵护，请进入会员专属的“健康扫描”，让健康无死角！");
					}else if(score>=16&&score<=20){
						alert("恭喜您获得'健康渐变者'称号!\n您的亚健康状态模式已经开启，留意健康动态并及时修正，甩掉亚健康的尾巴！快去进行健康扫描，恢复健康本色！");
					}else if(score>=11&&score<=15){
						alert("很遗憾您获得'亚健康代言人'称号!\n您目前处于明显亚健康状态，趁系统机能还有机会回归正轨，赶紧进入健康扫描，查找问题的所在并扭转下滑趋势。");
					}else{
						alert("很遗憾您获得'逆流勇士'称号!\n您是一个很刚性的个体，目前初始健康信号有点弱哦。平时记得多关爱自己，诚邀您进入整体健康扫描，回归健康轨道！");
					}
				});
			});
		</script>
	</body>
</html>