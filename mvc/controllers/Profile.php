<?php 
class Profile {
	use Format;
	use Controller;
	function Hello() {
		$this->view_profile();
	}
	
	function view_profile() {
		// $brand = $this->model("BrandModel");
		// $result = $brand->getAll();
		// if($result == "") {
		// 	echo "Chưa có thương hiệu nào ?? ";
		// } else {
		// 	$this->view("master_layout", [
		// 		"name_page"=>"brand",
		// 		"Page"=>"list_brand",
		// 		"brand"=>$result
		// 	]);
		// }
		echo "Ban da vao day";
	}
}