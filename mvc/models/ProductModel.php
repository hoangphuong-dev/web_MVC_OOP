<?php 
class ProductModel extends DB {
	public function processInsert($product_name ,$category_id ,$brand_id ,$product_desc ,$product_price ,$product_type, $unique_image)	{
		$query = "insert into product(product_name, category_id, brand_id, product_desc, product_price, product_type, product_image) 
		values('$product_name', '$category_id', '$brand_id', '$product_desc', '$product_price', '$product_type','$unique_image')";
		$this->insert($query);
	}
	public function getAll() {
		$query = "select * from product_brand_category_type";
		$result = $this->select($query);
		return $result;
	}
	public function Edit($id) {
		$query = "select * from product_brand_category_type where product_id = '$id'";
		$result = $this->select($query);
		return $result;
	}
	public function processEdit($product_id, $product_name ,$category_id ,$brand_id ,$product_desc ,$product_price ,$product_type, $unique_image) {
		$query = "update product set product_name = '$product_name' ,category_id = '$category_id' ,brand_id = '$brand_id' ,product_desc = '$product_desc' ,product_price = '$product_price' ,product_type = '$product_type', product_image = '$unique_image' where product_id = '$product_id'";
		$this->update($query);
	}
	public function Delete($product_id) {
		$query = "delete from product where product_id = '$product_id'";
		mysqli_query($this->connect, $query);
		$result = $this->getAll();
		return $result;
	}
}
