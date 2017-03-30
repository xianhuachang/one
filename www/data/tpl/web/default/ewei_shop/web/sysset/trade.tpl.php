<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/sysset/tabs', TEMPLATE_INCLUDEPATH)) : (include template('web/sysset/tabs', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" >
        <input type='hidden' name='setid' value="<?php  echo $set['id'];?>" />
        <input type='hidden' name='op' value="trade" />
        <div class="panel panel-default">
            <div class='panel-body'>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自动收货天数</label>
                    <div class="col-sm-5">
                        <?php if(cv('sysset.save.trade')) { ?>
                        <div class="input-group">
                            <input type="text" name="trade[receive]" class="form-control" value="<?php  echo $set['trade']['receive'];?>" />
                            <div class="input-group-addon">天</div>
                        </div>
                        <span class='help-block'>订单发货后，用户收货的天数，如果在期间未确认收货，系统自动完成收货，默认为9天</span>
                        <?php  } else { ?>
                        <input type="hidden" name="trade[receive]" value="<?php  echo $set['trade']['receive'];?>"/>
                        <div class='form-control-static'>
                            <?php  if(empty($set['trade']['receive'])) { ?>9<?php  } else { ?><?php  echo $set['trade']['receive'];?><?php  } ?> 天
                        </div>
                        <?php  } ?>
                    </div>
                </div>
                <?php  if($_W['isfounder']) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自动收货执行间隔时间</label>
                    <div class="col-sm-5">
                        <?php if(cv('sysset.save.trade')) { ?>
                        <div class="input-group">
                            <input type="text" name="trade[receivetime]" class="form-control" value="<?php  echo $set['trade']['receivetime'];?>" />
                            <div class="input-group-addon">分钟</div>
                        </div>
                        <span class='help-block'>执行自动收货操作的间隔时间，如果为空默认为 60分钟 执行一次自动收货</span>
                        <?php  } else { ?>
                        <input type="hidden" name="trade[receivetime]" value="<?php  echo $set['trade']['receivetime'];?>"/>
                        <div class='form-control-static'>
                            <?php  if(empty($set['trade']['receivetime'])) { ?>60<?php  } else { ?><?php  echo $set['trade']['receivetime'];?><?php  } ?> 分钟
                        </div>
                        <?php  } ?>
                    </div>
                </div>
                <?php  } ?>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">开启余额提现</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.save.trade')) { ?>
                        <label class='radio-inline'><input type='radio' name='trade[withdraw]' value='1' <?php  if($set['trade']['withdraw']==1) { ?>checked<?php  } ?>/> 开启</label>
                        <label class='radio-inline'><input type='radio' name='trade[withdraw]' value='0' <?php  if($set['trade']['withdraw']==0) { ?>checked<?php  } ?> /> 关闭</label>
                        <span class='help-block'>是否允许用户将余额提出</span>
                        <?php  } else { ?>
                        <input type="hidden" name="trade[withdraw]" value="<?php  echo $set['trade']['withdraw'];?>"/>
                        <div class='form-control-static'><?php  if($set['trade']['withdraw']==1) { ?>开启<?php  } else { ?>关闭<?php  } ?></div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">余额提现限制</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.save.trade')) { ?>
                        <input type="text" name="trade[withdrawmoney]" class="form-control" value="<?php  echo $set['trade']['withdrawmoney'];?>" />
                        <span class='help-block'>余额满多少才能提现,空或0不限制</span>
                        <?php  } else { ?>
                        <input type="hidden" name="trade[withdrawmoney]" value="<?php  echo $set['trade']['withdrawmoney'];?>"/>
                        <div class='form-control-static'>
                            <?php  if(empty($set['trade']['withdrawmoney'])) { ?>不限制<?php  } else { ?><?php  echo $set['trade']['withdrawmoney'];?> 元 <?php  } ?>
                        </div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">开启充值送钱活动</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.save.trade')) { ?>
                        <label class='radio-inline'><input type='radio' name='trade[withrecharge]' value='1' <?php  if($set['trade']['withrecharge']==1) { ?>checked<?php  } ?>/> 开启</label>
                        <label class='radio-inline'><input type='radio' name='trade[withrecharge]' value='0' <?php  if($set['trade']['withrecharge']==0) { ?>checked<?php  } ?> /> 关闭</label>
                        <span class='help-block'>是否允许充值送钱</span>
                        <?php  } else { ?>
                        <input type="hidden" name="trade[withrecharge]" value="<?php  echo $set['trade']['withrecharge'];?>"/>
                        <div class='form-control-static'><?php  if($set['trade']['withrecharge']==1) { ?>开启<?php  } else { ?>关闭<?php  } ?></div>
                        <?php  } ?>
                    </div>
                </div>                
 				 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">充值送钱活动</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.save.trade')) { ?>
                        <div class='input-group'>
                            <input type="datetime-local" name="trade[rechargestart]" class="form-control" 
                            	value="<?php  echo date('Y-m-d',$set['trade']['rechargestart']).'T'.date('H:i',$set['trade']['rechargestart']) ?>" />
                            <span class='input-group-addon'>开始时间</span>
                            <input type="datetime-local" name="trade[rechargend]" class="form-control" 
                            	value="<?php  echo date('Y-m-d',$set['trade']['rechargend']).'T'.date('H:i',$set['trade']['rechargend'])?>" />
                            <span class='input-group-addon'>结束时间</span>
                        </div>          
                        <input type="text" name="trade[rechargemoney]" class="form-control" value="<?php  echo $set['trade']['rechargemoney'];?>" />
                        <span class='help-block'>填写格式:充值金额_赠送金额(100_10)</span>
                        <?php  } else { ?>
                        <input type="hidden" name="trade[rechargestart]" value="<?php  echo $set['trade']['rechargestart'];?>"/>
                        <input type="hidden" name="trade[rechargend]" value="<?php  echo $set['trade']['rechargend'];?>"/>
                        <input type="hidden" name="trade[rechargemoney]" value="<?php  echo $set['trade']['rechargemoney'];?>"/>
                        <div class='form-control-static'>
                            <?php  if(empty($set['trade']['rechargemoney'])) { ?>不限制<?php  } else { ?><?php  echo $set['trade']['rechargemoney'];?> 元 <?php  } ?>
                        </div>
                        <?php  } ?>
                    </div>
                </div>
                <!--
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">充值积分比例</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.save.trade')) { ?>
                        <div class='input-group'>
                            <input type="text" name="trade[money]" class="form-control" value="<?php  echo $set['trade']['money'];?>" />
                            <span class='input-group-addon'>元 增加</span>
                            <input type="text" name="trade[credit]" class="form-control" value="<?php  echo $set['trade']['credit'];?>" />
                            <span class='input-group-addon'>分</span>
                        </div>
                        <span class='help-block'>用户充值获得的积分</span>
                        <?php  } else { ?>
                        <input type="hidden" name="trade[money]" value="<?php  echo $set['trade']['money'];?>"/>
                        <input type="hidden" name="trade[credit]" value="<?php  echo $set['trade']['credit'];?>"/>
                        <div class='form-control-static'>
                            <?php  if(empty($set['trade']['money'])) { ?>
                            充值无积分
                            <?php  } else { ?>
                            <?php  echo $set['trade']['money'];?> 元增加 <?php  echo $set['trade']['credit'];?> 积分
                            <?php  } ?>
                        </div>
                        <?php  } ?>
                    </div>
                </div>
			-->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">获取微信共享收货地址</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.save.trade')) { ?>
                        <label class='radio-inline'><input type='radio' name='trade[shareaddress]' value='0' <?php  if($set['trade']['shareaddress']==0) { ?>checked<?php  } ?> /> 关闭</label>
                        <label class='radio-inline'><input type='radio' name='trade[shareaddress]' value='1' <?php  if($set['trade']['shareaddress']==1) { ?>checked<?php  } ?>/> 开启</label>
                        <span class='help-block'>是否在用户添加收货地址时候获取用户的微信收货地址</span>
                        <?php  } else { ?>
                        <input type="hidden" name="trade[shareaddress]" value="<?php  echo $set['trade']['shareaddress'];?>"/>
                        <div class='form-control-static'><?php  if($set['trade']['shareaddress']==1) { ?>开启<?php  } else { ?>关闭<?php  } ?></div>
                        <?php  } ?>
                    </div>
                </div>
                
                
                       <div class="form-group"></div>
            <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                           <?php if(cv('sysset.save.trade')) { ?>
                            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"  />
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                          <?php  } ?>
                     </div>
            </div>



            </div>
        </div>     
    </form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>     