<?php
function connectDB(){
    include_once('../configs/config.php');
    $pdo = new DBConnect();
    return $pdo->connect();  // Return the connection object
}
function back($header, $msg){
    return header('Location: /newsandeven/admin/'.$header.'?msg='.$msg.'');
}

function addUser() {
    $conn = connectDB();
    $folder = '../admin/public/uploads/user/';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $picture = $_FILES['pic']['name'];
    $timestamp = time();
    $file = $timestamp . '_' . $picture;

    move_uploaded_file($_FILES['pic']['tmp_name'], $folder . $file);

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO tbl_user (name, email, phone, address, gender, password, picture) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    // $stmt->bind_param("sssssss", $name, $email, $phone, $address, $gender, $password, $file);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $phone);
    $stmt->bindParam(4, $address);
    $stmt->bindParam(5, $gender);
    $stmt->bindParam(6, $password);
    $stmt->bindParam(7, $file);
    $stmt->execute();
    back('user.php', 'Successful');
    exit();
}

function addNews() {
    if (!empty($_POST['status'])) {
        $conn = connectDB();
        $folder = '../public/uploads/news/';
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $editor = $_POST['editor'];
        $status = $_POST['status'];

        $picture = $_FILES['pic']['name'];
        $timestamp = time();
        $file = $timestamp . '_' . $picture;

        move_uploaded_file($_FILES['pic']['tmp_name'], $folder . $file);

        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO tbl_news (title, author, category_id, Picture, content, status) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $author);
        $stmt->bindParam(3, $category);
        $stmt->bindParam(4, $file);
        $stmt->bindParam(5, $editor);
        $stmt->bindParam(6, $status);

        $stmt->execute();

 
        $conn = null;

        back('news.php', 'successful');
        exit();
    } else {
        $conn = connectDB();
        $folder = '../public/uploads/news/';
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $editor = $_POST['editor'];

        $picture = $_FILES['pic']['name'];
        $timestamp = time();
        $file = $timestamp . '_' . $picture;

        move_uploaded_file($_FILES['pic']['tmp_name'], $folder . $file);

        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO tbl_news (title, author, category_id, Picture, content) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $author);
        $stmt->bindParam(3, $category);
        $stmt->bindParam(4, $file);
        $stmt->bindParam(5, $editor);

        $stmt->execute();

        $conn = null;

        back('news.php', 'successful');
        exit();
    }
}


function addEvents(){
    
    
}
function addCategory(){
    $conn = connectDB();
    // $folder = '../admin/public/uploads/user/';
    $category = $_POST['category'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    $description = $_POST['description'];
    // $gender = $_POST['gender'];
    // $password = $_POST['password'];




    $sql = "INSERT INTO tbl_category (categoryName, Desription) 
            VALUES ( '$category', '$description')";
    
    $conn->query($sql);

    back('category.php', 'Add Category successful');
    exit();
    
}


// Call the connectDB function and get the connection object
$conn = connectDB();

// Check if action is set and call the addUser function
$action = !empty($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
    case 'adduser':
    addUser();
    break;
    case 'addnews' :
    addNews();
    break;
    case 'addeven' :
    addEvents();
    break;
    case 'addcategory' :
    addCategory();
    break;

}

$conn = null;