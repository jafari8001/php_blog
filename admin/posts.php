<?php
    include("./include/header.php");
    include('./include/config.php');
    include("./include/db.php");

    if (isset($_GET['action']) && isset($_GET['id']) ){
        $action = $_GET['action'];
        $id = $_GET['id'];

        if ($action == 'delete') {
            $del = $db-> prepare("DELETE FROM `posts` WHERE id=:id");
            $del-> execute(['id' => $id]); 
        }
    }
?>


<div class="row h-100 p-0 m-0">
    <div class="col-4 p-0 m-0" style="width: 280px;">
        <?php
        include("./include/sidebar.php");
        ?>
    </div>

    <div class="col p-0 m-0">
        <?php
            $query = "SELECT * FROM posts";
            $posts = $db->query($query);
            ?>

            <!-- posts -->
            <section class="my-5">
                <div class="container px-5">
                    <div class="row">
                            <h2 class="py-4">Posts</h2>
                            <div>
                                <a href="new_post.php" type="button" class="btn btn-sm btn-success">Add post</a>
                                <p>
                                    for add a new post click this button 
                                </p>
                            </div>
                        </div>
                            <table class="table table-striped table-light table-hover table-bordered">
                                <thead class="table-warning">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Body</th>
                                        <th scope="col">Aoutor</th>
                                        <th scope="col">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                if ($posts->rowCount() > 0) {
                                    foreach ($posts as $post) {
                                        ?>
                                        <tr>
                                            <td><?php echo $post['id'] ?></th>
                                            <td><?php echo $post['title'] ?></td>
                                            <td><?php echo substr($post['body'], 0, 50)  ?></td>
                                            <td><?php echo $post['aoutor'] ?></td>
                                            <td>
                                                <a type="button" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="posts.php?action=delete&id=<?php echo $post['id'] ?>" type="button" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }
                            ?>
                            </tbody>
                            </table>
                    </div>
            </div>
            </section>
            <!-- posts -->




    </div>
</div>


<?php
    include("./include/footer.php");
?>

