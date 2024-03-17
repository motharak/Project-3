<?php
function connectDB(){
    include_once('../configs/config.php');
    $pdo = new DBConnect();
    return $pdo->connect();  // Return the connection object
}
function back($header, $msg){
    return header('Location: /newsandeven/admin/'.$header.'?msg='.$msg.'');
}

function updateUser(){
    $conn = connectDB();
    $folder = '../admin/public/uploads/user/';
    $id = $_POST['uID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $newPicture = $_FILES['pic']['name'];


    $sqlOldPicture = "SELECT picture FROM tbl_user WHERE uID = $id";
    $resultOldPicture = $conn->query($sqlOldPicture);
    $oldPicture = $resultOldPicture->fetch(PDO::FETCH_ASSOC)['picture'];

    if (!empty($newPicture)) {
        $timestamp = time();
        $file = $timestamp . '_' . $newPicture;


        move_uploaded_file($_FILES['pic']['tmp_name'], $folder . $file);


        if (!empty($oldPicture) && file_exists($folder . $oldPicture)) {
            unlink($folder . $oldPicture);
        }


        $sql = "UPDATE tbl_user 
                SET name = '$name', email = '$email', phone = '$phone', 
                    address = '$address', gender = '$gender', password = '$password', picture = '$file'
                WHERE uID = $id";
    } else {

        $sql = "UPDATE tbl_user 
                SET name = '$name', email = '$email', phone = '$phone', 
                    address = '$address', gender = '$gender', password = '$password'
                WHERE uID = $id";
    }
    
    $conn->query($sql);

    back('user.php', 'Update successful');
    exit();
}


function updateNews() {
    $conn = connectDB();

    $id = $_POST['nID'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $editor = $_POST['editor'];
    $status = $_POST['status'];

    $folder = '../public/uploads/news/';

    if (!empty($_FILES['pic']['name'])) {
        $timestamp = time();
        $file = $timestamp . '_' . $_FILES['pic']['name'];
        move_uploaded_file($_FILES['pic']['tmp_name'], $folder . $file);

        $sql = "UPDATE tbl_news SET
                title = ?,
                author = ?,
                category_id = ?,
                Picture = ?,
                content = ?,
                status = ?
                WHERE nID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $author);
        $stmt->bindParam(3, $category);
        $stmt->bindParam(4, $file);
        $stmt->bindParam(5, $editor);
        $stmt->bindParam(6, $status);
        $stmt->bindParam(7, $id);

        $stmt->execute();


        $conn = null;

        back('news.php', 'Update successful');
        exit();
    } else {
        $sql = "UPDATE tbl_news SET
                title = ?,
                author = ?,
                category_id = ?,
                content = ?,
                status = ?
                WHERE nID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $author);
        $stmt->bindParam(3, $category);
        $stmt->bindParam(4, $editor);
        $stmt->bindParam(5, $status);
        $stmt->bindParam(6, $id);

        $stmt->execute();

   
        $conn = null;

        back('news.php', 'Update successful');
        exit();
    }
}

function addEvents(){

    
}
// function postAction(){
//     $conn = connectDB();
//     $status = $_POST['status'];
//     $id = $_POST['nID'];

//     if(!empty($status) || $status==="Posted"){
//         $sql = "UPDATE tbl_news SET
//                 status = '$status'

//                 WHERE nID = $id";
//                 $conn->query($sql);
        
//                 back('news.php', 'successful');
//                 exit();
//     }elseif(empty($status) || $status==="Draft"){
//         $sql = "UPDATE tbl_news SET
//         status = '$status'

//         WHERE nID = $id";
//         $conn->query($sql);

//         back('news.php', 'successful');
//         exit();
//     }
    
// }
function postAction() {
    $conn = connectDB();
    $status = $_POST['status'];
    $id = $_POST['nID'];

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE tbl_news SET status = ? WHERE nID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $status);
    $stmt->bindParam(2, $id);

    if (!empty($status) || $status === "Posted") {
        back('news.php', 'successful');

    } elseif (empty($status) || $status === "Draft") {
        back('news.php', 'successful');

    }

    $stmt->execute();
 
    $conn = null;

    back('news.php', 'Update successful');
    exit();
}

function updateCategory(){
        $id = $_POST['cID'];
if(!empty($id)){
    $conn = connectDB();
    // $folder = '../admin/public/uploads/user/';


    $category = $_POST['category'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    $description = $_POST['description'];
    // $gender = $_POST['gender'];
    // $password = $_POST['password'];




    $sql = "UPDATE tbl_category
    set categoryName ='$category', Desription='$description' WHERE cid = '$id'; ";
    
    $conn->query($sql);

    back('category.php', 'Update Category successful');
    exit();
}else{
    back('category.php', 'Can\'t update Category');
}
    
}


$conn = connectDB();

$action = !empty($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
    case 'updateuser':
        updateUser();
    break;
    case 'updatenews' :
        updateNews();
    break;
    case 'postAction' :
        postAction();
    break;
    case 'addeven' :
    addEvents();
    break;
    case 'updatecategory' :
    updateCategory();
    break;

}
$conn = null;
