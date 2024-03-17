<?php 
include_once 'layouts/header.php';
include_once('../configs/config.php');
$pdo = new DBConnect();
$conn = $pdo->connect();
$sql = "SELECT * FROM tbl_user ORDER BY uID DESC";
$sql1 = "SELECT * FROM tbl_category ORDER BY cID DESC";
$statement = $conn->query($sql);
$catStatement = $conn->query($sql1);
$categories = $catStatement->fetchAll(PDO::FETCH_ASSOC);
$authors = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Add News</h2>

<h3 class="text-right ml-auto"><a href="news.php" class='btn btn-success'>Back</a></h3>

<form class="row g-3" method="POST" action="../configs/add.php?action=addnews" onsubmit="submitForm()" enctype="multipart/form-data">
    <div class="col-md-6">
        <label for="" class="form-label">Title</label>
        <input type="text" class="form-control" id="" required="" name='title'>
    </div>

    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Author</label>
        <select class="form-select" name="author">
            <option selected value="">Please select an Author</option>
            <?php foreach($authors as $author){ ?>
                <option value="<?php echo $author['uID']?>"><?php echo $author['name']?></option>
            <?php } ?>
        </select>
    </div>
    
    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Category</label>
        <select class="form-select" name="category">
            <option selected value="">Please select a Category</option>
            <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category['cID']?>"><?php echo $category['categoryName']?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-6">
        <label for="" class="form-label">Thumbnail</label>
        <input type="file" class="form-control" name="pic">
    </div>

    <div class="col-md-12 col-12">
        <h3>Content</h3>
        <textarea id="summernote" name="editor"></textarea>
    </div>

    <!-- Hidden input for status -->
    <input type="hidden" id="status" name="status" value="Draft">

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
