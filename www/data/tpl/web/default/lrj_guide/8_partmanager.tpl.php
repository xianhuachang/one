<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
  <li role="presentation" <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo create_url('site/entry/partmanager', array('m' => 'lrj_guide', 'op' => 'post'));?>">添加身体部位</a></li>
  <li role="presentation" <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo create_url('site/entry/partmanager',array('m'=>'lrj_guide','op'=>'display'))?>">导师身体部位</a></li>
</ul>
<?php  if($operation== 'post') { ?>
<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputpart" class="col-sm-2 control-label">部位名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputpart" value="<?php  echo $part['name'];?>" placeholder="输入部位名称" name="part">
    </div>
  </div>
  <div class="form-group">
    <label for="inputpriority" class="col-sm-2 control-label">优先级</label>
    <div class="col-sm-10">
  	<input type="number" class="form-control" id="inputpriority" min="0" max="99" value="<?php  echo $part['priority'];?>" placeholder="输入优先级" name="priority">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<input type="hidden" name="pid" value="<?php  echo $pid;?>" />
    	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
      <input name="submit" type="submit" class="btn btn-primary" value="确定"></input>
    </div>
  </div>
</form>
<?php  } else if($operation=='display' ) { ?>
<table class="table table-hover">
	<thead>
 		<tr><th>序号</th><th>部位名</th><th>优先级</th><th>操作</th></tr>
 	</thead>
	<tbody>
		 <?php  if(is_array($list)) { foreach($list as $index => $item) { ?>
 <tr>
 	<td><?php  echo $item['id'];?></td>
 	<td><?php  echo $item['name'];?></td>
 	<td><?php  echo $item['priority'];?></td>
 	<td>
 		<a href="<?php  echo create_url('site/entry/partmanager',array('m'=>'lrj_guide','op'=>'post','pid'=>$item['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="编辑"><i class="fa fa-pencil"></i></a>
 		<a href="<?php  echo create_url('site/entry/partmanager',array('m'=>'lrj_guide','op'=>'delete','pid'=>$item['id']))?>" onclick="return confirm('确认删除此商品？');return false;" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除"><i class="fa fa-times"></i></a>	
 	</td>
 </tr>
 <?php  } } ?>
	</tbody>
</table>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>