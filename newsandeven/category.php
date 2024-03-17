<?php include_once "layouts/header.php";?>

<header class="py-5 bg-light border-bottom mb-4">
    <?php
    include_once 'configs/config.php';

    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if (!$id) {
        // Handle the case where no category ID is provided
        // You might redirect the user or display an error message
        exit('Invalid category ID');
    }

    $pdo = new DBConnect();
    $conn = $pdo->connect();

    $sql2 = "SELECT * FROM tbl_news WHERE status='Posted' AND category_id = '$id' ORDER BY nID DESC";
    $newsStatement = $conn->query($sql2);
    $newss = $newsStatement->fetchAll(PDO::FETCH_ASSOC);

    $sql1 = "SELECT * FROM tbl_category WHERE cID = '$id'";
    $catestatement = $conn->query($sql1);
    $category = $catestatement->fetch(PDO::FETCH_ASSOC);

    $sqlCount = "SELECT COUNT(*) as total FROM tbl_news WHERE status='Posted' AND category_id = '$id'";
    $countStatement = $conn->query($sqlCount);
    $totalItems = $countStatement->fetch(PDO::FETCH_ASSOC)['total'];

    $itemsPerPage = 5; // Adjust as needed
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $itemsPerPage;

    $sql2 = "SELECT * FROM tbl_news WHERE status='Posted' AND category_id = '$id' ORDER BY nID DESC LIMIT $offset, $itemsPerPage";
    $newsStatement = $conn->query($sql2);
    $newss = $newsStatement->fetchAll(PDO::FETCH_ASSOC);

    $totalPages = ceil($totalItems / $itemsPerPage);

    $active = true;
    ?>

    <div class="text-left px-5 my-5">
        <br>
        <h2 class="fw-bolder" style="margin-left:27vh"><?php echo ($category['categoryName']) ?></h2>
    </div>
</header>

<!-- Page content-->
<div class="container container-xxl">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="row">
                <!-- Blog post-->
                <?php
                if (!empty($newss)) {
                 foreach ($newss as $news) : ?>
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="public/uploads/news/<?php echo $news['Picture']; ?>" alt="Image" width="700" height="450" /></a>

                        <div class="card-body">
                            <div class="small text-muted"><?php echo date('F j, Y', strtotime($news['publication_date'])); ?></div>
                            <h2 class="card-title h4"><?php echo $news['title']; ?></h2>
                            <p class="card-text"><?php echo trim(substr($news['content'], 0, 100)) . ' ...'; ?></p>
                            <a class="btn btn-primary" href="detail.php?id=<?php echo $news['nID'] ?>">Read more →</a>
                        </div>
                    </div>
                <?php endforeach; }else{echo "No News or Events available for ".$category['categoryName']." category.";}?>
                <!-- Blog post-->
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center my-4">
                    <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                        <li class="page-item <?php echo ($page == $currentPage) ? 'active' : ''; ?>">
                            <a class="page-link" href="?id=<?php echo $id ?>&page=<?php echo $page ?>"><?php echo $page ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>

        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <form class="input-group" method="get" action="search.php"> <!-- Update action attribute with the actual search page -->
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" name="query" />
                                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                            </form>
                        </div>
                    </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="list-unstyled">
                                <div class="d-grid gap-2">
                                    <?php
                                    
                                     foreach ($categories as $category) : ?>
                                        <li><a class="btn btn-primary" href="<?php echo "/newsandeven/category.php?id=" . $category['cID'] . "&name=" . $category['categoryName'] . ""; ?>"><?php echo $category['categoryName']; ?></a></li>
                                    <?php endforeach; 
                                    ?>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "layouts/footer.php";?>
