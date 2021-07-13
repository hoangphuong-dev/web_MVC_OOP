<?php
Session::init();
date_default_timezone_set('Asia/Ho_Chi_minh');
class Home {
	use Controller;
	use Format;
	function Hello() {
		$this->view_home();
	}
	function view_home() {
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
		if(isset($_COOKIE['customer_id']) && isset($_COOKIE['customer_name']) && isset($_COOKIE['image_profile']) && isset($_COOKIE['customerLogin'])) {
			// nếu có cookie thì lấy về 
			$customer_id = $_COOKIE['customer_id'];
			$customer_name = $_COOKIE['customer_name'];
			$image_profile = $_COOKIE['image_profile'];
			$customerLogin = $_COOKIE['customerLogin'];
			// mỗi lần đăng nhập tăng thời gian lên 2 tháng (trong vòng 2 tháng không vào => tự đăng xuất)
			setcookie('customer_id', $customer_id, time() + 60*60*24*60);
			setcookie('customer_name', $customer_name, time() + 60*60*24*60);
			setcookie('image_profile', $image_profile, time() + 60*60*24*60);
			setcookie('customerLogin', $customerLogin, time() + 60*60*24*60);
			// gán giá trị của cookie vào session 
			Session::set('customerLogin', $customerLogin);
			Session::set('customerId', $customer_id);
			Session::set('customerName', $customer_name);
			Session::set('image_profile', $image_profile);
			header("Location:../");

		}
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
			$row = $result->fetch_array();
			$count = mysqli_num_rows($result);
			if($count == 1) {
				if(isset($_POST['remember_login'])) {
					setcookie("customer_id",$row['customer_id'], (time() + 60*60*24*60));
					setcookie("customer_name",$row['customer_name'], (time() + 60*60*24*60));
					setcookie("image_profile",$row['customer_image'], (time() + 60*60*24*60));
					setcookie("customerLogin","1", (time() + 60*60*24*60));
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

	function logout() {
		unset ($_SESSION['customerLogin']);
		unset ($_SESSION['customerId']);
		unset ($_SESSION['customerName']);
		unset ($_SESSION['image_profile']);
		// khi đăng xuất => vô hiệu hoá cookie
		setcookie("customer_id",'', -1);
		setcookie("customer_name",'', -1);
		setcookie("image_profile",'', -1);
		setcookie("customerLogin",'', -1);
		header("Location:../");
	}
	// chức năng nâng cao (So sánh và sản phẩm yêu thích)
	function add_comparison($product_id) {
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
	function view_comparison() {
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
	function delete_product_in_comparison($product_id) {
		unset($_SESSION['comparison'][$product_id]);
		header("Location:../view_comparison");
	}
	
}
