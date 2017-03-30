<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
  <li role="presentation" <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo create_url('site/entry/bettermanager', array('m' => 'lrj_guide', 'op' => 'post'));?>">添加好转反应</a></li>
</ul>
<?php  if($operation== 'post') { ?>
<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputpart" class="col-sm-2 control-label">反应名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" value="<?php  echo $better['bp_name'];?>" placeholder="输入好转反应名称" name="part">
    </div>
  </div>
  <div class="form-group">
    <label for="inputpriority" class="col-sm-2 control-label">内容</label>
    <div class="col-sm-10">
    	<textarea class="form-control"  name="answer" id="answer" rows="10"><?php  echo $better['bp_answer'];?></textarea>
  	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<input type="hidden" name="bid" value="<?php  echo $bid;?>" />
    	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
      <input name="submit" type="submit" class="btn btn-primary" value="确定"></input>
    </div>
  </div>
</form>
<a class="btn btn-danger" href="<?php  echo create_url('site/entry/bettermanager', array('m' => 'lrj_guide'));?>">返回列表</a>
<?php  } else if($operation=='display' ) { ?>
<table class="table table-hover">
	<thead>
 		<tr><th>反应名称</th><th>内容</th><th>操作</th></tr>
 	</thead>
	<tbody>
		 <?php  if(is_array($list)) { foreach($list as $index => $item) { ?>
 <tr>
 	<td><?php  echo $item['bp_name'];?></td>
 	<td title='<?php  echo $item["bp_answer"];?>'><?php  echo mb_substr($item['bp_answer'],0,20,"utf-8").'...';?></td>
 	<td>
 		<a href="<?php  echo create_url('site/entry/bettermanager',array('m'=>'lrj_guide','op'=>'post','bid'=>$item['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="编辑"><i class="fa fa-pencil"></i></a>
 		<a href="<?php  echo create_url('site/entry/bettermanager',array('m'=>'lrj_guide','op'=>'delete','bid'=>$item['id']))?>" onclick="return confirm('确认删除此反应？');return false;" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除"><i class="fa fa-times"></i></a>	
 	</td>
 </tr>
 <?php  } } ?>
	</tbody>
</table>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>