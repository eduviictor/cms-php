<?php  

if(isset($_POST['create-user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    // $post_image = $_FILES['post_image']['name'];
    // $post_image_tmp = $_FILES['post_image']['tmp_name'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_date = date('d-m-y');

    // move_uploaded_file($post_image_tmp, "../images/$post_image");

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) VALUES ('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}')";

    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);
}

?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="first_name">FirstName</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>
	<div class="form-group">
		<label for="user_lastname">LastName</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="user_role">Post Category</label>
		<select class="form-control" name="user_role" id="user_role">
			<option value="subscriber">Select Options</option>	
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		</select>
	</div>
	
<!-- 	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="post_image">
	</div> -->
	
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="email" class="form-control" name="user_email">
	</div>
	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" class="form-control" name="create-user" value="Create User">
	</div>
</form>