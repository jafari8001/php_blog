<?php
    include("./include/header.php");
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];

        $post = $db-> prepare("SELECT * FROM posts WHERE id=:id");
        $post-> execute(['id'=> $post_id]);
        $post = $post-> fetch();
    }
?>

<?php
    if ($post) {
        $post_title = $post['title'];
        $post_body = $post['body'];
        $post_img = $post['image'];
        $post_aoutor = $post['aoutor'];

        $aoutor = $db-> prepare("SELECT * FROM users WHERE id=:id");
        $aoutor-> execute(['id'=> $post_aoutor]);
        $aoutor = $aoutor->fetch();
    }
?>

<div class="container text-center text-bg-light shadow w-75 py-5" >
    <img src="./image/<?php echo $post_img?>" class="img-fluid rounded w-75" alt="...">
    <div class="text-start container w-75 p-0">
        <h2 class="my-4">
            <?php echo $post_title ?>
        </h2>
        <p style="text-align:justify !important">
            <?php echo $post_body ?>
        </p>
        <hr >
        <div>
            <small>Aoutor: <b> <?php echo $aoutor['name'] ?></b></small>
        </div>
    </div>
</div>



<!-- include footer -->
<?php
    include("./include/footer.php");
?>