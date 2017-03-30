<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<title>成为管家</title>
<style type="text/css">
body {margin:0; font-family:'微软雅黑'; background:#f4f4f4;}
.top {overflow:hidden}
.top img { width:100%;}
a{ text-decoration: none;}
.main {height:520px; padding:30px 12px;}
.main .text {height:20px; font-size:14px; line-height:20px; color:#666;}
.main .text span {color:#f6914b;}

.main .text1 {padding:5px; font-size:14px; line-height:20px; color:#666;}
.main .text1 span {color:#f6914b;}


.main .input {height:36px; margin:14px 10px 0 0;background:#fff;border-radius:5px;}
.main .input input {width:100%;  height:36px; border:0px; outline:none; font-size:15px; color:#999;}

.main .sub {height:40px; background:#e53c39; margin-top:14px; border-radius:5px; text-align:center; line-height:40px; color:#fff; font-size:16px;}
.main .title {height:30px; margin-top:20px; font-size:12px; line-height:30px; color:#666;}
.vip_main {height:130px; background:#fff; border-radius:4px;}
.vip_main .vip {height:36px; padding:12px; border-bottom:1px solid #f1f1f1; overflow:hidden; font-size:12px; color:#999;}
.vip_main .vip .ico1 {height:36px; width:36px; background:#32cd32; border-radius:18px; color:#fff; font-size:20px; line-height:36px; text-align:center; float:left;}
.vip_main .vip .ico2 {height:36px; width:36px; background:#fece00; border-radius:18px; color:#fff; font-size:22px; line-height:40px; text-align:center; float:left;}
.vip_main .vip .text {height:36px; margin-left:12px; float:left;}
.vip_main .vip .text .t1 {height:18px; font-size:15px; color:#666; line-height:18px;}
.vip_main .vip .text .t2 {height:18px; font-size:13px; color:#999; line-height:18px;}

.vip_obligation{background:#fff; border-radius:4px;font-size:12px; color:#999;padding: 12px;}
.vip_obligation ol{margin-bottom: 10px;}
.red{color: red;}
.ok {height:200px; padding-top:65px;}
.ok .ico {height:65px; width:65px; margin:auto; border:3px solid #32cd32; border-radius:55px; color:#32cd32; font-size:50px; text-align:center; line-height:65px;}
.ok .text {height:20px; margin-top:30px; font-size:16px; color:#666; line-height:20px; text-align:center;}
.ok .sub {height:32px; width:145px; background:#e53c39; margin:20px auto; border-radius:20px; color:#fff; line-height:32px; text-align:center; font-size:16px;}


</style>
<div id='container'></div>
<script id='tpl_main' type='text/html'>
	<div class="top">
        <img src="<%if set.regbg!=''%><%set.regbg%><%else%>../addons/ewei_shop/plugin/commission/template/mobile/default/static/images/bg.png<%/if%>" />
        </div>
 
	<div class="main">
                   <%if status==0%>
	<div class="text">欢迎加入<span><%shop_set.name%></span>，请填写申请信息</div>
	<div class="text">邀请人：<span><%if agent%><%agent.nickname%><%else%>总店<%/if%></span> (请核对)</div>
	<div class="input"><input type="text" id='realname' placeholder="请填写真实姓名，用于积分结算" value="<?php  echo $member['realname'];?>" /></div>
	<div class="input"><input type="text" id='mobile' placeholder="请填写手机号码方便联系"  value="<?php  echo $member['mobile'];?>"/></div>
	<div class="input"><input type="text" id='weixin' placeholder="请填写微信号"  value="<?php  echo $member['weixin'];?>"/></div>
	<div class="sub" id="submit">申请成为管家</div>
                   <%/if%>
                   <%if status==1%>
	<div class="text1">本店累计消费满 <span><%ordercount%></span> 次，
                       才可成为&lt;<%shop_set.name%>&gt;购物中心管家，您已消费 <span><%order%></span> 次，请继续努力！</div>
                  <div class="sub" onclick="location.href='<?php  echo $this->createMobileUrl('shop/list')?>'"><i class='fa fa-shopping-cart'></i> 继续去购物</div>
                   <%/if%>
                   <%if status==2%>
                   <div class="text1">本店累计消费满 <span><%moneycount%></span> 元，
                       才可成为&lt;<%shop_set.name%>&gt;购物中心管家，您已消费 <span><%money%></span> 元，请继续努力！</div>
	   <div class="sub" onclick="location.href='<?php  echo $this->createMobileUrl('shop/list')?>'"><i class='fa fa-shopping-cart'></i> 继续去购物</div>
                   <%/if%>
                   
        
        <div class="title">管家特权</div>
		<div class="vip_main">
            <div class="vip">
            	<div class="ico2"><i class="fa fa-cny"></i></div>
                <div class="text"><div class="t1">销售拿积分</div><div class="t2">微店卖出商品，您可以获得积分；</div></div>
            </div>
            <div class="vip" style="border-bottom:0px;">管家的商品销售统一由厂家直接收款、直接发货，并提供产品的售后服务，推广积分由厂家统一设置。</div>
        </div>
        <div class="title">管家职责</div>
        <div class="vip_obligation">
        <ul>
        	<li>一、亲身体验，言传身教</li>
        	<ol>
				<li>自身成为会员；</li>
				<li>自身体验酵果菜谱（1个月以上），并关爱自己的健康改善过程；</li>
				<li>推己及人，将自身和其他人的健康改善情况分享；</li>        	
        	</ol>		
			<li>二、开发会员、追踪并引导其延续</li>
			<ol>
				<li>找寻准会员需求，邀请其成为酵果菜谱会员；</li>
				<li>追踪会员食用情况及健康的改善情况；</li>
				<li>根据会员食用一周、1个月、3个月的时间段，提前引导其延续食用；</li>
				<li>培养会员养成健康管理能力；</li>
				<li>会员有疑问（如政策性、条文性、技术性问题），进行相应的释疑与引导。</li>
                <li style="list-style:none">技术性疑难问题可请美丽天使专家团队给予支持；</li>
                <li style="list-style:none">疑问最终解释权归属美丽天使公司。</li>
                </ol>
			<li>三、终身学习，积极培训</li>
			<ol>
				<li>不断提升自我对于健康专业知识的要求；</li>
				<li>以帮助他人获得健康为出发点，孜孜不倦地健康智慧、健康案例等与准会员、会员分享；</li>
				<li>阅读公众号的文章，并安排会员、准会员阅读，关注其阅读心得；</li>
				<li>定期组织会员进行小型学习交流会议；</li>
				<li>参与美丽天使公司的培训，积极将市场问题反馈。</li>
			</ol>
			<li>四、引导会员成为健康管家</li>
			<ol>
				<li>挖掘准健康管家，并引导其成为正式健康管家；</li>
				<li>引导健康管家不断学习、培训；</li>
				<li>协助下级健康管家开发会员，并对其的小型培训给予一定的支持。</li>
			</ol>
		</ul>
        </div>        
</div>
</script>
<script id="tpl_ok" type="text/html">
     <div class="top">
        <img src="<%if set.regbg!=''%><%set.regbg%><%else%>../addons/ewei_shop/plugin/commission/template/mobile/default/static/images/bg.png<%/if%>" />
     </div>
    <div class="ok">
    <div class="ico"><i class="fa fa-check"></i></div>
      <%if member.status=='1'%>
        <div class="text">您的管家申请已经审核通过！</div>
        <a href="<?php  echo $this->createMobileUrl('shop')?>}"><div class="sub">去商城逛逛</div></a>
      <%else%>
         <div class="text">您的管家申请已经提交，请等待审核！</div>
        <a href="<?php  echo $this->createMobileUrl('shop')?>"><div class="sub">去商城逛逛</div></a>
       <%/if%>
    </div>
</script>
<script language="javascript">
    require(['tpl', 'core'], function(tpl, core) {
        
        core.pjson('commission/register',{mid:"<?php  echo $mid;?>"},function(json){
           var result = json.result;
   
           if(result.member.isagent=='1'){
               $('#container').html(  tpl('tpl_ok',result) );    
               return;
           }
           $('#container').html(  tpl('tpl_main',result) );
           $('#submit').click(function(){
               if($('#realname').isEmpty()){
                   core.tip.show('请填写您的姓名!');
                   return;
               }
               if(!$('#mobile').isMobile()){
                   core.tip.show('请填写正确手机号!');
                   return;
               }
               if($('#weixin').isEmpty()){
                   core.tip.show('请填写微信号!');
                   return;
               }
               var data = {
                   'agentid':"<?php  echo $_GPC['mid'];?>",
                   'realname': $('#realname').val(),
                   'mobile': $('#mobile').val(),
                   'weixin': $('#weixin').val()
               };
               core.pjson('commission/register',data,function(pjson){
                   var result = pjson.result;
                   if(pjson.status==0){
                       core.tip.show(pjson.result);
                       return;
                   }
          
                   result.member.status = result.status;
                   $('#container').html(  tpl('tpl_ok',result) );    
                   
               },true,true);
           });
        },true);
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
