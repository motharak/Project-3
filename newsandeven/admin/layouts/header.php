<?php
function isActiveLink($linkPath) {
    $dir = '/newsandeven/admin';
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    return $currentPath === $dir . '/' . $linkPath ? 'active' : '';
}

include_once ('../configs/session.php'); 
include_once('../configs/config.php');

$username = $login_session;
$pdo = new DBConnect();
$conn = $pdo->connect();

// Use a prepared statement to avoid SQL injection
$sql = "SELECT * FROM tbl_user WHERE email = :username";
$statement = $conn->prepare($sql);
$statement->bindParam(':username', $username, PDO::PARAM_STR);
$statement->execute();

$newsList = $statement->fetch(PDO::FETCH_ASSOC);





$picture = $newsList['picture'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Page</title>

    <link rel="icon" type="public/image/x-icon" href="assets/favicon.ico" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="public/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#user').DataTable();
        })
       
    </script>

<style>
    .alert {
        transition: opacity 1s ease-out;
    }

    .fade-out {
        opacity: 0;
        transition: opacity 1s ease-out;
    }
</style>
<style>
    .trow td {
        vertical-align: middle;
        font-size: 20px;
    }
</style>
    
    <style>
        td {
            text-align: left;
        }

        td a {
            text-align: center;
        }

        .cont {
            display: flex;
        }

        .cont .content {
            width: 100%;
            padding: 5vh;
        }


    </style>
</head>

<body>
    <div class="container-fluid overflow-hidden">
        <div class="row vh-100 overflow-auto">
            <!-- Left Sidebar -->
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi pe-none me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-3">Admin Managerment</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="/newsandeven/admin" class="nav-link text-white <?php echo isActiveLink(''); ?> <?php echo isActiveLink('index.php'); ?>" aria-current="page">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="user.php" class="nav-link text-white <?php echo isActiveLink('user.php'); ?>">

                            User
                        </a>
                    </li>
                    <li>
                        <a href="category.php" class="nav-link text-white <?php echo isActiveLink('category.php'); ?>">

                            Category
                        </a>
                    </li>
                    <li>
                        <a href="news.php" class="nav-link text-white<?php echo isActiveLink('news.php'); ?>">

                            News And Events
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#" class="nav-link text-white <?php echo isActiveLink('even.php'); ?>">

                            Even
                        </a>
                    </li> -->
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="public/uploads/user/<?php echo $picture ?>" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong><?php echo $login_session; ?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../configs/logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col d-flex flex-column h-sm-100">
                <main class="row overflow-auto">
                    <div class="col pt-3">
                        <!-- Your main content goes here -->
