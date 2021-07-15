<?php 
Session::init();
require_once 'mvc/controllers/Product.php';
class ManageOrder extends Product {
	use Controller;
	use Format;
	private $admin_id;

	public function __construct() {
		$this->admin_id = Session::get('adminId');
	}

	public function Hello() {
		$this->view_order();
	}

	public function view_order() {
		$order = $this->model("OrderModel");
		$result_order = $order->getOrder();
		$this->view("master_layout", [
			"name_page"=>"manage_order",
			"Page"=>"list_order",
			"get_order"=>$result_order,
		]);
	}
	public function confirm($order_id) {
		$order = $this->model("OrderModel");
		$result_order = $order->getOrder();
		$confirm = $this->model("OrderModel");
		$result = $confirm->confirmOrder($order_id, $this->admin_id);
		if($result) {
			$alert = "Duyệt đơn hàng thành công !";
			$color = "green";
		} else {
			$alert = "Không thể sửa tình trạng đơn này !";
			$color = "red";
		}
		$this->view("master_layout", [
			"name_page"=>"manage_order",
			"Page"=>"list_order",
			"get_order"=>$result_order,
			"alert"=> $alert,
			"color"=> $color,
		]);
	}

	public function cancel($order_id) {
		$order = $this->model("OrderModel");
		$result_order = $order->getOrder();
		$cancel = $this->model("OrderModel");
		$result = $cancel->cancelOrder($order_id, $this->admin_id);
		if($result) {
			$alert = "Đã huỷ đơn hàng !";
			$color = "green";
		} else {
			$alert = "Không thể sửa tình trạng đơn này !";
			$color = "red";
		}
		$this->view("master_layout", [
			"name_page"=>"manage_order",
			"Page"=>"list_order",
			"get_order"=>$result_order,
			"alert"=> $alert,
			"color"=> $color,
		]);
	}
	public function view_details($order_id) {
		$order_by_id = $this->model("OrderModel");
		$result_by_id = $order_by_id->getOrderById($order_id);
		$order_detail = $this->model("OrderModel");
		$result_detail = $order_detail->getOrderDetail($order_id);
		$this->view("master_layout", [
			"name_page"=>"manage_order",
			"Page"=>"view_detail",
			"order_by_id"=>$result_by_id,
			"order_detail"=>$result_detail,
		]);
	}
// controller của khách hàng
	public function view_order_by_id() {
		$customer_id = Session::get('customerId');
		if($customer_id == '') {
			header("Location: ../");
		}
		$order_by_id = $this->model("OrderModel");
		$result_by_id = $order_by_id->getOrderByIdCus($customer_id);
		$this->view("user_layout", [
			"name_page"=>"manage_order",
			"Page"=>"view_order_customer",
			"order_by_id"=>$result_by_id,
		]);
	}
	public function view_details_customer($order_id) {
		$customer_id = Session::get('customerId');
		// lấy tất cả đơn của khách hàng đang đăng nhập
		$order = $this->model("OrderModel");
		$result_by_id = $order->getOrderByIdCus($customer_id);
		// lấy chi tiết hoá đơn của thằng mà người dùng click
		$result_detail = $order->getOrderDetailCus($order_id, $customer_id);
		$count = mysqli_num_rows($result_detail);
		if($count > 0) { 
			$this->view("user_layout", [
				"name_page"=>"manage_order",
				"Page"=>"view_order_customer",
				"order_by_id"=>$result_by_id,
				"order_detail"=>$result_detail,
				"order_id"=>$order_id,
			]);
		}else {
			$this->view_order_by_id();
		}
	}

}