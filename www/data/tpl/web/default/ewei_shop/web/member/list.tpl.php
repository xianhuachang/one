<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/member/tabs', TEMPLATE_INCLUDEPATH)) : (include template('web/member/tabs', TEMPLATE_INCLUDEPATH));?>

<?php  if($operation=='display') { ?>
<div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
        <form action="./index.php" method="get" class="form-horizontal" role="form" id="form1">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="ewei_shop" />
            <input type="hidden" name="do" value="member" />
                 <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">ID</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <input type="text" class="form-control"  name="mid" value="<?php  echo $_GPC['mid'];?>"/> 
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员信息</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                    <input type="text" class="form-control"  name="realname" value="<?php  echo $_GPC['realname'];?>" placeholder="可搜索昵称/姓名/手机号"/> 
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
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员等级</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                       <select name='level' class='form-control'>
                        <option value=''></option>
                        <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
                        <option value='<?php  echo $level['id'];?>' <?php  if($_GPC['level']==$level['id']) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
                        <?php  } } ?>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员分组</label>
                <div class="col-sm-8 col-lg-9 col-xs-12">
                       <select name='groupid' class='form-control'>
                        <option value=''></option>
                        <?php  if(is_array($groups)) { foreach($groups as $group) { ?>
                        <option value='<?php  echo $group['id'];?>' <?php  if($_GPC['groupid']==$group['id']) { ?>selected<?php  } ?>><?php  echo $group['groupname'];?></option>
                        <?php  } } ?>
                    </select>
                </div>
        
            </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">注册时间</label>
                      <div class="col-sm-2">
                            <label class='radio-inline'>
                                <input type='radio' value='0' name='searchtime' <?php  if($_GPC['searchtime']=='0') { ?>checked<?php  } ?>>不搜索
                            </label>
                             <label class='radio-inline'>
                                <input type='radio' value='1' name='searchtime' <?php  if($_GPC['searchtime']=='1') { ?>checked<?php  } ?>>搜索
                            </label>
                     </div>
                    <div class="col-sm-7 col-lg-9 col-xs-12">
                        <?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d  H:i', $endtime)),true);?>
                    </div>
                         
                </div>
              <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
                    <div class="col-sm-7 col-lg-9 col-xs-12">
                       <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                       <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                       <?php if(cv('member.member.export')) { ?>
                        <button type="submit" name="export" value="1" class="btn btn-primary">导出 Excel</button>
                        <?php  } ?>
                    </div>
                         
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
                    <th style='width:120px;'>粉丝</th>
                    <th style='width:80px;'>会员姓名</th>
                    <th style='width:120px;'>手机号码</th>
                    <th style='width:120px;'>会员等级/分组</th>
                    <th style='width:130px;'>注册时间</th>
                    <th style='width:80px;'>积分</th>
                    <th style='width:80px;'>余额</th>
                    <th style='width:80px;'>成交订单</th>
                    <th style='width:80px;'>成交金额</th>
                    <th style='width:100px'>关注</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td>   <?php  echo $row['id'];?></td>
                    <td><img src='<?php  echo $row['avatar'];?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' /> <?php  echo $row['nickname'];?>
                             
                
                    </td>
                    <td><?php  echo $row['realname'];?></td>
                    <td><?php  echo $row['mobile'];?></td>
                    <td><?php  if(empty($row['levelname'])) { ?>普通会员<?php  } else { ?><?php  echo $row['levelname'];?><?php  } ?>
                        <br/><?php  if(empty($row['groupname'])) { ?>无分组<?php  } else { ?><?php  echo $row['groupname'];?><?php  } ?></td>
      
                    <td><?php  echo date('Y-m-d H:i',$row['createtime'])?></td>
                    <td><?php  echo $row['credit1'];?></td>
                    <td><?php  echo $row['credit2'];?></td>
                    <td><?php  echo $row['ordercount'];?></td>
                    <td><?php  echo floatval($row['ordermoney'])?></td>
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
                        
                        <?php if(cv('member.member.view|member.member.edit')) { ?><a class='btn btn-default' href="<?php  echo $this->createWebUrl('member',array('op'=>'detail','id' => $row['id']));?>" title="会员详情"><i class='fa fa-edit'></i></a><?php  } ?>
                        <?php if(cv('order')) { ?><a class='btn btn-default' href="<?php  echo $this->createWebUrl('order', array('op' => 'display','member'=>$row['nickname']))?>" title='会员订单'><i class='fa fa-list'></i></a><?php  } ?>
                        <?php if(cv('finance.recharge.credit1')) { ?><a class='btn btn-default' href="<?php  echo $this->createWebUrl('finance/recharge', array('op'=>'credit1','id'=>$row['id']))?>" title='充值积分'><i class='fa fa-credit-card'></i></a><?php  } ?>
                        <?php if(cv('finance.recharge.credit2')) { ?><a class='btn btn-default' href="<?php  echo $this->createWebUrl('finance/recharge', array('op'=>'credit2','id'=>$row['id']))?>" title='充值余额'><i class='fa fa-money'></i></a><?php  } ?>
                        <?php if(cv('member.member.delete')) { ?><a class='btn btn-default' href="<?php  echo $this->createWebUrl('member',array('op'=>'delete','id' => $row['id']));?>" title='删除会员' onclick="return confirm('确定要删除该会员吗？');"><i class='fa fa-remove'></i></a><?php  } ?>
                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
           <?php  echo $pager;?>
    </div>
</div>

<?php  } else if($operation=='detail') { ?>

<form <?php  if('member.member.edit') { ?>action="" method='post'<?php  } ?> class='form-horizontal'>
    <input type="hidden" name="id" value="<?php  echo $member['id'];?>">
    <input type="hidden" name="op" value="detail">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shop" />
    <input type="hidden" name="do" value="member" />
    <div class='panel panel-default'>
        <div class='panel-heading'>
            会员详细信息
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
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员等级</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('member.member.edit')) { ?>
                      <select name='data[level]' class='form-control'>
                        <option value=''>普通会员</option>
                        <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
                        <option value='<?php  echo $level['id'];?>' <?php  if($member['level']==$level['id']) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
                        <?php  } } ?>
                    </select>
                    <?php  } else { ?>
                    <div class='form-control-static'>
                        <?php  if(empty($member['level'])) { ?>
                        普通会员
                        <?php  } else { ?>
                        <?php  echo pdo_fetchcolumn('select levelname from '.tablename('ewei_shop_member_level').' where id=:id limit 1',array(':id'=>$member['level']))?>
                        <?php  } ?>
                    </div>
                    <?php  } ?>
                </div>
            </div>
              <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员分组</label>
                <div class="col-sm-9 col-xs-12">
                       <?php if(cv('member.member.edit')) { ?>
                      <select name='data[groupid]' class='form-control'>
                        <option value=''>无分组</option>
                        <?php  if(is_array($groups)) { foreach($groups as $group) { ?>
                        <option value='<?php  echo $group['id'];?>' <?php  if($member['groupid']==$group['id']) { ?>selected<?php  } ?>><?php  echo $group['groupname'];?></option>
                        <?php  } } ?>
                    </select>
                          <?php  } else { ?>
                    <div class='form-control-static'>
                        <?php  if(empty($member['groupid'])) { ?>
                     	   无分组
                        <?php  } else { ?>
                        <?php  echo pdo_fetchcolumn('select groupname from '.tablename('ewei_shop_member_group').' where id=:id limit 1',array(':id'=>$member['groupid']))?>
                        <?php  } ?>
                    </div>
                    <?php  } ?>
                </div>
            </div>            
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">成为总店管家</label>
                <div class="col-sm-1 col-xs-12">               
                    <input style="width: 18px;height: 18px;" type="checkbox" name="data[agentid]"  
                    	<?php  if($member['agentid']==-1) { ?>checked<?php  } ?> <?php if(cv('member.member.edit')) { ?><?php  } else { ?>disabled<?php  } ?> 
                    	class="form-control"  value="-1"  />                 
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">成为客服员工</label>
                <div class="col-sm-1 col-xs-12">               
                    <input style="width: 18px;height: 18px;" type="checkbox" name="data[cs]"  
                    	<?php  if($member['cs']==1) { ?>checked<?php  } ?> <?php if(cv('member.member.edit')) { ?><?php  } else { ?>disabled<?php  } ?> 
                    	class="form-control"  value="1"  />                 
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">真实姓名</label>
                <div class="col-sm-9 col-xs-12">
                      <?php if(cv('member.member.edit')) { ?>
                    <input type="text" name="data[realname]" class="form-control" value="<?php  echo $member['realname'];?>"  />
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $member['realname'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机号码</label>
                <div class="col-sm-9 col-xs-12">
                        <?php if(cv('member.member.edit')) { ?>
                    <input type="text" name="data[mobile]" class="form-control" value="<?php  echo $member['mobile'];?>"  />
                      <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $member['mobile'];?></div>
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">微信号</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('member.member.edit')) { ?>
                          <input type="text" name="data[weixin]" class="form-control" value="<?php  echo $member['weixin'];?>"  />
                      <?php  } else { ?>
                         <div class='form-control-static'><?php  echo $member['weixin'];?></div>
                    <?php  } ?>
                </div>
            </div>
         
             <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">成交订单数</label>
                <div class="col-sm-9 col-xs-12">
                    <div class='form-control-static'><?php  echo $member['ordercount'];?></div>
                </div>
            </div>
               <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">成交金额</label>
                <div class="col-sm-9 col-xs-12">
                    <div class='form-control-static'><?php  echo $member['ordermoney'];?> 元</div>
                </div>
            </div>
               <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">注册时间</label>
                <div class="col-sm-9 col-xs-12">
                    <div class='form-control-static'><?php  echo date('Y-m-d H:i:s', $member['createtime']);?></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">关注状态</label>
                <div class="col-sm-9 col-xs-12">
                    <div class='form-control-static'>
                        <?php  $followed = m('user')->followed($member['openid'])?>
                         <?php  if(!$followed) { ?>
                            <?php  if(empty($member['uid'])) { ?>
                            <label class='label label-default'>未关注</label>
                            <?php  } else { ?>
                            <label class='label label-warning'>取消关注</label>
                            <?php  } ?>
                            <?php  } else { ?>
                        <label class='label label-success'>已关注</label>    
                        <?php  } ?>
                        
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">备注</label>
                <div class="col-sm-9 col-xs-12">
                      <?php if(cv('member.member.edit')) { ?>
                    <textarea name="content" class='form-control'><?php  echo $member['content'];?></textarea>
                      <?php  } else { ?>
                         <div class='form-control-static'><?php  echo $member['content'];?></div>
                    <?php  } ?>
                </div>
            </div>
              <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('member.member.edit')) { ?>
                  <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
				  <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                  <?php  } ?>
                <input type="button" class="btn btn-default" name="submit" onclick="history.go(-1)" value="返回列表" <?php if(cv('member.member.edit')) { ?>style='margin-left:10px;'<?php  } ?> />
                </div>
            </div>            
        </div>
     
        
    </div>   
</form>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>