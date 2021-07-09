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
}