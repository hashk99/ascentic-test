<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
</div><!-- to close the menu --> 
<div class="col-md-9">
	<h2 class="ix_student_back_title">Manage Gift Card Products</h2>
	 <br/>
	<a href="<?=base_url('products-create?type=giftcard');?>">
		<div class="ix_blue_btn" style="width:200px; margin-bottom: 20px;"><i class="ion-ios-plus-outline"></i> Add New Product</div>
	</a>
		<table class="table datatable">
  <thead class="thead-dark">
			<tr>
				<th>ID</th>
				<th>Name</th> 
				<th>Code</th>
				<th>Short Description</th>
				<th>Cost</th>
				<th>Selling Price</th>
				<th>Brand </th>
				<th>Amount</th>
				<th>Expire Date</th>
				<th>Dates</th>
			</tr>
		 </thead>
		 <tbody>
		<?php foreach($products as $product):?>
			 
			<tr>
				 <td scope="row"><?=$product->product_id;?></td>
				<td><?=$product->product_name;?></td>
				<td><?=$product->product_code;?></td>
				<td><?=$product->product_short_description;?></td>
				<td><?=$product->product_cost;?></td>
				<td><?=$product->product_selling_price;?></td>
				<td><?=$product->product_brand_id.' - '.$product->brand_name;?></td> 
				<td><?=$product->amount;?></td>
				<td><?=$product->expire_date;?></td>
				<td><?=$product->created_at?></td>
			 
			</tr>
		  
		<?php endforeach;?></tbody>
		</table>
</div>