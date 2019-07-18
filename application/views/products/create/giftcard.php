<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
</div><!-- to close the menu --> 
<div class="col-md-9">
	<h2 class="text-title text-info">Add New Gift Card</h2>
	
	<div class="col-md-10 col-md-offset-1"> 
		<form class="add_product_form" id="add_product_form" method="POST" action="<?=base_url('products-store')?>">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="" maxlength="45"  required /></td>
			</tr>
			<tr>
				<td>Code</td>
				<td><input type="text" name="code" maxlength="45" /></td>
			</tr>  
			<tr>
				<td>Cost</td>
				<td><input type="number" name="cost" maxlength="15"  /></td>
			</tr>
			<tr>
				<td>Brand</td>
				<td>
					<select name="brand" >
						<option value="1">abc</option>
						<option value="2">xyz</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Amount</td> 
				<td><input type="number" name="amount" maxlength="15"  /></td>
				 
			</tr> 
			<tr>
				<td>Expiry Date</td>
				<td><input type="date" name="expiry_date"    /></td>
			</tr>
			<tr>
				<td>Short Description</td>
				<td>
					<textarea name="short_description"></textarea>
				</td>
			</tr>
			 
		</table>
		<input type="hidden" name="type" value="giftcard">
		<input type="submit" class="button" value="Add Product" /> 
	</form>
	
	</div>
</div> 

	
<!--add New Student View End-->