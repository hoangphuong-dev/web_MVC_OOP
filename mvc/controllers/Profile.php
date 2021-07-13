<?php 
require_once 'mvc/controllers/Product.php';
class Profile extends Product {
	use Format;
	use Controller;

	private $id_customer;
	private $customer_login;

	public function __construct() {
		$this->id_customer = Session::get('customerId');
		$this->customer_login = Session::get('customerLogin');
	}
	public function Hello() {
		$this->view_profile();
	}
	public function view_profile() {
		$customer = $this->model("customerModel");
		$result = $customer->getCustomerById($this->id_customer);
		$count = mysqli_num_rows($result);
		if($count == 1) {
			$this->view("user_layout", [
				"name_page"=>"profile",
				"Page"=>"view_profile",
				"profile"=>$result
			]);
		} else {
			echo "Không có người này";
		}
	}
	public function update_profile() {
		$customer_name = $this->validation($_POST['customer_name']);
		$customer_phone = $this->validation($_POST['customer_phone']);
		$customer_email = $this->validation($_POST['customer_email']);
		$customer_address = $this->validation($_POST['customer_address']);
		$customer_city = $this->validation($_POST['customer_city']);
		$customer = $this->model("customerModel");
		if($customer_name == '' || $customer_phone == '' || $customer_email == '' || $customer_address == '' || $customer_city == '') {
			$alert = "Fileds must be not empty !";
			$color = "red";
		} else {
			$customer->UpdateCustomer($this->id_customer, $customer_name, $customer_phone, $customer_email, $customer_address, $customer_city);
			$alert = "Update profile success !";
			$color = "green";
			$result = $customer->getCustomerById($this->id_customer);
			$row = $result->fetch_array();
			Session::set('customerName', $row['customer_name']);
		}
		$this->view_profile();
	}

	public function change_avatar() {
		$size = $_FILES['product_image']['size'];
		$avatar = $this->model('CustomerModel');
		if($size == 0) {
			$alert = "You don't choose image";
			$color = "red";
		} else {
			$result_image = $avatar->getCustomerById($this->id_customer);
			$row = $result_image->fetch_array();
			if(!empty($row['customer_image'])) {
				unlink("public/upload/".$row['customer_image']."");
			}
			$name_image = $this->process_image();
			$avatar->changeAvartar($this->id_customer, $name_image);
			Session::set('image_profile', $name_image);
			$alert = "Update avartar success !";
			$color = "green";
		}

		$result = $avatar->getCustomerById($this->id_customer);
		$this->view("user_layout", [
			"name_page"=>"profile",
			"Page"=>"view_profile",
			"profile"=>$result,
			"alert"=>$alert,
			"color"=>$color,
		]);

	}
}