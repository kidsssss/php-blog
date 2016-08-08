<?php
	include "includes/header.php"
?>
<?php
$db = new Database();	
	if(isset($_POST["submit"])){
		//Assign post vars
		$name = mysqli_real_escape_string($db->link,$_POST["name"]);
		//SImple validation
		if($name==""){
			$error = "Please fill out all the field";
		}
		else{
			$query = "INSERT INTO categories (name) VALUES('$name')";
			$insert_row = $db->insert("$query");
		}
	}



?>

<form method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" name="name" placeholder="Categpry">
  </div>
  <div>
  	<input name="submit" type="submit" class="btn btn-success" value="Submit">
		<a href="index.php" class="btn btn-default">Cancel</a>
	</div>
<br>
</form>
<?php
	include "includes/footer.php"
?>