<?php
	include "includes/header.php";
?>	
<?php
$db = new Database();	
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
			$query = "INSERT INTO posts (title,body,category,author,tags) VALUES('$title','$body',$category,'$author','$tags')";
			$insert_row = $db->insert("$query");
		}
	}



?>
<?php

	
	//Creat query
		$query = "SELECT * FROM posts";

	//Run Query
	
		$post = $db->select($query);
		$row = $post->fetch_assoc();
	//Creat query
		$query = "SELECT * FROM categories";

	//Run Query
	
		$categories = $db->select($query);
?>

<form method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
		<input name="title" type="text" class="form-control" placeholder="Enter title">
  </div>
	 <div class="form-group">
    <label>Post Body</label>
		 <textarea name="body" class="form-control" placeholder="Enter body"></textarea>
  </div>
	 <div class="form-group">
     <label>Post Title</label>
		 <select name="category" class="form-control">
  		<?php while($row2= $categories->fetch_assoc()) : ?>
			 <?php if($row2["id"] == $row["category"]){
			 		$selected = "selected";
			 }
			 else{ $selected =""; }?>
			 <option <?php echo $selected; ?> value="<?php echo $row2["id"] ?>"><?php echo $row2["name"]; ?></option>
			 <?php echo $selected; ?>
			 <?php endwhile; ?>
		 </select>
  </div>
	 <div class="form-group">
    <label>Author</label>
		<input name="author" type="text" class="form-control" placeholder="Enter Author name">
  </div>
	 <div class="form-group">
    <label>Tag</label>
		<input name="tags" type="text" class="form-control" placeholder="Enter tag">
  </div>
	<div>
  	<input name="submit" type="submit" class="btn btn-success" value="Submit">
	<a href="index.php" class="btn btn-default">Cancel</a>
	</div>
	<br>
</form>
	
<?php
	include "includes/footer.php";
?>	