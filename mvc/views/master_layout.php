<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");
Session::checkSession();
require_once 'mvc/core/Process_link.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="<?= $link?>public/images/iconapp.ico"> <!-- đang ở index.php nha  -->
	<link rel="stylesheet" type="text/css" href="<?= $link?>public/css/reset.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= $link?>public/css/text.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= $link?>public/css/grid.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= $link?>public/css/layout.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= $link?>public/css/nav.css" media="screen" />
	<link href="<?= $link?>public/css/table/demo_page.css" rel="stylesheet" type="text/css" />
	<!-- BEGIN: load jquery -->
	<script src="<?= $link?>public/js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?= $link?>public/js/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="<?= $link?>public/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
	<script src="<?= $link?>public/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
	<script src="<?= $link?>public/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
	<script src="<?= $link?>public/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
	<script src="<?= $link?>public/js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
	<script src="<?= $link?>public/js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
	<script src="<?= $link?>public/js/table/jquery.dataTables.min.js" type="text/javascript"></script>
	<!-- END: load jquery -->
	<script type="text/javascript" src="<?= $link?>public/js/table/table.js"></script>
	<script src="<?= $link?>public/js/setup.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			setupLeftMenu();
			setSidebarHeight();
		});
	</script>
</head>
<body>
	<div class="container_12">
		<div class="grid_12 header-repeat">
			<div id="branding">
				<div class="floatleft logo">
					<img src="<?= $link?>public/images/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Training with live project</h1>
					<p>www.trainingwithliveproject.com</p>
				</div>
				<div class="floatright">
					<div class="floatleft">
						<img src="<?= $link?>public/images/img-profile.jpg" alt="Profile Pic" /></div>
						<div class="floatleft marginleft10">
							<ul class="inline-ul floatleft">
								<li>Hello <?= Session::get('adminName') ?></li>
								<li><a href="<?= $link?>admin/logout">Logout</a></li>
							</ul>
						</div>
					</div>
					<div class="clear">
					</div>
				</div>
			</div>
			<div class="clear">
			</div>
			<div class="grid_12">
				<ul class="nav main">
					<li class="ic-dashboard"><a href="<?= $link?>Dashboard"><span>Dashboard</span></a> </li>
					<li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
					<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
					<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox</span></a></li>
					<li class="ic-charts"><a href=""><span>Visit Website</span></a></li>
				</ul>
			</div>
			<div class="clear">
			</div>
			<div class="grid_2">
				<div class="box sidemenu">
					<div class="block" id="section-menu">
						<ul class="section menu">


							<li><a class="menuitem">Manage Order</a>
								<ul class="submenu">
									<li><a href="<?= $link?>ManageOrder/view_order">View Order</a></li>
									<li><a href="social.php">Social Media</a></li>
									<li><a href="copyright.php">Copyright</a></li>
								</ul>
							</li>
							<li><a class="menuitem">Category Option</a>
								<ul class="submenu">
									<li><a href="<?= $link?>Category/add">Add Category</a> </li>
									<li><a href="<?= $link?>Category/list">Category List</a> </li>
								</ul>
							</li>

							<li><a class="menuitem">Brand Option</a>
								<ul class="submenu">
									<li><a href="<?= $link?>Brand/add">Add Brand</a> </li>
									<li><a href="<?= $link?>Brand/list">Brand List</a> </li>
								</ul>
							</li>
							<li><a class="menuitem">Product Option</a>
								<ul class="submenu">
									<li><a href="<?= $link?>Product/add">Add Product</a> </li>
									<li><a href="<?= $link?>Product/list">Product List</a> </li>
								</ul>
							</li>
							<li><a class="menuitem">Slider Option</a>
								<ul class="submenu">
									<li><a href="addslider.php">Add Slider</a> </li>
									<li><a href="sliderlist.php">Slider List</a> </li>
								</ul>
							</li>
							
							
						</ul>
					</div>
				</div>
			</div>
			<div class="grid_10">
				<?php require_once "mvc/views/pages/".$data['name_page']."/".$data['Page'].".php"?>
			</div>
			<div class="clear">
			</div>
		</div>
		<div class="clear">
		</div>
		<div id="site_info">
			<p>
				&copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
			</p>
		</div>
	</body>
	</html>
