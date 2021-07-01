<?php 

class Home extends Controller {
	
	function Hello() {
		echo "Hiiii home ";
		// $teo = $this->model("SinhVienModel");
		// echo $teo->getSV();
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