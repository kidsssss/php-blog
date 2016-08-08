<?php
	include "includes/header.php"
?>

<?php
	$id = $_GET["id"];	

	$db = new Database();
	//Creat query
		$query = "SELECT * FROM categories WHERE id= ".$id;
	//Run Query
	$categories = $db->select($query);
	$row=$categories->fetch_assoc();
?>
<?php
	if(isset($_POST["submit"])){
		//Assign post vars
		$name = mysqli_real_escape_string($db->link,$_POST["name"]);
		
		//SImple validation
		if($name== "" ){
			$error = "Please fill out all the field";
		}
		else{
			$query = "UPDATE categories SET name='$name' WHERE id=".$id;
			$update_row = $db->update("$query");
		}
	}

?>
<?php
	if(isset($_POST["delete"])){
		$query="DELETE FROM categories WHERE id =".$id;
		$delete_row = $db->delete($query);
	}

?>
<form method="post" action="edit_category.php?id=<?php echo $id ?>">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" name="name" placeholder="Categpry" value="<?php echo $row["name"] ?>">
  </div>
  <div>
  	<input name="submit" type="submit" class="btn btn-success" value="Submit">
		<a href="index.php" class="btn btn-default">Cancel</a>
		<input name="delete" type="submit" class="btn btn-danger" value="Delete">
	</div>
<br>
</form>
<?php
	include "includes/footer.php"
?>