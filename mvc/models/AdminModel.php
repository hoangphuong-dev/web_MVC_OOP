<?php 
class AdminModel extends DB {
	public function processLogin($username, $password)	{
		$query = "select * from admin where admin_user = '$username' and admin_pass = '$password' limit 1";
		$result = $this->select($query);
		if($result) {
			$value = mysqli_fetch_array($result);
			Session::set('adminLogin', true);
			Session::set('adminId', $value['admin_id']);
			Session::set('adminName', $value['admin_name']);
			Session::set('adminUser', $value['admin_user']);
			return mysqli_num_rows($result);
		}
	}
}