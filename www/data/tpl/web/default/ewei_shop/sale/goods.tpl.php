<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">积分抵扣</label>
    <div class="col-sm-4">
       <?php if( ce('shop.goods' ,$item) ) { ?>
        <div class='input-group'>
            <span class="input-group-addon">最多抵扣</span>
            <input type="text" name="deduct"  value="<?php  echo $item['deduct'];?>" class="form-control" />
            <span class="input-group-addon">元</span>
        </div>
       <span class="help-block">如果设置0，则不支持积分抵扣</span>
          <?php  } else { ?>
          <div class='form-control-static'>
              <?php  if(empty($item['deduct'])) { ?>不支持积分抵扣<?php  } else { ?>最多抵扣 <?php  echo $item['deduct'];?> 元 <?php  } ?>
         </div>
          <?php  } ?>
    </div>   
  
</div> 