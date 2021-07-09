<?php $row = mysqli_fetch_array($data['order_by_id']) ?>
<title>Order Detail</title>
<style type="text/css" media="screen">
	.order_detail th {
		background: #8F8F8F;
		padding: 10px;
		text-align: left;
		color: white;
	}
	.title_order_detail {
		text-align: center;
		margin-top: 70px;
		margin-bottom: 20px;
	}
</style>
<div class="box round first grid">
	<h2>Order Detail</h2>
	<div class="block">
		<h3 style="margin-top: 5px" class="title_order_detail">Order's <?= $row['customer_name'] ?></h3>     
		<table class="display order_detail" id="example">
			<span style="color: <?php if(isset($data['color'])) echo $data['color'] ?>"><?php if(isset($data['alert'])) echo $data['alert'] ?></span>
			<thead>
				<tr>
					<th>Order id</th>
					<th>Order time</th>
					<th>Infomation Receiver</th>
					<th>Infomation Order</th>
					<th>Order Status</th>
					<th>Action's Admin</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr class="odd gradeX">	
					<td><br><?= $row['order_id'] ?></td>
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
					<td><br><?= $row['admin_name'] ?></td>
					<td>
						<?php if($row['order_status'] == 1)  { ?>
							<a href="<?= $link ?>ManageOrder/confirm/<?= $row['order_id']?>">Confirm</a> || 
							<a onclick="return confirm('Are you sure delete !')" href="<?= $link ?>ManageOrder/cancel/<?= $row['order_id']?>">Cancel</a>
						<?php } ?>
						<br>

						<a href="<?= $link ?>ManageOrder/view_details/<?= $row['order_id']?>">
							<img width="50px" height="30px" src=" <?=$link?>public/images/view_detail.png">
						</a>
					</td>
				</tr>
			</tbody>
		</table> 
		<h3 class="title_order_detail">Order Detail</h3>      
		<table class="display order_detail">
			<span style="color: <?php if(isset($data['color'])) echo $data['color'] ?>"><?php if(isset($data['alert'])) echo $data['alert'] ?></span>
			<thead>
				<tr>
					<th>Product id</th>
					<th>Product image</th>
					<th>Product_name</th>
					<th>Quatity</th>
					<th>Product_price</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $sub_total = 0 ?>
				<?php foreach ($data['order_detail'] as $row) { ?>
					<tr class="odd gradeX">
						<td><?= $row['product_id'] ?></td>
						<td><img height="100px" src="<?= $link?>public/upload/<?=$row['product_image'] ?>"></td>
						<td><?= $row['product_name'] ?></td>
						<td><?= $row['quatity'] ?></td>
						<td><?= number_format($row['product_price']) ?> VND</td>
						<td><?= number_format($row['product_price'] * $row['quatity']) ?> VND</td>
						<?php $sub_total += ($row['product_price'] * $row['quatity']) ?>
					</tr>
				<?php } ?>
				<tr>
					<td colspan="6" style="padding-top: 50px;">
						<table style="float:right;text-align:left;" width="30%">
							<tr>
								<td>Sub Total : </td>
								<td><?= number_format($sub_total) ?></td>
							</tr>
							<tr>
								<td>VAT : </td>
								<td>10%</td>
							</tr>
							<tr>
								<td>Grand Total :</td>
								<td><?= number_format($sub_total*0.1 + $sub_total) ?> VND</td>
							</tr>
						</table>
					</td>
					
				</tr>
			</tbody>
		</table>
		
	</div>

</div>
<script type="text/javascript">
	$(document).ready(function () {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>


