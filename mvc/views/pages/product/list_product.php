<?php require_once 'mvc/core/Process_link.php' ?>
<title>List Product</title>
<div class="box round first grid">
	<h2>List Product</h2>
	<div class="block">  
		<table class="data display datatable" id="example">
			<span style="color: <?php if(isset($data['color'])) echo $data['color'] ?>"><?php if(isset($data['alert'])) echo $data['alert'] ?></span>
			<thead>
				<tr>
					<th>Product name</th>
					<th>Product image</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Product description</th>
					<th>Type</th>
					<th>Product price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data['product'] as $row) { ?>
					<tr class="odd gradeX">
						<td><?= $row['product_name'] ?></td>
						<td><img height="100px" src="<?= $link?>public/upload/<?=$row['product_image'] ?>"></td>
						<td><?= $row['category_name'] ?></td>
						<td><?= $row['brand_name'] ?></td>
						<td><?= $row['product_desc'] ?></td>
						<td><?= $row['type_name'] ?></td>
						<td> <?= $row['product_price'] ?></td>
						<td>
							<a href="<?= $link ?>Product/edit/<?= $row['product_id'] ?>">Edit</a> || 
							<a onclick="return confirm('Are you sure delete !')" href="<?= $link ?>Product/delete/<?= $row['product_id'] ?>">Delete</a></td>
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