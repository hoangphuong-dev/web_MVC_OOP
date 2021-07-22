<?php 
class CustomerModel extends DB {
	public function processRegister($customer_name, $customer_phone, $customer_email, $customer_address, $customer_city, $customer_password) {
		$query = "insert into customer(customer_name, customer_phone, customer_email, customer_address, customer_city, customer_password) 
		values('$customer_name', '$customer_phone', '$customer_email', '$customer_address', '$customer_city', '$customer_password')";
		$this->insert($query);
	}
	public function processLogin($customer_email,$customer_password) {
		$query = "select * from customer where customer_email = '$customer_email' and customer_password = '$customer_password' limit 1";
		$result = $this->insert($query);
		return $result;
	}
	// khi người dùng đăng nhập đúng => Insert token của người dùng vào bảng trong csdl
	public function insertToken($create_at, $customer_id, $token) {
		$query = "insert into customer_tokens(customer_id, token, create_at) 
		values ('$customer_id', '$token', '$create_at')";
		$this->insert($query);
	}
	// khi người dùng đăng xuất => xoá token trong DB
	public function deleteToken($token) {
		$query = "delete from customer_tokens where token = '$token'";
		$this->select($query);
	}
	
	// Model of ProfileController
	public function getCustomerById($customer_id) {
		$query = "select * from customer where customer_id = '$customer_id'";
		$result = $this->select($query);
		return $result;
	}
	public function UpdateCustomer($customer_id, $customer_name, $customer_phone, $customer_email, $customer_address, $customer_city) {
		$query = "update customer set 
		customer_name = '$customer_name',
		customer_phone = '$customer_phone',
		customer_email = '$customer_email',
		customer_address = '$customer_address',
		customer_city = '$customer_city'
		where customer_id = '$customer_id'
		";
		$result = $this->update($query);
		return $result;
	}
	public function changeAvartar($customer_id, $name_image) {
		$query = "update customer set 
		customer_image = '$name_image'
		where customer_id = '$customer_id'
		";
		$result = $this->update($query);
		return $result;
	}
}