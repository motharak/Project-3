<?php 
include_once 'layouts/header.php';
include_once('../configs/config.php');
$pdo = new DBConnect();
$conn = $pdo->connect();

// Assuming you have an $id variable to get the news ID
$id = $_GET['id'];

// Fetch the existing news data to pre-populate the form
$sql2 = "SELECT * FROM tbl_news WHERE nID=".$id;
$newsStatement = $conn->query($sql2);
$newsData = $newsStatement->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM tbl_user ORDER BY uID DESC";
$sql1 = "SELECT * FROM tbl_category ORDER BY cID DESC";
$statement = $conn->query($sql);
$catStatement = $conn->query($sql1);
$categories = $catStatement->fetchAll(PDO::FETCH_ASSOC);
$authors = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Edit News</h2>

<h3 class="text-right ml-auto"><a href="news.php" class='btn btn-success'>Back</a></h3>

<form class="row g-3" method="POST" action="../configs/update.php?action=updatenews&id=<?php echo $id; ?>" onsubmit="submitForm()" enctype="multipart/form-data">
<input type="hidden" name="nID" value="<?php echo $newsData['nID']; ?>">
    <div class="col-md-6">
        <label for="" class="form-label">Title</label>
        <input type="text" class="form-control" id="" required="" name='title' value="<?php echo $newsData['title']; ?>">
    </div>

    <div class="col-md-12"></div>
    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Author</label>
        <select class="form-select" name="author">
            <?php foreach($authors as $author){ ?>
                <option value="<?php echo $author['uID']?>" <?php echo ($author['uID'] == $newsData['author']) ? 'selected' : ''; ?>><?php echo $author['name']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-12"></div>
    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Category</label>
        <select class="form-select" name="category">
            <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category['cID']?>" <?php echo ($category['cID'] == $newsData['category_id']) ? 'selected' : ''; ?>><?php echo $category['categoryName']?></option>
            <?php } ?>
        </select>
    </div>
    C:\xampp\htdocs\newsandeven\public\uploads\news
    <div class="col-md-12">
        <label for="" class="form-label">Thumbnail:</label><br>
        <?php if (!empty($newsData['Picture'])) : ?>
                        <img src="../public/uploads/news/<?php echo $newsData['Picture']; ?>" width="200">
                    <?php else : ?>
                        No thumbnail available
                    <?php endif; ?>
                    <br>
        <input type="file" class="form-control" name="pic" value="<?php echo $newsData['Picture']; ?>">
    </div>

    <div class="col-md-12 col-12">
        <h3>Content</h3>
        <textarea id="summernote" name="editor"><?php echo $newsData['content']; ?></textarea>
    </div>

    <!-- Hidden input for status -->
    <input type="hidden" id="status" name="status" value="<?php echo $newsData['status']; ?>">

    <div class="col-1">
        <button class="btn btn-primary" type="submit" onclick="setStatus('Draft')">Save</button>
    </div>
    <div class="col-1">
        <h3>OR</h3>
    </div>
    <div class="col-1">
        <button class="btn btn-success" type="submit" name="submitPost" onclick="setStatus('Posted')">Save and Post</button>
    </div>

    <div id="loadingSpinner" class="spinner-border text-primary col-2" role="status" style="display:none;">
        <span class="visually-hidden">Loading...</span>
    </div>
</form>

<script>
    function setStatus(status) {
        document.getElementById('status').value = status;
    }

    function submitForm() {
        document.getElementById('loadingSpinner').style.display = 'inline-block';

        setTimeout(function () {
            document.getElementById('loadingSpinner').style.display = 'none';
            alert('Form submitted successfully!');
        }, 1000); // Adjust the timeout value as needed
    }
</script>

<?php include_once 'layouts/footer.php'; ?>
