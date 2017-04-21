<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('tabs', TEMPLATE_INCLUDEPATH)) : (include template('tabs', TEMPLATE_INCLUDEPATH));?>
<div class='alert alert-info'>
    提示: 没有设置等级的分销商将按默认设置计算提成。商品指定的佣金金额的优先级仍是最高的，也就是说只要商品指定了佣金金额就按商品的佣金金额来计算，不受等级影响
</div>
<?php  if($operation == 'post') { ?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $level['id'];?>" />
        <div class='panel panel-default'>
            <div class='panel-heading'>
                分销商等级设置
            </div>
            <div class='panel-body'>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 等级名称</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="levelname" class="form-control" value="<?php  echo $level['levelname'];?>" />
                    </div>
                </div>
                <?php  if($this->set['level']>=1) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">一级分销比例</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="commission1" class="form-control" value="<?php  echo $level['commission1'];?>" />
                    </div>
                </div>
                <?php  } ?>
                  <?php  if($this->set['level']>=2) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">二级分销比例</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="commission2" class="form-control" value="<?php  echo $level['commission2'];?>" />
                    </div>
                </div>
                    <?php  } ?>
                  <?php  if($this->set['level']>=3) { ?>
                  <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">三级分销比例</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="commission3" class="form-control" value="<?php  echo $level['commission3'];?>" />
                    </div>
                </div>
                    <?php  } ?>
                  <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">升级条件</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class='input-group'>
                            <span class='input-group-addon'>提现满</span>
                            <input type="text" name="commissionmoney" class="form-control" value="<?php  echo $level['commissionmoney'];?>" />
                            <span class='input-group-addon'>元 或 分销订单总金额满</span>
                            <input type="text" name="ordermoney" class="form-control" value="<?php  echo $level['ordermoney'];?>" />
                            <span class='input-group-addon'>元</span>
                        </div>
                        <span class='help-block'>分销商升级条件，不填写默认为不自动升级</span>
                    </div>
                </div>
                

            </div>
        </div>
        <div class="form-group col-sm-12">
	<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	</div>
    </form>
</div>
<script language='javascript'>
    $('form').submit(function(){
        if($(':input[name=levelname]').isEmpty()){
            Tip.focus($(':input[name=levelname]'),'请输入等级名称!');
            return false;
        }
        return true;
    })
    </script>
<?php  } else if($operation == 'display') { ?>
            <form action="" method="post" onsubmit="return formcheck(this)">
     <div class='panel panel-default'>
            <div class='panel-heading'>
                分销商等级设置
            </div>
         <div class='panel-body'>
   
            <table class="table">
                <thead>
                    <tr>
                        <th>等级名称</th>
                        <?php  if($this->set['level']>=1) { ?><th>一级比例</th><?php  } ?>
                        <?php  if($this->set['level']>=2) { ?><th>二级比例</th><?php  } ?>
                        <?php  if($this->set['level']>=3) { ?><th>三级比例</th><?php  } ?>
                        <th>升级条件</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr>
                        <td><?php  echo $row['levelname'];?></td>
                        <?php  if($this->set['level']>=1) { ?><td><?php  echo $row['commission1'];?>%</td><?php  } ?>
                         <?php  if($this->set['level']>=2) { ?><td><?php  echo $row['commission2'];?>%</td><?php  } ?>
                          <?php  if($this->set['level']>=3) { ?><td><?php  echo $row['commission3'];?>%</td><?php  } ?>
                          <td><?php  if($row['commissionmoney']>0 && $row['ordermoney']>0) { ?>
                              提现金额满 <?php  echo $row['commissionmoney'];?>元 或 <br/>
                              订单金额满 <?php  echo $row['ordermoney'];?>元
                            <?php  } else if($row['commissionmoney']>0) { ?>
                            提现金额满 <?php  echo $row['commissionmoney'];?>元
                            <?php  } else if($row['ordermoney']>0) { ?>
                            订单金额满 <?php  echo $row['ordermoney'];?>元
                            <?php  } else { ?>
                            不自动升级
                            <?php  } ?>
                          </td>
                        <td>
                            <a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('commission/level', array('op' => 'post', 'id' => $row['id']))?>">编辑</a>
                            <a class='btn btn-default'  href="<?php  echo $this->createPluginWebUrl('commission/level', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此等级吗？');return false;">删除</a></td>

                    </tr>
                    <?php  } } ?>
                
                </tbody>
            </table>

         </div>
         <div class='panel-footer'>
                            <a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('commission/level', array('op' => 'post'))?>"><i class="fa fa-plus"></i> 添加新等级</a>
         </div>
     </div>
         </form>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
