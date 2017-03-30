<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
  <li role="presentation" <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo create_url('site/entry/sickmanager', array('m' => 'lrj_guide', 'op' => 'post'));?>">添加症状</a></li>
  <li role="presentation" <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo create_url('site/entry/sickmanager',array('m'=>'lrj_guide','op'=>'display'))?>">症状列表</a></li>
</ul>
<?php  if($operation== 'post') { ?>
<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">症状描述</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php  echo $question['name'];?>" id="inputName" placeholder="输入症状描述" name="name">
    </div>
  </div>
  <div class="form-group">
    <label   class="col-sm-2 control-label">性别</label>
    <div class="col-sm-10">
        <select class="form-control input-lg" name="type">
        	<option value="1" <?php  if(1==$question['type']) { ?>selected<?php  } ?> >男</option>
        	<option value="2" <?php  if(2==$question['type']) { ?>selected<?php  } ?> >女</option>
        	<option value="3" <?php  if(3==$question['type']) { ?>selected<?php  } ?> >通用</option>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">症状部位</label>
    <div class="col-sm-10">
      <select class="form-control input-lg" name="part">
      	<?php  if(is_array($parts)) { foreach($parts as $index => $item) { ?>
      	<option value="<?php  echo $item['id'];?>" <?php  if($question['pid']==$item['id']) { ?>selected<?php  } ?> ><?php  echo $item['name'];?></option>
      	<?php  } } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label   class="col-sm-2 control-label">症状配图</label>
    <div class="col-sm-10">
    	<?php  echo tpl_form_field_image('sickImg',$question['sickImg']);?>
    </div>
  </div>
   <div class="form-group">
    <label   class="col-sm-2 control-label">症状描述</label>
    <div class="col-sm-10">
       <textarea class="form-control"  name="desc" rows="7"><?php  echo $question['desc'];?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label   class="col-sm-2 control-label">推荐疗程</label>
    <div class="col-sm-10">
       <textarea class="form-control"  name="solution" rows="3"><?php  echo $question['solution'];?></textarea>
    </div>
  </div>
   <div class="form-group">
    <label   class="col-sm-2 control-label">特殊项(0开始)</label>
    <div class="col-sm-10">
    	<input type="number" class="form-control" name="special" value="<?php  echo $question['special'];?>"/>
    </div>
  </div>
    <div class="form-group">
    <label   class="col-sm-2 control-label">好转反应</label>
    <div class="col-sm-10">
       <select class="form-control input-lg" style="height: 280px;"  name="betters[]" multiple="multiple">
       	<?php  if(is_array($betters)) { foreach($betters as $item) { ?>
       	<option value="<?php  echo $item['id'];?>" <?php echo !empty($question['betters'])&&in_array($item['id'],$question['betters']) ? 'selected':'';?> ><?php  echo $item['bp_name'];?></option>
       	<?php  } } ?>
       </select>
    </div>
  </div>
  <div class="form-group">
    <label   class="col-sm-2 control-label">推荐产品</label>
    <div class="col-sm-10">
       <select class="form-control input-lg"  style="height: 100px;" name="product[]" multiple="multiple">
       	<?php  if(is_array($goods)) { foreach($goods as $item) { ?>
       	<option value="<?php  echo $item['id'];?>" <?php echo  in_array($item['id'],$question['product_id']) ? 'selected' :''; ?> ><?php  echo $item['title'];?></option>
       	<?php  } } ?>
       </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<input type="hidden" name="qid" value="<?php  echo $qid;?>" />
    	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
      <input type="submit" name="submit" value="确定" class="btn btn-primary"></input>
    </div>
  </div>
</form>
<?php  } else if($operation=='display' ) { ?>
<table class="table table-hover">
	<thead>
 		<tr><th>序号</th><th>症状名</th><th>症状部位</th><th>性别</th><th>操作</th></tr>
 	</thead>
	<tbody>
		 <?php  if(is_array($list)) { foreach($list as $item) { ?>
 <tr>
 	<td><?php  echo $item['id'];?></td>
 	<td><?php  echo $item['name'];?></td>
 	<td><?php  echo $item['pname'];?></td>
 	<td><?php  if($item['type']==1) { ?>男<?php  } else if($item['type']==2) { ?>女<?php  } else if($item['type']==3) { ?>通用<?php  } ?></td>
 	<td>
 		<a href="<?php  echo create_url('site/entry/sickmanager',array('m'=>'lrj_guide','op'=>'post','qid'=>$item['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="编辑"><i class="fa fa-pencil"></i></a>
 		<a href="<?php  echo create_url('site/entry/sickmanager',array('m'=>'lrj_guide','op'=>'delete','qid'=>$item['id']))?>" onclick="return confirm('确认删除此商品？');return false;" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除"><i class="fa fa-times"></i></a>	
 	</td>
 </tr>
 <?php  } } ?>
	</tbody>
</table>
<?php  echo $page;?>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>