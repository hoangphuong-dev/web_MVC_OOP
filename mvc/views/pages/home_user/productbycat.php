<title>Product By Category</title>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<?php if(isset($data['key']) || isset($data['category_name']) || isset($data['brand_name'])) { ?>
					<?php if(!empty($data['key'])) { ?> <h3>Key search : <?= $data['key'] ?></h3> <?php } ?>
					<?php if(!empty($data['category_name'])) { ?> <h3>Category : <?= $data['category_name'] ?></h3> <?php } ?>
					<?php if(!empty($data['brand_name'])) { ?> <h3>Brand : <?= $data['brand_name'] ?></h3> <?php } ?>
					<p>Have :<?php if($data['total_product'] == '') echo "0"  ?> <?= $data['total_product'] ?> result search</p>
				<?php } if(isset($data['cat_name'])) {?>
					<h3>Category : <?= $data['cat_name'] ?></h3>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php if(!empty($data['product'])) { ?>
				<?php foreach ($data['product'] as $key) { ?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="<?= $link?>Home/preview/<?= $key['product_id'] ?>">
							<img height="230" src="<?= $link?>public/upload/<?= $key['product_image']?>" />
						</a>
						<h2><?= $key['product_name'] ?></h2>
						<p><?= $key['product_desc'] ?></p>
						<p><?= $key['product_image']?></p>
						<p><span class="price"><?= $key['product_price'] ?></span></p>
						<div class="button"><span><a href="<?= $link?>Home/preview/<?= $key['product_id'] ?>" class="details">Details</a></span></div>
					</div>
				<?php } } else { ?>
					<h2 style="text-align: center; margin-top: 20px">Don't product</h2>
				<?php } ?>
			</div>
			<div style="margin: auto">
				<h3 style="text-align: center;">
					<?php if(isset($data['cat_name'])) { ?>
						<?php for($i = 1; $i <= $data['total_page']; $i++) { ?>	
							<a href="<?= $link?>Home/productbycat/<?= str_replace(' ', '-', $data['cat_name'])?>/<?= $i ?>"><?php echo $i ?></a>
						<?php } ?>
					<?php } else { ?>
						<?php for($i = 1; $i <= $data['total_page']; $i++) { ?>	
							<form style="float: left;" action="<?= $link?>Home/search/<?= $i ?>" method="POST">
								<input type="hidden" name="key" value="<?php if(isset($_POST['key'])) echo $_POST['key'] ?>">
								<input type="hidden" name="category_name" value="<?php if(isset($_POST['category_name'])) echo $_POST['category_name'] ?>">
								<input type="hidden" name="brand_name" value="<?php if(isset($_POST['brand_name'])) echo $_POST['brand_name'] ?>">
								<input type="submit" value="<?php echo $i ?>"> 
							</form>
						<?php } ?>
					<?php } ?>
				</h3>
				<div class="clear"></div>
			</div>
		</div>
	</div>