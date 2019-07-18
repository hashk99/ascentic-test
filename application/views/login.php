<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<div class="container">
	<div class="wrapper fadeInDown">
	  <div id="formContent">
	    <!-- Tabs Titles -->

	    <!-- Icon -->
	    <div class="fadeIn first">
	      <i class="fas fa-user"></i>  
	    </div>

	    <!-- Login Form -->
	    <form class="login_form" id="login_form" method="POST" action="<?=base_url('check_login')?>">
	      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
	      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
	      <input type="submit" class="fadeIn fourth" value="Log In">
	    </form>
	    <hr/> 
	 	 <!-- form errors -->
		<div id="error-msgs-wrap">
			<?php echo $this->session->flashdata('error');  ?>
		</div>

	  </div>
	</div> 
</div>
 