<?php 
class SliderModel extends DB {
	public function processInsert($slider_name, $slider_status, $slider_image){
		$query = "insert into slider (slider_name, slider_status, slider_image) 
		values('$slider_name', '$slider_status', '$slider_image')";
		$this->insert($query);
	}
	public function getAll(){
		$query = "select * from slider";
		$result = $this->select($query);
		return $result;
	}
	public function Edit($id){
		$query = "select * from slider where slider_id = '$id'";
		$result = $this->select($query);
		return $result;
	}
	public function processEdit($slider_id, $slider_name, $slider_status, $unique_image){
		$query = "update slider set slider_name = '$slider_name', slider_status = '$slider_status', slider_image = '$unique_image' where slider_id = '$slider_id'
		";
		$this->update($query);
	}
	public function Delete($id){
		$query = "delete from slider where slider_id = '$id'";
		$this->connect->query($query);
	}
}