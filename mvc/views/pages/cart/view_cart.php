<title>Cart</title>
<div class="main">
	<div class="content">
		<div class="cartoption">		
			<div class="cartpage">
				<h2>Your Cart</h2>
				<table class="tblone">
					<tr>
						<th width="5%">Product id</th>
						<th width="15%">Image</th>
						<th width="20%">Product Name</th>
						<th width="15%">Price</th>
						<th width="25%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
					<?php $sub_total = 0; foreach ($data['product_in_cart'] as $each) { ?>
						<?php $quatity = $_SESSION['cart'.$data['id_customer']][$each['product_id']]?>
						<tr>
							<td><?= $each['product_id'] ?></td>
							<td><img style="height:100px; width: 100px;" src="<?= $link ?>public/upload/<?= $each['product_image']?>"/></td>
							<td><?= $each['product_name'] ?></td>
							<td><?= number_format($each['product_price'])?> VND</td>
							<td>
								<form action="<?= $link?>Cart/change_cart/<?= $each['product_id']?>" method="post">
									<input type="number" name="quatity" value="<?= $quatity ?>"/>
									<input type="submit" name="submit" value="Update"/>
								</form>
							</td>
							<td><?= number_format($quatity * $each['product_price']) ?> VND</td>
							<?php $sub_total += ($quatity * $each['product_price']) ?>
							<td><a onclick="return confirm('Are you sure delete this product ?')" href="<?= $link?>Cart/delete_product_in_cart/<?= $each['product_id']?>">X</a></td>
						</tr>
					<?php } ?>
				</table>
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Sub Total : </th>
						<td><?= number_format($sub_total) ?></td>
					</tr>
					<tr>
						<th>VAT : </th>
						<td>10%</td>
					</tr>
					<tr>
						<th>Grand Total :</th>
						<td><?= number_format($sub_total*0.1 + $sub_total) ?></td>
					</tr>
				</table>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="<?= $link?>Home"><img src="<?=$link?>public/images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="<?= $link?>Cart/payment"><img src="<?=$link?>public/images/check.png" alt="" /></a>
				</div>
			</div>
		</div>  	
		<div class="clear"></div>
	</div>
</div>