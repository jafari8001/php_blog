<?php
$query = "SELECT * FROM posts";
$posts = $db->query($query);
?>

<!-- posts -->
<section class="my-5">
   <div class="container">
    <div class="d-flex justify-content-center">
            <div class="row">


                <?php
                    if ($posts->rowCount() > 0) {
                        foreach ($posts as $post) {
                            ?>
                <div class="card mx-3 my-3 p-0" style="width: 20rem;">
                    <img src="./upload/<?php echo $post['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $post['title'] ?> </h5>
                        <p class="card-text"> <?php echo substr($post['body'], 0, 100) ?> </p>
                        <a href="single.php?post=<?php echo $post['id'] ?>" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                
                <?php
                        }
                    }
                ?>
            </div>
        </div>
   </div>
</section>
<!-- posts -->