<?php
Session::init();
require_once 'mvc/core/Process_link.php';
$customer_id = Session::get('customerId');
if(isset($_SESSION['cart'.$customer_id])) {
	$total_quatity = 0;
	foreach ($_SESSION['cart'.$customer_id] as $each) {
		$total_quatity += $each;
	}
	Session::set('total_quatity', $total_quatity);
}
?>
<!DOCTYPE HTML>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="<?= $link?>public/images/iconapp.ico"> <!-- đang ở index.php nha  -->
	<link href="<?= $link?>public/css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="<?= $link?>public/css/menu.css" rel="stylesheet" type="text/css" media="all"/>
	<script src="<?= $link?>public/js/jquerymain.js"></script>
	<script src="<?= $link?>public/js/script.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?= $link?>public/js/jquery-1.7.2.min.js"></script> 
	<script type="text/javascript" src="<?= $link?>public/js/nav.js"></script>
	<script type="text/javascript" src="<?= $link?>public/js/move-top.js"></script>
	<script type="text/javascript" src="<?= $link?>public/js/easing.js"></script> 
	<script type="text/javascript" src="<?= $link?>public/js/nav-hover.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		$(document).ready(function($){
			$('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
		});
	</script>
</head>
<body>
	<?php print_r($_SESSION) ?>
	<div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="<?= $link ?>Home"><img src="<?= $link?>public/images/logo.png"/></a>
			</div>
			<div class="header_top_right">
				<div class="search_box">
					<form>
						<input type="text" value="Search for Products"><input type="submit" value="SEARCH">
					</form>
				</div>

				<div class="shopping_cart">
					<div class="cart">
						<a href="<?= $link ?>Cart/view_cart" title="View my shopping cart" rel="nofollow">
							<span class="cart_title">Cart</span>
							<?php if(isset($_SESSION['cart'.$customer_id])) { ?>
								<span class="no_product">(<?= Session::get("total_quatity") ?>)</span>
							<?php } else { ?>
								<span class="no_product">(empty)</span>
							<?php } ?>
						</a>
					</div>

				</div>
				<?php if(isset($_SESSION['customerLogin'])) { ?>
					<?php echo Session::get('customerName') ?>
					<div><a href="<?= $link ?>Home/logout">Logout</a></div>
				<?php } else { ?>
					<div class="login"><a href="<?= $link ?>Home/login">Login</a></div>
				<?php } ?>

				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="menu">
			<ul id="dc_mega-menu-orange" class="dc_mm-orange">
				<li><a href="<?= $link ?>Home">Home</a></li>
				<li><a href="<?= $link ?>Home/products">Products</a></li>
				<li><a href="<?= $link ?>Home/topbrands">Top Brands</a></li>
				<li><a href="<?= $link ?>Cart/view_cart">Cart</a></li>
				<?php if(Session::get('customerLogin') == 1)  { ?>
					<li><a href="<?= $link ?>Profile/view_profile">Profile</a></li>
				<?php } ?>
				<?php if(Session::get('customerLogin') == 1)  { ?>
					<li><a href="<?= $link ?>ManageOrder/view_order_by_id">Ordered</a></li>
				<?php } ?>
				<li><a href="<?= $link ?>Home/contact">Contact</a></li>
				<div class="clear"></div>
			</ul>
		</div>
		<?php require_once "mvc/views/pages/".$data['name_page']."/".$data['Page'].".php"?>
		<div class="footer">
			<div class="wrapper">	
				<div class="section group">
					<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Customer Service</a></li>
							<li><a href="#"><span>Advanced Search</span></a></li>
							<li><a href="#">Orders and Returns</a></li>
							<li><a href="#"><span>Contact Us</span></a></li>
						</ul>
					</div>
					<div class="col_1_of_4 span_1_of_4">
						<h4>Why buy from us</h4>
						<ul>
							<li><a href="about.html">About Us</a></li>
							<li><a href="faq.html">Customer Service</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="contact.html"><span>Site Map</span></a></li>
							<li><a href="preview.html"><span>Search Terms</span></a></li>
						</ul>
					</div>
					<div class="col_1_of_4 span_1_of_4">
						<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="faq.html">Help</a></li>
						</ul>
					</div>
					<div class="col_1_of_4 span_1_of_4">
						<h4>Contact</h4>
						<ul>
							<li><span>+88-01713458599</span></li>
							<li><span>+88-01813458552</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
							<ul>
								<li class="facebook"><a href="#" target="_blank"> </a></li>
								<li class="twitter"><a href="#" target="_blank"> </a></li>
								<li class="googleplus"><a href="#" target="_blank"> </a></li>
								<li class="contact"><a href="#" target="_blank"> </a></li>
								<div class="clear"></div>
							</ul>
						</div>
					</div>
				</div>
				<div class="copy_right">
					<p>Training with live project &amp; All rights Reseverd </p>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
	 		*/

	 		$().UItoTop({ easingType: 'easeOutQuart' });
	 	});
	 </script>
	 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
	 <link href="<?= $link?>public/css/flexslider.css" rel='stylesheet' type='text/css' />
	 <script defer src="<?= $link?>public/js/jquery.flexslider.js"></script>
	 <script type="text/javascript">
	 	$(function(){
	 		SyntaxHighlighter.all();
	 	});
	 	$(window).load(function(){
	 		$('.flexslider').flexslider({
	 			animation: "slide",
	 			start: function(slider){
	 				$('body').removeClass('loading');
	 			}
	 		});
	 	});
	 </script>
	</body>
	</html>
