<?php 
class CartModel extends DB {
	public function getProductFromCart($array_id) {
		$query = "select * from product where product_id in (";
		for($i = 0; $i < count($array_id); $i++) { 
			$query .= $array_id[$i];
			if($i < (count($array_id) -1)) $query .= ",";
		}
		$query .= ")";
		$result = $this->select($query);
		return $result;
	}
	public function getInfoCustomer($id) {
		$query = "select * from customer where customer_id = '$id'";
		$result = $this->select($query);
		return $result;
	}
	public function insertOrder($id_customer, $receiver_name, $receiver_phone, $receiver_address, $order_time, $order_status) {
		$query = "insert into orders(customer_id, receiver_name, receiver_phone, receiver_address, order_time, order_status)
		values('$id_customer', '$receiver_name', '$receiver_phone', '$receiver_address', '$order_time', '$order_status')";
		$this->insert($query);
		// insert vào hoá đơn chi tiết
		$sql = "select max(order_id) from orders";
		$result_order_id = $this->select($sql);
		$each = mysqli_fetch_array($result_order_id);
		$order_id = $each['max(order_id)'];
		// lấy id hoá đơn vừa thêm 
		foreach ($_SESSION['cart'.$id_customer] as $product_id => $quatity) {
			$query_price = "select product_price from product where product_id = '$product_id'";
			$result_price = $this->select($query_price);
			$each_price = mysqli_fetch_array($result_price);
			$product_price = $each_price['product_price'];
 			// lấy giá của sản phẩm trong bảng product
			$query_detail = "insert into order_details(order_id, product_id, quatity, product_price)
			values('$order_id', '$product_id', '$quatity', '$product_price')";
			$this->insert($query_detail);
		}
	}
}