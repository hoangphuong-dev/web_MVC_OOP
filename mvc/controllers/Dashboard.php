<?php 
class Dashboard extends Controller {
	function Hello() {
		$this->view("master_layout", [
			"Page"=>"dashbord",
			"name_page"=>"dashboard",
		]);
	}
	// public function dashbord() {
	// 		$this->view("master_layout", [
	// 		"Page"=>"dashbord"
	// 	]);
	// }
	public function abc($a, $b) {
			echo $a."----".$b;
	}
}