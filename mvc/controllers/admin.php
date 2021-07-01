<?php 
class Admin extends Controller {
	use Format;
	public function Hello() {
		require_once "mvc/views/loginAdmin.php";
	}
	public function process_login() {
		$username = $this->validation($_POST['username']);
		$password = md5($this->validation($_POST['password']));

		if(empty($username) || empty($password)) {
			$alert = "Acount and password must be not empty !";
			require_once "mvc/views/loginAdmin.php";
		} else {
			$process = $this->model("AdminModel");
			$result = $process->processLogin($username, $password);
			if($result == 1) {
				header("Location:../Dashboard");
			} else {
				$alert = "Acount and password isn't invalid";
				require_once "mvc/views/loginAdmin.php";
			}
		}
	}

	public function logout() {
		Session::destroy();
		header("Location:../admin");
	}
}