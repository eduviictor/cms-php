<?php include 'includes/admin_header.php'; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php'; ?>
        
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome to admin
                            <small><?php echo $_SESSION['firstname']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php  

                                        $query = "SELECT count(post_id) as number_posts FROM posts";
                                        $select_count_posts = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($select_count_posts)){
                                            $number_posts = $row['number_posts'];
                                        }

                                        ?>

                                        <div class='huge'><?php echo $number_posts; ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php  

                                        $query = "SELECT count(comment_id) as number_comments FROM comments";
                                        $select_count_comments = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($select_count_comments)){
                                            $number_comments = $row['number_comments'];
                                        }

                                        ?>

                                        <div class='huge'><?php echo $number_comments; ?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php  

                                        $query = "SELECT count(user_id) as number_users FROM users";
                                        $select_count_users = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($select_count_users)){
                                            $number_users = $row['number_users'];
                                        }

                                        ?>

                                        <div class='huge'><?php echo $number_users; ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php  

                                        $query = "SELECT count(cat_id) as number_categories FROM categories";
                                        $select_count_categories = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($select_count_categories)){
                                            $number_categories = $row['number_categories'];
                                        }

                                        ?>

                                        <div class='huge'><?php echo $number_categories; ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">

                    <?php  

                    $query = "SELECT count(post_id) as number_posts_draft FROM posts WHERE post_status = 'draft'";
                    $select_count_draft_posts = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_count_draft_posts)){
                        $number_posts_draft = $row['number_posts_draft'];
                    }

                    $query = "SELECT count(comment_id) as number_comments_unaproved FROM comments WHERE comment_status = 'unapproved'";
                    $select_count_unaproved_comments = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_count_unaproved_comments)){
                        $number_comments_unaproved = $row['number_comments_unaproved'];
                    }

                    $query = "SELECT count(user_id) as number_users_subscribers FROM users WHERE user_role = 'subscriber'";
                    $select_count_users_subscribers = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_count_users_subscribers)){
                        $number_users_subscribers = $row['number_users_subscribers'];
                    }

                    ?>

                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>  
                </div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/admin_footer.php'; ?>