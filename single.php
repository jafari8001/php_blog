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
    }
?>

<div class="container text-center" >
    <img src="./image/<?php echo $post_img?>" class="img-fluid w-50" alt="...">
    <div class="container">
        <h2>
            <?php echo $post_title ?>
        </h2>
        <p class="text-start">
            <?php echo $post_body ?>
        </p>
    </div>
</div>



<!-- include footer -->
<?php
    include("./include/footer.php");
?>