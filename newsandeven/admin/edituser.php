<?php include_once 'layouts/header.php'; ?>
<?php
include_once('../configs/config.php');
$pdo = new DBConnect();
$conn = $pdo->connect();


if (isset($_GET['id'])) {
    $sql = "SELECT * FROM tbl_user WHERE uID=" . $_GET['id'];
    $statement = $conn->query($sql);
    $userData = $statement->fetch(PDO::FETCH_ASSOC);


    if ($userData) {
        
?>
<h2>Edit User</h2>

<h3 class="text-right ml-auto"><a href="user.php" class='btn btn-success'>Back</a></h3>

<form class="row g-3" method="POST" action="../configs/update.php?action=updateuser" onsubmit="submitForm()" enctype="multipart/form-data">
    <input type="hidden" name="uID" value="<?php echo $userData['uID']; ?>">
    <div class="col-md-6">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" id="" required="" name='name' value="<?php echo htmlspecialchars($userData['name']); ?>">
    </div>

    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Sex</label>
        <select class="form-select" name="gender">
            <option value="male" <?php echo ($userData['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?php echo ($userData['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
            <option value="other" <?php echo ($userData['gender'] == 'other') ? 'selected' : ''; ?>>Other</option>
        </select>
    </div>

    <div class="col-md-6">
        <label for="" class="form-label">Email</label>
        <input type="text" class="form-control" id="" required="" name='email' value="<?php echo htmlspecialchars($userData['email']); ?>">
    </div>

    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" required="" name='password' value="<?php echo htmlspecialchars($userData['password']); ?>">
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
        <input type="text" class="form-control" id="" required="" name='phone' value="<?php echo htmlspecialchars($userData['phone']); ?>">
    </div>

    <div class="col-md-9 col-10">
        <label for="" class="form-label">Address</label>
        <textarea class="form-control" id="" required="" name='address'><?php echo htmlspecialchars($userData['address']); ?></textarea>
    </div>

    <div class="col-md-3">
    <label for="" class="form-label">Current Picture</label>
    <?php if (!empty($userData['picture'])) : ?>
        <img src="../admin/public/uploads/user/<?php echo $userData['picture']; ?>" width="100" alt="Current Picture">
    <?php else : ?>
        <p>No picture available</p>
    <?php endif; ?>
</div>

<div class="col-md-3">
    <label for="" class="form-label">New Picture</label>
    <input type="file" class="form-control" name="pic">
</div>


    <div class="col-10">
        <button class="btn btn-primary" type="submit">Update User</button>
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
        }, 1000);
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
