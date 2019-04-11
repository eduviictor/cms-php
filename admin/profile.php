<?php include 'includes/admin_header.php'; ?>


<?php  

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}'";

    $select_user_profile_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_password = $row['user_password'];
        $user_image = $row['user_image'];
    }

}

if(isset($_POST['edit-profile'])){
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

    $query = "UPDATE users SET username = '{$username}', user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_email = '{$user_email}', user_password = '{$user_password}', user_role = '{$user_role}' WHERE user_id = '{$user_id}'";

    $update_user_query = mysqli_query($connection, $query);

    confirmQuery($update_user_query);
    header('Location: profile.php');
}

?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php'; ?>
        
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome to Profile
                            <small><?php echo $_SESSION['firstname']; ?></small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="first_name">FirstName</label>
                                <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="user_lastname">LastName</label>
                                <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
                            </div>

                            <div class="form-group">
                                <label for="user_role">Post Category</label>
                                <select class="form-control" name="user_role" id="user_role">
                                    <option value="<?php echo $user_role; ?>"><?php echo ucfirst($user_role); ?></option>
                                    <?php  
                                    echo ($user_role == 'admin' ? "<option value='subscriber'>Subscriber</option>" : "<option value='admin'>Admin</option>");
                                    ?>          
                                </select>
                            </div>
                            
                        <!--    <div class="form-group">
                                <label for="post_image">Post Image</label>
                                <input type="file" class="form-control" name="post_image">
                            </div> -->
                            
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="user_password">Password</label>
                                <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" class="form-control" name="edit-profile" value="Update Profile">
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/admin_footer.php'; ?>