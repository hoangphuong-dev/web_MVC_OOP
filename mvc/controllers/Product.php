<?php
class Product extends Controller {
	use Format;
	function Hello() {
		$this->list();
	}
	function add() {
		$category = $this->model("CategoryModel");
		$result_category = $category->getAll();
		$brand = $this->model("BrandModel");
		$result_brand = $brand->getAll();

		$this->view("master_layout", [
			"Page"=>"add_product",
			"category"=>$result_category,
			"brand"=>$result_brand,
		]);
	}
	function process_insert() {
		$name_product = $this->validation($_POST['name_product']);
		if($name_product == "") {
			$alert = "Brand is not empty !";
			$color = "red";
			$this->view("master_layout", [
				"Page"=>"add_product",
				"alert"=>$alert,
				"color"=>$color
			]);
		} else {
			$brand = $this->model("BrandModel");
			$brand->processInsert($name_product);
			$result = $brand->getAll();
			$alert = "Insert brand success !";
			$color = "green";
			$this->view("master_layout", [
				"Page"=>"list_product",
				"alert"=>$alert,
				"color"=>$color,
				"brand"=>$result
			]);
		}
		
	}
	function list() {
		$brand = $this->model("BrandModel");
		$result = $brand->getAll();
		$this->view("master_layout", [
			"Page"=>"list_product",
			"brand"=>$result
		]);
	}
	function edit($id) {
		$brand = $this->model("BrandModel");
		$result =  $brand->Edit($id);
		$this->view("master_layout", [
			"Page"=>"edit_product",
			"brand"=> $result

		]);
	}
	function process_edit() {
		$brand_id =   $this->validation($_POST['brand_id']);
		$brand_name =   $this->validation($_POST['brand_name']);
		if($brand_name == "") {
			$alert = "Brand is not empty !";
			$color = "red";
			$this->view("master_layout", [
				"Page"=>"edit_product",
				"alert"=>$alert,
				"color"=>$color	
			]);
		} else {
			$brand = $this->model("BrandModel");
			$result =  $brand->processEdit($brand_id, $brand_name);
			$result = $brand->getAll();
			$alert = "Insert brand success !";
			$color = "green";
			$this->view("master_layout", [
				"Page"=>"list_product",
				"alert"=>$alert,
				"color"=>$color,
				"brand"=>$result	
			]);
		}
	}
	function delete($id) {
		$brand = $this->model("BrandModel");
		$result = $brand->Delete($id);
		header("Location:../list");
	}
}