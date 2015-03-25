<?php 
/**
 * DISPLAY OUTPUT
 * This file gets loaded into the interface 
 * and is not designed to stand on its own
 */ 
require('config.php');

//category ID sent by the AJAX call
$cat_id = $_REQUEST['cat_id'];
//get the posts in that category

$query = "SELECT posts.*
			FROM posts, post_cats
			WHERE posts.is_published = 1
			AND posts.post_id = post_cats.post_id
			AND post_cats.category_id = $cat_id";
$result = $db->query($query);
if( $result->num_rows >= 1 ){
?>
<h2><?php echo $result->num_rows; ?> Posts Found</h2>
	<?php while($row = $result->fetch_assoc()){ ?>
	<article>
		<h1><?php echo $row['title'] ?></h1>
		<p><?php echo $row['body'] ?></p>
	</article>
	<?php 
	}//end while
}else{
	echo 'No posts in this category';
} ?>