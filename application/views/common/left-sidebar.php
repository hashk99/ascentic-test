<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="list-inline leftmenuitems">
	<li><a href="<?=base_url('/admin');?>"><i class="ion-ios-settings"></i> Home</a></li> 
	<li><a href="<?=base_url('/products-create?type=cloth');?>"><i class="ion-ios-gear-outline"></i> Add Cloth Product</a></li>
	<li><a href="<?=base_url('/products-create?type=giftcard');?>"><i class="ion-ios-gear-outline"></i> Add Gift Card Product</a></li>
	<li><a href="<?=base_url('/products-create?type=perfume');?>"><i class="ion-ios-gear-outline"></i> Add Perfume Product</a></li>
</ul>