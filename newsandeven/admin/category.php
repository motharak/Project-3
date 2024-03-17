<?php include_once 'layouts/header.php'?>
<h1>This Category view page</h1>
<?php 
if (isset($_GET['msg'])) {
    $alertMessage = htmlspecialchars($_GET['msg']);
    echo "<div id='alert' class='alert alert-primary d-inline-block px-3 py-1 md-5'>$alertMessage</div>";
}
?>

<h3 class="text-right py-6"><a href="addcategory.php" class='btn btn-success'>Add</a></h3>



    <table id="user" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Description</th>
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
            $sql = "SELECT * FROM tbl_category ORDER BY cID DESC";
            $statement = $conn->query($sql);
            $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            //Add new user
            
        ?>
            <tr>
            <?php foreach ($categories as $category){ ?>
                <td><?php echo $category['cID'] ?></td>
                <td><?php echo $category['categoryName'] ?></td>
                <td><?php echo $category['Desription'] ?></td>

                <td> <a href="editcategory.php?id=<?php echo $category['cID']; ?>">Edit</a> | <a href="../configs/delete.php?action=deleteCategory&id=<?php echo $category['cID']; ?>">Delete</a></td>
            </tr>
            <?php };?>
        </tbody>
        <tfoot>
            
            <tr>
            <th>ID</th>
                <th>Category</th>
                <th>Description</th>
                <th>Setting</th>
            </tr>
          
        </tfoot>
    </table>
    <br>

<?php include_once 'layouts/footer.php'?>
