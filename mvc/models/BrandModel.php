<?php 
class BrandModel extends DB {
	public function processInsert($name_brand)	{
		$query = "insert into brand(brand_name) values('$name_brand')";
		$this->insert($query);
	}
	public function getAll() {
		$query = "select * from brand";
		$result = $this->select($query);
		return $result;
	}
	public function Edit($id) {
		$query = "select * from brand where brand_id = '$id'";
		$result = $this->select($query);
		return $result;
	}
	public function processEdit($brand_id, $brand_name) {
		$query = "update brand set brand_name = '$brand_name' where brand_id = '$brand_id'";
		$this->update($query);
	}
	public function Delete($brand_id) {
		$query = "delete from brand where brand_id = '$brand_id'";
		mysqli_query($this->connect, $query);
		$result = $this->getAll();
		return $result;
	}
}
