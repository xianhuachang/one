<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
  <li role="presentation" <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo create_url('site/entry/tutormanager', array('m' => 'lrj_guide', 'op' => 'post'));?>">添加导师</a></li>
  <li role="presentation" <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo create_url('site/entry/tutormanager',array('m'=>'lrj_guide','op'=>'display'))?>">导师列表</a></li>
</ul>
<?php  if($operation== 'post') { ?>
<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php  echo $tutor['name'];?>" id="inputName" placeholder="输入导师姓名" name="name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">身体部位</label>
    <div class="col-sm-10">
      <select class="form-control input-lg" name="part">
      	<?php  if(is_array($parts)) { foreach($parts as $index => $item) { ?>
      	<option value="<?php  echo $item['id'];?>" <?php  if($tutor['partid']==$item['id']) { ?>selected<?php  } ?> ><?php  echo $item['name'];?></option>
      	<?php  } } ?>
      </select>
    </div>
  </div>
   <div class="form-group">
    <label   class="col-sm-2 control-label">导师专属二维码</label>
    <div class="col-sm-10">
      <?php  echo tpl_form_field_image('qrcodeimg',$tutor['qrcodeimg']);?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<input type="hidden" name="tid" value="<?php  echo $tid;?>" />
    	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
      <input type="submit" name="submit" value="确定" class="btn btn-primary"></input>
    </div>
  </div>
</form>
<?php  } else if($operation=='display' ) { ?>
<table class="table table-hover">
	<thead>
 		<tr><th>序号</th><th>导师姓名</th><th>护理部位</th><th>操作</th></tr>
 	</thead>
	<tbody>
		 <?php  if(is_array($list)) { foreach($list as $item) { ?>
 <tr>
 	<td><?php  echo $item['id'];?></td>
 	<td><?php  echo $item['name'];?></td>
 	<td><?php  echo $item['pname'];?></td>
 	<td>
 		<a href="<?php  echo create_url('site/entry/tutormanager',array('m'=>'lrj_guide','op'=>'post','tid'=>$item['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="编辑"><i class="fa fa-pencil"></i></a>
 		<a href="<?php  echo create_url('site/entry/tutormanager',array('m'=>'lrj_guide','op'=>'delete','tid'=>$item['id']))?>" onclick="return confirm('确认删除此商品？');return false;" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除"><i class="fa fa-times"></i></a>	
 	</td>
 </tr>
 <?php  } } ?>
	</tbody>
</table>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>