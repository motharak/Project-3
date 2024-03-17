<?php include_once 'layouts/header.php'?>
<h1>This User view page</h1>
<?php 
if (isset($_GET['msg'])) {
    $alertMessage = htmlspecialchars($_GET['msg']);
    echo "<div id='alert' class='alert alert-primary d-inline-block px-3 py-1 md-5'>$alertMessage</div>";
}
?>

<h3 class="text-right py-6"><a href="adduser.php" class='btn btn-success'>Add</a></h3>



    <table id="user" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Picture</th>
                <th>Setting</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include_once('../configs/config.php');
        // $query = "SELECT * FROM `tbl_product`";
        // $result = mysqli_query($conn, $query);

        // if (mysqli_num_rows($result) > 0) {
        //     while ($row = mysqli_fetch_assoc($result)) {
            $pdo = new DBConnect();
            $conn = $pdo->connect();
            $sql = "SELECT * FROM tbl_user ORDER BY uID DESC";
            $statement = $conn->query($sql);
            $listUsers = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            //Add new user
            
        ?>
            <tr>
            <?php foreach ($listUsers as $user){ ?>
                <td><?php echo $user['uID'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['gender'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['address'] ?></td>
                <td>
                    <?php if (!empty($user['picture'])) : ?>
                        <img src="public/uploads/user/<?php echo $user['picture']; ?>" width="30">
                    <?php else : ?>
                        No picture
                    <?php endif; ?>
                </td>
                <td><a href="detailUser.php?id=<?php echo $user['uID']; ?>">View</a> | <a href="edituser.php?id=<?php echo $user['uID']; ?>">Edit</a> | <a href="../configs/delete.php?action=deleteUser&id=<?php echo $user['uID']; ?>&pic=<?php echo $user['picture']; ?>">Delete</a></td>
            </tr>
            <?php };?>
        </tbody>
        <tfoot>
            
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Picture</th>
            <th>Setting</th>
            </tr>
          
        </tfoot>
    </table>
    <br>

<?php include_once 'layouts/footer.php'?>
