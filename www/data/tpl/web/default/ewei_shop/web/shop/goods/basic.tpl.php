<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('shop.goods' ,$item) ) { ?>
        <input type="text" name="displayorder" id="displayorder" class="form-control" value="<?php  echo $item['displayorder'];?>" />
        <span class='help-block'>数字越大，排名越靠前,如果为空，默认排序方式为创建时间</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['displayorder'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>商品名称</label>
    <div class="col-sm-9 col-xs-12">
         <?php if( ce('shop.goods' ,$item) ) { ?>
        <input type="text" name="goodsname" id="goodsname" class="form-control" value="<?php  echo $item['title'];?>" />
            <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['title'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>分类</label>
    <div class="col-sm-8 col-xs-12">
        <?php  if($shopset['catlevel']==3) { ?>
             <?php if( ce('shop.goods' ,$item) ) { ?>
             <?php  echo tpl_form_field_category_3level('category', $parent, $children, $item['pcate'], $item['ccate'], $item['tcate'])?>
             <?php  } else { ?>
              <div class='form-control-static'>
                   <?php  echo pdo_fetchcolumn('select name from '.tablename('ewei_shop_category').' where id=:id limit 1',array(':id'=>$item['pcate']))?> - 
                   <?php  echo pdo_fetchcolumn('select name from '.tablename('ewei_shop_category').' where id=:id limit 1',array(':id'=>$item['ccate']))?> -
                   <?php  echo pdo_fetchcolumn('select name from '.tablename('ewei_shop_category').' where id=:id limit 1',array(':id'=>$item['tcate']))?>
              </div>
             <?php  } ?>
             
        <?php  } else { ?>
            <?php if( ce('shop.goods' ,$item) ) { ?>
            <?php  echo tpl_form_field_category_2level('category', $parent, $children, $item['pcate'], $item['ccate'])?>
            <?php  } else { ?>
              <div class='form-control-static'>
                   <?php  echo pdo_fetchcolumn('select name from '.tablename('ewei_shop_category').' where id=:id limit 1',array(':id'=>$item['pcate']))?> - 
                   <?php  echo pdo_fetchcolumn('select name from '.tablename('ewei_shop_category').' where id=:id limit 1',array(':id'=>$item['ccate']))?> 
              </div>
            <?php  } ?>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品类型</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('shop.goods' ,$item) ) { ?>
        <label for="isshow3" class="radio-inline"><input type="radio" name="type" value="1" id="isshow3" <?php  if(empty($item['type']) || $item['type'] == 1) { ?>checked="true"<?php  } ?> onclick="$('#product').show()" /> 实体商品</label>
        <label for="isshow4" class="radio-inline"><input type="radio" name="type" value="2" id="isshow4"  <?php  if($item['type'] == 2) { ?>checked="true"<?php  } ?>  onclick="$('#product').hide()" /> 虚拟商品</label>
        <?php  } else { ?>
         <div class='form-control-static'><?php  if(empty($item['type']) || $item['type'] == 1) { ?>实体物品<?php  } else { ?>虚拟物品<?php  } ?></div>
         <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品单位</label>
    <div class="col-sm-6 col-xs-6">
          <?php if( ce('shop.goods' ,$item) ) { ?>
        <input type="text" name="unit" id="unit" class="form-control" value="<?php  echo $item['unit'];?>" />
        <span class="help-block">如: 个/件/包</span>
        <?php  } else { ?>
           <div class='form-control-static'><?php  echo $item['unit'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品属性</label>
    <div class="col-sm-9 col-xs-12" >
          <?php if( ce('shop.goods' ,$item) ) { ?>
        <label for="isrecommand" class="checkbox-inline">
            <input type="checkbox" name="isrecommand" value="1" id="isrecommand" <?php  if($item['isrecommand'] == 1) { ?>checked="true"<?php  } ?> /> 推荐
        </label>
        <label for="isnew" class="checkbox-inline">
            <input type="checkbox" name="isnew" value="1" id="isnew" <?php  if($item['isnew'] == 1) { ?>checked="true"<?php  } ?> /> 新上
        </label>
        <label for="ishot" class="checkbox-inline">
            <input type="checkbox" name="ishot" value="1" id="ishot" <?php  if($item['ishot'] == 1) { ?>checked="true"<?php  } ?> /> 热卖
        </label>
        <label for="isdiscount" class="checkbox-inline">
            <input type="checkbox" name="isdiscount" value="1" id="isdiscount" <?php  if($item['isdiscount'] == 1) { ?>checked="true"<?php  } ?> /> 促销
        </label>
        <label for="issendfree" class="checkbox-inline">
            <input type="checkbox" name="issendfree" value="1" id="issendfree" <?php  if($item['issendfree'] == 1) { ?>checked="true"<?php  } ?> /> 包邮
        </label>
        <label for="istime" class="checkbox-inline">
            <input type="checkbox" name="istime" value="1" id="istime" <?php  if($item['istime'] == 1) { ?>checked="true"<?php  } ?> /> 限时卖
        </label>
          <label for="istime" class="checkbox-inline">
            <input type="checkbox" name="isnodiscount" value="1" id="isnodiscount" <?php  if($item['isnodiscount'] == 1) { ?>checked="true"<?php  } ?> /> 不参与会员折扣
        </label>
          <?php  } else { ?> <div class='form-control-static'>
              <?php  if($item['isnew']==1) { ?>新品; <?php  } ?>
              <?php  if($item['ishot']==1) { ?>热卖; <?php  } ?>
              <?php  if($item['isrecommand']==1) { ?>推荐; <?php  } ?>
              <?php  if($item['isdiscount']==1) { ?>促销; <?php  } ?>
              <?php  if($item['issendfree']==1) { ?>包邮; <?php  } ?>
              <?php  if($item['istime']==1) { ?>限时卖; <?php  } ?> 
              <?php  if($item['isnodiscount']==1) { ?>不参与折扣; <?php  } ?>
          </div>
          <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">限时卖时间</label>
      <?php if( ce('shop.goods' ,$item) ) { ?>
    <div class="col-sm-4 col-xs-6">
        <?php echo tpl_form_field_date('timestart', !empty($item['timestart']) ? date('Y-m-d H:i',$item['timestart']) : date('Y-m-d H:i'), 1)?>
    </div>
    <div class="col-sm-4 col-xs-6">
        <?php echo tpl_form_field_date('timeend', !empty($item['timeend']) ? date('Y-m-d H:i',$item['timeend']) : date('Y-m-d H:i'), 1)?>
    </div>
      <?php  } else { ?>
       <div class="col-sm-6 col-xs-6">
           <div class='form-control-static'>
               <?php  if($item['istime']==1) { ?>
               <?php  echo date('Y-m-d H:i',$item['timestart'])?> - <?php  echo date('Y-m-d H:i',$item['timeend'])?>
               <?php  } ?>
           </div>
       </div>
      <?php  } ?>
</div>


<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品图</label>
    <div class="col-sm-9 col-xs-12">
             <?php if( ce('shop.goods' ,$item) ) { ?>
        <?php  echo tpl_form_field_image('thumb', $item['thumb'])?>
        <span class="help-block">建议尺寸: 640 * 640 ，或正方型图片 </span>
          <?php  } else { ?>
                            <?php  if(!empty($item['thumb'])) { ?>
                            <a href='<?php  echo tomedia($item['thumb'])?>' target='_blank'>
                            <img src="<?php  echo tomedia($item['thumb'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
                            </a>
                            <?php  } ?>
                        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">其他图片</label>
    <div class="col-sm-9 col-xs-12">
           <?php if( ce('shop.goods' ,$item) ) { ?>
        <?php  echo tpl_form_field_multi_image('thumbs',$piclist)?>
            <span class="help-block">建议尺寸: 640 * 640 ，或正方型图片 </span>
            <?php  } else { ?>
             <?php  if(is_array($piclist)) { foreach($piclist as $p) { ?>
             <a href='<?php  echo tomedia($p)?>' target='_blank'>
               <img src="<?php  echo tomedia($p)?>" style='height:100px;border:1px solid #ccc;padding:1px;float:left;margin-right:5px;' />
             </a>
             <?php  } } ?>
            <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品编号</label>
    <div class="col-sm-4 col-xs-12">
          <?php if( ce('shop.goods' ,$item) ) { ?>
        <input type="text" name="goodssn" id="goodssn" class="form-control" value="<?php  echo $item['goodssn'];?>" />
          <?php  } else { ?>
           <div class='form-control-static'><?php  echo $item['goodssn'];?></div>
        <?php  } ?>
    </div>
</div>
<!--
<div class="form-group">
    <label class=" col-sm-3 col-md-2 control-label">邮寄次数</label>
    <div class="col-sm-4 col-xs-12">
           <?php if( ce('shop.goods' ,$item) ) { ?>
        <input type="text" name="productsn" id="productsn" class="form-control" value="<?php  echo $item['productsn'];?>" />
            <?php  } else { ?>
           <div class='form-control-static'><?php  echo $item['productsn'];?></div>
        <?php  } ?>
    </div>
</div>
-->
<div class="form-group">
    <label class=" col-sm-3 col-md-2 control-label">每天销售配额</label>
    <div class="col-sm-4 col-xs-12">
           <?php if( ce('shop.goods' ,$item) ) { ?>
        <input type="text" name="quotas" id="quotas" class="form-control" value="<?php  echo $item['quotas'];?>" />
            <?php  } else { ?>
           <div class='form-control-static'><?php  echo $item['quotas'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品价格</label>
    <div class="col-sm-9 col-xs-12">
         <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class="input-group form-group">

            <span class="input-group-addon">现价</span>
            <input type="text" name="marketprice" id="marketprice" class="form-control" value="<?php  echo $item['marketprice'];?>" />
            <span class="input-group-addon">元</span>
        </div>
          <?php  } else { ?>
           <div class='form-control-static'>现价：<?php  echo $item['marketprice'];?> 元</div>
        <?php  } ?>
    <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class="input-group form-group">
            <span class="input-group-addon">原价</span>
            <input type="text" name="productprice" id="productprice" class="form-control" value="<?php  echo $item['productprice'];?>" />
            <span class="input-group-addon">元</span>
        </div>
           <?php  } else { ?>
           <div class='form-control-static'>原价：<?php  echo $item['productprice'];?> 元</div>
        <?php  } ?>
            <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class="input-group form-group">
            <span class="input-group-addon">成本</span>
            <input type="text" name="costprice" id="costprice" class="form-control" value="<?php  echo $item['costprice'];?>" />
            <span class="input-group-addon">元</span>
        </div>
           <?php  } else { ?>
           <div class='form-control-static'>成本：<?php  echo $item['costprice'];?> 元</div>
        <?php  } ?>
           <?php if( ce('shop.goods' ,$item) ) { ?>
        <span class='help-block'>尽量填写完整，有助于于商品销售的数据分析</span>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品分销利润</label>
    <div class="col-sm-6 col-xs-12">
        <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class="input-group">
            <input type="text" name="commission_sum" id="commission_sum" class="form-control" value="<?php  echo $item['commission_sum'];?>" />
            <span class="input-group-addon">%</span>
        </div>
        <?php  } ?>
        <span class="help-block">不填写为( 产品销售价格 - 产品成本 )</span>
    </div>        
</div>

<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">重量</label>
    <div class="col-sm-6 col-xs-12">
        <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class="input-group">
            <input type="text" name="weight" id="weight" class="form-control" value="<?php  echo $item['weight'];?>" />
            <span class="input-group-addon">克</span>
        </div>
        <?php  } else { ?>
         <div class='form-control-static'><?php  echo $item['weight'];?> 克</div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">库存</label>
    <div class="col-sm-6 col-xs-12">
             <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class="input-group">
            <input type="text" name="total" id="total" class="form-control" value="<?php  echo $item['total'];?>" />
            <span class="input-group-addon">件</span>
        </div>
        <span class="help-block">当前商品的库存数量</span>
        <?php  } else { ?>
         <div class='form-control-static'><?php  echo $item['total'];?> 件</div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">减库存方式</label>
    <div class="col-sm-9 col-xs-12">
              <?php if( ce('shop.goods' ,$item) ) { ?>
        <label for="totalcnf1" class="radio-inline"><input type="radio" name="totalcnf" value="0" id="totalcnf1" <?php  if(empty($item) || $item['totalcnf'] == 0) { ?>checked="true"<?php  } ?> /> 拍下减库存</label>
        &nbsp;&nbsp;&nbsp;
        <label for="totalcnf2" class="radio-inline"><input type="radio" name="totalcnf" value="1" id="totalcnf2"  <?php  if(!empty($item) && $item['totalcnf'] == 1) { ?>checked="true"<?php  } ?> /> 付款减库存</label>
        &nbsp;&nbsp;&nbsp;
        <label for="totalcnf3" class="radio-inline"><input type="radio" name="totalcnf" value="2" id="totalcnf3"  <?php  if(!empty($item) && $item['totalcnf'] == 2) { ?>checked="true"<?php  } ?> /> 永不减库存</label>
        <?php  } else { ?>
        
        <div class='form-control-static'>
           <?php  if(empty($item) || $item['totalcnf'] == 0) { ?>拍下减库存<?php  } ?> 
           <?php  if(!empty($item) && $item['totalcnf'] == 1) { ?>付款减库存<?php  } ?>
           <?php  if(!empty($item) && $item['totalcnf'] == 2) { ?>永不减库存<?php  } ?>
         </div>
        
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">单次最多购买量</label>
    <div class="col-sm-6 col-xs-12">
               <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class="input-group">
            <input type="text" name="maxbuy" id="maxbuy" class="form-control" value="<?php  echo $item['maxbuy'];?>" />
            <span class="input-group-addon">件</span>
        </div>
                    <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['maxbuy'];?> 件</div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户最多购买量</label>
    
    <div class="col-sm-6 col-xs-12">
            <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class="input-group">
            <input type="text" name="usermaxbuy" class="form-control" value="<?php  echo $item['usermaxbuy'];?>" />
            <span class="input-group-addon">件</span>
        </div>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['usermaxbuy'];?> 件</div>
        <?php  } ?>
        
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">已出售数</label>
    <div class="col-sm-6 col-xs-12">
              <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class="input-group">
            <input type="text" name="sales" id="sales" class="form-control" value="<?php  echo $item['sales'];?>" />
            <span class="input-group-addon">件</span>
        </div>
            <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['sales'];?> 件</div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">购买积分</label>
    <div class="col-sm-6 col-xs-12">
            <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class="input-group">
            <input type="text" name="credit" id="credit" class="form-control" value="<?php  echo $item['credit'];?>" />
            <span class="input-group-addon">分</span>
        </div>
        <p class="help-block">会员购买积分, 如果不填写，则默认为不奖励积分</p>
               <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['credit'];?> 分</div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否上架</label>
    <div class="col-sm-9 col-xs-12">
          <?php if( ce('shop.goods' ,$item) ) { ?>
        <label for="isshow1" class="radio-inline"><input type="radio" name="status" value="1" id="isshow1" <?php  if($item['status'] == 1) { ?>checked="true"<?php  } ?> /> 是</label>
        &nbsp;&nbsp;&nbsp;
        <label for="isshow2" class="radio-inline"><input type="radio" name="status" value="0" id="isshow2"  <?php  if($item['status'] == 0) { ?>checked="true"<?php  } ?> /> 否</label>&nbsp;&nbsp;&nbsp;
        <label for="isshow2" class="radio-inline"><input type="radio" name="status" value="0" id="isshow2"  <?php  if($item['status'] == 2) { ?>checked="true"<?php  } ?> /> 仅供展示</label>
        <span class="help-block"></span>
        
            <?php  } else { ?>
                            <div class='form-control-static'><?php  if(empty($item['status'])) { ?>否<?php  } else { ?>是<?php  } ?></div>
                        <?php  } ?>
                        
    </div>
</div>