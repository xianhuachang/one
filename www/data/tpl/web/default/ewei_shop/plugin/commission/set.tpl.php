<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('tabs', TEMPLATE_INCLUDEPATH)) : (include template('tabs', TEMPLATE_INCLUDEPATH));?>
<form id="setform"  action="" method="post" class="form-horizontal form">
    <div class='panel panel-default'>
           <div class='panel-heading'>
            推广等级设置
        </div>
        <div class='panel-body'>

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">推广等级</label>
                <div class="col-sm-9 col-xs-12">
                    <select  class="form-control" name="setdata[level]">
                        <option value="0" <?php  if(empty($set['level'])) { ?>selected<?php  } ?>>不开启推广机制</option>
                        <option value="1" <?php  if($set['level']==1) { ?>selected<?php  } ?>>一级推广</option>
                        <option value="2" <?php  if($set['level']==2) { ?>selected<?php  } ?> >二级推广</option>
                        <option value="3" <?php  if($set['level']==3) { ?>selected<?php  } ?> >三级推广</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                <div class="col-sm-9 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-addon">一级推广</div>
                        <input type="text" name="setdata[commission1]" class="form-control" value="<?php  echo $set['commission1'];?>"  />
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                <div class="col-sm-9 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-addon">二级推广</div>
                        <input type="text" name="setdata[commission2]" class="form-control" value="<?php  echo $set['commission2'];?>"  />
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                <div class="col-sm-9 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-addon">三级推广</div>
                        <input type="text" name="setdata[commission3]" class="form-control" value="<?php  echo $set['commission3'];?>"  />
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class='panel-heading'>
            推广设置
        </div>
        <div class='panel-body'>
           <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">成为下线条件</label>
                <div class="col-sm-9 col-xs-12">
                    <label class="radio-inline"><input type="radio"  name="setdata[become_child]" value="0" <?php  if($set['become_child'] ==0) { ?> checked="checked"<?php  } ?> /> 首次点击分享连接</label>
                    <label class="radio-inline"><input type="radio"  name="setdata[become_child]" value="1" <?php  if($set['become_child'] ==1) { ?> checked="checked"<?php  } ?> /> 首次下单</label>
                    <label class="radio-inline"><input type="radio"  name="setdata[become_child]" value="2" <?php  if($set['become_child'] ==2) { ?> checked="checked"<?php  } ?> /> 首次付款</label>
                    <span class='help-block'>首次点击分享连接： 可以自由设置推广商条件</span>
                    <span class='help-block'>首次下单/首次付款： 无条件不可用</span>
                </div>
               </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">成为推广商条件</label>
                <div class="col-sm-9 col-xs-12">
                    <label class="radio-inline"><input type="radio"  name="setdata[become]" value="0" <?php  if($set['become'] ==0) { ?> checked="checked"<?php  } ?> /> 无条件</label>
                </div>
            </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-6">
                         <div class='input-group'>
                            <div class='input-group-addon'><label class="radio-inline" style='margin-top:-3px;'><input type="radio"  name="setdata[become]" value="2" <?php  if($set['become'] == 2) { ?> checked="checked"<?php  } ?> /> 消费达到</label></div>
                            <input type='text' class='form-control' name='setdata[become_ordercount]' value="<?php  echo $set['become_ordercount'];?>" />
                            <div class='input-group-addon'>次</div>
                        </div>
                    </div>
                </div>
      

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-6">
                          <div class='input-group'>
                            <div class='input-group-addon'><label class="radio-inline" style='margin-top:-3px;'><input type="radio"  name="setdata[become]" value="3" <?php  if($set['become'] == 3) { ?> checked="checked"<?php  } ?> /> 消费达到</label></div>
                            <input type='text' class='form-control' name='setdata[become_moneycount]' value="<?php  echo $set['become_moneycount'];?>" />
                            <div class='input-group-addon'>元</div>
                        </div>
                    </div>
                </div>
      <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                <div class="col-sm-9 col-xs-12">
                    <label class="radio-inline"><input type="radio"  name="setdata[become_order]" value="0" <?php  if($set['become_order'] ==0) { ?> checked="checked"<?php  } ?> /> 付款后</label>
                    <label class="radio-inline"><input type="radio"  name="setdata[become_order]" value="1" <?php  if($set['become_order'] ==1) { ?> checked="checked"<?php  } ?> /> 完成后</label>
                    <span class="help-block">推广商提交订单统计的条件</span>
                </div>
           </div>
           <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">推广商必须完善资料</label>
                <div class="col-sm-9 col-xs-12">
                    <label class="radio-inline"><input type="radio"  name="setdata[become_reg]" value="0" <?php  if($set['become_reg'] ==0) { ?> checked="checked"<?php  } ?> /> 需要</label>
                    <label class="radio-inline"><input type="radio"  name="setdata[become_reg]" value="1" <?php  if($set['become_reg'] ==1) { ?> checked="checked"<?php  } ?> /> 不需要</label>
                    <span class="help-block">推广商在推广或提现时是否必须完善资料</span>
                </div>
           </div>
           <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">成为推广商是否需要审核</label>
                <div class="col-sm-9 col-xs-12">
                    <label class="radio-inline"><input type="radio"  name="setdata[become_check]" value="0" <?php  if($set['become_check'] ==0) { ?> checked="checked"<?php  } ?> /> 需要</label>
                    <label class="radio-inline"><input type="radio"  name="setdata[become_check]" value="1" <?php  if($set['become_check'] ==1) { ?> checked="checked"<?php  } ?> /> 不需要</label>
                    <span class="help-block">以上条件达到后，是否需要审核才能成为真正的推广商</span>
                </div>
           </div>
            
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">提现额度</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" name="setdata[withdraw]" class="form-control" value="<?php  echo $set['withdraw'];?>"  />
                    <span class="help-block">当前代理的佣金达到此额度时才能提现</span>
                </div>
            </div>
               <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">结算天数</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" name="setdata[settledays]" class="form-control" value="<?php  echo $set['settledays'];?>"  />
                    <span class="help-block">当订单完成后的n天后，佣金才能申请提现</span>
                </div>
            </div>
          <!-- <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">推广等级说明连接</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" name="setdata[levelurl]" class="form-control" value="<?php  echo $set['levelurl'];?>"  />
                    <span class="help-block">推广等级说明连接</span>
                </div>
            </div>
             <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">推广商自选商品</label>
                <div class="col-sm-9 col-xs-12">
                    <label class="radio-inline"><input type="radio"  name="setdata[select_goods]" value="0" <?php  if($set['select_goods'] ==0) { ?> checked="checked"<?php  } ?> /> 关闭</label>
                    <label class="radio-inline"><input type="radio"  name="setdata[select_goods]" value="1" <?php  if($set['select_goods'] ==1) { ?> checked="checked"<?php  } ?> /> 开启</label>
                    <span class="help-block">是否允许推广商自己的小店选择自己推广的产品,如果开启自选后，要单独禁用某个推广商的自选权限，请到推广商管理中设置</span>
                </div> 
           </div>
           -->
        </div>
     <!--
        <div class='panel-heading'>
            样式设置
        </div>-->
        <div class='panel-body'>
       <!-- <div class="form-group">
	        <label class="col-xs-12 col-sm-3 col-md-2 control-label">模板选择</label>
	        <div class="col-sm-9 col-xs-12">
	            <select class='form-control' name='setdata[style]'>
	                <?php  if(is_array($styles)) { foreach($styles as $style) { ?>
	                <option value='<?php  echo $style;?>' <?php  if($style==$set['style']) { ?>selected<?php  } ?>><?php  echo $style;?></option>
	                <?php  } } ?>
	            </select>
	        </div>
	    </div>-->
     <div class="form-group">
              <!--  <label class="col-xs-12 col-sm-3 col-md-2 control-label">默认级别名称</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" name="setdata[levelname]" class="form-control" value="<?php echo empty($set['levelname'])?'普通等级':$set['levelname']?>"  />
                    <span class="help-block">推广商默认等级名称，不填写默认“普通等级”</span>
                </div>
            </div>
              <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">按钮文字</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" name="setdata[buttontext]" class="form-control" value="<?php echo empty($set['buttontext'])?'我要推广':$set['buttontext']?>"  />
                    <span class="help-block">商品详情页面“我要推广”按钮文字,建议使用4个汉字</span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">注册面头部图片</label>
                <div class="col-sm-9 col-xs-12">
                    <?php  echo tpl_form_field_image('setdata[regbg]',$set['regbg'],'../addons/ewei_shop/plugin/commission/template/mobile/default/static/images/bg.png')?>
                </div>
            </div>
           -->
      
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
            <div class="col-sm-9">
                <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" onclick='return formcheck()' />
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            </div>
        </div>
        
        </div>
        
    </div>
</form>
<script language='javascript'>
    function formcheck(){
        var become_child =$(":radio[name='setdata[become_child]']:checked").val();
        if( become_child=='1'  || become_child=='2' ){
            if( $(":radio[name='setdata[become]']:checked").val() =='0'){
              alert('成为下线条件选择了首次下单/首次付款，成为推广商条件不能选择无条件!')   ;
              return false;
            }
        }
        return true;
    }
    </script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>