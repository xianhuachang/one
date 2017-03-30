<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/order/tabs', TEMPLATE_INCLUDEPATH)) : (include template('web/order/tabs', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
    .main .form-horizontal .form-group{margin-bottom:0;}
    .main .form-horizontal .modal .form-group{margin-bottom:15px;}
    #modal-confirmsend .control-label{margin-top:0;}
</style>
<div class="main">
    <form class="form-horizontal form" action="" method="post" enctype="multipart/form-data" onsubmit="return formcheck(this)">
        <?php  if($item['transid']) { ?><div  class="alert alert-error"><i class="fa fa-lightbulb"></i> 此为微信支付订单，必须要提交发货状态！</div><?php  } ?>
        <input type="hidden" name="dispatchid" value="<?php  echo $dispatch['id'];?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                订单信息
            </div>
            <div class="panel-body">
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">粉丝</label>
                <div class="col-sm-9 col-xs-12">
                    <img src='<?php  echo $member['avatar'];?>' style='width:100px;height:100px;padding:1px;border:1px solid #ccc' />
                         <?php  echo $member['nickname'];?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员信息</label>
                <div class="col-sm-9 col-xs-12">
                    <div class='form-control-static'>姓名: <?php  echo $member['realname'];?> / 手机号: <?php  echo $member['mobile'];?> /微信号: <?php  echo $member['weixin'];?></div>
                </div>
            </div>
                
                <?php  if($item['transid']) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微信交易号 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $item['transid'];?></p>
                    </div>
                </div>
                <?php  } ?>
                      <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单编号 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $item['ordersn'];?> </p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单金额 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $item['price'];?> 元 （商品: <?php  echo $item['goodsprice'];?> 元 运费: <?php  echo $item['dispatchprice'];?> 元 
                            会员折扣: -<?php  echo $item['discountprice'];?>元 积分抵扣:-<?php  echo $item['deductprice'];?>元 余额抵扣:-<?php  echo $item['deductcredit2'];?>元
                            满额立减: -<?php  echo $item['deductenough'];?>元
                            )</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">配送方式 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  if(empty($item['addressid'])) { ?>
                            <?php  if($item['isverify']==1) { ?>线下核销<?php  } else { ?>自提<?php  } ?>
                            <?php  } else { ?><?php  echo $dispatch['dispatchname'];?><?php  } ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">付款方式 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static">
                            <?php  if($item['paytype'] == 0) { ?>未支付<?php  } ?>
                            <?php  if($item['paytype'] == 1) { ?>余额支付<?php  } ?>
                            <?php  if($item['paytype'] == 11) { ?>后台付款<?php  } ?>
                            <?php  if($item['paytype'] == 21) { ?>微信支付<?php  } ?>
                            <?php  if($item['paytype'] == 22) { ?>支付宝支付<?php  } ?>
                            <?php  if($item['paytype'] == 23) { ?>银联支付<?php  } ?>
                            <?php  if($item['paytype'] == 3) { ?>货到付款<?php  } ?>

                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单状态 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static">
                            <?php  if($item['status'] == 0) { ?><span class="label label-info">待付款</span><?php  } ?>
                            <?php  if($item['status'] == 1) { ?><span class="label label-info">待发货</span><?php  } ?>
                            <?php  if($item['status'] == 2) { ?><span class="label label-info">待收货</span><?php  } ?>
                            <?php  if($item['status'] == 3) { ?><span class="label label-success">已完成</span><?php  } ?>
                            <?php  if($item['status'] == -1) { ?><span class="label label-success">已关闭</span><?php  } ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">下单日期 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo date('Y-m-d H:i:s', $item['createtime'])?></p>
                    </div>
                </div>
                <?php  if($item['status']>=1) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">付款时间 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo date('Y-m-d H:i:s', $item['paytime'])?></p>
                    </div>
                </div>
                <?php  } ?>
                
                <?php  if($item['status']>=2 && $item['isverify']!=1 ) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">发货信息 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static">快递公司: <?php  echo $item['expresscom'];?>  <br/>快递单号: <?php  echo $item['expresssn'];?> <br/>发货时间: <?php  echo date('Y-m-d H:i:s', $item['sendtime'])?></p>
                    	<iframe src="<?php  echo $express_result;?>" width="100%" height="500px"></iframe>
						
                    </div>
                </div>
                <?php  } ?>
                
                <?php  if($item['status']>=3) { ?>
                <?php  if($item['isverify']==1) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">核销信息 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static">
                            消费码: <?php  echo $item['verifycode'];?><br/>
                            核销时间: <?php  echo date('Y-m-d H:i:s', $item['finishtime'])?><br/>
                        核销人:  <?php  if(empty($item['verifyopenid'])) { ?>后台核销<?php  } else { ?> <?php  $s = m('member')->getMember($item['verifyopenid'])?><?php  echo $s['nickname'];?><?php  } ?>
                        </p>
                    </div>
                </div>
                <?php  } else { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">完成时间 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo date('Y-m-d H:i:s', $item['finishtime'])?></p>
                    </div>
                </div>
                <?php  } ?>
                
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">备注 :</label>
                    <div class="col-sm-9 col-xs-12"><textarea style="height:150px;" class="form-control" name="remark" cols="70"><?php  echo $item['remark'];?></textarea></div>
                </div>
            </div>
        </div>
        <?php  if($com_set['level']>0 && count($agents)>0) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                推广员信息
            </div>
            <div class="panel-body">
                <?php  if(!empty($agents['0'])) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">推广员 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $agents[0]['nickname'];?> (<?php  echo $agents[0]['realname'];?>/<?php  echo $agents[0]['mobile'];?>)</p>
                    </div>
                </div>
                <?php  } ?>
                <?php  if(!empty($agents['1'])) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">二级推广员 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $agents[1]['nickname'];?> (<?php  echo $agents[1]['realname'];?>/<?php  echo $agents[1]['mobile'];?>)</p>
                    </div>
                </div>
                <?php  } ?>
                <?php  if(!empty($agents['2'])) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">一级推广员 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $agents[2]['nickname'];?> (<?php  echo $agents[2]['realname'];?>/<?php  echo $agents[2]['mobile'];?>)</p>
                    </div>
                </div>
                <?php  } ?>
            </div>
        </div>
        <?php  } ?>
        <?php  if(!empty($item['addressid'])) { ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              收件人信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">姓名 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $user['realname'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $user['mobile'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">地址 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $user['address'];?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php  } else if($item['isverify']==1) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
               联系人
            </div>
            <div class="panel-body">
                   <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">联系人姓名 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $user['carrier_realname'];?> </p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">联系人手机 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $user['carrier_mobile'];?>  </p>
                    </div>
                </div>
            </div>
        </div>
        <?php  } else { ?>
          <div class="panel panel-default">
            <div class="panel-heading">
               自提信息
            </div>
            <div class="panel-body">
                   <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自提人姓名 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $user['carrier_realname'];?> /  <?php  echo $user['carrier_mobile'];?></p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自提地点 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $user['address'];?> (联系人： <?php  echo $user['realname'];?> / <?php  echo $user['mobile'];?> ) </p>
                    </div>
                </div>
            </div>
        </div>
        <?php  } ?>
      
        <?php  if(!empty($refund)) { ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                退款申请
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">退款原因 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $refund['reason'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">退款说明 :</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><?php  echo $refund['content'];?></p>
                    </div>
                </div>
                <?php if(cv('order.op.refund')) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <a class="btn btn-danger btn-sm" href="javascript:;" onclick="$('#modal-refund').find(':input[name=id]').val('<?php  echo $item['id'];?>')" data-toggle="modal" data-target="#modal-refund">处理退款申请</a>
                    </div>
                </div> 
                <?php  } ?>

            </div>
        </div>
        <?php  } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                商品信息</span>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                        <tr>
                            <th style="width:5%;">ID</th>
                            <th style="width:10%;">商品标题</th>
                            <th style="width:15%;">商品规格</th>
                            <th style="width:10%;">商品编号</th>
                            <th style="width:10%;">商品条码</th>
                       
                            <th style="width:20%;">现价/原价/成本价</th>
                            <th style="width:10%;">属性</th>
                            <th style="width:5%;">购买数量</th>
                            <th style="width:10%;color:red;">折扣前/折扣后</th>
                            
                            <th style="width:10%;">操作</th>
                        </tr>
                    </thead>
                    <?php  if(is_array($item['goods'])) { foreach($item['goods'] as $goods) { ?>
                    <tr>
                        <td><?php  echo $goods['id'];?></td>
                        <td>
                            <?php  if($category[$goods['pcate']]['name']) { ?>
                            <span class="text-error">[<?php  echo $category[$goods['pcate']]['name'];?>] </span><?php  } ?><?php  if($children[$goods['pcate']][$goods['ccate']]['1']) { ?>
                            <span class="text-info">[<?php  echo $children[$goods['pcate']][$goods['ccate']]['1'];?>] </span>
                            <?php  } ?>
                            <?php  echo $goods['title'];?>
                        </td>
                        <td><span class="label label-info"><?php  echo $goods['optionname'];?></span></td>
                        <td><?php  echo $goods['goodssn'];?></td>
                        <td><?php  echo $goods['productsn'];?></td>
                        <td><?php  echo $goods['marketprice'];?>元 / <?php  echo $goods['productprice'];?>元 / <?php  echo $goods['costprice'];?>元</td>
                        <td><?php  if($goods['status']==1) { ?><span class="label label-success">上架</span><?php  } else { ?><span class="label label-error">下架</span><?php  } ?>&nbsp;<span class="label label-info"><?php  if($goods['type'] == 1) { ?>实体商品<?php  } else { ?>虚拟商品<?php  } ?></span></td>
                        <td><?php  echo $goods['total'];?></td>
                        <td style='color:red;font-weight:bold;'><?php  echo $goods['orderprice'];?>/<?php  echo $goods['realprice'];?></td>
                        <td>  
                            <a href="<?php  echo $this->createWebUrl('shop/goods', array('id' => $goods['id'], 'op' => 'post'))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="编辑"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                        </td>
                    </tr>
                    <?php  } } ?>
                    <tr>
                        <td colspan="10">
                            
                           <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/order/ops', TEMPLATE_INCLUDEPATH)) : (include template('web/order/ops', TEMPLATE_INCLUDEPATH));?>
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/order/modals', TEMPLATE_INCLUDEPATH)) : (include template('web/order/modals', TEMPLATE_INCLUDEPATH));?>

<script language='javascript'>
    $(function (){
    <?php  if(!empty($express)) { ?>
        $("#express").find("option[data-name='<?php  echo $express['express_name'];?>']").attr("selected", true);
        $("#expresscom").val($("#express").find("option:selected").attr("data-name"));
        <?php  } ?>
                $("#express").change(function () {
            var obj = $(this);
            var sel = obj.find("option:selected").attr("data-name");
            $("#expresscom").val(sel);
        });
    })
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>
