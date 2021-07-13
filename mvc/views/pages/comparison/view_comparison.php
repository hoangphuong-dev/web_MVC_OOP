<title>Comparison</title>
<div class="main">
	<div class="content">
		<div class="cartoption">		
			<div class="cartpage">
				<h2>Your Cart</h2>
				<table class="tblone">
					<tr>
						<th width="20%">Product Name</th>
						<th width="15%">Image</th>
						<th width="15%">Price</th>
						<th width="15%">Brand</th>
						<th width="15%">Type</th>
						<th width="15%">Category</th>
						<th width="15%">Delete</th>
					</tr>
					<?php $sub_total = 0; foreach ($data['product_in_comparison'] as $each) { ?>
						<tr>
							<td><?= $each['product_name'] ?></td>
							<td><img style="height:100px; width: 100px;" src="<?= $link ?>public/upload/<?= $each['product_image']?>"/></td>
							<td><?= number_format($each['product_price'])?> VND</td>
							<td><?= $each['brand_name'] ?></td>
							<td><?= $each['type_name'] ?></td>
							<td><?= $each['category_name'] ?></td>
							<td><a onclick="return confirm('Are you sure delete this product ?')" href="<?= $link?>Home/delete_product_in_comparison/<?= $each['product_id']?>">X</a></td>
							
						</tr>
					<?php } ?>
				</table>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="<?= $link?>Home"><img src="<?=$link?>public/images/shop.png" alt="" /></a>
				</div>
			</div>
		</div>  	
		<div class="clear"></div>
	</div>
</div>