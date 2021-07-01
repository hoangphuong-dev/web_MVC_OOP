<?php require_once 'mvc/core/Process_link.php' ?>
<title>Category List</title>
<div class="box round first grid">
	<h2>Category List</h2>
	<div class="block">        
		<table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Category Id</th>
					<th>Category Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data['category'] as $row ) { ?>
					<tr class="odd gradeX">	
						<td><?= $row['category_id'] ?></td>
						<td><?= $row['category_name'] ?></td>
						<td>
							<a href="<?= $link ?>Category/edit/<?= $row['category_id']?>/">Edit</a> || 
							<a onclick="return confirm('Are you sure delete !')" href="<?= $link ?>Category/delete/<?= $row['category_id']?>">Delete</a>
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
