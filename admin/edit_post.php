<?php
	include "includes/header.php";
?>	
<?php
	$id = $_GET["id"];	

	$db = new Database();
	//Creat query
		$query = "SELECT * FROM posts WHERE id= ".$id;

	//Run Query
	
		$post = $db->select($query);
		$row = $post->fetch_assoc();
	//Creat query
		$query = "SELECT * FROM categories";

	//Run Query
	
		$categories = $db->select($query);
		
?>
<?php
	if(isset($_POST["submit"])){
		//Assign post vars
		$title = mysqli_real_escape_string($db->link,$_POST["title"]);
		$body = mysqli_real_escape_string($db->link,$_POST["body"]);
		$category = mysqli_real_escape_string($db->link,$_POST["category"]);
		$author = mysqli_real_escape_string($db->link,$_POST["author"]);
		$tags = mysqli_real_escape_string($db->link,$_POST["tags"]);
		//SImple validation
		if($title == "" || $body==""|| $author==""|| $category==""){
			$error = "Please fill out all the field";
		}
		else{
			$query = "UPDATE posts SET title='$title', body='$body', author='$author', tags='$tags', category=$category WHERE id=".$id;
			$update_row = $db->update("$query");
		}
	}
?>
<?php
	if(isset($_POST["delete"])){
		$query="DELETE FROM posts WHERE id =".$id;
		$delete_row = $db->delete($query);
	}




?>

<form method="post" action="edit_post.php?id=<?php echo $id;  ?>">
  <div class="form-group">
    <label>Post Title</label>
		<input name="title" type="text" class="form-control" placeholder="Enter title" value="<?php echo $row["title"] ?>">
  </div>
	 <div class="form-group">
    <label>Post Body</label>
		 <textarea name="body" class="form-control" placeholder="Enter body"><?php echo $row["body"] ?></textarea>
  </div>
	 <div class="form-group">
     <label>Category</label>
		 <select name="category" class="form-control">
  		<?php while($row2= $categories->fetch_assoc()) : ?>
			 <?php if($row2["id"] == $row["category"]){
			 		$selected = "selected";
			 }
			 else{ $selected =""; }?>
			 <option <?php echo $selected; ?> value="<?php echo $row2["id"]; ?>"><?php echo $row2["name"]; ?></option>
			 <?php echo $selected; ?>
			 <?php endwhile; ?>
		 </select>
  </div>
	 <div class="form-group">
    <label>Author</label>
		<input name="author" type="text" class="form-control" placeholder="Enter Author name" value="<?php echo $row["author"] ?>">
  </div>
	 <div class="form-group">
    <label>Tag</label>
		<input name="tags" type="text" class="form-control" placeholder="Enter tag" value="<?php echo $row["tags"] ?>">
  </div>
	<div>
  <input name="submit" type="submit" class="btn btn-success" value="Submit">
	<a href="index.php" class="btn btn-default">Cancel</a>
	<input name="delete" type="submit" class="btn btn-danger" value="Delete">
	</div>
	<br>
</form>
	
<?php
	include "includes/footer.php";
?>	