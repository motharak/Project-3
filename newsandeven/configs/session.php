<?php
session_start();

include_once('config.php');

$dbConnect = new DBConnect();
$db = $dbConnect->connect();

if (!$db) {
    die('Database connection failed!');
}

$user_check = $_SESSION['login_user'];

$sql = "SELECT email FROM tbl_user WHERE email = :user_check";
$stmt = $db->prepare($sql);
$stmt->bindParam(':user_check', $user_check, PDO::PARAM_STR);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$login_session = $row['email'];

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}
$db = null;
?>
