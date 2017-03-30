<?php defined('IN_IA') or exit('Access Denied');?>	<script type="text/javascript">
		require(['bootstrap']);
		$('.js-clip').each(function(){
			util.clip(this, $(this).attr('data-url'));
		});
	</script>
	<div class="container-fluid footer" role="footer">
		<div class="page-header"></div>
		<span class="pull-left">
			<p><?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by <a href="http://www.igzlrj.com"><b>路仁甲</b></a> v<?php echo IMS_VERSION;?> &copy; 2016 <a href="http://www.igzlrj.com">www.igzlrj.com</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?></p>
		</span>
	</div>
	<?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?>
</body>
</html>
