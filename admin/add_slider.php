<!-- INSERT INTO `post_slider`(`id`, `title`, `body`, `aoutor`, `image`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]') -->
<?php
    include("./include/config.php");
    include("./include/db.php");
    include("./include/header.php");


    if (isset($_POST['add'])) {
        if ( $_POST['post_id'] > 0) {
            $post_id = $_POST['post_id'];
            $active = $_POST['active'];
 
            $new_slider = $db->prepare("INSERT INTO `post_slider` (post_id, active) VALUE (:post_id, :active)");
            $new_slider-> execute(['post_id'=>$post_id, 'active'=>$active]);
        }    
    }
?>
<div class="d-flex align-items-center h-100">
    <div class="container bg-dark p-5 w-75 rounded">
        <h2 class="pb-4 text-light"> Add new user</h2>
        <form class="row g-3" method="post" enctype="multipart/form-data">
            <div>
                <label class="text-light my-2" for="post_id">Post name</label>
                <input type="number" name="post_id" class="form-control" id="post_id" placeholder="post_id">
            </div>
            <div>
                <label class="text-light my-2" for="active">Active <small>0 or 1</small> </label>
                <input type="number" value="0" min="0" max="1" name="active" class="form-control" id="active" placeholder="active?">
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
