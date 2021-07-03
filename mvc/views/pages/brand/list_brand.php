<?php require_once 'mvc/core/Process_link.php' ?>
<title>Brand List</title>
<div class="box round first grid">
	<h2>Brand List</h2>
	<div class="block">        
		<table class="data display datatable" id="example">
			<span style="color: <?php if(isset($data['color'])) echo $data['color'] ?>"><?php if(isset($data['alert'])) echo $data['alert'] ?></span>
			<thead>
				<tr>
					<th>Brand Id</th>
					<th>Brand Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data['brand'] as $row ) { ?>
					<tr class="odd gradeX">	
						<td><?= $row['brand_id'] ?></td>
						<td><?= $row['brand_name'] ?></td>
						<td>
							<a href="<?= $link ?>Brand/edit/<?= $row['brand_id']?>/">Edit</a> || 
							<a onclick="return confirm('Are you sure delete !')" href="<?= $link ?>Brand/delete/<?= $row['brand_id']?>">Delete</a>
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
