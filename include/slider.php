<?php
    // include("./include/config.php");
    // include("./include/db.php");

    $query = "SELECT * FROM post_slider";
    $post_slider = $db-> query($query);
?>

<!-- slider -->
<section>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">

            <?php
                if ($post_slider->rowCount() > 0) {
                    foreach ($post_slider as $slider) {
                        $id_post = $slider['post_id'];
                        $query_post = "SELECT * FROM posts WHERE id = $id_post";
                        $post = $db-> query($query_post)->fetch();
            ?>

            <div class="carousel-item <?php echo( $slider['active'] ? 'active': '' ) ?>">
                <img src="./image/<?php echo $post['image'] ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo $post['title'] ?></h5>
                    <p><?php echo substr($post['body'], 0 , 150). "..." ?></p>
                </div>
            </div>

            <?php
                    }
                }
            ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- slider -->