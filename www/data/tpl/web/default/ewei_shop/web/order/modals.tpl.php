<?php defined('IN_IA') or exit('Access Denied');?>
        <!-- 关闭原因 -->
        <div id="modal-close" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="width:600px;margin:0px auto;">
                <form class="form-horizontal form" action="<?php  echo $this->createWebUrl('order')?>" method="post" enctype="multipart/form-data">
                <input type='hidden' name='id' value='' />
                <input type='hidden' name='op' value='deal' />
                <input type='hidden' name='to' value='close' />
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h3>关闭订单</h3>
                    </div>
                    <div class="modal-body">
                        <label>关闭订单原因</label>
                        <textarea style="height:150px;" class="form-control" name="reson" autocomplete="off"></textarea>
                        <div id="module-menus"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="close" value="yes">关闭订单</button>
                        <a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <!-- 确认发货 -->
        <div id="modal-confirmsend" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="width:600px;margin:0px auto;">
            <form class="form-horizontal form" action="<?php  echo $this->createWebUrl('order')?>" method="post" enctype="multipart/form-data">
                <input type='hidden' name='id' value='' />
                <input type='hidden' name='op' value='deal' />
                <input type='hidden' name='to' value='confirmsend' />
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h3>快递信息</h3>
                    </div>
                    <div class="modal-body">              
                        <div class="form-group">
                            <label class="col-xs-10 col-sm-3 col-md-3 control-label">快递公司</label>
                            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                                <select class="form-control" name="express" id="express">
                                    <option value="" data-name="">其他快递</option>
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
                                <input type='hidden' name='expresscom' id='expresscom' />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-10 col-sm-3 col-md-3 control-label">快递单号</label>
                            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                                <input type="text" name="expresssn" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-10 col-sm-3 col-md-3 control-label">发货备注<br/>(商品编号_数量;)</label>
                            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                            	 <textarea name="express_remark" rows="3" class="form-control">
                            	 	
                            	 </textarea>
                            </div>
                        </div>                 
                        <div id="module-menus"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary span2" name="confirmsend" value="yes">确认发货</button>
                        <a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
		<script>
			$(function(){
				$("#express").change(function(){
					var selected_option="option[value='"+$(this).val()+"']";
					$("#expresscom").val(($(selected_option).data("name")));
				});
			})
		</script>
        <!-- 取消发货 -->
        <div id="modal-cancelsend" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="width:600px;margin:0px auto;">
              <form class="form-horizontal form" action="<?php  echo $this->createWebUrl('order')?>" method="post" enctype="multipart/form-data">
                <input type='hidden' name='id' value='' />
                <input type='hidden' name='op' value='deal' />
                <input type='hidden' name='to' value='cancelsend' />
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h3>取消发货</h3>
                    </div>
                    <div class="modal-body">
                        <label>取消发货原因</label>
                        <textarea style="height:150px;" class="form-control" name="cancelreson" autocomplete="off"></textarea>
                        <div id="module-menus"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary span2" name="cancelsend" value="yes">取消发货</button>
                        <a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a>
                    </div>
                </div>
            </div>
              </form>
        </div>
        
        <!-- 驳回退款 -->
        <div id="modal-refund" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="width:600px;margin:0px auto;">
                <form class="form-horizontal form" action="<?php  echo $this->createWebUrl('order')?>" method="post" enctype="multipart/form-data">
                <input type='hidden' name='id' value='' />
                <input type='hidden' name='op' value='deal' />
                <input type='hidden' name='to' value='refund' />
            <div class="modal-dialog">
                <div class="modal-content"  >
                    <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>处理退款申请</h3></div>
                    <div class="modal-body">
                        <label class='radio-inline'>
                            <input type='radio' value='0' name='refundstatus' checked>暂不处理
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' value='-1' name='refundstatus'>驳回申请
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' value='1' name='refundstatus'>同意退款到余额
                        </label> 
                        <label class='radio-inline'>
                            <input type='radio' value='2' name='refundstatus'>同意退款到微信钱包
                        </label> 
                        <br/>
                        <textarea class="form-control" name="refundcontent"  autocomplete="off" placeholder='驳回原因'></textarea>

                        <div id="module-menus"></div>
                    </div>
                    <div class="modal-footer"><button type="submit" class="btn btn-primary span2" name="refund" value="yes">确认</button><a href="#" class="btn" data-dismiss="modal" aria-hidden="true">关闭</a></div>
                </div>
            </div>
                </form>
        </div>
 
 