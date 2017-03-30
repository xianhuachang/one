<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<div class='panel panel-default'>
    <div class="panel-heading">
        已安装插件
    </div>
    <div class='panel-body'>
        <?php  if(is_array($plugins)) { foreach($plugins as $plugin) { ?>
        <?php if(cp($plugin['identity'])) { ?>
        <a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl($plugin['identity'])?>" title="<?php  echo $plugin['name'];?>">
            <i class="fa fa-external-link-square fa-2x"></i>
            <br/>
            <span><?php  echo $plugin['name'];?></span>
        </a>
        <?php  } ?>
        <?php  } } ?>
    </div>
    <?php  if($_W['isfounder']) { ?>
    <div class='panel-footer'>
        <a href='javascript:;' > >>查找更多插件</a>
    </div>
    <?php  } ?>
</div>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>
