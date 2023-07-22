<?php
    if ( isset($_POST['subscribe']) ) {
        if (trim($_POST['name']) != "" && trim($_POST['email'] != "")) {
            $name = $_POST['name'];
            $email = $_POST['email'];

            $sub_insert = $db-> prepare("INSERT INTO `subscribe` (`name`, `email`) VALUE (:name, :email)");
            $sub_insert-> execute(['name'=>$name, 'email'=>$email]);
        }else {
            echo "<h5 class='text-danger text-center'> Field not be empty!</h5>";
        }
    }
?>


<form class="row justify-content-center" method="post">
        <div class="col-auto">
            <label for="inputPassword2" class="visually-hidden">Name</label>
            <input type="text" class="form-control" id="sub-name" placeholder="Name" name="name">
        </div>
        <div class="col-auto">
            <label for="email" class="visually-hidden">Email</label>
            <input type="email" class="form-control" id="sub-text" placeholder="Email" name="email">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3" name="subscribe">Subscribe</button>
        </div>
</form>