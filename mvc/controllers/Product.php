<?php
class Product {
	use Format;
	use Controller;
	function Hello() {
		$this->list();
	}
	function getDataCategory() {
		$category = $this->model("CategoryModel");
		$result_category = $category->getAll();
		return $result_category;
	}
	function getDataBrand() {
		$brand = $this->model("BrandModel");
		$result_brand = $brand->getAll();
		return $result_brand;
	}
	function add() {
		$result_category = $this->getDataCategory();
		$result_brand = $this->getDataBrand();
		$this->view("master_layout", [
			"name_page"=>"product",
			"Page"=>"add_product",
			"category"=>$result_category,
			"brand"=>$result_brand,
		]);
	}
	function process_image() {
		$available_end_image = array('jpg','jpeg','png','gif');
		$file_name = $_FILES['product_image']['name'];
		$file_size = $_FILES['product_image']['size'];
		$string_cover_array = explode('.', $file_name);
		$end_image = strtolower(end($string_cover_array));
		$unique_image = substr(md5(time()), 0, 10).'.'.$end_image;
		$file_temp = $_FILES['product_image']['tmp_name'];
		$upload_image = "public/upload/".$unique_image;
		move_uploaded_file($file_temp, $upload_image);
		return $unique_image;
	}
	function getDataForm() {
		$product_name = $this->validation($_POST['product_name']);
		$category_id = $this->validation($_POST['category_id']);
		$brand_id = $this->validation($_POST['brand_id']);
		$product_desc = $this->validation($_POST['product_desc']);
		$product_price = $this->validation($_POST['product_price']);
		$product_type = $this->validation($_POST['product_type']);
		$dataArray = array(
			"product_name"=>$product_name,
			"category_id"=>$category_id,
			"brand_id"=>$brand_id,
			"product_desc"=>$product_desc,
			"product_price"=>$product_price,
			"product_type"=>$product_type
		);
		return $dataArray;
	}
	function process_insert() {
		$data = $this->getDataForm();
		if($data["product_name"] == "" || $data["product_price"] == "") {
			$result_category = $this->getDataCategory();
			$result_brand = $this->getDataBrand();
			$alert = " Fields product is not empty !";
			$color = "red";
			$this->view("master_layout", [
				"name_page"=>"product",
				"Page"=>"add_product",
				"alert"=>$alert,
				"color"=>$color,
				"category"=>$result_category,
				"brand"=>$result_brand,
			]);
		} else {
			$unique_image = $this->process_image();
			$product = $this->model("ProductModel");
			$product->processInsert($data["product_name"] ,$data["category_id"] ,$data["brand_id"] ,$data["product_desc"] ,$data["product_price"] ,$data["product_type"], $unique_image);
			$result = $product->getAll();
			$alert = "Insert product success !";
			$color = "green";
			$this->view("master_layout", [
				"name_page"=>"product",
				"Page"=>"list_product",
				"alert"=>$alert,
				"color"=>$color,
				"product"=>$result
			]);
		}
	}
	function list() {
		$product = $this->model("ProductModel");
		$result = $product->getAll();
		$this->view("master_layout", [
			"name_page"=>"product",
			"Page"=>"list_product",
			"product"=>$result
		]);
	}

	function edit($id) {
		$result_category = $this->getDataCategory();
		$result_brand = $this->getDataBrand();
		$product = $this->model("ProductModel");
		$result =  $product->Edit($id);
		$this->view("master_layout", [
			"name_page"=>"product",
			"Page"=>"edit_product",
			"product"=> $result, 
			"category"=>$result_category,
			"brand"=>$result_brand,
		]);
	}

	function process_edit() {
		$id = $this->validation($_POST['product_id']);
		$data = $this->getDataForm();
		if($data["product_name"] == "" || $data["product_price"] == "") {
			$result_category = $this->getDataCategory();
			$result_brand = $this->getDataBrand();
			$product = $this->model("ProductModel");
			$result =  $product->Edit($id);
			$alert = "Fields product is not empty !";
			$color = "red";
			$this->view("master_layout", [
				"name_page"=>"product",
				"Page"=>"edit_product",
				"alert"=>$alert,
				"color"=>$color,
				"category"=>$result_category,
				"brand"=>$result_brand,
				"product"=> $result, 
			]);
		} else {
			$file_size = $_FILES['product_image']['size'];
			if($file_size == 0) { // kiểm tra image_size để xem có ảnh hay không ? 
				$get_img = $this->model("ProductModel");
				$result_image =  $get_img->Edit($id);
				$row = $result_image->fetch_array();
				$unique_image = $row['product_image'];
			} else {
				$unique_image = $this->process_image();
			}
			$product = $this->model("ProductModel");
			$product->processEdit($id, $data["product_name"] ,$data["category_id"] ,$data["brand_id"] ,$data["product_desc"] ,$data["product_price"] ,$data["product_type"], $unique_image);
			$result = $product->getAll();
			$alert = "Update product success !";
			$color = "green";
			$this->view("master_layout", [
				"name_page"=>"product",
				"Page"=>"list_product",
				"alert"=>$alert,
				"color"=>$color,
				"product"=>$result
			]);
		}
	}
	function delete($id) {
		$product = $this->model("ProductModel");
		$result_image =  $product->Edit($id);
		$row = $result_image->fetch_array();
		unlink("public/upload/".$row['product_image']."");
		$product->Delete($id);
		header("Location:../list");
	}
}