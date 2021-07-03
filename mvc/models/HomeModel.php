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




	public function Edit($id) {
		$query = "select * from category where category_id = '$id'";
		$result = $this->select($query);
		return $result;
	}
	public function processEdit($id_category, $name_category) {
		$query = "update category set category_name = '$name_category' where category_id = '$id_category'";
		$this->update($query);
	}
	public function Delete($id_category) {
		$query = "delete from category where category_id = '$id_category'";
		mysqli_query($this->connect, $query);
		$result = $this->getAll();
		return $result;
	}
}
