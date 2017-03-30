<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">购买强制关注</label>
    <div class="col-sm-6 col-xs-6">
        <?php if( ce('shop.goods' ,$item) ) { ?>
        <label class="radio-inline"><input type="radio" name="needfollow" value="0" <?php  if(empty($item['needfollow']) ) { ?>checked="true"<?php  } ?>  /> 不需关注</label>
        <label class="radio-inline"><input type="radio" name="needfollow" value="1" <?php  if($item['needfollow'] == 1) { ?>checked="true"<?php  } ?>   /> 必须关注</label>
           <?php  } else { ?>
           <div class='form-control-static'><?php  if(empty($item['needfollow'])) { ?>不需关注<?php  } else { ?>必须关注<?php  } ?></div>
         <?php  } ?>
    </div>
</div>   
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">未关注提示</label>
    <div class="col-sm-6 col-xs-6">
        <?php if( ce('shop.goods' ,$item) ) { ?>
            <input type='text' class="form-control" name='followtip' value='<?php  echo $item['followtip'];?>' />
           <span  class='help-block'>购买商品必须关注，如果未关注，弹出的提示，如果为空默认为“如果您想要购买此商品，需要您关注我们的公众号，点击【确定】关注后再来购买吧~”</span>
           <?php  } else { ?>
           <div class='form-control-static'><?php  echo $item['followtip'];?></div>
         <?php  } ?>
    </div>
</div>    

<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">关注引导</label>
    <div class="col-sm-6 col-xs-6">
        <?php if( ce('shop.goods' ,$item) ) { ?>
            <input type='text' class="form-control" name='followurl' value='<?php  echo $item['followurl'];?>' />
           <span  class='help-block'>购买商品必须关注，如果未关注，跳转的连接，如果为空默认为系统关注页</span>
           <?php  } else { ?>
           <div class='form-control-static'><?php  echo $item['followurl'];?></div>
         <?php  } ?>
    </div>
</div>    


<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">货到付款</label>
    <div class="col-sm-6 col-xs-6">
        <?php if( ce('shop.goods' ,$item) ) { ?>
        <label class="radio-inline"><input type="radio" name="cash" value="1" <?php  if(empty($item['cash']) || $item['cash'] == 1) { ?>checked="true"<?php  } ?>  /> 不支持</label>
        <label class="radio-inline"><input type="radio" name="cash" value="2" <?php  if($item['cash'] == 2) { ?>checked="true"<?php  } ?>   /> 支持</label>
           <?php  } else { ?>
           <div class='form-control-static'><?php  if(empty($item['cash']) || $item['cash'] == 1) { ?>不支持<?php  } else { ?>支持<?php  } ?></div>
         <?php  } ?>
    </div>
</div>   
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员等级浏览权限</label>
    <div class="col-sm-9 col-xs-12 chks">
           <?php if( ce('shop.goods' ,$item) ) { ?>
       <label class="checkbox-inline">
           <input type="checkbox" class='chkall' name="showlevels" value="" <?php  if($item['showlevels']=='') { ?>checked="true"<?php  } ?>  /> 全部会员等级
       </label>
       <label class="checkbox-inline">
           <input type="checkbox" class='chksingle' name="showlevels[]" value="0" <?php  if($item['showlevels']!='' && is_array($item['showlevels']) && in_array('0', $item['showlevels'])) { ?> checked="true"<?php  } ?>  />  <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>
       </label>
       <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
          <label class="checkbox-inline">
           <input type="checkbox" class='chksingle' name="showlevels[]" value="<?php  echo $level['id'];?>" <?php  if($item['showlevels']!='' && is_array($item['showlevels'])  && in_array($level['id'], $item['showlevels'])) { ?>checked="true"<?php  } ?>  /> <?php  echo $level['levelname'];?>
          </label>
       <?php  } } ?>
       <?php  } else { ?>
       <div class='form-control-static'>
           <?php  if($item['showlevels']=='') { ?>
              全部会员等级
           <?php  } else { ?>
           <?php  if($item['showlevels']!='' && is_array($item['showlevels']) && in_array('0', $item['showlevels'])) { ?>
              <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>; 
           <?php  } ?>
           <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
                   <?php  if($item['showlevels']!='' && is_array($item['showlevels'])  && in_array($level['id'], $item['showlevels'])) { ?>
                      <?php  echo $level['levelname'];?>; 
                   <?php  } ?>
            <?php  } } ?>
       <?php  } ?>
       </div>
       
       <?php  } ?>
    </div>
</div>   
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员等级购买权限</label>
    <div class="col-sm-9 col-xs-12 chks" >
              <?php if( ce('shop.goods' ,$item) ) { ?>
              
       <label class="checkbox-inline">
           <input type="checkbox" class='chkall' name="buylevels" value="" <?php  if($item['buylevels']=='' ) { ?>checked="true"<?php  } ?>  /> 全部会员等级
       </label>
       <label class="checkbox-inline">
           <input type="checkbox" class='chksingle'  name="buylevels[]" value="0" <?php  if($item['buylevels']!='' && is_array($item['buylevels'])  && in_array('0', $item['buylevels'])) { ?>checked="true"<?php  } ?>  />  <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>
       </label>
       <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
          <label class="checkbox-inline">
           <input type="checkbox" class='chksingle'  name="buylevels[]" value="<?php  echo $level['id'];?>" <?php  if($item['buylevels']!='' && is_array($item['buylevels']) && in_array($level['id'], $item['buylevels']) ) { ?>checked="true"<?php  } ?>  /> <?php  echo $level['levelname'];?>
          </label>
       <?php  } } ?>
            <?php  } else { ?>
       <div class='form-control-static'>
           <?php  if($item['buylevels']=='') { ?>
              全部会员等级
           <?php  } else { ?>
           <?php  if($item['buylevels']!='' && is_array($item['buylevels']) && in_array('0', $item['buylevels'])) { ?>
              <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>; 
           <?php  } ?>
           <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
                   <?php  if($item['buylevels']!='' && is_array($item['buylevels'])  && in_array($level['id'], $item['buylevels'])) { ?>
                      <?php  echo $level['levelname'];?>; 
                   <?php  } ?>
            <?php  } } ?>
       <?php  } ?>
       </div>
       
       <?php  } ?>
       
       
    </div>
</div>   
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员组浏览权限</label>
    <div class="col-sm-9 col-xs-12 chks" >
            <?php if( ce('shop.goods' ,$item) ) { ?>
       <label class="checkbox-inline">
           <input type="checkbox" class='chkall' name="showgroups" value="" <?php  if($item['showgroups']=='' ) { ?>checked="true"<?php  } ?>  /> 全部会员组
       </label>
       <label class="checkbox-inline">
           <input type="checkbox" class='chksingle'  name="showgroups[]" value="0" <?php  if($item['showgroups']!='' && is_array($item['showgroups']) && in_array('0', $item['showgroups'])) { ?>checked="true"<?php  } ?>  /> 无分组
       </label>
       <?php  if(is_array($groups)) { foreach($groups as $group) { ?>
          <label class="checkbox-inline">
           <input type="checkbox" class='chksingle'  name="showgroups[]" value="<?php  echo $group['id'];?>" <?php  if($item['showgroups']!=''  && in_array($group['id'], $item['showgroups']) && is_array($item['showgroups'])) { ?>checked="true"<?php  } ?>  /> <?php  echo $group['groupname'];?>
          </label>
       <?php  } } ?>
       
          <?php  } else { ?>
       <div class='form-control-static'>
           <?php  if($item['showgroups']=='') { ?>
              全部会员等级
           <?php  } else { ?>
           <?php  if($item['showgroups']!='' && is_array($item['showgroups']) && in_array('0', $item['showgroups'])) { ?>
              <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>; 
           <?php  } ?>
           <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
                   <?php  if($item['showgroups']!='' && is_array($item['showgroups'])  && in_array($level['id'], $item['showgroups'])) { ?>
                      <?php  echo $level['levelname'];?>; 
                   <?php  } ?>
            <?php  } } ?>
       <?php  } ?>
       </div>
       
       <?php  } ?>
       
    </div>
</div>   

<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员组购买权限</label>
    <div class="col-sm-9 col-xs-12 chks" >
            <?php if( ce('shop.goods' ,$item) ) { ?>
       <label class="checkbox-inline">
           <input type="checkbox" class='chkall' name="buygroups" value="" <?php  if($item['buygroups']=='' ) { ?>checked="true"<?php  } ?>  /> 全部会员组
       </label>
       <label class="checkbox-inline">
           <input type="checkbox" class='chksingle'  name="buygroups[]" value="0" <?php  if($item['buygroups']!=''  && is_array($item['buygroups']) && in_array('0', $item['buygroups'])) { ?>checked="true"<?php  } ?>  />  无分组
       </label>
       <?php  if(is_array($groups)) { foreach($groups as $group) { ?>
          <label class="checkbox-inline">
           <input type="checkbox" class='chksingle'  name="buygroups[]" value="<?php  echo $group['id'];?>" <?php  if($item['buygroups']!='' &&  is_array($item['buygroups']) && in_array($group['id'], $item['buygroups']) ) { ?>checked="true"<?php  } ?>  /> <?php  echo $group['groupname'];?>
          </label>
       <?php  } } ?>
          <?php  } else { ?>
       <div class='form-control-static'>
           <?php  if($item['buygroups']=='') { ?>
              全部会员等级
           <?php  } else { ?>
           <?php  if($item['buygroups']!='' && is_array($item['buygroups']) && in_array('0', $item['buygroups'])) { ?>
              <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>; 
           <?php  } ?>
           <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
                   <?php  if($item['buygroups']!='' && is_array($item['buygroups'])  && in_array($level['id'], $item['buygroups'])) { ?>
                      <?php  echo $level['levelname'];?>; 
                   <?php  } ?>
            <?php  } } ?>
       <?php  } ?>
       </div>
       
       <?php  } ?>
       
    </div>
</div>   

<div class="form-group notice">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家通知</label>
                    <div class="col-sm-4">
                        
                        
                            <?php if( ce('shop.goods' ,$item) ) { ?>
                            
                        <input type='hidden' id='noticeopenid' name='noticeopenid' value="<?php  echo $item['noticeopenid'];?>" />
                        <div class='input-group'>
                            <input type="text" name="saler" maxlength="30" value="<?php  if(!empty($saler)) { ?><?php  echo $saler['nickname'];?>/<?php  echo $saler['realname'];?>/<?php  echo $saler['mobile'];?><?php  } ?>" id="saler" class="form-control" readonly />
                            <div class='input-group-btn'>
                                <button class="btn btn-default" type="button" onclick="popwin = $('#modal-module-menus-notice').modal();">选择通知人</button>
                                <button class="btn btn-danger" type="button" onclick="$('#noticeopenid').val('');$('#saler').val('');$('#saleravatar').hide()">清除选择</button>
                            </div> 
                        </div>
                        <span id="saleravatar" class='help-block' <?php  if(empty($saler)) { ?>style="display:none"<?php  } ?>><img  style="width:100px;height:100px;border:1px solid #ccc;padding:1px" src="<?php  echo $saler['avatar'];?>"/></span>
                        <span class="help-block">单品下单通知，可制定某个用户，通知商品下单备货通知,如果商品为同一商家，建议使用系统统一设置</span>
                        
                        <div id="modal-module-menus-notice"  class="modal fade" tabindex="-1">
                            <div class="modal-dialog" style='width: 920px;'>
                                <div class="modal-content">
                                    <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择通知人</h3></div>
                                    <div class="modal-body" >
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="keyword" value="" id="search-kwd-notice" placeholder="请输入粉丝昵称/姓名/手机号" />
                                                <span class='input-group-btn'><button type="button" class="btn btn-default" onclick="search_members();">搜索</button></span>
                                            </div>
                                        </div>
                                        <div id="module-menus-notice" style="padding-top:5px;"></div>
                                    </div>
                                    <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
                                </div>

                            </div>
                        </div>
                        <?php  } else { ?>
                        <div class='form-control-static'>
                            <?php  if(!empty($saler)) { ?><img  style="width:100px;height:100px;border:1px solid #ccc;padding:1px" src="<?php  echo $saler['avatar'];?>"/><?php  } else { ?>无<?php  } ?>
                         </div>
                        <?php  } ?>
                    </div>
                </div>
 <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">通知方式</label>
        <div class="col-sm-9 col-xs-12">
            
                            <?php if( ce('shop.goods' ,$item) ) { ?>
            <label class="radio-inline">
                <input type="radio" value="0" name='noticetype' <?php  if(empty($item['noticetype'])) { ?>checked<?php  } ?> /> 下单通知
            </label>
            <label class="radio-inline">
                <input type="radio" value="1" name='noticetype' <?php  if($item['noticetype']==1) { ?>checked<?php  } ?> /> 付款通知
            </label>
            <div class="help-block">通知商家方式</div>
         <?php  } else { ?>
           <div class='form-control-static'><?php  if(empty($item['noticetype'])) { ?>下单通知<?php  } else { ?>付款通知<?php  } ?></div>
         <?php  } ?>
        </div>
    </div>

<script language='javascript'>
    $('.chkall').click(function(){
        var checked =$(this).get(0).checked;
        if(checked) {
            $(this).closest('div').find(':checkbox[class!="chkall"]').removeAttr('checked');
        }
    });
    $('.chksingle').click(function(){
         $(this).closest('div').find(':checkbox[class="chkall"]').removeAttr('checked');
    })
    
         function search_members() {
             if( $.trim($('#search-kwd-notice').val())==''){
                 Tip.focus('#search-kwd-notice','请输入关键词');
                 return;
             }
		$("#module-menus-notice").html("正在搜索....")
		$.get('<?php  echo $this->createWebUrl('member/query')?>', {
			keyword: $.trim($('#search-kwd-notice').val())
		}, function(dat){
			$('#module-menus-notice').html(dat);
		});
	}
	function select_member(o) {
		$("#noticeopenid").val(o.openid);
                                $("#saleravatar").show();
                                 $("#saleravatar").find('img').attr('src',o.avatar);
		$("#saler").val( o.nickname+ "/" + o.realname + "/" + o.mobile );
		$("#modal-module-menus-notice .close").click();
	}
        
    </script>
