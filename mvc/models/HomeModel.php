<?php 
class HomeModel extends DB {
	public function getNewProduct() {
		$query = "select * from product_brand_category_type order by product_id DESC limit 4";
		$result = $this->select($query);
		return $result;
	}
	public function getFeatureProduct() {
		$query = "select * from product_brand_category_type where type_name = 'siêu xịn' limit 4";
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
	public function getProductByCat($category, $page) {
		if($page == '') {
			$page = 1;
		}
		$query = "select * from product_brand_category_type where category_name = '$category'";
		$product_in_a_page = 12;
		$product_miss = ($page - 1) * $product_in_a_page;
		$total_product = mysqli_num_rows($this->select($query));
		$total_page = ceil($total_product/$product_in_a_page);
		$query.="limit $product_in_a_page offset $product_miss";
		$result = $this->select($query);
		return [
			"query"=> $result,
			"total_page"=>$total_page,
		];
	}
	public function getProduct($array_id_product) {
		$query = "select * from product_brand_category_type where product_id in (";
		for($i = 0; $i < count($array_id_product); $i++) { 
			$query .= $array_id_product[$i];
			if($i < (count($array_id_product) -1)) $query .= ",";
		}
		$query .= ")";
		$result = $this->select($query);
		return $result;
	}
	public function getSlider() {
		$query = "select * from slider where slider_status = 1";
		$result = $this->select($query);
		return $result;
	}
	// tìm kiếm sản phẩm 
	public function Search($key, $category_name, $brand_name, $page) {
		$query = "select * from product_brand_category_type where 
		product_name like '%$key%'
		and category_name like '%$category_name%'
		and brand_name like '%$brand_name%'
		";
		if($page == '') $page = 1;
		$product_in_a_page = 12;
		$product_miss = ($page - 1) * $product_in_a_page;
		if($this->select($query) == '') {
			return false;
		}
		$total_product = mysqli_num_rows($this->select($query));
		$total_page = ceil($total_product/$product_in_a_page);
		$query.="limit $product_in_a_page offset $product_miss";
		$result_search = $this->select($query);
		return [
			"query"=>$result_search,
			"total_page"=>$total_page,
			"total_product"=>$total_product,
		];
	}

}
