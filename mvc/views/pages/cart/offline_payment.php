<title>Payment</title>
<div class="main">
	<div class="content">
		<div class="cartoption">		
			<div class="content_top">
				<div class="heading">
					<h3>Offline Payment</h3>
				</div>
				<div class="clear"></div>
			</div>
			<div class="box_left">
				<div class="cartpage">
					<h3>Your Cart</h3>
					<table class="tblone">
						<tr>
							<th width="15%">Image</th>
							<th width="20%">Product Name</th>
							<th width="10%">Price</th>
							<th width="5%">Quantity</th>
							<th width="25%">Total Price</th>
						</tr>
						<?php $sub_total = 0; foreach ($data['product_in_cart'] as $each) { ?>
							<?php $quatity = $_SESSION['cart'.$data['id_customer']][$each['product_id']]?>
							<tr>
								<td><img style="height:70px; width: 100px;" src="<?= $link ?>public/upload/<?= $each['product_image']?>"/></td>
								<td><?= $each['product_name'] ?></td>
								<td><?= number_format($each['product_price'])?></td>
								<td><input style="width: 30px;" readonly type="text" name="quatity" value="<?= $quatity ?>"/></td>
								<td><?= number_format($quatity * $each['product_price']) ?> VND</td>
								<?php $sub_total += ($quatity * $each['product_price']) ?>
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
			</div>
			<?php $row = mysqli_fetch_array($data['info_customer']) ?>
			<form action="<?= $link?>Cart/order" method = "POST">
				<div class="box_right">
					<div class="cartpage">
						<h3 style="width: 170px;">Information Order</h3>
						<table class="tblone" border="1">
							<tr>
								<td width="20%">Name : </td>
								<td width="30%"><input type="text" name="receiver_name" value="<?= $row['customer_name'] ?>"></td>
							</tr>
							<tr>
								<td>Phone : </td>
								<td><input type="text" name="receiver_phone" value="<?= $row['customer_phone'] ?>"></td>
							</tr>
							<tr>
								<td>Address</td>
								<td><input type="text" name="receiver_address" value="<?= $row['customer_address'] ?>"></td>
							</tr>
							<tr>
								<td>City</td>
								<td><input type="text" name="receiver_city" value="<?= $row['customer_city'] ?>"></td>
							</tr>
						</table>
					</div>
				</div>
				<button class="button_order" type="submit">Order</button>
			</form>
			<div class="shopping">
				
			</div>
		</div>  	
		<div class="clear"></div>
	</div>
</div>