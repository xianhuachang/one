<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/shop/tabs', TEMPLATE_INCLUDEPATH)) : (include template('web/shop/tabs', TEMPLATE_INCLUDEPATH));?>
<?php  if($operation == 'display') { ?>
<form action="" method="post">
<div class="main panel panel-default">
    <div class="panel-body table-responsive">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th style="width:50px;">ID</th>
                    <th style="width:80px;">显示顺序</th>
                    <th>配送方式名称</th>
                    <th>配送类型</th>
                    <th>首重价格</th>
                    <th>续重价格</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php  echo $item['id'];?></td>
                    <td>
                        <?php if(cv('shop.dispatch.edit')) { ?>
                        <input type="text" class="form-control" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>">
                        <?php  } ?>
                    </td>
                    <td><?php  echo $item['dispatchname'];?></td>
                    <td><?php  if($item['dispatchtype']==0) { ?>
                        商家配送
                        <?php  } else { ?>
                        客户自提
                        <?php  } ?></td>
                    <td><?php  echo $item['firstprice'];?></td>
                    <td><?php  echo $item['secondprice'];?></td>
                    <td><label class='label  label-default <?php  if($item['enabled']==1) { ?>label-info<?php  } ?>' ><?php  if($item['enabled']==1) { ?>显示<?php  } else { ?>隐藏<?php  } ?></label></td>
                    <td style="text-align:left;">
                         <?php if(cv('shop.dispatch.view|shop.dispatch.edit')) { ?><a href="<?php  echo $this->createWebUrl('shop/dispatch', array('op' => 'post', 'id' => $item['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="修改"><i class="fa fa-pencil"></i></a><?php  } ?>
                         <?php if(cv('shop.dispatch.delete')) { ?><a href="<?php  echo $this->createWebUrl('shop/dispatch', array('op' => 'delete', 'id' => $item['id']))?>" class="btn btn-default btn-sm" onclick="return confirm('确认删除此配送方式?')" title="删除"><i class="fa fa-times"></i></a><?php  } ?>
                    </td>
                </tr>
                <?php  } } ?>
                <tr>
                    <td colspan='8'>
                          <?php if(cv('shop.dispatch.add')) { ?>
                        <a class='btn btn-default' href="<?php  echo $this->createWebUrl('shop/dispatch',array('op'=>'post'))?>"><i class='fa fa-plus'></i> 添加配送方式</a>
                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        <?php  } ?>
                        <?php if(cv('shop.dispatch.add')) { ?>
                        <input name="submit" type="submit" class="btn btn-primary" value="提交排序">
                        <?php  } ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
</form>
<script>
    require(['bootstrap'], function ($) {
        $('.btn').hover(function () {
            $(this).tooltip('show');
        }, function () {
            $(this).tooltip('hide');
        });
    });
</script>

<?php  } else if($operation == 'post') { ?>
<div class="main">
    <form <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
        <input type="hidden" name="id" value="<?php  echo $dispatch['id'];?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                配送方式设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                            <input type="text" name="displayorder" class="form-control" value="<?php  echo $dispatch['displayorder'];?>" />
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $dispatch['displayorder'];?></div>
                        <?php  } ?>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>配送方式名称</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                        <input type="text" id='dispatchname' name="dispatchname" class="form-control" value="<?php  echo $dispatch['dispatchname'];?>" />
                          <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $dispatch['dispatchname'];?></div>
                        <?php  } ?>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">配送类型</label>
                    <div class="col-sm-9 col-xs-12">
                          <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                        <label class='radio-inline'>
                            <input type='radio' name='dispatchtype' value='0' <?php  if($dispatch['dispatchtype']==0) { ?>checked<?php  } ?> /> 商家配送
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' name='dispatchtype' value='1' <?php  if($dispatch['dispatchtype']==1) { ?>checked<?php  } ?> /> 自提
                        </label>
                          <?php  } else { ?>
                              <div class='form-control-static'><?php  if(empty($dispatch['dispatchtype'])) { ?>商家配送<?php  } else { ?>自提<?php  } ?></div>
                          <?php  } ?>
                    </div>
                </div>
                <div class="form-group dispatch0" <?php  if($dispatch['dispatchtype']==1) { ?>style='display:none'<?php  } ?>>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">物流公司</label>
                    <div class="col-sm-9 col-xs-12">
                         <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                        <input type='hidden' name='expressname' value='<?php  echo $dispatch['expressname'];?>'/>
                        <select name='express' class="form-control input-medium">
                            <option value="" data-name="其他快递">其他快递</option>
                            <option value="shunfeng" data-name="顺丰">顺丰</option>
                            <option value="shentong" data-name="申通">申通</option>
                            <option value="yunda" data-name="韵达快运">韵达快运</option>
                            <option value="tiantian" data-name="天天快递">天天快递</option>
                            <option value="yuantong" data-name="圆通速递">圆通速递</option>
                            <option value="zhongtong" data-name="中通速递">中通速递</option>
                            <option value="ems" data-name="ems快递">ems快递</option>
                            <option value="huitongkuaidi" data-name="汇通快运">汇通快运</option>
                            <option value="quanfengkuaidi" data-name="全峰快递">全峰快递</option>
                            <option value="zhaijisong" data-name="宅急送">宅急送</option>    
                        </select>
                        <span class="help-block">如果您选择了常用快递，则客户可以订单中查询快递信息，如果缺少您想要的快递，您可以联系我们! </span>
                        <?php  } else { ?>
                         <div class='form-control-static'><?php  echo $dispatch['expressname'];?></div>
                        <?php  } ?>
                    </div>
                </div>
             
              <div class="form-group dispatch0" <?php  if($dispatch['dispatchtype']==1) { ?>style='display:none'<?php  } ?>>
                         <label class="col-xs-12 col-sm-3 col-md-2 control-label">配送区域</label>
                    <div class="col-sm-9 col-xs-12">
                   
                        <table>
                            <thead>
                            <tr>
                                <th style="height:40px;width:400px;">运送到</th>
                                <th style="width:120px;">首重(克)</th>
                                <th style="width:120px;">首费(元)</th>
                                <th style="width:120px;">续重(克)</th>
                                <th style="width:120px;">续费(元)</th>
                                <th style="width:120px;">管理</th>
                            </tr>
                            </thead>
                            <tbody id='tbody-areas'>
                            <tr>
                                <td style="padding:10px;">全国 [默认运费]</td>
                                <td class="text-center">
                                    <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                                    <input type="number" value="<?php echo empty($dispatch['firstweight'])?1000:$dispatch['firstweight']?>" class="form-control" name="default_firstweight" style="width:100px;"></td>
                                  <?php  } else { ?>
                                      <div class='form-control-static'><?php echo empty($dispatch['firstweight'])?1000:$dispatch['firstweight']?></div>
                                  <?php  } ?>
                                <td class="text-center">
                                    <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                                    <input type="text" value="<?php  echo $dispatch['firstprice'];?>" class="form-control" name="default_firstprice"  style="width:100px;"></td>
                                   <?php  } else { ?>
                                      <div class='form-control-static'><?php  echo $dispatch['firstprice'];?></div>
                                  <?php  } ?>
                                <td class="text-center">
                                    <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                                    <input type="number" value="<?php echo empty($dispatch['secondweight'])?1000:$dispatch['secondweight']?>" class="form-control" name="default_secondweight"  style="width:100px;"></td>
                                     <?php  } else { ?>
                                      <div class='form-control-static'><?php echo empty($dispatch['secondweight'])?1000:$dispatch['secondweight']?></div>
                                  <?php  } ?>
                                <td class="text-center">
                                    <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                                    <input type="text" value="<?php  echo $dispatch['secondprice'];?>" class="form-control" name="default_secondprice"  style="width:100px;"></td>
                                     <?php  } else { ?>
                                      <div class='form-control-static'><?php  echo $dispatch['secondprice'];?></div>
                                  <?php  } ?>
                                <td></td>
                            </tr>
                            <?php  if(is_array($dispatch_areas)) { foreach($dispatch_areas as $row) { ?>
                               <?php  $random = random(16);?>
                               <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/shop/tpl/dispatch', TEMPLATE_INCLUDEPATH)) : (include template('web/shop/tpl/dispatch', TEMPLATE_INCLUDEPATH));?>
                            <?php  } } ?>
                            </tbody>
                        </table>
                          <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                          <a class='btn btn-default' href="javascript:;" onclick='addArea(this)'><span class="fa fa-plus"></span> 新增配送区域</a>
                        <span class='help-i'>根据重量来计算运费，当物品不足《首重重量》时，按照《首重费用》计算，超过部分按照《续重重量》和《续重费用》乘积来计算</span>
                          <?php  } ?>
                        
                    </div>
                        
                    </div>
                  </div>
             <div class="form-group dispatch1" <?php  if($dispatch['dispatchtype']==0) { ?>style='display:none'<?php  } ?>>
                         <label class="col-xs-12 col-sm-3 col-md-2 control-label">自提地址设置</label>
                    <div class="col-sm-9 col-xs-12">
                   
                        <table>
                            <thead>
                            <tr>
                                <th style="width:320px;">公司地址</th>
                                <th style="width:120px;">联系人</th>
                                <th style="width:120px;">联系电话</th>
                                <th style="width:120px;">取货时间</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id='tbody-carriers'>
                                <?php  if(is_array($dispatch_carriers)) { foreach($dispatch_carriers as $row) { ?>
                                   <?php  $random = random(16);?>
                                   <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/shop/tpl/carrier', TEMPLATE_INCLUDEPATH)) : (include template('web/shop/tpl/carrier', TEMPLATE_INCLUDEPATH));?>
                                <?php  } } ?>
                            </tbody>
                        </table>
                          <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                        <a class='btn btn-default' style='margin-top:10px;' href="javascript:;" onclick='addCarrier(this)'><span class="fa fa-plus"></span> 新增自提地点</a>
                        <?php  } ?>
                    </div>
                    </div>
         
            
        
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否显示</label>
                    <div class="col-sm-9 col-xs-12">
                           <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                        <label class='radio-inline'>
                            <input type='radio' name='enabled' value=1' <?php  if($dispatch['enabled']==1) { ?>checked<?php  } ?> /> 是
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' name='enabled' value=0' <?php  if($dispatch['enabled']==0) { ?>checked<?php  } ?> /> 否
                        </label>
                           <?php  } else { ?>
                            <div class='form-control-static'><?php  if(empty($item['enabled'])) { ?>否<?php  } else { ?>是<?php  } ?></div>
                        <?php  } ?>
                    </div>
                </div>
            <div class="form-group"></div>
            <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                           <?php if( ce('shop.dispatch' ,$dispatch) ) { ?>
                            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" onclick="return formcheck()" />
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        <?php  } ?>
                       <input type="button" name="back" onclick='history.back()' <?php if(cv('shop.dispatch.add|shop.dispatch.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default col-lg-1" />
                    </div>
            </div>
            
            
            </div>
        </div>
     
    </form>
</div>
<style type='text/css'>
    .province { float:left; position:relative;width:150px; height:35px; line-height:35px;border:1px solid #fff;}
    .province:hover { border:1px solid #f7e4a5;border-bottom:1px solid #fffec6; background:#fffec6;}
    .province .cityall { margin-top:10px;}
    .province ul { list-style: outside none none;position:absolute;padding:0;background:#fffec6;border:1px solid #f7e4a5;display:none;
    width:auto; width:300px; z-index:999999;left:-1px;top:32px;}
    .province ul li  { float:left;min-width:60px;margin-left:20px; height:30px;line-height:30px; }
 </style>
 <div id="modal-areas"  class="modal fade" tabindex="-1">
    <div class="modal-dialog" style='width: 920px;'>
        <div class="modal-content">
            <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择区域</h3></div>
            <div class="modal-body" style='height:280px;;' > 
                
                <?php  if(is_array($areas['address']['province'])) { foreach($areas['address']['province'] as $value) { ?>
                <div class='province'>
                     <label class='checkbox-inline' style='margin-left:20px;'>
                         <input type='checkbox' class='cityall' /> <?php  echo $value['@attributes']['name']?>
                         <span class="citycount" style='color:#ff6600'></span>
                     </label>
                    <?php  if(count($value['city'])>0) { ?>
                    <ul>
                        <?php  if(is_array($value['city'])) { foreach($value['city'] as $c) { ?>
                        <li>
                             <label class='checkbox-inline'>
                                  <input type='checkbox' class='city' style='margin-top:8px;' city="<?php  echo $c['@attributes']['name']?>" /> <?php  echo $c['@attributes']['name']?>
                            </label>
                     </li>
                        <?php  } } ?>
                    </ul>
                    <?php  } ?>
                </div>
                <?php  } } ?>
            
            </div>
            <div class="modal-footer">
                <a href="javascript:;" id='btnSubmitArea' class="btn btn-success" data-dismiss="modal" aria-hidden="true">确定</a>
                <a href="javascript:;" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a>
            </div>
        </div>
     </div>
</div> 
<script language='javascript'>
    $(function(){
        
        $(':radio[name=dispatchtype]').click(function(){
            var val = $(this).val();
            $(".dispatch0,.dispatch1").hide();
            $(".dispatch" + val ).show();
        })
      
        $("select[name=express]").change(function(){
              var obj = $(this);
                var sel = obj.find("option:selected");
                $(":input[name=expressname]").val(sel.data("name"));
        });
        <?php  if(!empty($dispatch['express'])) { ?>
           $("select[name=express]").val("<?php  echo $dispatch['express'];?>");
        <?php  } ?>

   
        $('.province').mouseover(function(){
              $(this).find('ul').show();
        }).mouseout(function(){
              $(this).find('ul').hide();
        });
        
        $('.cityall').click(function(){
            var checked = $(this).get(0).checked;
            var citys = $(this).parent().parent().find('.city');
            citys.each(function(){
                $(this).get(0).checked = checked;
            });
            var count = 0;
            if(checked){
                count =  $(this).parent().parent().find('.city:checked').length;
            }
            if(count>0){
               $(this).next().html("(" + count + ")")    ;
            }
            else{
                $(this).next().html("");
            }
        });
        $('.city').click(function(){
            var checked = $(this).get(0).checked;
            var cityall = $(this).parent().parent().parent().parent().find('.cityall');
          
            if(checked){
                cityall.get(0).checked = true;
            }
            var count = cityall.parent().parent().find('.city:checked').length;
            if(count>0){
               cityall.next().html("(" + count + ")")    ;
            }
            else{
                cityall.next().html("");
            }
        });    
      
    });
    function getCurrents(withOutRandom){
        var citys = "";
        $('.citys').each(function(){
             var crandom = $(this).prev().val();
             if(withOutRandom && crandom==withOutRandom){
                 return true;
             }
             citys+=$(this).val();
        });
        return citys;
    }
     function addCarrier(btn){
        $(btn).button('loading');
        $.ajax({
            url:"<?php  echo $this->createWebUrl('shop/dispatch',array('op'=>'tpl1'))?>",
            dataType:'json',
            success:function(json){
                $(btn).button('reset');
                 $('#tbody-carriers').append(json.html);
            }
        });
    }
    var current = '';
    function addArea(btn){
        $(btn).button('loading');
        $.ajax({
            url:"<?php  echo $this->createWebUrl('shop/dispatch',array('op'=>'tpl'))?>",
            dataType:'json',
            success:function(json){
                $(btn).button('reset');
                current = json.random;
              
                $('#tbody-areas').append(json.html);
                
                 clearSelects();
                
                $("#modal-areas").modal();
                var currents = getCurrents();
                currents = currents.split(';');
                var citystrs = "";
                $('.city').each(function(){
                    var parentdisabled =false;
                    for(var i in currents){
                        if(currents[i]!='' && currents[i]==$(this).attr('city')){
                            $(this).attr('disabled',true);
                            $(this).parent().parent().parent().parent().find('.cityall').attr('disabled',true);
                        }
                    }
                  
                });
                $('#btnSubmitArea').unbind('click').click(function(){
                      $('.city:checked').each(function(){              
                         citystrs+= $(this).attr('city') +";";
                      });
                      $('.' + current + ' .cityshtml').html(citystrs);
                      $('.' + current + ' .citys').val(citystrs);
                })
            }
        })
    }
    function clearSelects(){
          $('.city').attr('checked',false).removeAttr('disabled');
         $('.cityall').attr('checked',false).removeAttr('disabled');
         $('.citycount').html('');
    }
    function editArea(btn){
        current = $(btn).attr('random');
        clearSelects();
        var old_citys = $(btn).prev().val().split(';');
      
                
        $('.city').each(function(){
            var parentcheck = false;
            for(var i in old_citys){
                if(old_citys[i]==$(this).attr('city')){
                    parentcheck = true;
                    $(this).get(0).checked = true;
                    break;
                }
            }
            if(parentcheck){
                $(this).parent().parent().parent().parent().find('.cityall').get(0).checked=  true;
            }
        });
        
        $("#modal-areas").modal();
        var citystrs = '';
        $('#btnSubmitArea').unbind('click').click(function(){
                   $('.city:checked').each(function(){              
                     citystrs+= $(this).attr('city') +";";
                   });
                   $('.' + current + ' .cityshtml').html(citystrs);
                   $('.' + current + ' .citys').val(citystrs);
        })
           var currents = getCurrents(current);
                currents = currents.split(';');
                var citys = "";
                $('.city').each(function(){
                    var parentdisabled =false;
                    for(var i in currents){
                        if(currents[i]!='' && currents[i]==$(this).attr('city')){
                            $(this).attr('disabled',true);
                            $(this).parent().parent().parent().parent().find('.cityall').attr('disabled',true);
                        }
                    }
                  
                });
    }
    function formcheck() {
        if ($("#dispatchname").isEmpty()) {
            Tip.focus("dispatchname", "请填写配送方式名称!", "top");
            return false;
        }
        return true;
    }
</script>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>