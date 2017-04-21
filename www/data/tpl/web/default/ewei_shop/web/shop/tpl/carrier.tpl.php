<?php defined('IN_IA') or exit('Access Denied');?><tr>
<td class="text-center" style='padding-top:10px;'><input type="tex" value="<?php  echo $row['address'];?>" class="form-control" name="address[]" style="width:300px;"></td>
<td class="text-center" style='padding-top:10px;'><input type="text" value="<?php  echo $row['realname'];?>" class="form-control" name="realname[]" style="width:100px;padding:5px;"></td>
<td class="text-center" style='padding-top:10px;'><input type="text" value="<?php  echo $row['mobile'];?>" class="form-control" name="mobile[]" style="width:100px;padding:5px;"></td>
<td class="text-center" style='padding-top:10px;'><input type="text" value="<?php  echo $row['content'];?>" class="form-control" name="content[]" style="width:200px;padding:5px;"></td>
<td><a href='javascript:;' onclick='$(this).parent().parent().remove()'><i class='fa fa-remove'></i></td>
</tr> 