<!-- INSERT INTO `posts`(`id`, `title`, `body`, `aoutor`, `image`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]') -->
<?php
    include("./include/config.php");
    include("./include/db.php");
    include("./include/header.php");

    $users = $db->query("SELECT * FROM users");


    if (isset($_POST['add'])) {
        if ( trim($_POST['title']) != "" && trim($_POST['body']) != "" && trim($_POST['aoutor']) != "" && trim($_FILES['image']['name']) != "") {
            $title = $_POST['title'];
            $body = $_POST['body'];
            $aoutor = $_POST['aoutor'];
            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, "../upload/$image_name");
            $new_post = $db->prepare("INSERT INTO `posts` (title, body, aoutor, image) VALUE (:title, :body, :aoutor, :image)");
            $new_post-> execute(['title'=>$title, 'body'=>$body, 'aoutor'=>$aoutor, 'image'=>$image_name]);
        }    
    }
?>
<div class="d-flex align-items-center h-100">
    <div class="container bg-dark p-5 w-75 rounded">
        <h2 class="pb-4 text-light"> Add new post</h2>
        <form class="row g-3" method="post" enctype="multipart/form-data">
            <div>
                <label class="text-light my-2" for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div>
                <label class="text-light my-2" for="body">Body</label>
                <textarea name="body" placeholder="write body for post..." id="body"></textarea>
            </div>
            <div>
                <label class="text-light my-2" for="aoutor">Aoutor</label>
                <select class="form-select" name="aoutor" aria-label="Select aoutor">
                    <option selected>Select aoutor</option>
                    <?php
                        foreach ($users as $user) {
                    ?>
                        <option value="<?php echo $user['id']?>"> <?php echo $user['name']?> </option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="image" class="form-label text-light">Chose an image for post</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>
            
            <div class="mt-4">
                <button class="btn btn-success" name="add" type="submit"> Add post </button>
                <a href="index.php" class="btn btn-outline-warning" name="add" type="submit"> Cancel </a>
            </div>
        </form>
    </div>
</div>

<?php
    include("./include/footer.php");
?>
