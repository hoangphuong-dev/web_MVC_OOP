<?php
Session::init();
date_default_timezone_set('Asia/Ho_Chi_minh');
class Cart {
	use Format;
	use Controller;
	protected static $id_customer;
	protected static $session_login;

	public function __construct() {
		self::$id_customer = Session::get('customerId');
		self::$session_login = Session::get('customerLogin');
	}

	public function Hello() {
		$this->view_cart();
	}

	function view_cart() {
		$session_cart = Session::get('cart'.self::$id_customer);
		if(self::$session_login == 1) {
			if(!empty($session_cart)) {
				$cart = $this->model("CartModel");
				$array_id = [];
				foreach ($_SESSION['cart'.self::$id_customer] as $product_id => $quatity) {
					array_push($array_id, $product_id);
				}
				$result_product = $cart->getProductFromCart($array_id);
				$this->view("user_layout", [
					"name_page"=>"cart",
					"Page"=>"view_cart",
					"product_in_cart"=>$result_product,
					"id_customer"=>self::$id_customer,
				]);
			} else {
				$this->view("user_layout", [
					"name_page"=>"cart",
					"Page"=>"cart_empty",
				]);
			}
		} else {
			$this->view("user_layout", [
				"name_page"=>"cart",
				"Page"=>"session_cart_empty",
			]);
		}
	}

	function add_to_cart() {
		if(self::$session_login == 1) {
			$product_id = $this->validation($_POST['product_id']);
			$quatity = $this->validation($_POST['quatity']);
			$product_price = $this->validation($_POST['product_price']);
			if(isset($_SESSION['cart'.self::$id_customer][$product_id])) {
				if($quatity > 1) {
					$_SESSION['cart'.self::$id_customer][$product_id] += $quatity;
				} else {
					$_SESSION['cart'.self::$id_customer][$product_id]++;
				}
			} else {
				if($quatity > 1) {
					$_SESSION['cart'.self::$id_customer][$product_id] = $quatity;
				} else {
					$_SESSION['cart'.self::$id_customer][$product_id] = 1;
				}
			}
			echo "<script type='text/javascript'> alert('add to cart success !');</script>";
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			header("Location:../Home/login");
		}
	}

	function change_cart($id) {
		$quatity = $_POST['quatity'];
		if($quatity >= 1 && $quatity <= 10) {
			$_SESSION['cart'.self::$id_customer][$id] = $quatity;
		}
		header("Location:../");
	}
	function delete_product_in_cart($id) {
		unset($_SESSION['cart'.self::$id_customer][$id]);
		header("Location:../");
	}
	function payment() {
		$this->view("user_layout", [
			"name_page"=>"cart",
			"Page"=>"payment",
		]);
	}
	function offline_payment() {
		$cart = $this->model("CartModel");
		$array_id = [];
		foreach ($_SESSION['cart'.self::$id_customer] as $product_id => $quatity) {
			array_push($array_id, $product_id);
		}
		$result_product = $cart->getProductFromCart($array_id);
		$customer = $this->model("CartModel");
		$result_customer = $customer->getInfoCustomer(self::$id_customer);
		$this->view("user_layout", [
			"name_page"=>"cart",
			"Page"=>"offline_payment",
			"product_in_cart"=>$result_product,
			"id_customer"=>self::$id_customer,
			"info_customer"=>$result_customer,
		]);
	}
	function order() {
		$receiver_name = $this->validation($_POST['receiver_name']);
		$receiver_phone = $this->validation($_POST['receiver_phone']);
		$receiver_address = $this->validation($_POST['receiver_address'])." - ".$this->validation($_POST['receiver_city']);
		$order_time = date("Y-m-d H:i:s");
		$order_status = 1; // đang chờ duyệt
		$order = $this->model("CartModel");
		$order->insertOrder(self::$id_customer, $receiver_name, $receiver_phone, $receiver_address, $order_time, $order_status);
		unset ($_SESSION['cart'.self::$id_customer]);
		unset ($_SESSION['total_quatity']);
		$this->view("user_layout", [
			"name_page"=>"cart",
			"Page"=>"order_success",
		]);
	}
	
}

// huỷ phiên 
// session_destroy();
// unset ($_SESSION['cart'.$id_customer]);
// unset ($_SESSION['total_quatity']);