<?php defined('IN_IA') or exit('Access Denied');?><ul class="nav nav-pills nav-stacked" style="float: left;  margin-left: 25px;min-width: 100px;">
	<?php  if(is_array($parts)) { foreach($parts as $index => $item) { ?>
	<li role="presentation">
		<a class="symptomurl" href="<?php  echo $this->createMobileUrl($do,array('pid'=>$item['id'],'t'=>$t))?>#page_<?php  echo $index;?>">
			<?php  if($t==1 && $item['name']=="胸部") { ?>
			心肺
			<?php  } else { ?>
			 <?php  echo $item['name'];?>
			<?php  } ?>
			<?php  if($item['count'] <>0 ) { ?>
				<span class='badge'><?php  echo $item['count'];?></span>
			<?php  } else { ?><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<?php  } ?>
		</a>
	</li>
	<?php  } } ?>
</ul>