<title>Home page</title>
<div class="header_bottom">
	<div class="header_bottom_left">
		<div class="section group">
			<div class="listview_1_of_2 images_1_of_2">
				<div class="listimg listimg_2_of_1">
					<a href="preview.html"> <img src="<?= $link?>public/images/pic4.png" alt="" /></a>
				</div>
				<div class="text list_2_of_1">
					<h2>Iphone</h2>
					<p>Lorem ipsum dolor sit amet sed do eiusmod.</p>
					<div class="button"><span><a href="preview.html">Add to cart</a></span></div>
				</div>
			</div>			
			<div class="listview_1_of_2 images_1_of_2">
				<div class="listimg listimg_2_of_1">
					<a href="preview.html"><img src="<?= $link?>public/images/pic3.png" alt="" / ></a>
				</div>
				<div class="text list_2_of_1">
					<h2>Samsung</h2>
					<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
					<div class="button"><span><a href="preview.html">Add to cart</a></span></div>
				</div>
			</div>
		</div>
		<div class="section group">
			<div class="listview_1_of_2 images_1_of_2">
				<div class="listimg listimg_2_of_1">
					<a href="preview.html"> <img src="<?= $link?>public/images/pic3.png" alt="" /></a>
				</div>
				<div class="text list_2_of_1">
					<h2>Acer</h2>
					<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
					<div class="button"><span><a href="preview.html">Add to cart</a></span></div>
				</div>
			</div>			
			<div class="listview_1_of_2 images_1_of_2">
				<div class="listimg listimg_2_of_1">
					<a href="preview.html"><img src="<?= $link?>public/images/pic1.png" alt="" /></a>
				</div>
				<div class="text list_2_of_1">
					<h2>Canon</h2>
					<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
					<div class="button"><span><a href="preview.html">Add to cart</a></span></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="header_bottom_right_images">
		<!-- FlexSlider -->
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<?php if($data['slider'] == '') { ?>
						<li><img src="<?= $link?>public/images/1.jpg"/></li>
					<?php } else {  foreach ($data['slider'] as $key) { ?>
						<li><img src="<?= $link?>public/upload/<?= $key['slider_image'] ?>"/></li>
					<?php } }  ?>
				</ul>
			</div>
		</section>
		<!-- FlexSlider -->
	</div>
	<div class="clear"></div>
</div>	

<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Feature Products</h3>
			</div>
			<div class="clear"></div>
		</div>


		<div class="section group">
			<?php foreach ($data['feature_product'] as $each) { ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="Home/preview/<?= $each['product_id']?>" >
						<img height="230" src="<?= $link?>public/upload/<?= $each['product_image']?>"/>
					</a>
					<h2><?= $each['product_name'] ?></h2>
					<p><?= $each['product_desc'] ?></p>
					<p><span class="price"><?= number_format($each['product_price'])?></span></p>
					<div class="button"><span><a href="<?= $link?>Home/preview/<?= $each['product_id']?>" class="details">Details</a></span></div>
				</div>
			<?php } ?>


		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>New Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php foreach ($data['new_product'] as $each) { ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="Home/preview/<?= $each['product_id']?>">
						<img height="230" src="<?= $link?>public/upload/<?= $each['product_image']?>"/>
					</a>
					<h2><?php echo $each['product_name']?></h2>
					<p><?= $each['product_desc'] ?></p>
					<p><span class="price"><?= number_format($each['product_price'])?></span></p>
					<div class="button">
						<span><a href="Home/preview/<?= $each['product_id']?>" class="details">Details</a></span>
					</div>
				</div>
			<?php } ?>



		</div>
	</div>
</div>
</div>