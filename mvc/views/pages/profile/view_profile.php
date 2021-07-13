<?php $row = $data['profile']->fetch_array(); ?>
<title>Profile</title>
<div class="main">
	<div class="content">
		<div class="cartoption">		
			<div class="cartpage">
				<h2 style="width: 180px;">Your Profile</h2>
				<span style="color: <?php if(isset($data['color'])) echo $data['color'] ?> ">
					<?php if(isset($data['alert'])) echo $data['alert'] ?>
				</span>

				<!-- Ảnh khách hàng  -->
				<?php $path_image = $link."public/upload/" ?>
				<form action=" <?=$link?>Profile/change_avatar" method="POST" enctype="multipart/form-data">
					<table class="avatar_profile">
						<tr>
							<?php if($row['customer_image'] == '') {  ?>
								<td><img src="<?= $path_image."image_profile.png"?>" alt="This is a your face image "></td>
							<?php } else { ?>
								<td><img src="<?= $path_image.$row['customer_image']?>" alt="This is a your face image "></td>
							<?php } ?>
						</tr>
						<tr><td colspan="2"><input type="file" name="product_image"></td></tr>
						<tr><td colspan="2"><input type="submit" value="Change Avatar"></td></tr>
					</table>
				</form>
				<!-- Thông tin khách hàng  -->
				<form action=" <?=$link?>Profile/update_profile" method="POST">
					<table class="tblone">
						<tr>
							<th>Fileds</th>
							<th>Infomation</th>
						</tr>
						<tr>
							<td>Name : </td>
							<td><input type="text" name="customer_name" value="<?= $row['customer_name'] ?>"></td>
						</tr>
						<tr>
							<td>Phone : </td>
							<td><input type="text" name="customer_phone" value="<?= $row['customer_phone'] ?>"></td>
						</tr>
						<tr>
							<td>Email : </td>
							<td><input type="text" name="customer_email" value="<?= $row['customer_email'] ?>"></td>
						</tr>
						<tr>
							<td>Address : </td>
							<td><input type="text" name="customer_address" value="<?= $row['customer_address'] ?>"></td>
						</tr>
						<tr>
							<td>City : </td>
							<td><input type="text" name="customer_city" value="<?= $row['customer_city'] ?>"></td>
						</tr>
						<tr>
							<td colspan="2"><input class="update_profile" type="submit" value="Update"></td>
						</tr>
					</table>
				</form>
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