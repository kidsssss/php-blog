<?php
include "includes/header.php";
?>
<?php
		$db = new Database();
	//Creat query
		$query = "SELECT * FROM posts ORDER BY date DESC";

	//Run Query
	
		$posts = $db->select($query);
	//Creat query
		$query = "SELECT * FROM categories";

	//Run Query
	
		$categories = $db->select($query);

?>

<?php if($posts) : ?>
     <?php while($row = $posts->fetch_assoc()) : ?>     
					<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row["title"];  ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row["date"])." by ";  ?><a href="#"><?php echo $row["author"];  ?></a></p>
							<?php echo shortenText($row["body"],600);  ?><br>
          	<a class="readmore" href="post.php?id=<?php echo urlencode($row["id"]);  ?>">Read More</a>
					</div><!-- /.blog-post -->
	<?php endwhile; ?>
       
<?php else: ?>
	<p>There are no post</p>
<?php endif; ?>
<?php
	include "includes/footer.php";
?>     