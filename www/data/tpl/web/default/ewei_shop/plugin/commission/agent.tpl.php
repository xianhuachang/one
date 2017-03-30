<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('tabs', TEMPLATE_INCLUDEPATH)) : (include template('tabs', TEMPLATE_INCLUDEPATH));?>

<?php  if($operation=='display') { ?>
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
            <input type="hidden" name="op" value="display" />
            <div class="form-group">
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
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">推广商等级</label>
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


            <div class="form-group">
            </div>
        </form>
    </div>
</div>
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
                    <th style='width:80px;'>推广等级</th>
                    <th style='width:80px;'>点击数</th>
                    <th style='width:80px;'>累计佣金</th>
                    <th style='width:90px;'>已打款佣金</th>
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
                          <label class='label label-danger'>待分配</label>
                          <?php  } else if($row['agentid']==-1) { ?>
                          <label class='label label-default'>总店</label>
                          <?php  } else { ?>
                          [<?php  echo $row['agentid'];?>]<img src='<?php  echo $row['parentavatar'];?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' /> <?php  echo $row['parentname'];?>
                          <?php  } ?>
                      </td>
                    <td><img src='<?php  echo $row['avatar'];?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' /> <?php  echo $row['nickname'];?></td>
                    
                    <td><?php  echo $row['realname'];?></td>
                    <td><?php  echo $row['mobile'];?></td>
<td><?php  if(empty($row['levelname'])) { ?> <?php echo empty($this->set['levelname'])?'普通等级':$this->set['levelname']?><?php  } else { ?><?php  echo $row['levelname'];?><?php  } ?></td>
                    <td><?php  echo $row['clickcount'];?></td>
                    <td><?php  echo $row['commission_total'];?></td>
                    <td><?php  echo $row['commission_pay'];?></td>
                    <td>
                        总计：<?php  echo $row['levelcount'];?> 人
                        <?php  if($level>=1 && $row['level1']>0) { ?><br/>一级：<?php  echo $row['level1'];?> 人<?php  } ?>
                        <?php  if($level>=2  && $row['level2']>0) { ?><br/> 二级：<?php  echo $row['level2'];?> 人<?php  } ?>
                        <?php  if($level>=3  && $row['level3']>0) { ?><br/>三级：<?php  echo $row['level3'];?> 人<?php  } ?></td>
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
                        <?php if(cv('commission.agent.view')) { ?><a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('commission/agent/detail',array('id' => $row['id']));?>" title='详情'><i class='fa fa-edit'></i></a>		<?php  } ?>
                        <?php if(cv('commission.agent.order')) { ?><a class='btn btn-default' href="<?php  echo $this->createWebUrl('order',array('op'=>'display','agentid' => $row['id']));?>" title='推广订单'><i class='fa fa-list'></i></a><?php  } ?>
                        <?php if(cv('commission.agent.user')) { ?><a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('commission/agent/user',array('id' => $row['id']));?>"  title='推广下线'><i class='fa fa-users'></i></a><?php  } ?>
                        <?php if(cv('commission.agent.delete')) { ?><a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('commission/agent/delete',array('id' => $row['id']));?>" title="删除" onclick="return confirm('确定要删除该会员吗？');"><i class='fa fa-remove'></i></a><?php  } ?>
                
                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
<?php  } else if($operation=='detail') { ?>

<form <?php if(cv('commission.agent.edit|commission.agent.check')) { ?>action="" method='post'<?php  } ?> class='form-horizontal'>
    <input type="hidden" name="id" value="<?php  echo $member['id'];?>">
    <input type="hidden" name="op" value="detail">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shop" />
    <input type="hidden" name="p" value="commission" />
    <input type="hidden" name="method" value="agent" />
    <input type="hidden" name="op" value="detail" />
    <div class='panel panel-default'>
        <div class='panel-heading'>
            推广商详细信息
        </div>
        <div class='panel-body'>

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">粉丝</label>
                <div class="col-sm-9 col-xs-12">
                    <img src='<?php  echo $member['avatar'];?>' style='width:100px;height:100px;padding:1px;border:1px solid #ccc' />
                         <?php  echo $member['nickname'];?>
                </div>
            </div>
           <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">OPENID</label>
                <div class="col-sm-9 col-xs-12">
                    <div class="form-control-static"><?php  echo $member['openid'];?></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">真实姓名</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('commission.agent.edit')) { ?>
                    <input type="text" name="data[realname]" class="form-control" value="<?php  echo $member['realname'];?>"  />
                    <?php  } else { ?>
                    <input type="hidden" name="data[realname]" class="form-control" value="<?php  echo $member['realname'];?>"  />
                    <div class='form-control-static'><?php  echo $member['realname'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机号码</label>
                <div class="col-sm-9 col-xs-12">
                       <?php if(cv('commission.agent.edit')) { ?>
                    <input type="text" name="data[mobile]" class="form-control" value="<?php  echo $member['mobile'];?>"  />
                       <?php  } else { ?>
                       <input type="hidden" name="data[mobile]" class="form-control" value="<?php  echo $member['mobile'];?>"  />
                    <div class='form-control-static'><?php  echo $member['mobile'];?></div>
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">微信号</label>
                <div class="col-sm-9 col-xs-12">
                          <?php if(cv('commission.agent.edit')) { ?>
                    <input type="text" name="data[weixin]" class="form-control" value="<?php  echo $member['weixin'];?>"  />
                         <?php  } else { ?>
                         <input type="hidden" name="data[weixin]" class="form-control" value="<?php  echo $member['weixin'];?>"  />
                   		 <div class='form-control-static'><?php  echo $member['weixin'];?></div>
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label red">*上级分配</label>
                <div class="col-sm-9 col-xs-12">
                    <?php  if($inviter['isinviter']==FALSE) { ?>
                    <select name="data[agentid]"  class="form-control">
                    	<option value="0">暂不分配</option>
                    	<?php  if($shop_agent_remainder>0) { ?>
                    	<option value="-1">总店</option>
                    	<?php  } ?>
                    	<?php  if(is_array($all_agent)) { foreach($all_agent as $item) { ?>
                    	<option <?php  if($member['inviter']==$item['id']) { ?>sselected<?php  } ?>  value="<?php  echo $item['id'];?>"><?php  echo $item['realname'];?>　　(可再分配下级人数:<?php  echo $item['remainder'];?>)</option>
                    	<?php  } } ?>
                    </select>
                    <?php  } else { ?>
                     <input type="hidden" name="data[agentid]" class="form-control" value="<?php  echo $inviter['inviterid'];?>"  />
                   	<div class='form-control-static'><?php  echo $inviter['realname'];?>　 (可再分配下级人数:<?php  echo $inviter['remainder'];?>)</div>
                    <?php  } ?>
                </div>
            </div>
             <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">推广商等级</label>
               <div class="col-sm-9 col-xs-12">
                         <?php if(cv('commission.agent.edit')) { ?>
                    <select name='data[agentlevel]' class='form-control'>
                        <option value='0'><?php echo empty($this->set['levelname'])?'普通等级':$this->set['levelname']?></option>
                         <?php  if(is_array($agentlevels)) { foreach($agentlevels as $level) { ?>
                        <option value='<?php  echo $level['id'];?>' <?php  if($member['agentlevel']==$level['id']) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
                        <?php  } } ?>
                    </select>
                         <?php  } else { ?>
                             <input type="hidden" name="data[agentlevel]" class="form-control" value="<?php  echo $member['agentlevel'];?>"  />
                             
                              <?php  if(empty($member['agentlevel'])) { ?>
                            <?php echo empty($this->set['levelname'])?'普通等级':$this->set['levelname']?>
                                <?php  } else { ?>
                                <?php  echo pdo_fetchcolumn('select levelname from '.tablename('ewei_shop_commission_level').' where id=:id limit 1',array(':id'=>$member['agentlevel']))?>
                                <?php  } ?>
                         <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">累计佣金</label>
                <div class="col-sm-9 col-xs-12">
                    <div class='form-control-static'> <?php  echo $member['commission_total'];?></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">已打款佣金</label>
                <div class="col-sm-9 col-xs-12">
                    <div class='form-control-static'> <?php  echo $member['commission_pay'];?></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">注册时间</label>
                <div class="col-sm-9 col-xs-12">
                    <div class='form-control-static'><?php  echo date('Y-m-d H:i:s', $member['createtime']);?></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">成为代理时间</label>
                <div class="col-sm-9 col-xs-12">
                    <div class='form-control-static'><?php  if(!strexists('1970',$member['agenttime'])) { ?><?php  echo $member['agenttime'];?><?php  } else { ?>----------<?php  } ?></div>
                </div>
            </div>
           <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">推广商权限</label>
                <div class="col-sm-9 col-xs-12">
                     <?php if(cv('commission.agent.check')) { ?>
                    <label class="radio-inline"><input type="radio" name="data[isagent]" value="1" <?php  if($member['isagent']==1) { ?>checked<?php  } ?>>是</label>
                    <label class="radio-inline" ><input type="radio" name="data[isagent]" value="0" <?php  if($member['isagent']==0) { ?>checked<?php  } ?>>否</label>
                    <?php  } else { ?>
                      <input type='hidden' name='data[isagent]' value='<?php  echo $member['isagent'];?>' />
                      <div class='form-control-static'><?php  if($member['isagent']==1) { ?>是<?php  } else { ?>否<?php  } ?></div>
                    <?php  } ?>
                    
                </div>
            </div>
       
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">审核通过</label>
                <div class="col-sm-9 col-xs-12">
                     <?php if(cv('commission.agent.check')) { ?>
                    <label class="radio-inline"><input type="radio" name="data[status]" value="1" <?php  if($member['status']==1) { ?>checked<?php  } ?>>是</label>
                    <label class="radio-inline" ><input type="radio" name="data[status]" value="0" <?php  if($member['status']==0) { ?>checked<?php  } ?>>否</label>
                    <input type='hidden' name='oldstatus' value="<?php  echo $member['status'];?>" />
                       <?php  } else { ?>
                      <input type='hidden' name='data[status]' value='<?php  echo $member['status'];?>' />
                      <div class='form-control-static'><?php  if($member['status']==1) { ?>是<?php  } else { ?>否<?php  } ?></div>
                    <?php  } ?>
                </div>
            </div>

             <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">强制不自动升级</label>
                <div class="col-sm-9 col-xs-12">
                      <?php if(cv('commission.agent.edit')) { ?>
                    <label class="radio-inline" ><input type="radio" name="data[agentnotupgrade]" value="0" <?php  if($member['agentnotupgrade']==0) { ?>checked<?php  } ?>>允许自动升级</label>
                    <label class="radio-inline"><input type="radio" name="data[agentnotupgrade]" value="1" <?php  if($member['agentnotupgrade']==1) { ?>checked<?php  } ?>>强制不自动升级</label>
                    <span class="help-block">如果强制不自动升级，满足任何条件，此推广商的级别也不会改变</span>
                    <?php  } else { ?>
                         <input type="hidden" name="data[agentnotupgrade]" class="form-control" value="<?php  echo $member['agentnotupgrade'];?>"  />
                      <div class='form-control-static'><?php  if($member['agentnotupgrade']==1) { ?>强制不自动升级<?php  } else { ?>允许自动升级<?php  } ?></div>
                    <?php  } ?>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">自选商品</label>
                <div class="col-sm-9 col-xs-12">
                      <?php if(cv('commission.agent.edit')) { ?>
                    <label class="radio-inline" ><input type="radio" name="data[agentselectgoods]" value="0" <?php  if($member['agentselectgoods']==0) { ?>checked<?php  } ?>>系统设置</label>
                    <label class="radio-inline"><input type="radio" name="data[agentselectgoods]" value="1" <?php  if($member['agentselectgoods']==1) { ?>checked<?php  } ?>>强制禁止</label>
                    <label class="radio-inline"><input type="radio" name="data[agentselectgoods]" value="2" <?php  if($member['agentselectgoods']==2) { ?>checked<?php  } ?>>强制开启</label>
                    <span class="help-block">系统设置： 跟随系统设置，系统关闭自选则为禁止，系统开启自选则为允许</span>
                    <span class="help-block">强制禁止： 无论系统自选商品是否关闭或开启，此推广商永不能自选商品</span>
                    <span class="help-block">强制允许： 无论系统自选商品是否关闭或开启，此推广商永可以自选商品</span>
                    <?php  } else { ?>
                      <input type="hidden" name="data[agentselectgoods]" class="form-control" value="<?php  echo $member['agentselectgoods'];?>"  />
                      <div class='form-control-static'><?php  if($member['agentnotselectgoods']==1) { ?>
                          强制禁止
                          <?php  } else if($member['agentselectgoods']==2) { ?>
                          强制允许
                          <?php  } else { ?>
                          <?php  if($this->set['select_goods']==1) { ?>系统允许<?php  } else { ?>系统禁止<?php  } ?>
                          <?php  } ?></div>
                    <?php  } ?>
                </div>
            </div>
           
            
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">备注</label>
                <div class="col-sm-9 col-xs-12">
                     <?php if(cv('commission.agent.edit')) { ?>
                    <textarea name="content" class='form-control'><?php  echo $member['content'];?></textarea>
                       <?php  } else { ?>
                     <textarea name="content" class='form-control' style='display:none'><?php  echo $member['content'];?></textarea>
                      <div class='form-control-static'><?php  echo $member['content'];?></div>
                    <?php  } ?>
                </div>
            </div>
            
            
            <div class="form-group"></div>
            <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                         <?php if(cv('commission.agent.edit|commission.agent.check')) { ?>
                            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"  />
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        <?php  } ?>
                       <input type="button" name="back" onclick='history.back()' <?php if(cv('commission.agent.edit|commission.agent.check')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
                    </div>
            </div>


        </div>


    </div>   
   
</form>

<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>