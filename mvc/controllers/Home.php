<?php
Session::init();
date_default_timezone_set('Asia/Ho_Chi_minh');
require_once 'mvc/controllers/Product.php';
class Home extends Product {
	use Controller;
	use Format;
	public function Hello() { 
		$this->view_home();
	}
	public function view_home() {
		$obj = $this->model("HomeModel");
		$result_new_product = $obj->getNewProduct();
		$result_feature_product = $obj->getFeatureProduct();
		$result_slider = $obj->getSlider();
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"home",
			"new_product"=>$result_new_product,
			"feature_product"=>$result_feature_product,
			"slider"=>$result_slider,
		]);
	}
	public function preview($id) {
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
	public function products() {
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
	public function topbrands() {
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
	public function productbycat($category, $page) {
		$category = str_replace('-', ' ', $category);
		$product = $this->model("HomeModel");
		$result_product_cat = $product->getProductByCat($category, $page);
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"productbycat",
			"product"=>$result_product_cat['query'],
			"cat_name"=>$category,
			"total_page"=>$result_product_cat['total_page'],
		]);
	}

	public function contact() {
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"contact",
		]);
	}

	// Tìm kiếm 
	public function search($page) {
		$key =  $this->validation($_POST['key']);
		$category_name =  $this->validation($_POST['category_name']);
		$brand_name =  $this->validation($_POST['brand_name']);

		$search = $this->model('HomeModel');
		$result_search = $search->Search($key, $category_name, $brand_name, $page);
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"productbycat",
			"product"=>$result_search['query'],
			"total_page"=>$result_search['total_page'],
			"total_product"=>$result_search['total_product'],
			"key"=>$key,
			"category_name"=>$category_name,
			"brand_name"=>$brand_name,
		]);
	}

	// Đăng nhập , đăng kí , đăng xuất
	public function login() {
		if(!empty($_SESSION['customerLogin']) && $_SESSION['customerLogin'] == 1) {
			header("Location:../");
		}
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"login",
		]);
	}
	public function process_register() {
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
	public function process_login() {
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
			$row = $result->fetch_array();
			$count = mysqli_num_rows($result);
			if($count == 1) {
				if(isset($_POST['remember_login']) && $_POST['remember_login'] == 'on') {
					// lưu cookie bằng thông tin của người dùng => làm lộ thông tin và có thể fake để đăng nhập
					// setcookie("customer_id",$row['customer_id'], (time() + 60*60*24*60));
					// setcookie("customer_name",$row['customer_name'], (time() + 60*60*24*60));
					// setcookie("image_profile",$row['customer_image'], (time() + 60*60*24*60));
					// setcookie("customerLogin","1", (time() + 60*60*24*60));

					// tự động tạo ra một cookie mới, làm trên nhiều thiết bị , nhiều trình duyệt 
					// => Quản lý được người dùng đang đăng nhập trên những thiết bị nào , mấy thiết bị 
					// => Bảo mật và không thể nào bị fake 
					$create_at = date("Y-m-d H:i:s"); // thời gian người dùng đăng nhập
					$customer_id = $row['customer_id']; // lấy id người dùng vừa đăng nhập đúng
					$customer_email = $row['customer_email']; // lấy mail người dùng vừa đăng nhập đúng
					$token = md5($customer_email.time()); // mã hoá với hàm thời gian => từng thời điểm đăng nhập sẽ tạo ra $token khác nhau
					setcookie("token",$token, (time() + 60*60*24*60));
					$customer->insertToken($create_at, $customer_id, $token); // insert token vào bảng token trong csdl
				}
				Session::set('customerLogin', true);
				Session::set('customerId', $row['customer_id']);
				Session::set('customerName', $row['customer_name']);
				Session::set('image_profile', $row['customer_image']);
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

	public function logout() {
		// khi đăng xuất => vô hiệu hoá cookie
		// setcookie("customer_id", "", -1);
		// setcookie("customer_name", "", -1);
		// setcookie("image_profile", "", -1);
		// setcookie("customerLogin", "", -1);
		// unset($_COOKIE['customer_id']);
		// unset($_COOKIE['customer_name']);
		// unset($_COOKIE['image_profile']);
		// unset($_COOKIE['customerLogin']);
		
		// xoá token khỏi bảng customer_token trong DB 
		if(isset($_COOKIE['token'])) {
			$token = $_COOKIE['token'];
			$logout = $this->model("CustomerModel");
			$logout->deleteToken($token);
			// vô hiệu hoá cookie 
			setcookie("token", "", -1);
			unset($_COOKIE['token']);
		}
		
		// huỷ phiên đăng nhập
		unset ($_SESSION['customerLogin']);
		unset ($_SESSION['customerId']);
		unset ($_SESSION['customerName']);
		unset ($_SESSION['image_profile']);
		header("Location:../");
	}

	// chức năng nâng cao (So sánh và sản phẩm yêu thích)
	public function add_comparison($product_id) {
		$product = $this->model("HomeModel");
		$result = $product->getProductById($product_id);
		$result_product_category = $product->getCategory();
		if(empty($_SESSION['comparison'][$product_id])) {
			$_SESSION['comparison'][$product_id] = 1;
			$alert = "Added to compare !";
			$color = "green";
		} else {
			$alert = "Already in comparison !";
			$color = "red";
		}
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"preview",
			"alert"=>$alert,
			"color"=>$color,
			"product"=>$result,
			"product_category"=>$result_product_category,
		]);
	}
	public function view_comparison() {
		$session_comparison = Session::get('comparison');
		if(!empty($session_comparison)) {
			$cart = $this->model("HomeModel");
			$array_id_product = [];
			foreach ($_SESSION['comparison'] as $product_id => $quatity) {
				array_push($array_id_product, $product_id);
			}
			$result_product = $cart->getProduct($array_id_product);
			$this->view("user_layout", [
				"name_page"=>"comparison",
				"Page"=>"view_comparison",
				"product_in_comparison"=>$result_product,
			]);
		} else {
			$this->view("user_layout", [
				"name_page"=>"comparison",
				"Page"=>"comparison_empty",
			]);
		}
		
	}
	public function delete_product_in_comparison($product_id) {
		unset($_SESSION['comparison'][$product_id]);
		header("Location:../view_comparison");
	}
	
}
