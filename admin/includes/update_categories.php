<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Update Category</label>

        <?php 

            if(isset($_GET['update'])){
                $cat_id = $_GET['update'];
                $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                $select_categories_id = mysqli_query($connection, $query); 

                while($row = mysqli_fetch_assoc($select_categories_id)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                
        ?>
        
        <input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title)){ echo $cat_title; }; ?>">
        
        <?php
                }
            } 
        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>

    <?php 

        if(isset($_POST['update_category'])){

            $the_cat_title = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = '{$cat_id}'";
            $update_category = mysqli_query($connection, $query);
            header("Location: categories.php");

        }

    ?>

</form>