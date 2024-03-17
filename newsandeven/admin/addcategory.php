<?php include_once 'layouts/header.php'; ?>

<h2>Add Category</h2>

<h3 class="text-right ml-auto"><a href="category.php" class='btn btn-success'>Back</a></h3>

<form class="row g-3" method="POST" action="../configs/add.php?action=addcategory" onsubmit="submitForm()" enctype="multipart/form-data">
    <div class="col-md-12">
        <label for="" class="form-label">Category</label>
        <input type="text" class="form-control" id="" required="" name='category'>
    </div>


    <div class="col-md-12 col-10">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" id="" required="" name='description'></textarea>
    </div>


    <div class="col-10">
        <button class="btn btn-primary" type="submit">Add Category</button>
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

<?php include_once 'layouts/footer.php'; ?>
