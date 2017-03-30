<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
    .table td span{display:inline-block;}
    .table td input{margin-bottom:0;}
</style>
<script type="text/javascript">
    $(function() {
        $(".main").delegate("span.switch", "click", function() {
            var sw;
            var a = $(this).find("i");
            var reid = $(this).attr("value");
            if (a.attr("class") == 'fa fa-play') {
                a.attr("class", "fa fa-stop");
                a.parent().attr("title", "关闭");
                sw = '1';
            } else {
                a.attr("class", "fa fa-play");
                a.parent().attr("title", "开启");
                sw = '0';
            }
            $.post(location.href, {'reid': reid, 'switch': sw}, function(dat) {
            });
        });
    });
</script>
<ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo $this->createWebUrl('display')?>">预约活动列表</a></li>
    <li><a href="<?php  echo $this->createWebUrl('post')?>">新建预约活动</a></li>
</ul>
<div class="main">
    <div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="we7_research" />
        	<input type="hidden" name="do" value="display" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">状态</label>
				<div class="col-xs-12 col-sm-8 col-lg-9">
					<select name="status" class='form-control'>
                      	<option value="1" <?php  if($_GPC['status'] == '1') { ?> selected<?php  } ?>>启用</option>
                     	<option value="0" <?php  if($_GPC['status'] == '0') { ?> selected<?php  } ?>>禁用</option>
                     </select>
				</div>
			</div>
            <div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
				<div class="col-xs-12 col-sm-8 col-lg-9">
					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
				</div>
                <div class=" col-xs-12 col-sm-2 col-lg-2">
                	<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                </div>
			</div>
		</form>
	</div>
</div>
<form action="" method="post">
	<div class="panel panel-default">
		<div class="panel-body table-responsive">
            <table class="table table-hover">
                <thead class="navbar-inner">
                    <tr>
                        <th style="width:200px;">预约活动名称</th>
                        <th style="width:260px;">直接链接</th>
                        <th style="width:200px;">启动时间</th>
                        <th style="width:160px; text-align:right;">操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php  if(is_array($ds)) { foreach($ds as $row) { ?>
                    <tr>
                        <td><a href="<?php  echo $this->createWebUrl('manage', array('id' => $row['reid']))?>"><?php  echo $row['title'];?></a></td>
                        <td><input type="text" class="form-control" value="<?php  echo $row['link'];?>" /></td>
                        <td><?php  if($row['isstart']) { ?><?php  echo date('Y/m/d H:i:s', $row['starttime'])?><?php  } else { ?>未开始<?php  } ?></td>
                        <td style="text-align:right;">
                            <a href="<?php  echo $this->createWebUrl('manage', array('id' => $row['reid']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="预约详情"><i class="fa fa-search"></i></a>
                            <a href="<?php  echo $this->createWebUrl('post', array('id' => $row['reid']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="编辑"><i class="fa fa-edit"></i></a>
                            <a href="<?php  echo $this->createWebUrl('delete', array('id' => $row['reid']))?>" onclick="return confirm('删除预约活动将删除所有关联的预约记录，确认吗？');
                                    return false;" class="btn  btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="删除"><i class="fa fa-remove"></i></a>
                            <span class="btn  btn-default btn-sm switch" data-toggle="tooltip" data-placement="bottom" value="<?php  echo $row['reid'];?>" <?php  if($row['switch'] == 0) { ?>title="开启"><i class="fa fa-play"></i>
                                <?php  } else { ?>title="关闭"><i class="fa fa-stop"></i><?php  } ?></span>
                        </td>
                    </tr>
                <?php  } } ?>
                </tbody>
            </table>
		</div>
    </div>
</form>
</div>
<script>
	require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
