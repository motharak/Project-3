<?php include_once 'layouts/header.php'?>
<h1>This User Detail page</h1>
<h3 class="text-right ml-auto"><a href="user.php" class='btn btn-success'>Back</a></h3>
        <table border="1" style='border: 1px 1px solid; border-collapse: collapse; width: 100%; height: 100px;' class='table table-striped table-sm'>
        <tr class='trow'>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Password</th>
                <th>Picture</th>
                
            </tr>

        <?php
        include_once('../configs/config.php');
        // $query = "SELECT * FROM `tbl_product`";
        // $result = mysqli_query($conn, $query);

        // if (mysqli_num_rows($result) > 0) {
        //     while ($row = mysqli_fetch_assoc($result)) {
            $pdo = new DBConnect();
            $conn = $pdo->connect();
            $sql = "SELECT * FROM tbl_user WHERE uID =".$_GET['id'];
            $statement = $conn->query($sql);
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            
            //Add new user
            
        ?>
            <tr class='trow'>
 
                <td><?php echo $user['uID'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['gender'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['address'] ?></td>
                <td><?php echo $user['password'] ?></td>
                <td>
                    <?php if (!empty($user['picture'])) : ?>
                        <img src="public/uploads/user/<?php echo $user['picture']; ?>" width="30">
                    <?php else : ?>
                        No picture
                    <?php endif; ?>
                </td>
                
            </tr>


    </table>
    <br>

<?php include_once 'layouts/footer.php'?>
