<title>Login</title>
<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>
			<span style="font-size: 13px;color: <?php if(isset($data['mau'])) echo $data['mau'] ?>"><?php if(isset($data['mes'])) echo $data['mes'] ?></span>
			<form action="<?= $link?>Home/process_login" method="POST">
				<input name="email" type="text" class="field" placeholder="Enter email .. ">
				<input name="password" type="password" class="field" placeholder="Enter password .. ">
				<input type="checkbox" name="remember_login"> Remember login
				<div class="buttons"><div><button class="grey">Sign In</button></div></div>
			</form>
			<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
		</div>
		<div class="register_account">
			<h3>Register New Account</h3>
			<span style="color: <?php if(isset($data['color'])) echo $data['color'] ?>"><?php if(isset($data['alert'])) echo $data['alert'] ?></span>
			<form action="<?= $link?>Home/process_register" method="POST">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Enter name .. ">
								</div>
								<div>
									<input type="text" name="email" placeholder="Enter email .. ">
								</div>
								<div>
									<input type="text" name="phone" placeholder="Enter phone .. ">
								</div>
								<div>
									<input type="text" name="address" placeholder="Enter address .. ">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="city" placeholder="Enter city .. ">
								</div>
								<div>
									<input type="text" name="password" placeholder="Enter password .. ">
								</div>
							</td>
						</tr> 
					</tbody></table> 
					<div class="search"><div><button class="grey">Create Account</button></div></div>
					<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
					<div class="clear"></div>
				</form>
			</div>  	
			<div class="clear"></div>
		</div>
	</div>