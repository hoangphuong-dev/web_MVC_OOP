<?php 
class Category extends Controller {
	use Format;
	function Hello() {
		$this->list();
	}
	function add() {
		$this->view("master_layout", ["Page"=>"add_category","name_page"=>"category"]);
	}
	function process_insert() {
		$category_name = $this->validation($_POST['category_name']);
		if($category_name == "") {
			$alert = "Category is not empty !";
			$color = "red";
			$this->view("master_layout", [
				"name_page"=>"category",
				"Page"=>"add_category",
				"alert"=>$alert,
				"color"=>$color
			]);
		} else {
			$category = $this->model("CategoryModel");
			$category->processInsert($category_name);
			$result = $category->getAll();
			$alert = "Insert category success !";
			$color = "green";
			$this->view("master_layout", [
				"name_page"=>"category",
				"Page"=>"list_category",
				"alert"=>$alert,
				"color"=>$color,
				"category"=>$result	
			]);
		}
		
	}
	function list() {
		$category = $this->model("CategoryModel");
		$result = $category->getAll();
		if($result == "") {
			echo "Chưa có thể loại nào !";
		} else {
			$this->view("master_layout", [
				"name_page"=>"category",
				"Page"=>"list_category",
				"category"=>$result
			]);
		}
	}
	function edit($id) {
		$category = $this->model("CategoryModel");
		$result =  $category->Edit($id);
		$this->view("master_layout", [
			"name_page"=>"category",
			"Page"=>"edit_category",
			"category"=> $result
		]);
		
	}
	function process_edit() {
		$category_id =   $this->validation($_POST['category_id']);
		$category_name =   $this->validation($_POST['category_name']);
		if($category_name == "") {
			$alert = "Category is not empty !";
			$color = "red";
			$this->view("master_layout", [
				"name_page"=>"category",
				"Page"=>"edit_category",
				"alert"=>$alert,
				"color"=>$color,
				"category_id"=> $category_id
			]);
		} else {
			$category = $this->model("CategoryModel");
			$category->processEdit($category_id, $category_name);
			$result = $category->getAll();
			$alert = "Insert category success !";
			$color = "green";
			$this->view("master_layout", [
				"name_page"=>"category",
				"Page"=>"list_category",
				"alert"=>$alert,
				"color"=>$color,
				"category"=>$result	
			]);
		}
	}
	function delete($id) {
		$category = $this->model("CategoryModel");
		$category->Delete($id);
		header("Location:../list");
	}
}