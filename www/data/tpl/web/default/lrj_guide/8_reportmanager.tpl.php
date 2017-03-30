<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?> <?php  if($operation== 'detail') { ?>
<div class='panel panel-default'>
	<div class='panel-heading'>
		自诊报告详细信息
	</div>
	<div class='panel-body'>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">粉丝</label>
			<div class="col-sm-9 col-xs-12">
				<img src="<?php  echo $member['avatar'];?>" style='width:100px;height:100px;padding:1px;border:1px solid #ccc' /> <?php  echo $member['nickname'];?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">性别</label>
			<div class="col-sm-9 col-xs-12">
				<div class="form-control-static"><?php  if($member['gender']==1) { ?>男<?php  } else if($member['gender']==2) { ?>女<?php  } else { ?>保密<?php  } ?></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">真实姓名</label>
			<div class="col-sm-9 col-xs-12">
				<div class='form-control-static'><?php  if($member['realname']=="") { ?>暂无提供<?php  } else { ?><?php  echo $member['realname'];?><?php  } ?></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">手机号码</label>
			<div class="col-sm-9 col-xs-12">
				<div class='form-control-static'><?php  if($member['mobile']=="") { ?>暂无提供<?php  } else { ?><?php  echo $member['mobile'];?><?php  } ?></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">诊断类型</label>
			<div class="col-sm-9 col-xs-12">
				<div class='form-control-static'><?php  if($member['type']==1) { ?>自诊系统<?php  } else { ?>健康小测试<?php  } ?></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">自诊时间</label>
			<div class="col-sm-9 col-xs-12">
				<div class='form-control-static'><?php  echo date('Y-m-d',$member['createtime'])?></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">自诊报告内容</label>
			<div class="col-sm-12 col-xs-12">
				<?php  if($member['type']==1) { ?>
				<div class='form-control-static'>
					<?php  if(is_array($reportsDetail)) { foreach($reportsDetail as $item) { ?>
					<div class="panel panel-danger">
						<div class="panel-heading">
							<?php  if(is_array($item)) { foreach($item as $index => $i) { ?> <?php  if($index==0) { ?>
							<h3 class="panel-title">身体部位:<?php  echo $i['part'];?></h3></div>
						<div class="panel-body"><table class="table table-bordered"><tr><th>症状</th><th>具体表现</th><th>提供的方案</th></tr><?php  } ?>
							<tr><td><?php  echo $i['question'];?></td><td title="<?php  echo $i['desc'];?>"><?php  if($i['desc']=="") { ?>无<?php  } else { ?><?php  echo $i['desc'];?><?php  } ?></td><td title="<?php  echo $i['solution'];?>"><?php  echo $i['solution'];?></td></tr>
							<?php  } } ?>
							</table>
						</div>
					</div>
					<?php  } } ?>
				</div>
				<?php  } else { ?>
				<div class='form-control-static'>
					<div class="panel panel-danger">
						<div class="panel-body">
							<?php  echo $reportsDetail;?>
						</div>
					</div>
				</div>
				<?php  } ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<input type="button" class="btn btn-default" name="submit" onclick="history.go(-1)" value="返回列表" />
			</div>
		</div>
	</div>
	<style>
		.table > tbody > tr > td{white-space: inherit;overflow: inherit;text-overflow: inherit;text-indent: 20px;}
	</style>
</div>
<?php  } else if($operation=='display' ) { ?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>粉丝</th>
			<th>性别</th>
			<th>状态</th>
			<th>诊断类型</th>
			<th>自诊日期</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		<?php  if(is_array($list)) { foreach($list as $item) { ?>
		<tr>
			<td><img style="width: 60px;" src="<?php  echo $item['avatar'];?>"><?php  echo $item['nickname'];?></td>
			<td><?php  if($item['gender']==2) { ?>女<?php  } else if($item['gender']==1) { ?>男<?php  } else { ?>保密<?php  } ?></td>
			<td><?php  if($item['status']==1) { ?>已提交<?php  } else { ?>未提交<?php  } ?></td>
			<td><?php  if($item['type']==1) { ?>自诊系统<?php  } else { ?>健康小测试<?php  } ?></td>
			<td><?php  echo date("Y-m-d",$item['createtime'])?></td>
			<td>
				<a href="<?php  echo create_url('site/entry/reportmanager',array('m'=>'lrj_guide','op'=>'detail','rid'=>$item['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="查看"><i class="fa fa-search"></i></a>
			</td>
		</tr>
		<?php  } } ?>
	</tbody>
</table>
<?php  echo $pager;?> <?php  } ?> <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>