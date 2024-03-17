<?php include_once "layouts/header.php";?>
<header class="py-5 bg-light border-bottom mb-4">

                <?php include_once 'configs/config.php'; 
                    $pdo = new DBConnect();
                    $conn = $pdo->connect();
                    // $sql2 = "SELECT * FROM tbl_news WHERE status='Posted' ORDER BY nID DESC";
                    $sql = "SELECT * FROM tbl_category ORDER BY cID DESC";

                    $statement = $conn->query($sql);

                    $itemsPerPage = 2;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                    
                    $offset = ($currentPage - 1) * $itemsPerPage;

                    
                    $sql2 = "SELECT * FROM tbl_news WHERE status='Posted' ORDER BY nID DESC LIMIT $offset, $itemsPerPage";
                    $newsStatement = $conn->query($sql2);
                    $newss = $newsStatement->fetchAll(PDO::FETCH_ASSOC);

                    $sqlSL = "SELECT * FROM tbl_news WHERE status='Posted' ORDER BY nID DESC";
                    $newsSStatement = $conn->query($sqlSL);
                    $newSl = $newsSStatement->fetchAll(PDO::FETCH_ASSOC);

                    
                    $sqlCount = "SELECT COUNT(*) as total FROM tbl_news WHERE status='Posted'";
                    $countStatement = $conn->query($sqlCount);
                    $totalItems = $countStatement->fetch(PDO::FETCH_ASSOC)['total'];

                    
                    $totalPages = ceil($totalItems / $itemsPerPage);
                    // $newsStatement = $conn->query($sql2);
                    // $newss = $newsStatement->fetchAll(PDO::FETCH_ASSOC);
                    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

                    $active = true;
                ?>

                
                
                <br>
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome Khmer News and Event Site</h1>
                    
                </div>
            </div>
        </header>
                <!-- Page content-->
                <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <h2><a href="all.php">All News</a></h2>
                    <hr>
                    <div class="row">
     
                            <!-- Blog post-->
                            <?php foreach ($newss as $news) : ?>
                        <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="public/uploads/news/<?php echo $news['Picture']; ?>" alt="Image" width="900" height="350" /></a>

                            <div class="card-body">
                                <div class="small text-muted"><?php echo date('F j, Y', strtotime($news['publication_date'])); ?></div>
                                <h2 class="card-title h4"><?php echo $news['title']; ?></h2>
                                <p class="card-text"><?php echo trim(substr($news['content'], 0, 250)) . ' ...'; ?></p>

                                <a class="btn btn-primary" href="detail.php?id=<?php echo $news['nID']?>">Read more →</a>

                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="row">
                    <?php 
                    $page = "/newsandeven/category.php?id=";
                    foreach ($categories as $category) {
                        echo '<h3 ><a href="';echo $page.$category['cID'].'">' . $category['categoryName'] . '<span style="margin-left:100px">➤</span></a></h3>';
                        echo '<div class="row">';
                        echo '<hr>';

                        // Loop through news articles for the current category
                        $colCount = 0;
                        foreach ($newSl as $index => $news) {
                            if ($news['category_id'] == $category['cID']) {
                                // Display news article card
                                echo '<div class="col-lg-6">';
                                echo '<div class="card mb-4">';
                                echo '<a href="#!"><img class="card-img-top" src="public/uploads/news/' . $news['Picture'] . '" alt="Image" width="700" height="350"/></a>';
                                echo '<div class="card-body">';
                                echo '<div class="small text-muted">' . date('F j, Y', strtotime($news['publication_date'])) . '</div>';
                                echo '<h2 class="card-title h4">' . $news['title'] . '</h2>';
                                echo '<p class="card-text">' . trim(substr($news['content'], 0, 150)) . ' ...</p>';
                                echo '<a class="btn btn-primary" href="detail.php?id=' . $news['nID'] . '">Read more →</a>';
                                echo '</div></div>';
                                echo '</div>';

                                $colCount++;

                                // Check if the column count is 4, close the row and start a new one
                                if ($colCount == 4) {
                                    echo '</div>';
                                    echo '<div class="row">';
                                    $colCount = 0;
                                    break;
                                }
                            }
                        }

                        echo '</div>';
                    }

                    ?>

                </div>
                            <!-- Blog post-->

                        

                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                            <?php 
                            // echo '<nav aria-label="Pagination">';
                            // echo '<ul class="pagination justify-content-center my-4">';
                            
                            // for ($i = 1; $i <= $totalPages; $i++) {
                            //     echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '">';
                            //     echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
                            //     echo '</li>';
                            // }
                            
                            // echo '</ul>';
                            // echo '</nav>';
                             ?>
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
                                <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <ul class="list-unstyled mb-0">
                                    <div class="d-grid gap-2">
                                        <?php foreach ($categories as $category){ ?>
                                            <li><a class="btn btn-primary" href="<?php echo "/newsandeven/category.php?id=".$category['cID']."&name=".$category['categoryName']."";?>"><?php echo $category['categoryName']; ?></a></li>
                                        <?php }; ?>
                                        </div></ul>
                                </div>
                                </div>
      
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php include_once "layouts/footer.php";?>