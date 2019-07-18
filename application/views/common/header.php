<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head> 
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title><?=(!empty($title) ? $title : 'App')?></title>  
	<link rel="stylesheet" href="<?=base_url(publicAssetsBasePath.'vendor/bootstrap-4.0.0/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?=base_url(publicAssetsBasePath.'vendor/fontawesome-5.9.0/css/fontawesome.min.css');?>">
	<link rel="stylesheet" href="<?=base_url(publicAssetsBasePath.'vendor/datatable/css/dataTables.bootstrap4.min.css');?>">
	<link rel="stylesheet" href="<?=base_url(publicAssetsBasePath.'css/app.css');?>">
   
	<script type="text/javascript" >var base_url="<?=base_url();?>"</script>
</head>
<body>
<?php 
	if(isset($panel)):
		include($panel.'top.php');
	endif;	
?>