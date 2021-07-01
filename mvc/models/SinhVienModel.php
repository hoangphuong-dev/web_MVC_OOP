<?php 
class SinhVienModel extends DB {
	public function getSV()	{
		return "Hoang Trong Phuong";
	}
	public function Tong($a, $b) {
		return $a + $b;
	}
	public function SinhVien() {
		$query = "Select * from sinh_vien";
		return mysqli_query($this->conect, $query);
	}
}