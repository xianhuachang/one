<?php defined('IN_IA') or exit('Access Denied');?>﻿<!doctype html>
<html>
	<head>	
	    <meta charset="UTF-8">
		<title>自诊健康需求一览</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
        <link href="./resource/css/bootstrap.min.css" rel="stylesheet">
        <link href="../addons/lrj_guide/recouse/css/selfinspection.min.css" rel="stylesheet">
        <link href="../addons/lrj_guide/recouse/css/animate.min.css" rel="stylesheet">

	</head>	
	
	<body>
	<div class="container" style="margin-bottom: 80px;" >  
	<!--<img src="../addons/lrj_guide/recouse/images/guide.jpg" class="img-responsive" alt="guide"> -->
	<img src="../addons/lrj_guide/recouse/images/s3.jpg" class="img-responsive" alt="guide"> 
    </div>
  <div class="panel-bottom" style="position: fixed;bottom: 0px;width: 100%;background-color: #7F7F7F;">
  <div class="panel-body" style="text-align: center;">
	   <a type="submit" href="<?php  echo $this->createMobileUrl('selfinspection')?>"  class="btn btn-mydefined"  >去扫描</a>
  </div>
  </div>
	</body>
</html>