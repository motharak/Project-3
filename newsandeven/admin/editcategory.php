<?php include_once 'layouts/header.php'; 



include_once('../configs/config.php');
$pdo = new DBConnect();
$conn = $pdo->connect();


if (isset($_GET['id'])) {
    $sql = "SELECT * FROM tbl_category WHERE cID=" . $_GET['id'];
    $statement = $conn->query($sql);
    $category = $statement->fetch(PDO::FETCH_ASSOC);


    if ($category) {
        
?>
<h2>Edit Category</h2>

<h3 class="text-right ml-auto"><a href="category.php" class='btn btn-success'>Back</a></h3>

<form class="row g-3" method="POST" action="../configs/update.php?action=updatecategory" onsubmit="submitForm()" enctype="multipart/form-data">
<input type="hidden" name="cID" value="<?php echo $category['cID']; ?>">
    
<div class="col-md-12">
        <label for="" class="form-label">Category</label>
        <input type="text" class="form-control" id="" required="" name='category' value="<?php echo $category['categoryName']?>">
    </div>


    <div class="col-md-12 col-10">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" id="" required="" name='description' ><?php echo $category["Desription"]?></textarea>
    </div>


    <div class="col-10">
        <button class="btn btn-primary" type="submit">Update Category</button>
    </div>
    <div id="loadingSpinner" class="spinner-border text-primary col-2" role="status" style="display:none;">
        <span class="visually-hidden">Loading...</span>
    </div>
</form>

<script>
    function submitForm() {
        document.getElementById('loadingSpinner').style.display = 'inline-block';

        setTimeout(function () {
            document.getElementById('loadingSpinner').style.display = 'none';
            alert('Form submitted successfully!');
        }, 1000); // Adjust the timeout value as needed
    }
</script>
<?php
    } else {

        echo '<p>User not found</p>';
    }
} else {

    echo '<p>Invalid request. Please provide a user ID.</p>';
}
?>
<?php include_once 'layouts/footer.php'; ?>
