<?php
session_start();

if (isset($_SESSION['login_user'])) {
    header("location: index.php"); // Redirect to dashboard if already logged in
    exit();
}

include_once('../configs/config.php'); // Assuming your class file is named DBConnect.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbConnect = new DBConnect();
    $db = $dbConnect->connect();

    if (!$db) {
        die('Database connection failed!');
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_user WHERE email = :username AND password = :password";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        header("location: index.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login Admin Page</title>
    <style>
    
        td {
            text-align: left;
        }
        td a{
            text-align: center;
        }
        .cont{
            display: flex;
        }
        .cont .content{
            width: 100%;
            padding:5vh;
        }
        li.active{

        }

    </style>
<style>
    .alert {
        transition: opacity 1s ease-out;
    }

    .fade-out {
        opacity: 0;
        transition: opacity 1s ease-out;
    }
</style>



</head>
<body>

    
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Login</h2>
            <?php 
            if (isset($error)) {
                $alertMessage = $error;
                echo "<div id='alert' class='alert alert-primary d-inline-block px-3 py-1 md-5'>$alertMessage</div>";
            }
            ?>
            <form method="POST" action="login.php" class="needs-validation" novalidate>

                <div class="form-group">
                    <label for="user">Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter your password.
                    </div>
                </div>

                <button type="submit" class="btn btn-primary my-3">Login</button>
            </form>
        </div>
    </div>
</div>
    

    


    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var alertElement = document.querySelector('.alert');

        setTimeout(function () {
            alertElement.classList.add('fade-out');
            setTimeout(function () {
                alertElement.remove();
            }, 800); 
        }, 4000);
    });
</script>
</script>
</body>
</html>
