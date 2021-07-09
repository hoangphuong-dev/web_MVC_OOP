<?php 
class Brand {
	use Format;
	use Controller;
	function Hello() {
		$this->list();
	}
	function add() {
		$this->view("master_layout", ["Page"=>"add_brand","name_page"=>"brand"]);
	}
	function process_insert() {
		$brand_name = $this->validation($_POST['brand_name']);
		if($brand_name == "") {
			$alert = "Brand is not empty !";
			$color = "red";
			$this->view("master_layout", [
				"name_page"=>"brand",
				"Page"=>"add_brand",
				"alert"=>$alert,
				"color"=>$color
			]);
		} else {
			$brand = $this->model("BrandModel");
			$brand->processInsert($brand_name);
			$result = $brand->getAll();
			$alert = "Insert brand success !";
			$color = "green";
			$this->view("master_layout", [
				"name_page"=>"brand",
				"Page"=>"list_brand",
				"alert"=>$alert,
				"color"=>$color,
				"brand"=>$result
			]);
		}
		
	}
	function list() {
		$brand = $this->model("BrandModel");
		$result = $brand->getAll();
		if($result == "") {
			echo "Chưa có thương hiệu nào ?? ";
		} else {
			$this->view("master_layout", [
			"name_page"=>"brand",
			"Page"=>"list_brand",
			"brand"=>$result
		]);
		}
	}
	function edit($id) {
		$brand = $this->model("BrandModel");
		$result =  $brand->Edit($id);
		$this->view("master_layout", [
			"name_page"=>"brand",
			"Page"=>"edit_brand",
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
				"name_page"=>"brand",
				"Page"=>"edit_brand",
				"alert"=>$alert,
				"color"=>$color, 
				"brand_id"=> $brand_id
			]);
		} else {
			$brand = $this->model("BrandModel");
			$result =  $brand->processEdit($brand_id, $brand_name);
			$result = $brand->getAll();
			$alert = "Insert brand success !";
			$color = "green";
			$this->view("master_layout", [
				"name_page"=>"brand",
				"Page"=>"list_brand",
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