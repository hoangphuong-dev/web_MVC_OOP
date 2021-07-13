<?php 
require_once 'mvc/controllers/Product.php';
class Slider extends Product {
	use Format;
	use Controller;
	function Hello() {
		$this->list_slider();
	}
	function add_slider() {
		$this->view("master_layout", ["Page"=>"add_slider","name_page"=>"slider"]);
	}
	function process_insert() {
		$slider_name = $this->validation($_POST['slider_name']);
		$slider_status = $this->validation($_POST['slider_status']);
		$slider_image = $this->process_image();
		if($slider_name == "" || $_FILES['product_image']['size'] == 0 || $slider_image == "") {
			$alert = "Fields is not empty !";
			$color = "red";
			$this->view("master_layout", [
				"name_page"=>"slider",
				"Page"=>"add_slider",
				"alert"=>$alert,
				"color"=>$color
			]);
		} else {
			$slider = $this->model("SliderModel");
			$slider->processInsert($slider_name, $slider_status, $slider_image);
			$result = $slider->getAll();
			$alert = "Insert slider success !";
			$color = "green";
			$this->view("master_layout", [
				"name_page"=>"slider",
				"Page"=>"list_slider",
				"alert"=>$alert,
				"color"=>$color,
				"slider"=>$result
			]);
		}

	}
	function list_slider() {
		$slider = $this->model("SliderModel");
		$result = $slider->getAll();
		if($result == "") {
			echo "Chưa có slide nào ?? ";
		} else {
			$this->view("master_layout", [
				"name_page"=>"slider",
				"Page"=>"list_slider",
				"slider"=>$result
			]);
		}
	}
	function edit($id) {
		$slider = $this->model("SliderModel");
		$result =  $slider->Edit($id);
		$this->view("master_layout", [
			"name_page"=>"slider",
			"Page"=>"edit_slider",
			"slider"=> $result
		]);
	}
	function process_edit() {
		$slider_id = $this->validation($_POST['slider_id']);
		$slider_name = $_POST['slider_name'];
		$slider_status = $_POST['slider_status'];
		$slider = $this->model("SliderModel");
		$result =  $slider->Edit($slider_id);
		$row = $result->fetch_array();
		if($slider_name == "" || $slider_status == "") {
			$alert = "Fields slider is not empty !";
			$color = "red";
			$page = "edit_slider";
		} else {
			$file_size = $_FILES['product_image']['size'];
			if($file_size == 0) { // kiểm tra image_size để xem có ảnh hay không ? 
				$unique_image = $row['slider_image'];
			} else {
				unlink("public/upload/".$row['slider_image']."");
				$unique_image = $this->process_image();
			}
			$slider->processEdit($slider_id, $slider_name, $slider_status, $unique_image);
			$result = $slider->getAll();
			$alert = "Update slider success !";
			$color = "green";
			$page = "list_slider";
		}
		$this->view("master_layout", [
			"name_page"=>"slider",
			"Page"=>$page,
			"alert"=>$alert,
			"color"=>$color,
			"slider"=>$result
		]);
	}
	function delete($id) {
		$slider = $this->model("SliderModel");
		// lấy tên ảnh 
		$slider = $this->model("SliderModel");
		$result =  $slider->Edit($id);
		$row = $result->fetch_array();
		unlink("public/upload/".$row['slider_image']."");
		$slider->Delete($id);
		header("Location:../list_slider");
	}
}