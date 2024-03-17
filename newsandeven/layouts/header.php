<?php
        include_once('configs/config.php');
        // $query = "SELECT * FROM `tbl_product`";
        // $result = mysqli_query($conn, $query);

        // if (mysqli_num_rows($result) > 0) {
        //     while ($row = mysqli_fetch_assoc($result)) {
            $pdo = new DBConnect();
            $conn = $pdo->connect();
            $sql = "SELECT * FROM tbl_category ORDER BY cID DESC";
            $statement = $conn->query($sql);
            $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            //Add new user
            

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Khmer News 24 Online</title>
        <!-- Favicon-->
        <link rel="icon" type="public/image/x-icon" href="public/favicon.svg" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="public/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-teal fixed-top" style="background-color: #E8F6E9;">
    <div class="container">
        <a class="navbar-brand" href="/newsandeven">Khmer News And Event</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        News
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($categories as $category){ ?>
                            <li><a class="dropdown-item" href="<?php echo "/newsandeven/category.php?id=".$category['cID']."&name=".$category['categoryName']."";?>"><?php echo $category['categoryName']; ?></a></li>
                        <?php }; ?>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?php echo "/newsandeven/category.php?id=6";?>">Event</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li> -->
            </ul>
        </div>
    </div>
</nav>

<style>
    body {
        margin-top: 56px; /* Adjust this value according to the height of your fixed navbar */
    }
</style>
        <!-- Page header with logo and tagline-->
