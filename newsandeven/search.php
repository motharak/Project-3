<?php
include_once 'configs/config.php';

// Check if the 'query' parameter is set in the URL
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Use the $searchQuery in your database query to search for relevant results
    $pdo = new DBConnect();
    $conn = $pdo->connect();

    // Assuming you have a 'tbl_news' table
    $sql4 = "SELECT * FROM tbl_news WHERE title LIKE :searchQuery";
    $statement = $conn->prepare($sql4);
    $statement->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
    $statement->execute();

    $searchResults = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Display the search results

?>
<?php include_once "layouts/header.php";?>
<header class="py-5 bg-light border-bottom mb-4">

                <?php include_once 'configs/config.php'; 

                    $pdo = new DBConnect();
                    $conn = $pdo->connect();
                    


                    $sql = "SELECT * FROM tbl_category ORDER BY cID DESC";

                    $statement = $conn->query($sql);

                    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

                    $active = true;
                ?>

                <div class="text-left px-5 my-5">
                    <br>
                    
                    <h2 class="fw-bolder">Search Result </h2>
                    
                </div>
            </div>
        </header>
                <!-- Page content-->
                <div class="container container-xxl">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->

                    <div class="row">
                    <!-- if ($searchResults) {
                        foreach ($searchResults as $result) {
                            echo '<div>';
                            echo '<h3>' . $result['title'] . '</h3>';
                            // Display other relevant information
                            echo '</div>';
                        }
                    } else {
                        echo 'No results found.';
                    }
                } else {
                    echo 'Invalid search query.';
                } -->
                            <!-- Blog post-->
                            <?php
                             if ($searchResults) { 
                                foreach ($searchResults as $result) : ?>
                        <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="public/uploads/news/<?php echo $result['Picture']; ?>" alt="Image" width="700" height="450" /></a>

                            <div class="card-body">
                                <div class="small text-muted"><?php echo date('F j, Y', strtotime($result['publication_date'])); ?></div>
                                <h2 class="card-title h4"><?php echo $result['title']; ?></h2>
                                <p class="card-text"><?php echo trim(substr($result['content'], 0, 100)) . ' ...'; ?></p>

                                <a class="btn btn-primary" href="detail.php?id=<?php echo $result['nID']?>">Read more →</a>

                            </div>
                        </div>
                    <?php endforeach; }else {
                        echo 'No results found.';
                    }
                } else {
                    echo 'Invalid search query.';
                } ?>

                            <!-- Blog post-->

                        

                    </div>
                    <!-- Pagination-->

                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
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
                                        <?php foreach ($categories as $category){ ?>
                                            <li><a class="btn btn-primary" href="<?php echo "/newsandeven/category.php?id=".$category['cID']."&name=".$category['categoryName']."";?>"><?php echo $category['categoryName']; ?></a></li>
                                        <?php }; ?>
                                        </div></ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->

                </div>
            </div>
        </div>
<?php include_once "layouts/footer.php";?>