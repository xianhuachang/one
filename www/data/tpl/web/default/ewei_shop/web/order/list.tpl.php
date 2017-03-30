<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/order/tabs', TEMPLATE_INCLUDEPATH)) : (include template('web/order/tabs', TEMPLATE_INCLUDEPATH));?>
<style type='text/css'>
       .trhead td {  background:#efefef;text-align: center}
       .trbody td {  text-align: center; vertical-align:top;border-left:1px solid #ccc;}
</style>
<div class="panel panel-default">
    <div class="panel-body">
        <form action="./index.php" method="get" class="form-horizontal" role="form" id="form1">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="ewei_shop" />
            <input type="hidden" name="do" value="order" />
            <input type="hidden" name="status" value="<?php  echo $status;?>" />
            <input type="hidden" name="agentid" value="<?php  echo $_GPC['agentid'];?>" />
            <input type="hidden" name="refund" value="<?php  echo $_GPC['refund'];?>" />  
            <div class="form-group">
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <div class='input-group'>
                        <div class='input-group-addon'>订单号</div>
                        <input class="form-control" name="keyword" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="订单号">
                        <div class='input-group-addon'>快递单号</div>
                        <input class="form-control" name="expresssn" type="text" value="<?php  echo $_GPC['expresssn'];?>" placeholder="快递单号">
                        <div class='input-group-addon'>用户信息</div>
                        <input class="form-control" name="member" type="text" value="<?php  echo $_GPC['member'];?>" placeholder="用户手机号/姓名/昵称, 收件人姓名/手机号 ">
                        <div class='input-group-addon'>支付方式</div>
                        <select name="paytype" class="form-control">
                            <option value="" <?php  if($_GPC['paytype']=='') { ?>selected<?php  } ?>>不限</option>
                            <?php  if(is_array($paytype)) { foreach($paytype as $key => $type) { ?>
                            <option value="<?php  echo $key;?>" <?php  if($_GPC['paytype'] == "$key") { ?> selected="selected" <?php  } ?>><?php  echo $type['name'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>
            </div> 
            <div class="form-group">

                <div class="col-sm-6">

                    <div class='input-group'>

                        <div class='input-group-addon'>下单时间
                            <label class='radio-inline' style='margin-top:-7px;'>
                                <input type='radio' value='0' name='searchtime' <?php  if($_GPC['searchtime']=='0') { ?>checked<?php  } ?>>不搜索
                            </label>
                            <label class='radio-inline'  style='margin-top:-7px;'>
                                <input type='radio' value='1' name='searchtime' <?php  if($_GPC['searchtime']=='1') { ?>checked<?php  } ?>>搜索
                            </label>
                        </div>
                        <?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d H:i', $endtime)),true);?>


                    </div>
                </div>

                <?php  if(!empty($agentid) && $level>0) { ?>   
                <div class="col-sm-3">
                    <div class='input-group'>
                        <div class='input-group-addon'>推广订单级数</div>
                        <select name="olevel" class="form-control">
                            <option value="" >不限</option>
                            <option value="1" <?php  if($_GPC['olevel'] ==1) { ?> selected="selected" <?php  } ?>>一级订单</option>
                            <option value="2" <?php  if($_GPC['olevel'] ==2) { ?> selected="selected" <?php  } ?>>二级订单</option>
                            <option value="3" <?php  if($_GPC['olevel'] ==3) { ?> selected="selected" <?php  } ?>>三级订单</option>
                        </select>
                    </div>    </div>
                <?php  } ?>

            </div>

            <div class="form-group">

                <div class="col-sm-7 col-lg-9 col-xs-12">
                    <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    <button type="submit" name="export" value="1" class="btn btn-primary">导出 Excel</button>
                </div>
            </div>
     
        </form>
    </div>
</div>

 
        <table class='table' style='float:left;border:1px solid #ccc;margin-bottom:5px;table-layout: fixed'>
                <tr class='trhead'>
                    <td colspan='2'  style='text-align:left;'>订单数: <?php  echo $total;?> 订单金额: <?php  echo $totalmoney;?></td>
                    <td >规格及编码</td>
                    <td >单价(元)</td>
                    <td >数量</td>
                    <td >买家</td>
                    <td >支付方式</td>
                    <td>配送方式</td>
                    <td >价格</td>             
                    <td  >状态</td>
                    <td>操作</td>
                </tr>
            </table>
          
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
  <table class='table' style='float:left;border:1px solid #ccc;margin-top:5px;margin-bottom:5px;table-layout: fixed'>
                <tr >
                    <td colspan='10'  style='border-bottom:1px solid #ccc;background:#efefef;' > 
                        <b>订单编号:</b>  <label class='label label-danger'><?php  echo $item['ordersn'];?></label>     
                        <b>下单时间:  </b><label class='label label-info'><?php  echo date('Y-m-d H:i:s', $item['createtime'])?></label>     
                         <?php  if(!empty($item['refundid'])) { ?><label class='label label-danger'>退款申请</label><?php  } ?>  
                         <b>发货类型:  </b><label class='label label-success'><?php  if($item['delivertype']==1) { ?>整批发货<?php  } else { ?>分批发货<?php  } ?></label>
                    <td style='border-bottom:1px solid #ccc;background:#efefef;text-align: center' >
                          <?php  if(empty($item['statusvalue'])) { ?>
                           <?php if(cv('order.op.close')) { ?>
                                  <button type="button" class="btn btn-default  btn-sm" data-toggle="modal" data-target="#modal-close">关闭订单</button>
                            <?php  } ?>
                            <?php  } ?>
                    </td>
                         
                </tr> 


                <?php  if(is_array($item['goods'])) { foreach($item['goods'] as $k => $g) { ?>
                <tr class='trbody'>
                    <td valign='top'  colspan='2' style='border-left:none;text-align: left;' style='width:200px;' >
                        <img src="<?php  echo tomedia($g['thumb'])?>" style="width: 50px; height: 50px;border:1px solid #ccc;padding:1px;"> 
                        <?php  echo $g['title'];?> </td>
                    <td style='border-left:none'><?php  if(!empty($g['optiontitle'])) { ?><span class="label label-primary"><?php  echo $g['optiontitle'];?></span><?php  } ?>
                        <br/><?php  echo $g['goodssn'];?></td>
                    <td style='border-left:none'>原价: <?php  echo $g['price']/$g['total']?> <br/>折后: <?php  echo $g['realprice']/$g['total']?></td>
                    <td style='border-left:none'><?php  echo $g['total'];?></td>
                    <?php  if($k==0) { ?>
                    <td rowspan="<?php  echo count($item['goods'])?>" > <?php  echo $item['realname'];?><br/><?php  echo $item['mobile'];?></td>
                    <td rowspan="<?php  echo count($item['goods'])?>" ><label class='label label-<?php  echo $item['css'];?>'><?php  echo $item['paytype'];?></label></td>
                    <td  rowspan="<?php  echo count($item['goods'])?>"><?php  echo $item['dispatchname'];?></td>
                    <td style='text-align:right;'  rowspan="<?php  echo count($item['goods'])?>"><?php  echo $item['price'];?> 元<br/>运费: <?php  echo $item['dispatchprice'];?> 元
                          <?php  if($item['deductprice']>0) { ?>
                    <br/>积分抵扣: <?php  echo $item['deductprice'];?> 元
                    <?php  } ?>
                    <?php  if($item['deductcredit2']>0) { ?>
                    <br/>余额抵扣: <?php  echo $item['deductcredit2'];?> 元
                    <?php  } ?>
                     <?php  if($item['deductenough']>0) { ?>
                    <br/>满额立减: <?php  echo $item['deductenough'];?> 元
                    <?php  } ?>
                    </td>
                    <td   rowspan="<?php  echo count($item['goods'])?>" ><label class='label label-<?php  echo $item['statuscss'];?>'><?php  echo $item['status'];?></label><br />
                    <a href="<?php  echo $this->createWebUrl('order', array('op' => 'detail', 'id' => $item['id']))?>" >查看详情</a></td>
 <td   rowspan="<?php  echo count($item['goods'])?>" >
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/order/ops', TEMPLATE_INCLUDEPATH)) : (include template('web/order/ops', TEMPLATE_INCLUDEPATH));?>
 
 
 </td>
            <?php  } ?> 
                                                                                                                  </tr>
                                                                                                                  <?php  } } ?>
   </table>

                                                                                                                  <?php  } } ?>
                                                              
                 
                    <?php  echo $pager;?>
         <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/order/modals', TEMPLATE_INCLUDEPATH)) : (include template('web/order/modals', TEMPLATE_INCLUDEPATH));?>
        <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>
