<title>Slider List</title>
<div class="box round first grid">
	<h2>Slider List</h2>
	<div class="block">        
		<table class="data display datatable" id="example">
			<span style="color: <?php if(isset($data['color'])) echo $data['color'] ?>"><?php if(isset($data['alert'])) echo $data['alert'] ?></span>
			<thead>
				<tr>
					<th>Slider Id</th>
					<th>Slider Name</th>
					<th>Slider Image</th>
					<th>Slider Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $path = $link."public/upload/"; foreach ($data['slider'] as $row ) { ?>
					<tr class="odd gradeX">	
						<td><?= $row['slider_id'] ?></td>
						<td><?= $row['slider_name'] ?></td>
						<td><img width="150" height="70" src="<?= $path.$row['slider_image'] ?>" alt=""></td>
						<td><?= $row['slider_status'] ?></td>
						<td>
							<a href="<?= $link ?>Slider/edit/<?= $row['slider_id']?>">Edit</a> || 
							<a onclick="return confirm('Are you sure delete !')" href="<?= $link ?>Slider/delete/<?= $row['slider_id']?>">Delete</a>
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
