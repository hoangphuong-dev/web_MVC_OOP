<?php 
class OrderModel extends DB {
	public function getOrder() {
		$query = "select * from orders_customer_admin order by order_id DESC";
		$result = $this->select($query);
		return $result;
	}
	public function getOrderById($order_id) {
		$query = "select * from orders_customer_admin where order_id = '$order_id'";
		$result = $this->select($query);
		return $result;
	}
	public function getOrderByIdCus($customer_id) {
		$query = "select * from orders_customer_admin where customer_id = '$customer_id'";
		$result = $this->select($query);
		return $result;
	}

	public function confirmOrder($order_id, $admin_id) {
		$a = $this->getOrderById($order_id);
		$b = mysqli_fetch_array($a);
		if($b['order_status'] == 1) {
			$query = "update orders set order_status = '2', admin_id = '$admin_id' where order_id = '$order_id'";
			$this->update($query);
			return true;
		}
		return false;
	}
	public function cancelOrder($order_id, $admin_id) {
		$a = $this->getOrderById($order_id);
		$b = mysqli_fetch_array($a);
		if($b['order_status'] == 1) {
			$query = "update orders set order_status = '0', admin_id = '$admin_id' where order_id = '$order_id'";
			$this->update($query);
			return true;
		}
		return false;
	}
	public function getOrderDetail($order_id) {
		$query = "select * from order_details_product where order_id = '$order_id'";
		$result = $this->select($query);
		return $result;
	}





// Model của bên khách hàng
	public function getOrderDetailCus($order_id, $customer_id) {
		$sql = "select order_id from orders where order_id = '$order_id' and customer_id = '$customer_id'";
		$row = mysqli_fetch_array($this->select($sql));
		$a = $row['order_id'];
		$query = "select * from order_details_product where order_id = '$a'";
		$result = $this->select($query);
		return $result;
	}

}