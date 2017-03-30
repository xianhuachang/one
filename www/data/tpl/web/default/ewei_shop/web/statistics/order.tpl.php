<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/statistics/tabs', TEMPLATE_INCLUDEPATH)) : (include template('web/statistics/tabs', TEMPLATE_INCLUDEPATH));?>
 
<div class="panel panel-info">
    <div class="panel-heading">按时间查询订单数和订单金额</div>
    <div class="panel-body">

        <form action="./index.php" method="get" class="form-horizontal"  id="form1">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="ewei_shop" />
            <input type="hidden" name="do" value="statistics" />
            <input type="hidden" name="p"  value="order" />

            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员名</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <input name="realname" type="text"  class="form-control" value="<?php  echo $_GPC['realname'];?>">
                </div>
            </div>
            
             <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">收货人</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <input name="addressname" type="text"  class="form-control" value="<?php  echo $_GPC['addressname'];?>">
                </div>
            </div>
             
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">订单号</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <input name="ordersn" type="text"  class="form-control" value="<?php  echo $_GPC['ordersn'];?>">
                </div>
            </div>
             
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">订单时间</label>
                  <div class="col-sm-1">
                            <label class="radio-inline">
                                <input type="radio" name="searchtime" value="0" <?php  if(empty($_GPC['searchtime'])) { ?>checked<?php  } ?>>不搜索
                            </label> 
                             <label class="radio-inline">
                                <input type="radio" name="searchtime" value="1" <?php  if(!empty($_GPC['searchtime'])) { ?>checked<?php  } ?>>搜索
                            </label>
                </div>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                        <?php  echo tpl_form_field_daterange('datetime', array('starttime'=>date('Y-m-d H:i',$starttime),'endtime'=>date('Y-m-d H:i',$endtime)), true)?>
                </div>
            </div>
           
            
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <button class="btn btn-default" ><i class="fa fa-search"></i> 搜索</button>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    <?php  if('statistics.export.order') { ?>
                    <button type="submit" name="export" value="1" class="btn btn-primary">导出 Excel</button>
                    <?php  } ?>
                </div>

            </div>

        </form>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
       共计 <span style="color:red; "><?php  echo $totalcount;?></span> 个订单 , 金额共计 <span style="color:red; "><?php  echo $totalmoney;?></span> 元
    </div>
    <div class="panel-body">
  <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th>订单号</th>
                    <th>总金额</th>
                    <th>商品金额</th>
                    <th>运费</th>
                    <th>付款方式</th>
                    <th>会员名称</th>
                    <th>收货人</th>
                    <th>下单时间</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr  style="background: #eee">
                    <td><?php  echo $row['ordersn'];?></td>
                    <td><?php  echo $row['price'];?></td>
                    <td><?php  echo $row['goodsprice'];?></td>
                    <td><?php  echo $row['dispatchprice'];?></td>
                    <td><?php  if($row['paytype'] == 1) { ?>
                               <span class="label label-primary">余额支付</span>
                                 <?php  } else if($row['paytype'] == 11) { ?>
                               <span class="label label-default">后台付款</span>
                           <?php  } else if($row['paytype'] == 2) { ?>
                               <span class="label label-danger">在线支付</span>
                                 <?php  } else if($row['paytype'] == 21) { ?>
                               <span class="label label-success">微信支付</span>
                                 <?php  } else if($row['paytype'] == 22) { ?>
                               <span class="label label-warning">支付宝支付</span>
                                 <?php  } else if($row['paytype'] == 23) { ?>
                               <span class="label label-primary">银联支付</span>
                           <?php  } else if($row['paytype'] == 3) { ?>
                           <span class="label label-success">货到付款</span>
                         <?php  } ?>
                    </td>
                    <td><?php  echo $row['realname'];?></td>
                    <td><?php  echo $row['addressname'];?></td>
                    <td><?php  echo date('Y-m-d H:i',$row['createtime'])?></td>   
                </tr>	
                <tr >

                    <td colspan="9">
                        <table width="100%">

                            <tbody>
                                <?php  if(is_array($row['goods'])) { foreach($row['goods'] as $g) { ?>
                                <tr>
                                    <td style='height:60px;'><img src="<?php  echo tomedia($g['thumb'])?>" style="width: 50px; height: 50px;border:1px solid #ccc;padding:1px;"></td>
                                    <td><span class="Name"><?php  echo $g['title'];?></span><br/> <span class="colorC"><?php  echo $g['optionname'];?></span>
                                    </td>
                                    <td>商品单价：<?php  echo $g['price']/$g['total']?> <br/>折扣后: <?php  echo $g['realprice']/$g['total']?></td>
                                    <td>购买数量：<?php  echo $g['total'];?></td>
                                    <td>总价：<strong><?php  echo $g['price'];?> </strong> <br/>折扣后: <strong><?php  echo $g['realprice'];?></strong></td>
                                </tr>
                                <?php  } } ?>


                            </tbody></table>	   
                    </td></tr>	
            <?php  } } ?>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>