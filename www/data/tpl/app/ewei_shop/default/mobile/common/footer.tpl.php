<?php defined('IN_IA') or exit('Access Denied');?><?php  if($show_footer) { ?>
<style type="text/css">
		footer#footer-nav .menu-list{display: flex;}
    	footer#footer-nav .menu-list li { flex: 1;} 
</style>
<div style='height:80px;width:100%'></div>
<footer id="footer-nav">
                <ul class="menu-list" style="margin:0">
                    <li <?php  if($footer_current=='first') { ?>class='active'<?php  } ?>><a href="<?php  echo $this->footer['first']['url']?>"><i class="fa fa-<?php  echo $this->footer['first']['ico']?>"></i><span><?php  echo $this->footer['first']['text']?></span></a></li>
                    <li <?php  if($footer_current=='second') { ?>class='active'<?php  } ?>><a href="<?php  echo $this->footer['second']['url']?>"><i class="fa fa-<?php  echo $this->footer['second']['ico']?>"></i><span><?php  echo $this->footer['second']['text']?></span></a></li>
                <?php  if($this->footer['commission']) { ?>
                    <li <?php  if($footer_current=='commission') { ?>class='active'<?php  } ?>>
                    		<!--<a href="<?php  echo $this->createPluginMobileUrl('commission')?>">
                    			<i class="fa fa-users"></i><span>管家中心</span></a>-->
                    		<a href="<?php  echo $this->footer['commission']['url']?>">
                    		<i class="fa fa-<?php  echo $this->footer['commission']['ico']?>"></i>
                    		<span><?php  echo $this->footer['commission']['text']?></span>
                    		</a>               	
                    </li>
                 <?php  } ?> 
                    <li <?php  if($footer_current=='cart') { ?>class='active'<?php  } ?>><a href="<?php  echo $this->createMobileUrl('shop/cart')?>"><i class="fa fa-shopping-cart"></i><span>购物车</span></a></li>
                    <li <?php  if($footer_current=='member') { ?>class='active'<?php  } ?>><a href="<?php  echo $this->createMobileUrl('member')?>"><i class="fa fa-user"></i><span>会员中心</span></a></li>
                </ul>
</footer>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer_base', TEMPLATE_INCLUDEPATH)) : (include template('common/footer_base', TEMPLATE_INCLUDEPATH));?>