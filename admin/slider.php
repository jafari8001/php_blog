<?php
    include("./include/header.php");
    include('./include/config.php');
    include("./include/db.php");

    if (isset($_GET['action']) && isset($_GET['id'])) {
        $action = $_GET['action'];
        $id = $_GET['id'];

        if ($action == 'delete') {
            $dl = $db-> prepare("DELETE FROM post_slider WHERE id = :id");
            $dl-> execute(['id'=> $id]); 
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
            $query = "SELECT * FROM post_slider";
            $sliders = $db->query($query);
            ?>

            <!-- slider -->
            <section class="my-5">
                <div class="container px-5">
                        <div class="row">
                                <h2 class="py-4">Sliders</h2>
                                <div>
                                    <a href="add_slider.php" type="button" class="btn btn-sm btn-success">Add slider</a>
                                    <p>
                                        for add a new slider click this button 
                                    </p>
                                </div>
                            </div>
                            <table class="table table-striped table-light table-hover table-bordered">
                                <thead class="table-warning">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">post_id</th>
                                        <th scope="col">post_name</th>
                                        <th scope="col">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                if ($sliders->rowCount() > 0) {
                                    foreach ($sliders as $slider) {
                                        $id = $slider['post_id'];
                                        $post = $db-> query("SELECT * FROM posts WHERE id =$id")->fetch();
                                        ?>
                                        <tr>
                                            <td><?php echo $slider['id'] ?></th>
                                            <td><?php echo $slider['post_id'] ?></td>
                                            <td><?php echo $post['title'] ?></td>
                                            <td>
                                                <a type="button" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="./slider.php?action=delete&id=<?php echo $slider['id'] ?>" type="button" class="btn btn-sm btn-danger">Delete</a>
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
            <!-- slider -->


    </div>
</div>


<?php
    include("./include/footer.php");
?>
