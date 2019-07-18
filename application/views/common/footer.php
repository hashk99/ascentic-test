

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- UPDATE BOX -->
 
<?php 
	if(isset($panel)):
		include($panel.'bottom.php');
	endif;	
?>

	<script src="<?=base_url(publicAssetsBasePath.'vendor/jquery/jquery-3.4.1.min.js');?>"></script> 
	<script src="<?=base_url(publicAssetsBasePath.'vendor/fontawesome-5.9.0/js/fontawesome.min.js');?>"></script> 
	<script src="<?=base_url(publicAssetsBasePath.'vendor/popper-js/js/popper.min.js');?>"></script>    
    <script src="<?=base_url(publicAssetsBasePath.'vendor/bootstrap-4.0.0/js/bootstrap.min.js');?>"></script>
    <script src="<?=base_url(publicAssetsBasePath.'vendor/datatable/js/dataTables.bootstrap4.min.js');?>"></script>
    <script src="<?=base_url(publicAssetsBasePath.'vendor/datatable/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?=base_url(publicAssetsBasePath.'js/app.js');?>"></script>
  </body>
</html>   

 