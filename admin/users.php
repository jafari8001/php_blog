<?php
    include("./include/header.php");
    include('./include/config.php');
    include("./include/db.php");

    if (isset($_GET['action']) && isset($_GET['id'])) {
        $action = $_GET['action'];
        $id = $_GET['id'];

        if ($action == 'delete') {
            $dl = $db-> prepare("DELETE FROM users WHERE id = :id");
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
            $query = "SELECT * FROM users";
            $users = $db->query($query);
            ?>

            <!-- users -->
            <section class="my-5">
                <div class="container px-5">
                        <div class="row">
                                <h2 class="py-4">User</h2>
                                <div>
                                    <a href="new_user.php" type="button" class="btn btn-sm btn-success">Add user</a>
                                    <p>
                                        for add a new user click this button 
                                    </p>
                                </div>
                            </div>
                            <table class="table table-striped table-light table-hover table-bordered">
                                <thead class="table-warning">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                if ($users->rowCount() > 0) {
                                    foreach ($users as $user) {
                                        ?>
                                        <tr>
                                            <td><?php echo $user['id'] ?></th>
                                            <td><?php echo $user['name'] ?></td>
                                            <td><?php echo $user['email'] ?></td>
                                            <td>
                                                <a type="button" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="./users.php?action=delete&id=<?php echo $user['id'] ?>" type="button" class="btn btn-sm btn-danger">Delete</a>
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
            <!-- users -->


    </div>
</div>


<?php
    include("./include/footer.php");
?>
