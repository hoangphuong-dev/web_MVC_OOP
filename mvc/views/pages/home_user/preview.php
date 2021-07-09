<?php
$row = $data['product'] ->fetch_array();
?>
<title>Preview</title>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">				
				<div class="grid images_3_of_2">
					<img src="<?= $link ?>public/upload/<?= $row['product_image'] ?>"/>
				</div>
				<div class="desc span_3_of_2">
					<h2><?= $row['product_name'] ?></h2>
					<p><?= $row['product_desc'] ?></p>					
					<div class="price">
						<p>Price: <span><?= number_format($row['product_price'])?></span></p>
						<p>Category: <span><?= $row['category_name'] ?></span></p>
						<p>Brand:<span><?= $row['brand_name'] ?></span></p>
					</div>
					<div class="add-cart">
						<form action="<?= $link?>Cart/add_to_cart" method="post">
							<input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
							<input type="hidden" name="product_price" value="<?= $row['product_price'] ?>">
							<input type="number" class="buyfield" name="quatity" value="1" min = "1" max = "10"/>
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						</form>				
					</div>
				</div>
				<div class="product-desc">
					<h2>Product Details</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				</div>

			</div>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					<?php foreach ($data['product_category'] as $key) {  ?>
						<li><a href="<?= $link?>Home/productbycat/<?= $key['category_name']?>"><?= $key['category_name'] ?></a></li>
					<?php } ?>
				</ul>

			</div>
		</div>
	</div>
</div>