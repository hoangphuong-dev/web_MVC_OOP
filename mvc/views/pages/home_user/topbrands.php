<title>Topbrands</title>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Dell</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php foreach ($data['product_dell'] as $key) { ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="<?= $link?>Home/preview/<?= $key['product_id'] ?>">
						<img height="230"  src="<?= $link?>public/upload/<?= $key['product_image']?>" />
					</a>
					<h2><?= $key['product_name'] ?></h2>
					<p><?= $key['product_desc'] ?></p>
					<p><span class="price"><?= number_format($key['product_price'])?></span></p>
					<div class="button"><span><a href="<?= $link?>Home/preview/<?= $key['product_id'] ?>" class="details">Details</a></span></div>
				</div>
			<?php } ?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>HP</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php foreach ($data['product_hp'] as $key) { ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="<?= $link?>Home/preview/<?= $key['product_id'] ?>">
						<img height="230"  src="<?= $link?>public/upload/<?= $key['product_image']?>" />
					</a>
					<h2><?= $key['product_name'] ?></h2>
					<p><?= $key['product_desc'] ?></p>
					<p><span class="price"><?= number_format($key['product_price'])?></span></p>
					<div class="button"><span><a href="<?= $link?>Home/preview/<?= $key['product_id'] ?>" class="details">Details</a></span></div>
				</div>
			<?php } ?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Apple</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php foreach ($data['product_apple'] as $key) { ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="<?= $link?>Home/preview/<?= $key['product_id'] ?>">
						<img height="230"  src="<?= $link?>public/upload/<?= $key['product_image']?>" />
					</a>
					<h2><?= $key['product_name'] ?></h2>
					<p><?= $key['product_desc'] ?></p>
					<p><span class="price"><?= number_format($key['product_price'])?></span></p>
					<div class="button"><span><a href="<?= $link?>Home/preview/<?= $key['product_id'] ?>" class="details">Details</a></span></div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>