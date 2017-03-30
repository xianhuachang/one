<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/statistics/tabs', TEMPLATE_INCLUDEPATH)) : (include template('web/statistics/tabs', TEMPLATE_INCLUDEPATH));?>

<div class="panel panel-default">
    <div class="panel-heading">
销售指标
    </div>
<form action="" class="form-horizontal">
    <div class='panel-body'>
        <div class="form-group">
            <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">客户平均消费</label>
            <div class="col-sm-8 col-lg-9 col-xs-12">
                <table class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th  style='width:150px;'>订单总金额</th>
                            <th  style='width:150px;'>总会员数</th>
                            <th>平均消费金额</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php  echo $orderprice;?></td>
                            <td><?php  echo $member_count;?></td>
                            <td><?php $percent =round(($orderprice/($member_count==0?1:$member_count)),2);?>
                             <div class="progress" style='max-width:500px;'>
                                 <div style="width: <?php  echo $percent;?>%;" class="progress-bar progress-bar-info"><span style="color:#000"><?php echo empty($percent)?'':$percent.'%'?></span></div>
                                </div>
                            </td>  
                        </tr> 
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">平均每次访问消费金额</label>
            <div class="col-sm-8 col-lg-9 col-xs-12">
                <table class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th style='width:150px;'>订单总金额</th>
                            <th style='width:150px;'>总访问次数</th>
                            <th>平均访问消费金额</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php  echo $orderprice;?></td>
                            <td><?php  echo $viewcount;?></td>
                            <td><?php $percent = round(($orderprice/($viewcount==0?1:$viewcount)),2);?>
                                <div class="progress" style='max-width:500px;'>
                                    <div style="width: <?php  echo $percent;?>%;" class="progress-bar progress-bar-info"><span style="color:#000"><?php echo empty($percent)?'':$percent.'%'?></span></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
     
        <div class="form-group">
            <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">订单转化率</label>
            <div class="col-sm-8 col-lg-9 col-xs-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style='width:150px;'>总订单数</th>
                            <th style='width:150px;'>总访问次数</th>
                            <th>订单转化率</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php  echo $ordercount;?></td>
                            <td><?php  echo $viewcount;?></td>
                            <td><?php $percent = round($ordercount/  (!empty($viewcount)?$viewcount *100 :1),2);?>
                                <div class="progress" style='max-width:500px;'>
                                    <div style="width: <?php  echo $percent;?>%;" class="progress-bar progress-bar-info"><span style="color:#000"><?php echo empty($percent)?'':$percent.'%'?></span></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员购买率</label>
            <div class="col-sm-8 col-lg-9 col-xs-12">
                <table class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th style='width:150px;'>消费会员数</th>
                            <th style='width:150px;'>总会员数</th>
                            <th>消费会员比率</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php  echo $member_buycount;?></td>
                            <td><?php  echo $member_count;?></td>
                            <td><?php $percent=round(($member_buycount/($member_count==0?1:$member_count))*100,2);?>
                                <div class="progress" style='max-width:500px;'>
                                    <div style="width: <?php  echo $percent;?>%;" class="progress-bar progress-bar-info"><span style="color:#000"><?php echo empty($percent)?'':$percent.'%'?></span></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      <div class="form-group">
        <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员平均订单率</label>
        <div class="col-sm-8 col-lg-9 col-xs-12">
            <table class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th style='width:150px;'>总订单数</th>
                        <th style='width:150px;'>总会员数</th>
                        <th>平均会员订单量</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php  echo $ordercount;?></td>
                        <td><?php  echo $member_count;?></td>
                        <td><?php $percent  =round(($ordercount/($member_count==0?1:$member_count))*100,2);?>
                            <div class="progress" style='max-width:500px;'>
                                <div style="width: <?php  echo $percent;?>%;" class="progress-bar progress-bar-info"><span style="color:#000"><?php echo empty($percent)?'':$percent.'%'?></span></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>