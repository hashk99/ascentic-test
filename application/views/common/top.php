<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<div class="container">
	<div class="row header-top-wrap clearfix">
		<div class="col-md-3">
			<h3>Hi Admin !</h3>
		</div>
		<div class="col-md-9 text-right ">
			<a href="<?=base_url('logout');?>" class="btn btn-sm btn-info pull-right">Log Out</a>
			<div class="cleafix"></div>
		</div>
			<div class="cleafix"></div>
	</div>
</div>
<div class="cleafix"></div>
<div class="container">			 			
	<!-- form errors -->
	<div class="col-md-12 clearfix">
		<h4  class="text-center text-warning">
			<?php echo $this->session->flashdata('error');  ?>
		</h4>
	</div>
 	<!-- form success -->
	<div class="col-md-12 clearfix">
		<h4  class="text-center text-success">
			<?php echo $this->session->flashdata('success');  ?>
		</h4> 
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-3 "style="
    border-right: solid 1px #222;
">
			<div class="">
				<?php include('left-sidebar.php');?>
			</div>
		 


 

