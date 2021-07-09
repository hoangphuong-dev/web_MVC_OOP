<title>List Order</title>
<style type="text/css" media="screen">
	.title_order_details {
		text-align: center;
		padding: 20px;
		font-size: 27px;
		margin-top: 70px;
	}
</style>
<div class="main">
	<div class="content">
		<div class="cartoption">		
			<div class="cartpage">
				<h2>List Order</h2>
				<table class="tblone">
					<tr>
						<th>Order time</th>
						<th>Infomation Receiver</th>
						<th>Infomation Order</th>
						<th>Order Status</th>
						<th>Action</th>
					</tr>
					<?php foreach ($data['order_by_id'] as $row ) { ?>
						<tr class="odd gradeX">	
							<td><br><?= $row['order_time'] ?></td>
							<td>
								<?= $row['receiver_name'] ?> <br>
								<?= $row['receiver_address'] ?> <br>
								<?= $row['receiver_phone'] ?> <br>
							</td>
							<td>
								<?= $row['customer_name'] ?> <br>
								<?= $row['customer_address']." - ". $row['customer_city']?> <br>
								<?= $row['customer_phone'] ?> <br>
							</td>
							<td><br><?php 
							if($row['order_status'] == 1) {
							// echo "Order handling";
								echo "Đang chờ duyệt";
							} 
							if($row['order_status'] == 2) {
							// echo "Order approved";
								echo "Đã duyệt";
							} 
							if($row['order_status'] == 0){
							// echo "Order canceled";
								echo "Đã HUỶ";
							}  ?></td>
							
							<td>
								<a href="<?= $link ?>ManageOrder/view_details_customer/<?= $row['order_id']?>">
									<img width="50px" height="30px" src=" <?=$link?>public/images/view_detail.png">
								</a>
							</td>
						</tr>
					<?php } ?>
				</table>
				<?php if(empty($data['order_detail'])) { ?>
					<div class="shopping">
						<div class="shopleft">
							<a href="<?= $link?>Home"><img src="<?=$link?>public/images/shop.png" alt="" /></a>
						</div>
					</div>
				<?php } ?>
				<?php if(isset($data['order_detail'])) { ?>
					<h4 class="title_order_details">Order detail  <?php echo $data['order_id'] ?>  </h4>
					<table class="tblone">
						<tr>
							<th>Product Image</th>
							<th>Product Name</th>
							<th>Quatity</th>
							<th>Product price</th>
							<th>Total</th>
						</tr>

						<?php $sub_total = 0 ?>
						<?php foreach ($data['order_detail'] as $row ) { ?>
							<tr class="odd gradeX">	
								<td><img style="height:100px; width: 100px;" src="<?= $link ?>public/upload/<?= $row['product_image']?>"/></td>
								<td><?= $row['product_name'] ?></td>
								<td><?= $row['quatity'] ?></td>
								<td><?= number_format($row['product_price'])?> VND</td>
								<td><?= number_format($row['product_price'] * $row['quatity'])?> VND</td>
								<?php $sub_total += ($row['product_price'] * $row['quatity']) ?>
							</tr>
						<?php } ?>
					</table>

				</div>
				<div class="shopping">
					<div class="shopleft">
						<a href="<?= $link?>Home"><img src="<?=$link?>public/images/shop.png" alt="" /></a>
					</div>
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
			<?php } ?>
		</div>  	
		<div class="clear"></div>
	</div>
</div>	