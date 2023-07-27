<!-- INSERT INTO `users`(`id`, `title`, `body`, `aoutor`, `image`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]') -->
<?php
    include("./include/config.php");
    include("./include/db.php");
    include("./include/header.php");


    if (isset($_POST['add'])) {
        if ( trim($_POST['name']) != "" && trim($_POST['email']) != "") {
            $name = $_POST['name'];
            $email = $_POST['email'];
 
            $new_user = $db->prepare("INSERT INTO `users` (name, email) VALUE (:name, :email)");
            $new_user-> execute(['name'=>$name, 'email'=>$email]);
        }    
    }
?>
<div class="d-flex align-items-center h-100">
    <div class="container bg-dark p-5 w-75 rounded">
        <h2 class="pb-4 text-light"> Add new user</h2>
        <form class="row g-3" method="post" enctype="multipart/form-data">
            <div>
                <label class="text-light my-2" for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
            </div>
            <div>
                <label class="text-light my-2" for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="mt-4">
                <button class="btn btn-success" name="add" type="submit"> Add user </button>
                <a href="index.php" class="btn btn-outline-warning" name="add" type="submit"> Cancel </a>
            </div>
        </form>
    </div>
</div>

<?php
    include("./include/footer.php");
?>
