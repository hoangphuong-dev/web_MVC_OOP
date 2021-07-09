<?php
Session::init();
class Home {
	use Controller;
	use Format;
	function Hello() {
		$new_product = $this->model("HomeModel");
		$result_new_product = $new_product->getNewProduct();
		$result_feature_product = $new_product->getFeatureProduct();
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"home",
			"new_product"=>$result_new_product,
			"feature_product"=>$result_feature_product,
		]);
	}
	function preview($id) {
		$product = $this->model("HomeModel");
		$result = $product->getProductById($id);
		$result_product_category = $product->getCategory();
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"preview",
			"product"=>$result,
			"product_category"=>$result_product_category,
		]);
	}
	function products() {
		$product = $this->model("HomeModel");
		$result_phone = $product->getProductByPhone();
		$result_laptop = $product->getProductByLaptop();
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"products",
			"product_phone"=>$result_phone,
			"product_laptop"=>$result_laptop,
		]);
	}
	function topbrands() {
		$product = $this->model("HomeModel");
		$result_dell = $product->getProductDell();
		$result_hp = $product->getProductByHp();
		$result_apple = $product->getProductByApple();
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"topbrands",
			"product_dell"=>$result_dell,
			"product_hp"=>$result_hp,
			"product_apple"=>$result_apple,
		]);
	}
	function productbycat($category) {
		$product = $this->model("HomeModel");
		$result_product_cat = $product->getProductByCat($category);
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"productbycat",
			"product_cat"=>$result_product_cat,
		]);
	}
	function contact() {
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"contact",
		]);
	}
	
	function login() {
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"login",
		]);
	}
	function process_register() {
		$customer_name = $this->validation($_POST['name']);
		$customer_phone = $this->validation($_POST['phone']);
		$customer_email = $this->validation($_POST['email']);
		$customer_address = $this->validation($_POST['address']);
		$customer_city = $this->validation($_POST['city']);
		$customer_password = md5($this->validation($_POST['password']));
		if($customer_name == "" || $customer_name == "" || $customer_phone == "" || $customer_email == "" || $customer_password == "") {
			$alert = "Fields be must not empty !";
			$color = "red";
		} else {
			$customer = $this->model("CustomerModel");
			$customer->processRegister($customer_name, $customer_phone, $customer_email, $customer_address, $customer_city, $customer_password);
			$alert = "Register success ... Please login !";
			$color = "green";
		}
		
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"login",
			"alert"=>$alert,
			"color"=>$color,
		]);
	}
	function process_login() {
		$customer_email = $this->validation($_POST['email']);
		$customer_password = md5($this->validation($_POST['password']));
		if(empty($customer_email) || empty($customer_password)) {
			$this->view("user_layout", [
				"name_page"=>"home_user",
				"Page"=>"login",
				"mes"=>"Email and password must be not empty !",
				"mau"=>"red",
			]);
		} else {
			$customer = $this->model("CustomerModel");
			$result = $customer->processLogin($customer_email,$customer_password);
			$count = mysqli_num_rows($result);
			if($count == 1) {
				// if(isset($_POST['remember_login'])) {
				// 	setcookie("customer_email","123456789", (time() + 60*60*24*60));

				// }
				$value = mysqli_fetch_array($result);
				Session::set('customerLogin', true);
				Session::set('customerId', $value['customer_id']);
				Session::set('customerName', $value['customer_name']);
				// die();
				header("Location:../");
			} else {
				$this->view("user_layout", [
					"name_page"=>"home_user",
					"Page"=>"login",
					"mes"=>"Email and password isn't invalid !",
					"mau"=>"red",
				]);
			}
		}
	}
	function logout() {
		unset ($_SESSION['customerLogin']);
		unset ($_SESSION['customerId']);
		unset ($_SESSION['customerName']);
		header("Location:../");
	}
	
}
