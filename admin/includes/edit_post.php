<?php

if(isset($_GET['p_id'])){
	$the_post_id = $_GET['p_id'];

	$query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
	$select_posts_by_id = mysqli_query($connection, $query); 

	while($row = mysqli_fetch_assoc($select_posts_by_id)){
	    $post_title = $row['post_title'];
	    $post_author = $row['post_author'];
	    $post_category_id = $row['post_category_id'];
	    $post_status = $row['post_status'];
	    $post_content = $row['post_content'];
	    $post_image = $row['post_image'];
	    $post_tags = $row['post_tags'];
	    $post_comment_count = $row['post_comment_count'];
	    $post_date = $row['post_date'];

	}

	if(isset($_POST['update_post'])){
		$post_title = $_POST['post_title'];
	    $post_author = $_POST['post_author'];
	    $post_category_id = $_POST['post_category'];
	    $post_status = $_POST['post_status'];
	    $post_content = $_POST['post_content'];
	    $post_image = $_FILES['post_image']['name'];
	    $post_image_tmp = $_FILES['post_image']['tmp_name'];

	    $post_tags = $_POST['post_tags'];

	    move_uploaded_file($post_image_tmp, "../images/$post_image");

	    if(empty($post_image)){

	    	$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
	    	$select_image = mysqli_query($connection, $query);

	    	while($row = mysqli_fetch_assoc($select_image)){
	    		$post_image = $row['post_image'];
	    	}

	    }


	    $query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = {$post_category_id}, post_date = now(), post_author = '{$post_author}', post_status = '{$post_status}', post_tags = '{$post_tags}', post_content = '{$post_content}', post_image = '{$post_image}' WHERE post_id = {$the_post_id}";

		$update_post = mysqli_query($connection, $query); 

		confirmQuery($update_post);
		header("Location: ./posts.php");

	}
}



?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
	</div>
	<div class="form-group">
		<label for="post_category_id">Post Category</label>
		<select class="form-control" name="post_category" id="post_category">
			<?php 

			$query = 'SELECT * FROM categories';
    		$select_categories = mysqli_query($connection, $query);

    		confirmQuery($select_categories);

    		while($row = mysqli_fetch_assoc($select_categories)){
    			$cat_id = $row['cat_id'];
    			$cat_title = $row['cat_title'];
    			echo "<option value='{$cat_id}'>{$cat_title}</option>";
    		} 

			?>
		</select>
	</div>
	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
	</div>
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
	</div>
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<div>
			<img style="width: 100px" src="../images/<?php echo $post_image; ?>" alt="">
		</div>

		<input type="file" class="form-control" name="post_image" value="<?php echo $post_image; ?>">
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
	</div>
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" class="form-control" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" class="form-control" name="update_post" value="Publish Post">
	</div>
</form>