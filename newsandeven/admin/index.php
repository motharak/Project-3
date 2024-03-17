<?php


include_once 'layouts/header.php'; 

include_once '../configs/config.php'; 

$pdo = new DBConnect();
$conn = $pdo->connect();


$sql2 = "SELECT COUNT(*) as NTotal FROM tbl_news ";
$sql1 = "SELECT COUNT(*) as CTotal FROM tbl_category ";
$sql3 = "SELECT COUNT(*) as UTotal FROM tbl_user";
$sql4 = "SELECT COUNT(*) as VTotal FROM tbl_visitors";


$newsStatement = $conn->query($sql2);
$news = $newsStatement->fetch(PDO::FETCH_ASSOC);


$cateStatement = $conn->query($sql1);
$category = $cateStatement->fetch(PDO::FETCH_ASSOC);

$userStatement = $conn->query($sql3);
$users = $userStatement->fetch(PDO::FETCH_ASSOC);

$vStatement = $conn->query($sql4);
$visistors = $vStatement->fetch(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM tbl_user ORDER BY uID DESC LIMIT 5";
$statement1 = $conn->query($sql);
$listUsers = $statement1->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Page content -->
<div class="container">
    <h2 class="mt-4 mb-4">Dashboard</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Total Users</h5>
                </div>
                <div class="card-body">
                    <h3 class="card-text"><?php echo$users['UTotal'];?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Total Category</h5>
                </div>
                <div class="card-body">
                    <h3 class="card-text"><?php echo$category['CTotal'];?></h3>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Total News</h5>
                </div>
                <div class="card-body">
                    <h3 class="card-text"><?php echo$news['NTotal'];?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Total Visistors Page</h5>
                </div>
                <div class="card-body">
                    <h3 class="card-text"><?php echo$visistors['VTotal'];?></h3>
                </div>
            </div>
        </div>
    </div>
<br>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">All Users</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach ($listUsers as $user) { ?>
                        <li class="list-group-item"><?php echo $user['name']; ?></li>
                            <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'layouts/footer.php'; ?>
