<?php 
class DB {
	protected $host   = "localhost";
	protected $user   = "root";
	protected $pass   = "";
	protected $dbname = "web_mvc";


	public $connect;
	public $error;

	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){
		$this->connect = new mysqli($this->host, $this->user, $this->pass, 
			$this->dbname);
		if(!$this->connect){
			$this->error ="Connection fail".$this->connect->connect_error;
			return false;
		}
		return true;
	}
// Select or Read data
	public function select($query){
		$result = $this->connect->query($query) or 
		die($this->connect->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
		$connect -> close();
	}

// Insert data
	public function insert($query){
		$insert_row = $this->connect->query($query) or 
		die($this->connect->error.__LINE__);
		if($insert_row){
			return $insert_row;
		} else {
			return false;
		}
		$connect -> close();
	}

// Update data
	public function update($query){
		$update_row = $this->connect->query($query) or 
		die($this->connect->error.__LINE__);
		if($update_row){
			return $update_row;
		} else {
			return false;
		}
		$connect -> close();
	}

// Delete data
	public function delete($query){
		$delete_row = $this->connect->query($query) or 
		die($this->connect->error.__LINE__);
		if($delete_row){
			return $delete_row;
		} else {
			return false;
		}
		$connect -> close();
	}

}

