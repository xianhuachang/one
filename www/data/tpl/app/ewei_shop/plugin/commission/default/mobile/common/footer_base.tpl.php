<?php defined('IN_IA') or exit('Access Denied');?><script id='tpl_show_message' type='text/html'><div class="sweet-alert" style="display:block;">
        <%if type=='error'%><div class="icon error animateErrorIcon" style="display: block;"><span class="x-mark animateXMark"><span class="line left"></span><span class="line right"></span></span></div><%/if%>
        <%if type=='warning'%><div class="icon warning pulseWarning" style="display: block;"><span class="body pulseWarningIns"></span><span class="dot pulseWarningIns"></span></div><%/if%>
        <%if type=='success'%><div class="icon success animate" style="display: block;"><span class="line tip animateSuccessTip"></span><span class="line long animateSuccessLong"></span><div class="placeholder"></div><div class="fix"></div></div><%/if%>
        <div class="info"><%message%><%if url%><br><span>如果您的浏览器没有自动跳转请点击此处</span><%/if%></div>
        
        <div class="sub" <%if url%>onclick="location.href='<%url%>'"<%else%>history.back()<%/if%>>
        <%if type=='success'%><div class="green">确认</div><%/if%>
        <%if type=='warning'%><div class="grey">确认</div><%/if%>
        <%if type=='error'%><div class="red">确认</div><%/if%>
        </div></script>
        <?php 
        
        if (empty($_W['shopshare'])) {
        
            $set = m('common')->getSysset();
  
            $_W['shopshare'] = array(
               'title'=>empty($set['share']['title'])?$set['shop']['name']:$set['share']['title'],
               'imgUrl'=>empty($set['share']['icon'])?tomedia($set['shop']['logo']):tomedia($set['share']['icon']),
               'desc'=>empty($set['share']['desc'])?$set['shop']['description']:$set['share']['desc'] ,
               'link'=>$this->createMobileUrl('shop')
            );
             if(p('commission')){
                  $set = p('commission')->getSet();
                   if(!empty($set['level'])){
                        $openid = m('user')->getOpenid();
                        $member = m('member')->getMember($openid);
                        if(!empty($member) && $member['status']==1 && $member['isagent']==1){
                            $_W['shopshare']['link'] = $this->createMobileUrl('shop',array('mid'=>$member['id']));
                            
                            if(empty($set['become_reg']) && ( empty($member['realname']) || empty($member['mobile']))){
                                $trigger = true;
                            }
                         } 
                         else if(!empty($_GPC['mid'])){
                            $_W['shopshare']['link'] = $this->createMobileUrl('shop',array('mid'=>$_GPC['mid']));
                         }
                   }
             }
        } ?>
 <script>
    
     require(['http://res.wx.qq.com/open/js/jweixin-1.0.0.js'],function(wx){
                 window.shareData = <?php  echo json_encode($_W['shopshare'])?>;
	jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || { jsApiList:[] };
        <?php  if($trigger) { ?>
                window.shareData.trigger =function(e){
                    
                    require(['core'],function(core){
                        core.message('需要完善您的资料才能继续操作!',"<?php  echo $this->createMobileUrl('member/info',array('returnurl'=>urlencode($_W['siteurl'].$_SERVER['QUERY_STRING'])))?>",'warning');
                        return;
                    })   
                    wx.cancel();
                }
        <?php  } ?>
                  jssdkconfig.debug = false;
	jssdkconfig.jsApiList = ['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','showOptionMenu',		];
	wx.config(jssdkconfig);
	wx.ready(function () {
		wx.showOptionMenu();
		wx.onMenuShareAppMessage(window.shareData);
		wx.onMenuShareTimeline(window.shareData);
		wx.onMenuShareQQ(window.shareData);
		wx.onMenuShareWeibo(window.shareData);
	});
      });
</script>

</body>
</html>