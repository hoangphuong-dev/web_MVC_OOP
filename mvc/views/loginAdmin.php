<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="shortcut icon" href="../public/img/iconapp.ico"> <!-- đang ở index.php nha  -->
	<link rel="stylesheet" type="text/css" href="../public/css/stylelogin.css" media="screen" />
</head>
<body>
	<div class="container">
		<section id="content">
			<form action="process_login" method="post">
				<h1>Admin Login</h1>
				<span style="color: red"><?php if(isset($alert)) echo $alert ?></span>
				<div>
					<input type="text" placeholder="Username"  name="username"/>
				</div>
				<div>
					<input type="password" placeholder="Password"  name="password"/>
				</div>
				<div>
					<input type="submit" value="Log in" />
				</div>
			</form>
			<div class="button">
				<a href="#">Training with live project</a>
			</div>
		</section>
	</div><!-- container -->
</body>
</html>