<?php include_once 'layouts/header.php'; ?>

<h2>Add User</h2>

<h3 class="text-right ml-auto"><a href="user.php" class='btn btn-success'>Back</a></h3>

<form class="row g-3" method="POST" action="../configs/add.php?action=adduser" onsubmit="submitForm()" enctype="multipart/form-data">
    <div class="col-md-6">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" id="" required="" name='name'>
    </div>

    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Author</label>
        <select class="form-select" name="gender">
            <option selected value="">Please select a Role</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other..</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="" class="form-label">Email</label>
        <input type="text" class="form-control" id="" required="" name='email'>
    </div>
    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" required="" name='password'>
        <input type="checkbox" onclick="myFunction()">Show Password
        <script>
            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </div>

    <div class="col-md-3">
        <label for="" class="form-label">Phone</label>
        <input type="text" class="form-control" id="" required="" name='phone'>
    </div>
    <div class="col-md-9 col-10">
        <label for="" class="form-label">Address</label>
        <textarea class="form-control" id="" required="" name='address'></textarea>
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">Picture</label>
        <input type="file" class="form-control" name="pic" >
    </div>

    <div class="col-10">
        <button class="btn btn-primary" type="submit">Add User</button>
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
