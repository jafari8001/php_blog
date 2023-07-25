<?php
include('./include/config.php');
include('./include/db.php');

$query = "SELECT * FROM menu";
$menues = $db-> query($query);
?>

<!-- navbar -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>blog php</title>
</head>

<body>
    <section>
            <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <?php
                                if ($menues->rowCount() > 0) {
                                    foreach ($menues as $menu) {
                                        ?>
                                        <li class="nav-item <?php echo( isset($_GET['menu']) && $menu['id'] == $_GET['menu']) ? 'active' : '' ?>">
                                            <a class="nav-link" href="index.php?menu=<?php echo $menu['id'] ?>"> <?php echo $menu['title']?> </a>
                                        </li>
                                    <?php
                                    }
                                }
                                ?>
                        </ul>
                        <form class="d-flex" action="search.php" method="get">
                            <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </section>
        <!-- navbar -->