<?php 

class Home extends Controller {
	
	function Hello() {
		$new_product = $this->model("HomeModel");
		$result_new_product = $new_product->getNewProduct();
		$result_feature_product = $new_product->getFeatureProduct();
		$this->view("user_layout", [
			"name_page"=>"home_user",
			"Page"=>"home",
			"new_product"=>$result_new_product,
			"feature_product"=>$result_feature_product,
		]);
	}

	function Show($a, $b) {
		$teo = $this->model("SinhVienModel");
		$tong =  $teo->Tong($a, $b);

		echo $tong;
		// $this->view("aodep", [
		// 	"Page"=>"news",
		// 	"Number"=>$tong,
		// 	"mau"=>"red",
		// 	"SoThich"=>["A", "B", "C"],
		// 	"SV"=> $teo->SinhVien()

		// ]);
	}
}