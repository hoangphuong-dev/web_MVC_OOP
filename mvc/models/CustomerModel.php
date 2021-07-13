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