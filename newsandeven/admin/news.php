<?php include_once 'layouts/header.php';
include_once('../configs/config.php');
$pdo = new DBConnect();
$conn = $pdo->connect();

$sql = "SELECT * FROM tbl_user ORDER BY uID DESC";
$sql1 = "SELECT * FROM tbl_category ORDER BY cID DESC";
$sql2 = "SELECT * FROM tbl_news ORDER BY nID DESC";

$statement = $conn->query($sql);
$newsStatement = $conn->query($sql2);
$catStatement = $conn->query($sql1);

$newsList = $newsStatement->fetchAll(PDO::FETCH_ASSOC);
$categories = $catStatement->fetchAll(PDO::FETCH_ASSOC);
$authors = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($authors as $author) {
    $authorName[$author['uID']] = $author;
}
foreach ($categories as $category) {
    $categoryN[$category['cID']] = $category;
}
?>

<h1>This News view page</h1>
<?php 
if (isset($_GET['msg'])) {
    $alertMessage = htmlspecialchars($_GET['msg']);
    echo "<div id='alert' class='alert alert-primary d-inline-block px-3 py-1 md-5'>$alertMessage</div>";
}
?>

<h3 class="text-right py-6"><a href="addnews.php" class='btn btn-success'>Add</a></h3>



    <table id="user" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tilte</th>
                <th>Author</th>
                <th>Category</th>
                <th>Publication Date</th>
                <th>Picture</th>
                <th>Status</th>
                <th>Setting</th>
            </tr>
        </thead>
        <tbody>

            <tr>
            <?php foreach ($newsList as $news){ ?>
                <td><?php echo $news['nID'] ?></td>
                <td><?php echo $news['title'] ?></td>
                <td><?php echo $authorName[$news['author']]['name']; ?></td>
                <td><?php echo $categoryN[$news['category_id']]['categoryName']; ?></td>
                <td><?php echo $news['publication_date'] ?></td>
                <td>
                    <?php if (!empty($news['Picture'])) : ?>
                        <img src="../public/uploads/news/<?php echo $news['Picture']; ?>" width="150">
                        <?php else : ?>
                            No picture
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php
                             $status = $news['status'];
                            //  $status = "Posted";
                            if($status === "Posted"){
                                echo "<span class> ".$status."</span>";
                                echo '<form class="row g-3" method="POST" action="../configs/update.php?action=postAction" onsubmit="submitForm()" enctype="multipart/form-data">
                                <input type="hidden" name="nID" value="'. $news['nID'].'">
                                <input type="hidden" name="status" value="Draft" >
                                
                                    <div class="col-10">
                                        <button class="btn btn-primary" type="submit">Cancel Post</button>
                                    </div>
                                
                                </form>';
                            }
                            elseif($status==="Draft"|| empty($status)){
                                echo "not posted<br/>";
                                echo '<form class="row g-3" method="POST" action="../configs/update.php?action=postAction" onsubmit="submitForm()" enctype="multipart/form-data">
                                <input type="hidden" name="nID" value="'. $news['nID'].'">
                                <input type="hidden" name="status" value="Posted" >
                                
                                    <div class="col-10">
                                        <button class="btn btn-primary" type="submit">Post</button>
                                    </div>
                                
                                </form>';
                            }
                            ?></td>
                        <td><a href="viewNewsContent.php?id=<?php echo $news['nID']; ?>">View Content</a> | <a href="editnews.php?id=<?php echo $news['nID']; ?>">Edit</a> | <a href="../configs/delete.php?action=deleteNews&id=<?php echo $news['nID']; ?>&pic=<?php echo $news['Picture']; ?>">Delete</a></td>
            </tr>
            <?php };?>
        </tbody>
        <tfoot>
            
            <tr>
                <th>ID</th>
                <th>Tilte</th>
                <th>Author</th>
                <th>Category</th>
                <th>Publication Date</th>
                <th>Picture</th>
                <th>Status</th>
                
                <th>Setting</th>
            </tr>
          
        </tfoot>
    </table>
    <br>

<?php include_once 'layouts/footer.php'?>
