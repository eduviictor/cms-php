<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>

            <?php 

            if(isset($_GET['delete'])){
                $the_post_id = $_GET['delete'];
                $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
                $delete_post_query = mysqli_query($connection, $query);
                confirm($delete_post_query);
            }

            ?>

        </tr>
    </thead>
    <tbody>
        <?php  

        $query = 'SELECT * FROM posts';
        $select_posts = mysqli_query($connection, $query); 

        while($row = mysqli_fetch_assoc($select_posts)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
        
        ?>
        <tr>
            <td><?php echo $post_id; ?></td>
            <td><?php echo $post_author; ?></td>
            <td><?php echo $post_title; ?></td>
            <td><?php echo $post_category_id; ?></td>
            <td><?php echo $post_status; ?></td>
            <td><img style="width: 100px" src="../images/<?php echo $post_image; ?>" alt="Image Post"></td>
            <td><?php echo $post_tags; ?></td>
            <td><?php echo $post_comment_count; ?></td>
            <td><?php echo $post_date; ?></td>
            <td><a href="posts.php?delete=<?php echo $post_id; ?>">Delete</a></td>
        </tr>
        <?php }; ?>
    </tbody>
</table>