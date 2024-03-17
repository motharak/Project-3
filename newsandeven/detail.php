<?php
include_once "layouts/header.php";
include_once 'configs/config.php';

$nid = $_GET['id'];

$pdo = new DBConnect();
$conn = $pdo->connect();

$sql2 = "SELECT * FROM tbl_news WHERE status='Posted' AND nID='$nid'";
$sql = "SELECT * FROM tbl_category ORDER BY cID DESC";

$newsStatement = $conn->query($sql2);
$statement = $conn->query($sql);

$news = $newsStatement->fetch(PDO::FETCH_ASSOC);
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

$sql1 = "SELECT * FROM tbl_category
         INNER JOIN tbl_news ON tbl_category.cID = tbl_news.category_id
         WHERE tbl_category.cID = category_id";

$cateStatement = $conn->query($sql1);
$category = $cateStatement->fetch(PDO::FETCH_ASSOC);

$sql3 = "SELECT * FROM tbl_user
         INNER JOIN tbl_news ON tbl_user.uID = tbl_news.author
         WHERE tbl_user.uID = author";
$userStatement = $conn->query($sql3);
$author = $userStatement->fetch(PDO::FETCH_ASSOC);

$active = true;

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <article>
                <header class="mb-4">
                    <h1 class="fw-bolder mb-1"><?php echo $news['title']; ?></h1>
                    <div class="text-muted fst-italic mb-2">Posted on <?php echo date('F j, Y', strtotime($news['publication_date'])); ?> by <?php echo $author['name']; ?></div>
                    <a class="badge bg-secondary text-decoration-none link-light" href="<?php echo "/newsandeven/category.php?id=" . $category['cID'] . "&name=" . $category['categoryName'] . ""; ?>"><?php echo $category['categoryName']; ?></a>
                </header>
                <figure class="mb-4"><img class="img-fluid rounded" src="public/uploads/news/<?php echo $news['Picture']; ?>" alt="News Image" /></figure>
                <section class="mb-5">
                    <p class="card-text"><?php echo $news['content']; ?></p>
                </section>
            </article>
        </div>
        <div class="col-lg-4">
        <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <form class="input-group" method="get" action="search.php"> <!-- Update action attribute with the actual search page -->
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" name="query" />
                                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                            </form>
                        </div>
                    </div>
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($categories as $cat) : ?>
                                    <li><a class="dropdown-item" href="<?php echo "/newsandeven/category.php?id=" . $cat['cID'] . "&name=" . $cat['categoryName'] . ""; ?>"><?php echo $cat['categoryName']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once "layouts/footer.php"; ?>
