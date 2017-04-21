<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('tabs', TEMPLATE_INCLUDEPATH)) : (include template('tabs', TEMPLATE_INCLUDEPATH));?>

<?php  if($operation == 'post') { ?>
<div class="main">
    <form id="dataform" action="" method="post" class="form-horizontal form" >
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        <div class='panel panel-default'>
            <div class='panel-heading'>
                权限设置
            </div>
            <div class='panel-body'>
                 <div class="form-group">
                   <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 权限设置</label>
                   <div class="col-sm-9 col-xs-12">
                         <label class='radio-inline'>
                             <input type='radio' name='type' value='0' <?php  if(empty($item['type'])) { ?>checked<?php  } ?>/> 基于用户
                         </label>
                        <label class='radio-inline'>
                             <input type='radio' name='type' value='1'  <?php  if($item['type']==1) { ?>checked<?php  } ?> /> 基于公众号
                         </label>
                          <span class='help-block'>基于用户：此用户下所有的公众号拥有统一的插件权限</span>
                         <span class='help-block'>基于公众号：只此公众号拥有的权限，公众号所属用户的其他公众号按用户权限</span>
                    </div>
                
                </div>
                
                 <div class="form-group type-user"  <?php  if($item['type']==1) { ?>style='display:none'<?php  } ?>>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>  选择用户</label>
                    <div class="col-sm-5">
                        <input type='hidden' id='uid' name='uid' value="<?php  echo $user['uid'];?>" />
                        <div class='input-group'>
                            <input type="text" name="user" maxlength="30" value="<?php  echo $user['username'];?>" id="user" class="form-control" readonly />
                            <div class='input-group-btn'>
                                <button class="btn btn-default" type="button" onclick="popwin = $('#modal-module-menus').modal();">选择用户</button>
                                <button class="btn btn-danger" type="button" onclick="$('#uid').val('');$('#user').val('');">清除选择</button>
                            </div>
                        </div>
                        <div id="modal-module-menus"  class="modal fade" tabindex="-1">
                            <div class="modal-dialog" style='width: 920px;'>
                                <div class="modal-content">
                                    <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择用户</h3></div>
                                    <div class="modal-body" >
                                        <div class="row"> 
                                            <div class="input-group"> 
                                                <input type="text" class="form-control" name="keyword" value="" id="search-kwd" placeholder="请输入用户名/姓名/手机号" />
                                                <span class='input-group-btn'><button type="button" class="btn btn-default" onclick="search_users();">搜索</button></span>
                                            </div>
                                        </div>
                                        <div id="module-menus" style="padding-top:5px;"></div>
                                    </div>
                                    <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                 <div class="form-group type-wechat" <?php  if(empty($item['type'])) { ?>style='display:none'<?php  } ?>>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>  选择公众号</label>
                    <div class="col-sm-5">
                        <input type='hidden' id='acid' name='acid' value="<?php  echo $account['acid'];?>" />
                        <div class='input-group'>
                            <input type="text" name="account" maxlength="30" value="<?php  echo $account['name'];?>" id="account" class="form-control" readonly />
                            <div class='input-group-btn'>
                                <button class="btn btn-default" type="button" onclick="popwin = $('#modal-module-menus1').modal();">选择公众号</button>
                                <button class="btn btn-danger" type="button" onclick="$('#acid').val('');$('#account').val('');">清除选择</button>
                            </div>
                        </div>
                        <div id="modal-module-menus1"  class="modal fade" tabindex="-1">
                            <div class="modal-dialog" style='width: 920px;'>
                                <div class="modal-content">
                                    <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择公众号</h3></div>
                                    <div class="modal-body" >
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="keyword" value="" id="search-kwd1" placeholder="请输入公众号名/用户名" />
                                                <span class='input-group-btn'><button type="button" class="btn btn-default" onclick="search_wechats();">搜索</button></span>
                                            </div>
                                        </div>
                                        <div id="module-menus1" style="padding-top:5px;"></div>
                                    </div>
                                    <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                 <div class="form-group form-plugins">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">开放插件</label>
                    <div class="col-sm-9 col-xs-12">
                         <label class='checkbox-inline'>
                             <input type='checkbox' name='plugins[]' class='plugin-all' value=''/> 全选
                         </label>
                        <br/>
                        
                         <?php  if(is_array($plugins)) { foreach($plugins as $plugin) { ?>
                         <label class='checkbox-inline'>
                             <input type='checkbox' name='plugins[]' class='plugin-item' value='<?php  echo $plugin['identity'];?>' <?php  if(in_array($plugin['identity'],$item_plugins)) { ?> checked<?php  } ?> /> <?php  echo $plugin['name'];?>
                         </label>
                        <?php  } } ?>
                    </div>
                </div> 
                <div class="form-group"></div>
                  <div class="form-group">
                   <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                   <div class="col-sm-9 col-xs-12">
                       <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
                       <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                       <input type="button" name="back" onclick='history.back()' style='margin-left:10px;' value="返回列表" class="btn btn-default" />
                   </div>
                  </div>
                
                
            </div>
        </div>
    
    </form>
</div>
<script language='javascript'>
    function checkAll(obj){
          var allcheck = true;
           $('.plugin-item').each(function(){
                if(!$(this).get(0).checked){
                     allcheck =false;
                     return false;
                }
            });
            $(".plugin-all").get(0).checked = allcheck;
    }
 $(function(){
     $('.plugin-item').click(function(){
          checkAll();
     });
     $('.plugin-all').click(function(){
         var check = $(this).get(0).checked;
        $('.plugin-item').each(function(){
            $(this).get(0).checked = check;
         });
     })
     $(":radio[name=type]").click(function(){
         if($(this).val()=='0'){
             $('.type-wechat').hide();
             $('.type-user').show();
         }
         else{
              $('.type-wechat').show();
             $('.type-user').hide();
         }
     })
 })
   $('form').submit(function(){
       var type =$(":radio[name=type]:checked").val();
       if(type=='0'){
        if ($(':input[name=user]').isEmpty()) {
             Tip.focus($(':input[name=user]'), '请选择用户!');
             return false;
        }
    }else{
        if ($(':input[name=account]').isEmpty()) {
             Tip.focus($(':input[name=account]'), '请选择公众号!');
             return  false;
        }
    }
        return true;
       
   })
  
</script>
<?php  } else if($operation == 'display') { ?>
<form action="" method="get" class='form form-horizontal'>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" plugins="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="ewei_shop" />
                <input type="hidden" name="do" value="plugin" />
                <input type="hidden" name="p"  value="perm" />
                <input type="hidden" name="method"  value="plugins" />
                <input type="hidden" name="op" value="display" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                        <input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="可搜索用户名/公众号名称">
                    </div>
                </div>
                   <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">类型</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                           <select name="type" class='form-control'>
                           <option value="" <?php  if($_GPC['type']=='') { ?> selected<?php  } ?>></option>
                            <option value="0" <?php  if($_GPC['type'] == '0') { ?> selected<?php  } ?>>基于用户</option>
                            <option value="1" <?php  if($_GPC['type'] == '1') { ?> selected<?php  } ?>>基于公众号</option>
                        </select>  </div>
                     <div class="col-xs-12 col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
              
            </form>
        </div>
    </div>
    
    <div class='panel panel-default'>
        <div class='panel-heading'>
            插件管理
        </div>
        <div class='panel-body'>

            <table class="table">
                <thead>
                    <tr>
                        <th style='width:120px;'>类型</th>
                        <th>公众号/用户</th>
                        <th>开放插件</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr>
                        <td>
                          <?php  if(empty($row['type'])) { ?>
                          <label class='label label-primary'>基于用户</label>
                          <?php  } else { ?>
                          <label class='label label-success'>基于公众号</label>
                          <?php  } ?>
                        </td>
                        <td>
                            <?php  if(!empty($row['username']) && empty($row['type']) ) { ?>用户: <?php  echo $row['username'];?><?php  } ?>
                            <?php  if(!empty($row['name']) && $row['type']==1) { ?>公众号: <?php  echo $row['name'];?><?php  } ?>
                        </td>
                        <td>
                            <?php  if(is_array($row['plugins'])) { foreach($row['plugins'] as $p) { ?>
                            <?php  echo $p['name'];?>;
                            <?php  } } ?>
                        </td>
                        <td>
                            <a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('perm/plugins', array('op' => 'post', 'id' => $row['id']))?>"><i class="fa fa-edit"></i></a>
                            <a class='btn btn-default'  href="<?php  echo $this->createPluginWebUrl('perm/plugins', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此操作员吗？');
                                    return false;"><i class="fa fa-remove"></i></a></td>
                    </tr>
                    <?php  } } ?>
                    <tr>
                        <td colspan="4">
                                 <a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('perm/plugins', array('op' => 'post'))?>"><i class="fa fa-plus"></i> 添加新权限</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php  echo $pager;?>
 
        </div>
 
    </div>
</form>



<?php  } ?>
<script language='javascript'>
 
                function search_users() {
		$("#module-menus").html("正在搜索....")
		$.get('<?php  echo $this->createPluginWebUrl('perm/plugins',array('op'=>'query_user'));?>', {
			keyword: $.trim($('#search-kwd').val())
		}, function(dat){
			$('#module-menus').html(dat);
		});
	}
	function select_user(o) {
	             $("#uid").val(o.uid);
          	             $("#user").val( o.username  );
                             $("#modal-module-menus .close").click();
	}
        
        function search_wechats() { 
		$("#module-menus1").html("正在搜索....")
		$.get('<?php  echo $this->createPluginWebUrl('perm/plugins',array('op'=>'query_wechat'));?>', {
		    keyword: $.trim($('#search-kwd1').val())
		}, function(dat){
		    $('#module-menus1').html(dat);
		});
	}
	function select_wechat(o) {
	             $("#acid").val(o.acid);
          	             $("#account").val( o.name);
                             $("#modal-module-menus1 .close").click();
	}
    </script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>