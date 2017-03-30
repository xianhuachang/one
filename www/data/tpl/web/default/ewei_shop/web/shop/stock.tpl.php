<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/shop/tabs', TEMPLATE_INCLUDEPATH)) : (include template('web/shop/tabs', TEMPLATE_INCLUDEPATH));?>
<?php  if($operation == 'display') { ?>
<form action="" method="post">
<div class="main panel panel-default">
    <div class="panel-body table-responsive">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th>商品名称</th>
                    <th>批号</th>
                    <th>进货数量</th>
                    <th>剩余数量</th>
                    <th>进货日期</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php  echo $item['title'];?></td>
                    <td><?php  echo $item['lot_number'];?></td>
                    <td><?php  echo $item['quantity'];?></td>
                    <td><?php  echo $item['balance'];?></td>
                    <td><?php  echo date('Y-m-d',$item['createtime'])?>
                    <td style="text-align:left;">
                         <?php if(cv('shop.stock.view|shop.stock.edit')) { ?>
                         <div class="btn btn-default btn-sm output_btn" title="出库" data-balance="<?php  echo $item['balance'];?>" data-pid="<?php  echo $item['id'];?>"><i class="fa fa-send"></i></div>
                         <a href="<?php  echo $this->createWebUrl('shop/stock', array('op' => 'post', 'id' => $item['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="修改"><i class="fa fa-pencil"></i></a><?php  } ?>                       
                         <?php if(cv('shop.stock.delete')) { ?><a href="<?php  echo $this->createWebUrl('shop/stock', array('op' => 'delete', 'id' => $item['id']))?>" class="btn btn-default btn-sm" onclick="return confirm('确认删除此配送方式?')" title="删除"><i class="fa fa-times"></i></a><?php  } ?>
                    	 <?php  if($item['output']) { ?><div class="btn btn-default btn-sm btn-output" title="出库明细" data-pid="<?php  echo $item['id'];?>"><span class="glyphicon glyphicon-chevron-down"></span></div><?php  } ?>
                     </td>
                </tr>
               
	               		<?php  if($item['output']) { ?>
	               		 <tr style="display: none;">
	               		 	<td colspan='6'>
	               			<ul data-detail="<?php  echo $item['id'];?>" style="list-style: none;">
	               				<?php  if(is_array($item['output'])) { foreach($item['output'] as $o) { ?>
				            	<li><?php  echo '出货日期:'. date('Y-m-d',$o['createtime']).'　　　　　　出货数量:'.$o['number']?></li>
				            	<?php  } } ?>							  
							</ul>
							</td>
						</tr>
		                <?php  } ?> 
                <?php  } } ?>
                <tr>
                    <td colspan='6'>
                        <?php if(cv('shop.dispatch.add')) { ?>
                        <a class='btn btn-default' href="<?php  echo $this->createWebUrl('shop/stock',array('op'=>'post'))?>"><i class='fa fa-plus'></i> 添加商品进货数量</a>
                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        <?php  } ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
</form>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="panel panel-success">
		  <div class="panel-heading">
		    <h3 class="panel-title"></h3>
		  </div>
		  <div class="panel-body">
		     <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">发货数量</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="output_number" min="1" placeholder="发货数量">
			    </div>
			  </div>
		  </div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button"  class="btn btn-primary" id="outstockBtn">确定</button>
      </div>
    </div>
  </div>
</div>
<script>
    require(['bootstrap'], function ($) {
        $('.btn').hover(function () {
            $(this).tooltip('show');
        }, function () {
            $(this).tooltip('hide');
        });
    });
	$(function(){
		$('div[data-pid]').each(function(){
			var _this=$(this);
			_this.click(function(){
				console.log(_this.data('pid'));
			});		
		});
		
		$('.output_btn').each(function(){
			var _this=$(this);
			_this.on('click',function(){
				balance=_this.data('balance');
				if(balance==0){
					return false;
				}
				$('#output_number').val(balance).prop('max',balance);
				$('#outstockBtn').on('click',function(){
					 output_number=$('#output_number').val();
					 pid=_this.data('pid');
					 $.post(
					 	"<?php  echo $this->createWebUrl('shop/stock',array('op'=>'output'))?>",
					 	 {'output_number':output_number,'pid':pid},
					 	function(data){
					 		console.log(data.status);
					 		if(data.status==200){
					 			window.location.reload();
					 		}else{
					 			alert("系统异常，请稍候再试");
					 		}
					 	},
					 	'json'
					 );
				});
				$('#myModal').modal({
					  keyboard: false,
					  backdrop: 'static'
				});
			});
		});
		
		$('.btn-output').each(function(){
			var _this=$(this);
			_this.click(function(){
				_this.parent().parent().next().toggle();
			})
		})
	});
</script>
<?php  } else if($operation == 'post') { ?>
<div class="main">
    
    <form  <?php if( ce('shop.stock' ,$item) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form" >
    
        <div class="panel panel-default">
            <div class="panel-heading">
                进货单
            </div>
            <div class="panel-body">                
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品</label>
                    <div class="col-sm-9 col-xs-12">
                        <select name="goods" class="form-control">
                        	<?php  if(is_array($all_goods)) { foreach($all_goods as $g) { ?>
                        	<option value="<?php  echo $g['id'];?>" <?php  if($item['gid']==$g['id']) { ?>selected<?php  } ?> ><?php  echo $g['title'];?></option>
                        	<?php  } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>进货数量</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="number" min="1" name="quantity" class="form-control" value="<?php  echo $item['quantity'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">进货批号</label>
                    <div class="col-sm-9 col-xs-12">
                        <input name="lot_number" class="form-control" value="<?php  echo $item['lot_number'];?>"/>
                    </div>
                </div> 
           		<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                           <?php if( ce('shop.stock' ,$item) ) { ?>
                            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"/>
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                            <input type="hidden" name="id" value="<?php  echo $id;?>" />
                        <?php  } ?>
                       <input type="button" name="back" onclick='history.back()' <?php if(cv('shop.stock.add|shop.stock.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default col-lg-1" />
                    </div>
            	</div>   
            	</div>
        </div>
    </form>
</div>
<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>