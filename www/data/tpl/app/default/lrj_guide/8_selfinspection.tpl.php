<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>自检首页</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link href="./resource/css/bootstrap.min.css" rel="stylesheet">
<link href="../addons/lrj_guide/recouse/css/selfinspection.min.css" rel="stylesheet">
<link href="../addons/lrj_guide/recouse/css/animate.min.css" rel="stylesheet">
<style>
	.mr10{margin-right:10px;}
.fl{float:left;}
#HBox{width:300px;height:300px;margin:0 auto;box-shadow:1px 1px 5px #333;-webkit-box-shadow:1px 1px 5px #333;display:none;background-color:#ffffff;position:fixed;top:50%;left:50%;margin:-120px 0 0 -150px;z-index:100000;}
.list{padding:25px 0;list-style: none;}
.list li{width:80%;margin:10px auto auto;overflow: hidden;}
.list li strong{width:20%;float:left;display:inline-block;margin-right:10px;text-align: right;}
.list .fl{width:72%;}
.ipt{width:100%;text-indent:5px;border:1px solid #ccc;padding:5px 0;box-shadow:0 0 3px #ddd inset;-webkit-box-shadow:0 0 3px #ddd inset;}
.ipt:focus{border-color:#66afe9;box-shadow:0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 6px rgba(102, 175, 233, 0.6);-webkit-box-shadow:0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 6px rgba(102, 175, 233, 0.6);}
.submitBtn{width:100%;height:32px;line-height:30px;cursor:pointer;margin-top:10px;display:inline-block;text-align:center;background-color:#428bca;color:#fff;padding:0;}
.submitBtn:hover,.submitBtn:disabled{opacity: .8;-webkit-opacity: .8;}
.verify{width: 50%;}
#getVerify{width: 49%;padding: 5px 5px;background-color: white;border: 1px solid silver;float: right;}
</style>
<script src="../addons/lrj_guide/recouse/js/jquery-3.1.0.min.js"></script>
<style>
	body{
		background-color:<?php echo $t==1 ?"white" :"#fdf8fc";?> ;
	}
	li[role='presentation'],.heading,.nav>li>a:hover, .nav>li>a:focus{
		background-color:<?php echo $t==1 ?"#77b1df" :"#FE7F9D";?> ;
	}
	#member-criteria-div{position: absolute;top: 0;z-index: 999999;background-color: white;display: none;    padding: 0px 10px;}
	#member-criteria-div h3{text-align: center;}
	#member-criteria-div p{text-indent: 25px;}
</style>
</head>
<body>  
 <div>
  <div class="wellcome"><marquee scrollamount="5">为梦想打拼的路上，有曲折，有艰辛，只要有强健的体魄，我们无惧失败。。。八年铸一品，日复一日，坚持、奋斗、创造。。。每天酵果菜谱，与您携手共创每一刻的人生精彩。您的健康，有我在！</marquee></div>
  <div class="heading">
    <h3 class="panel-title">性别选择</h3>
  </div>
  <div id="course">
  	<a href="http://mp.weixin.qq.com/s?__biz=MzI3MTM3MDcwOQ==&mid=100000009&idx=1&sn=6745af5ae3611719a24aea196a1ed4c0&scene=0" style="color: red;">
  		<!--<span style="font-size: 2em;" class="glyphicon glyphicon-question-sign"></span>-->
  		使用指南
  	</a>
  </div>
  <div class="panel-body" style="text-align: center;">    
		    <label class="radio-inline">
		    	<a href="<?php  echo $this->createMobileUrl('selfinspection',array('pid'=>$item['id'],'t'=>1))?>">
			  <input type="radio" name="inlineRadioOptions" <?php  if($t==1) { ?>checked<?php  } ?> <?php  if($gender==1||$gender==2) { ?>disabled<?php  } ?> id="inlineRadio1" value="1">男
				</a>
		    </label>	
			<label class="radio-inline">
				<a href="<?php  echo $this->createMobileUrl('selfinspection',array('pid'=>$item['id'],'t'=>2))?>">
				<input type="radio"  name="inlineRadioOptions" <?php  if($t==2) { ?>checked<?php  } ?> <?php  if($gender==1||$gender==2) { ?>disabled<?php  } ?> id="inlineRadio2" value="2">女
				</a>
			</label>				
  </div>
  </div>
  <div style="width:100%;min-height: 515px;text-align: center;">
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/leftnav', TEMPLATE_INCLUDEPATH)) : (include template('common/leftnav', TEMPLATE_INCLUDEPATH));?>
	<?php  if($t==1) { ?>
    <img id="sexImg" src="../addons/lrj_guide/recouse/images/male_new.jpg" style="width: 50%;">
    <?php  } else { ?>
    <img id="sexImg" src="../addons/lrj_guide/recouse/images/female_new.png" style="width: 50%;">
    <?php  } ?>
  </div>
 <!-- <div class="panel-bottom" style="position: fixed;bottom: 0px;width: 100%;background-color: #7F7F7F;">
  <div class="panel-body" style="text-align: center;">
	   <a type="submit" href="<?php  echo $this->createMobileUrl('selfinspectionresult')?>"  class="btn btn-mydefined"  >自检完毕</a>
  </div>
  </div>-->
  <button id="showBox" style="display: none;" /></button>
  <div id="HBox">
		<form onsubmit="return false;">
			<ul class="list">
				<li>
					<strong>姓名 <font color="#ff0000">*</font></strong>
					<div class="fl"><input type="text" placeholder="2-8位的中文名" name="nickname" value="" class="ipt nickname" /></div>
				</li>
				<li>
					<strong>手机 <font color="#ff0000">*</font></strong>
					<div class="fl"><input type="text" name="phone" value="" class="ipt phone" /></div>
				</li>
				<li>
					<strong>验证码</strong>
					<div class="fl"><input type="text" name="verify" value="" class="ipt verify" /><button id="getVerify">获取验证码</button></div>
				</li>
				<li><button  class="submitBtn" >确认</button></li>
				<li style="text-align: center;">
					<input  type="checkbox" class="member-criteria"/>　<span id="member-criteria">&lt;&lt;会员准则&gt;&gt;</span>
				</li>
			</ul>
		</form>
	</div>
  <div id="member-criteria-div">
  	<!--<h3>会员手册</h3>-->
	<img  src="../addons/lrj_guide/recouse/images/huiyuan.png" style="width: 100%;">
  	<p>欢迎加入美丽天使健康生活馆，我们将以执着的专业为您提供完善周到的服务，带给您全新的健康维护体验。同步为您和您的家人提供全面而个性化的健康关爱，协助您选择最适合自己的健康食品，规划最合理的生活方式，用最朴实方式， 铸就健康的未来。</p>
	<img  src="../addons/lrj_guide/recouse/images/beijing.png" style="width: 80%;">
    <!--<h4>一、宗旨：</h4>-->
    <p>遵守国家法律法规，崇尚社会道德风范，努力为会员提供优先、优惠及增值的健康咨询服务。筹备开展符合客户利益需求的科学养生等互动活动，最大限度满足会员的健康需求。</p>
	<img  src="../addons/lrj_guide/recouse/images/beijing1.png" style="width: 80%;">
    <!--<h4>二、专业背景：</h4>-->
    <p> 精挑细选的有机蔬果，经过科学配伍→破壁微分→低温浓缩，独具匠心的制作工艺，我们一丝不苟，因为这是送给健康细胞的一份大礼，全为您的一日一餐，为健康细胞加油！</p>
    <p>酵果菜谱从美国远渡重洋，在国内完成了365天、５９项严谨细致的临床记录，累积了来自于不同体质的各类调理反映的宝贵经验，只为造福广大热爱健康的家人们！</p>
    <img  src="../addons/lrj_guide/recouse/images/beijing2.png" style="width: 80%;">
	<!--<h4>三、入会须知：</h4>-->
    <p>1.会员必须有产品使用的亲身经历，并乐意与他人分享者；</p>
    <p>2.入会需由本人申请（也可电话或网络加入）。会员的各项服务将按办理日期生效和延续；</p>
    <p>3.敬请提供个人真实信息，以应送货和联络之需。本公司将严格保护所有宾客的资讯；</p>
    <p>4.会员自入会之日起，即视为认可并清楚手册中的所有细则；</p>
    <p>5.未来新产品的发布及营销方案将通过美丽天使生活馆公众号统一发布，并同时生效；</p>
    <p>6.会员不得利用生活馆的平台传播有损于企业声誉的资讯及私自售卖未经审核的产品。</p>
	<img  src="../addons/lrj_guide/recouse/images/beijing4.png" style="width: 80%;">
    <!--<h4>四、会员资格核定 ：</h4>-->
    <p>客服专员对您的消费情况及基础资料进行核对。完善后将联系您，同时送达我们的敬意和祝福!</p>
    <h3 id="close-member">关闭</h3>
  </div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="../addons/lrj_guide/recouse/js/jquery.hDialog.js"></script>
<script type="text/javascript">
//获取指定cookes函数
function getCookie(name)
{ 
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)"); 
    if(arr=document.cookie.match(reg)){
        return unescape(arr[2]); 
    }else{ 
        return null;
    }
} 
 $(function(){
	wx.config({
    	debug: false,
    	jsApiList:  ['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','showOptionMenu'],
        appId: "<?php  echo $_W['account']['jssdkconfig']['appId']?>",
        timestamp:"<?php  echo $_W['account']['jssdkconfig']['timestamp']?>" ,
	    nonceStr: "<?php  echo $_W['account']['jssdkconfig']['nonceStr']?>", 
	    signature: "<?php  echo $_W['account']['jssdkconfig']['signature']?>",         
      });
    var shareData={
		imgUrl : 'http://demo.open.weixin.qq.com/jssdk/images/p2166127561.jpg',
        link : '<?php  echo $_W["siteroot"]."app".substr($this->createMobileUrl('selfinspection',array('mid'=>$member["id"])),1)?>',
        desc : '了解自己，自检一下',
        title : '了解自己，自检一下',    	
    };
	wx.ready(function() {
        wx.onMenuShareTimeline({
       		imgUrl : shareData.imgUrl,
            link : shareData.link,
            desc : shareData.desc,
            title : shareData.title,
		    }); 
	wx.onMenuShareAppMessage({
       		imgUrl : shareData.imgUrl,
            link : shareData.link,
            desc : shareData.desc,
            title : shareData.title,
		   });
   }); 

 	//如果是非会员
 	/*var isGettedVerify=false;
 	var isMember="<?php  echo $isMember;?>";
 	var phoneReg = /^0{0,1}(13[0-9]|15[0-9]|153|156|180|18[6-9])[0-9]{8}$/;
 	var nameReg = /^[\u4E00-\u9FA5]{2,8}$/;
 	var verifyReg = /^[1-9]{4}$/;
	if(isMember==="0"){	
 		$("#showBox").hDialog({position: 'top',height: 300,title: '填写个人信息',beforeShow: function(){ alert('为了您的健康更全面，全程服务更完善，请填写您的个人资料,申请成为会员!'); },closeHide: false,modalHide: false,box: '#HBox',}).trigger("click");			
 		var phone='';
 		$("#getVerify").on("click",function(){
 			if(isGettedVerify===false){
 				 //获取验证码
 				phone=$(".phone").val();
 				if(!phoneReg.test(phone)){
 					alert("请先填写正确的手机号码");
 					return;
 				}
 				var _this=$(this);
 				isGettedVerify=true;
 				showTime(_this,"red",180); 
 				$.post(
 					"<?php  echo $this->createMobileUrl('getVerify')?>",
 					{"phone":phone},
 					function(data){
 						if(data.status!=200){
 							 alert(data.msg);
 						}
 					},
 					"json"
 				);
 			}
 		});
 		
 		$(".submitBtn").on("click",function(){
 		if(!$("input[class='member-criteria']").prop("checked")){
 			alert("请先确认会员准则");	
 			return false;
 		}			
 		var name=$('.nickname').val();
 		var verify=$('.verify').val();
 		var phone=$('.phone').val();
 		if(!nameReg.test(name)||!phoneReg.test(phone)||!verifyReg.test(verify)){
 			alert("请先输入所有选项");
 			return;
 		}
 		$.post(
 			"<?php  echo $this->createMobileUrl('register')?>",
 			{"name":name,"verify":verify,'phone':phone},
 			function(data){
 				if(data.status==200){
 					window.location.reload();
 				}else{
 					alert(data.msg);
 				}
 			},
 			"json"
 		);
 	});
		
 	};
 	
 	$("input[class='member-criteria']").prop({'checked':'checked'});
 	
 	$("#member-criteria").on("click",function(){
 		$("#member-criteria-div").show();
 	});
 	
 	$("#close-member").css({"color":"red"}).on("click",function(){
 		$("#member-criteria-div").hide();
 	})
 		
 	function showTime($ele,color,time){
 		if(time<=0){
 			$ele.css("color","black").text("重新获取");
 			isGettedVerify=false;	
 		}else{
 			setTimeout(function(){
 				time--;	
 				$ele.css("color",color).text("-"+time+"s");
 				showTime($ele,color,time);
 			},1000);
 		}
 	}
 });

window.onload=function(){
	var imgHeigt=$('#sexImg').height();
 	$('.nav-pills').height(imgHeigt);
 	var marginTop=Math.floor((imgHeigt-43*7)/6);
 	$("li[role=presentation]:gt(0)").css("margin-top",marginTop);
	$('input[type=radio]').each(function(){
		var $_this=$(this);
		$_this.click(function(){
		window.location.href=($_this.parent().prop('href'));	
		});		
	});
}*/
</script>
</body>
</html>