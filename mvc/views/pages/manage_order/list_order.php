<!-- file này là của admin quản lý -->
<title>Order List</title>
<div class="box round first grid">
	<h2>Order List</h2>
	<div class="block">        
		<table class="data display datatable" id="example">
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
				<?php foreach ($data['get_order'] as $row ) { ?>
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
				<?php } ?>
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
