<?php

class Database{
	public $host = "localhost";
	public $username = "root";
	public $password = "";
	public $db_name = "blog";

	public $link;
	public $error;
	/*
	*	Class Constructor
	*/
	public function __construct(){
		// Call Connect Function
		$this->connect();
	
	}
	
	//Connector
	
	private function connect(){
		$this->link = new mysqli($this->host,$this->username,$this->password,$this->db_name);
		if(!$this->link){
			$this->error = "CONNECTION FAILED: ".$this->link->connect_error;
			return false;
		}
	
	}




/*
*    Select
*/
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows){
			return $result;
		}
		else{
			return false;
		}
	}
	
	
	
// Insert
	
	public function insert($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
	// Validate Insert
		if($insert_row){
			header("Location: index.php?msg=".urlencode('Record Added'));
			exit();
		}
		else{
			die("Error: ".$this->link->error.__LINE__);
		}
	
	}
	
	// Update
	
	public function update($query){
			$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
	// Validate Insert
		if($update_row){
			header("Location: index.php?msg=".urlencode('Record Added'));
			exit();
		}
		else{
			die("Error: ".$this->link->error.__LINE__);
		}
	
	}
	
	// Delete
	
	public function delete($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
	// Validate Insert
		if($delete_row){
			header("Location: index.php?msg=".urlencode('Record Deleted'));
			exit();
		}
		else{
			die("Error: ".$this->link->error.__LINE__);
		}
	
	}



	
	

	
	
	
}
?>

