<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('tabs', TEMPLATE_INCLUDEPATH)) : (include template('tabs', TEMPLATE_INCLUDEPATH));?>
 
<div class="panel panel-default">
    <div class='panel-body'>
    <div style='height:100px;width:110px;float:left;'>
         <img src='<?php  echo $member['avatar'];?>' style='width:100px;height:100px;border:1px solid #ccc;padding:1px' />
    </div>
    <div style='float:left;height:100px;overflow: hidden'>
        昵称: <?php  echo $member['nickname'];?><br/>
        姓名: <?php  echo $member['realname'];?> <br/>
        手机号: <?php  echo $member['mobile'];?> <br/>
        微信号: <?php  echo $member['weixin'];?><br/>
        下级分销商: 总共 <span style='color:red'><?php  echo $member['agentcount'];?></span> 人 
        <?php  if($this->set['level']>=1) { ?>一级: <span style='color:red'><?php  echo $level1;?></span>  人<?php  } ?>  
            <?php  if($this->set['level']>=2) { ?>二级: <span style='color:red'><?php  echo $level2;?></span>  人<?php  } ?> 
                <?php  if($this->set['level']>=3) { ?>三级: <span style='color:red'><?php  echo $level3;?></span> 人<?php  } ?>
                点击:  <span style='color:red'><?php  echo $member['clickcount'];?></span> 次
    </div>
        </div>
</div>
<form method='get' class='form-horizontal'>
<div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
        <form action="./index.php" method="get" class="form-horizontal" role="form" id="form1">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="ewei_shop" />
            <input type="hidden" name="do" value="plugin" />
            <input type="hidden" name="p" value="commission" />
            <input type="hidden" name="method" value="agent" />
            <input type="hidden" name="op" value="user" />
            <input type="hidden" name="id" value="<?php  echo $agentid;?>" />
           <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">成为代理时间</label>
                    <div class="col-sm-7 col-lg-9 col-xs-12">
                        <div class="col-sm-2">
                            <label class='radio-inline'>
                                <input type='radio' value='0' name='searchtime' <?php  if($_GPC['searchtime']=='0') { ?>checked<?php  } ?>>不搜索
                            </label> 
                             <label class='radio-inline'>
                                <input type='radio' value='1' name='searchtime' <?php  if($_GPC['searchtime']=='1') { ?>checked<?php  } ?>>搜索
                            </label>
                     </div>
                        <?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d  H:i', $endtime)),true);?>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">ID</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <input type="text" class="form-control"  name="mid" value="<?php  echo $_GPC['mid'];?>"/> 
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员信息</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <input type="text" class="form-control"  name="realname" value="<?php  echo $_GPC['realname'];?>" placeholder='可搜索昵称/名称/手机号'/> 
                </div>
            </div>
         <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">是否关注</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                       <select name='followed' class='form-control'>
                        <option value=''></option>
                        <option value='0' <?php  if($_GPC['followed']=='0') { ?>selected<?php  } ?>>未关注</option>
                        <option value='1' <?php  if($_GPC['followed']=='1') { ?>selected<?php  } ?>>已关注</option>
                        <option value='2' <?php  if($_GPC['followed']=='2') { ?>selected<?php  } ?>>取消关注</option>
                    </select>
                </div>
            </div>
                   <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">推荐人</label>
                <div class="col-sm-3">
                    <select name='parentid' class='form-control'>
                        <option value=''></option>
                        <option value='0' <?php  if($_GPC['parentid']=='0') { ?>selected<?php  } ?>>总店</option>
                    </select>
                </div>
                 <div class="col-sm-6">
                    <input type="text"  class="form-control" name="parentname" value="<?php  echo $_GPC['parentname'];?>" placeholder='推荐人昵称/姓名/手机号'/> 
                </div>
            </div>
             <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">分销商等级</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <select name='agentlevel' class='form-control'>
                        <option value=''></option>
                         <?php  if(is_array($agentlevels)) { foreach($agentlevels as $level) { ?>
                        <option value='<?php  echo $level['id'];?>' <?php  if($_GPC['agentlevel']==$level['id']) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
                        <?php  } } ?>
                    </select>
                </div>
            </div>
                    <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">状态</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <select name='status' class='form-control'>
                        <option value=''></option>
                        <option value='0' <?php  if($_GPC['status']=='0') { ?>selected<?php  } ?>>未审核</option>
                        <option value='1' <?php  if($_GPC['status']=='1') { ?>selected<?php  } ?>>已审核</option>
                    </select>
                </div>
                <div class="col-sm-3 col-lg-2"><button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button></div>
            </div>
 
      
    </div>
     </form>
 
<div class="panel panel-default">
    <div class="panel-heading">总数：<?php  echo $total;?></div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th style='width:80px;'>会员ID</th>
                     <th style='width:120px;'>推荐人</th>
                    <th style='width:120px;'>粉丝</th>
                    <th style='width:80px;'>姓名</th>
                    <th style='width:110px;'>手机号码</th>
                    <th style='width:80px;'>点击数</th>
                    <th style='width:80px;'>累计佣金</th>
                    <th style='width:80px;'>已打款佣金</th>
                    <th style='width:120px;'>下线数</th>
                    <th style='width:80px;'>状态</th>
                    <th style='width:200px;'>时间</th>
                    <th style='width:70px'>关注</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                   <td><?php  echo $row['id'];?></td>
                      <td><?php  if(empty($row['agentid'])) { ?>
                          <label class='label label-default'>总店</label>
                          <?php  } else { ?>
                             [<?php  echo $row['agentid'];?>]<img src='<?php  echo $row['parentavatar'];?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' /> <?php  echo $row['parentname'];?><br><?php  echo $row['level'];?>级下线
                          <?php  } ?>
                      </td>
                    <td><img src='<?php  echo $row['avatar'];?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' /> <?php  echo $row['nickname'];?></td>
                    <td><?php  echo $row['realname'];?></td>
                    <td><?php  echo $row['mobile'];?></td>
 
                    <td><?php  echo $row['clickcount'];?></td>
                    <td><?php  echo $row['commission_total'];?></td>
                    <td><?php  echo $row['commission_pay'];?></td>
                    <td>
                        总计：<?php  echo $row['levelcount'];?> 人
                        <?php  if($row['level1']>0) { ?><br/>一级：<?php  echo $row['level1'];?> 人<?php  } ?>
                        <?php  if($row['level2']>0) { ?><br/> 二级：<?php  echo $row['level2'];?> 人<?php  } ?>
                        <?php  if($row['level3']>0) { ?><br/>三级：<?php  echo $row['level3'];?> 人<?php  } ?></td>
                    <td>
                        <?php  if($row['status']==0) { ?>
                        <span class="label label-default">未审核</span>
                        <?php  } else { ?>
                        <span class="label label-success">已审核</span>
                        <?php  } ?>
                    </td>
                    <td>注册时间：<?php  echo date('Y-m-d H:i',$row['createtime'])?><br/>
                        代理时间：<?php  if(!empty($row['agenttime'])) { ?><?php  echo date('Y-m-d H:i',$row['agenttime'])?><?php  } ?> 
                    </td>
                      <td>  <?php  if(empty($row['followed'])) { ?>
                      <?php  if(empty($row['uid'])) { ?>
                        <label class='label label-default'>未关注</label>
                        <?php  } else { ?>
                        <label class='label label-warning'>取消关注</label>
                        <?php  } ?>
                        <?php  } else { ?>
                    <label class='label label-success'>已关注</label>    
                    <?php  } ?></td>
                    <td>
                        <a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('commission/agent/detail',array('id' => $row['id']));?>" title='详情'><i class='fa fa-edit'></i></a>		
                        <a class='btn btn-default' href="<?php  echo $this->createWebUrl('order',array('op'=>'display','agentid' => $row['id']));?>" title='推广订单'><i class='fa fa-list'></i></a>
                        <a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('commission/agent/user',array('id' => $row['id']));?>"  title='推广下线'><i class='fa fa-users'></i></a>
                        <a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('commission/agent/delete',array('id' => $row['id']));?>" title="删除" onclick="return confirm('确定要删除该会员吗？');"><i class='fa fa-remove'></i></a>
                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>