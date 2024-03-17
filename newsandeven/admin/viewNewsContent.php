<?php include_once 'layouts/header.php';
include_once('../configs/config.php');
$pdo = new DBConnect();
$conn = $pdo->connect();
$id = $_GET['id'];

$sql2 = "SELECT * FROM tbl_news WHERE nID=".$id;


$newsStatement = $conn->query($sql2);


$newsContent = $newsStatement->fetch(PDO::FETCH_ASSOC);



?>

<h1>This News view Content</h1>
<hr>

<div class="con">
    <?php echo $newsContent['content'];?>
</div>
<hr>
<?php include_once 'layouts/footer.php'?>
