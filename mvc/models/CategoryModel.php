<?php 
class CategoryModel extends DB {
	public function processInsert($name_category)	{
		$query = "insert into category(category_name) values('$name_category')";
		$this->insert($query);
	}
	public function getAll() {
		$query = "select * from category";
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
