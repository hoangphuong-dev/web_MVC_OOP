<?php 
class HomeModel extends DB {
	public function getNewProduct() {
		$query = "select * from product_brand_category_type order by product_id DESC limit 4";
		$result = $this->select($query);
		return $result;
	}
	public function getFeatureProduct() {
		$query = "select * from product_brand_category_type where type_name = 'siêu siêu xịn' limit 4";
		$result = $this->select($query);
		return $result;
	}
	public function getProductById($id) {
		$query = "select * from product_brand_category_type where product_id = '$id'";
		$result = $this->select($query);
		return $result;
	}
	public function getCategory() {
		$query = "select DISTINCT category_name from product_brand_category_type";
		$result = $this->select($query);
		return $result;
	}
	public function getProductByPhone() {
		$query = "select * from product_brand_category_type where category_name = 'điện thoại'  order by product_id DESC limit 4;";
		$result = $this->select($query);
		return $result;
	}
	public function getProductByLaptop() {
		$query = "select * from product_brand_category_type where category_name = 'máy tính'  order by product_id DESC limit 4;";
		$result = $this->select($query);
		return $result;
	}
	public function getProductDell() {
		$query = "select * from product_brand_category_type where brand_name = 'dell'  order by product_id DESC limit 4;";
		$result = $this->select($query);
		return $result;
	}
	public function getProductByHp() {
		$query = "select * from product_brand_category_type where brand_name = 'HP'  order by product_id DESC limit 4;";
		$result = $this->select($query);
		return $result;
	}
	public function getProductByApple() {
		$query = "select * from product_brand_category_type where brand_name = 'Apple'  order by product_id DESC limit 4;";
		$result = $this->select($query);
		return $result;
	}
	public function getProductByCat($category) {
		$query = "select * from product_brand_category_type where category_name = '$category'";
		$result = $this->select($query);
		return $result;
	}
}
