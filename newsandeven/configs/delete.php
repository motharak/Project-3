<?php
function connectDB(){
    include_once('../configs/config.php');
    $pdo = new DBConnect();
    return $pdo->connect();  // Return the connection object
}
function back($header,$msg){
    return header('Location: /newsandeven/admin/'.$header.'?msg='.$msg.'');
}

function deleteUser($id,$pic){
if(!empty($id)){

    if (!empty($pic)) {
        $picturePath = '../admin/public/uploads/user/' . $pic;
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }
    $conn = connectDB();
    $sql = "DELETE FROM tbl_user WHERE uID=".$id."";
    $conn->query($sql);
    // echo $picturePath;
    
    }
    else{
        $conn = connectDB();
        $sql = "DELETE FROM tbl_user WHERE uID=".$id."";
        $conn->query($sql);
    }

// $conn->query($sql);

back('user.php','deleted');
// back('user.php');
}
else{
    back('user.php','error can\'t delete user, please try again!');
}
exit();
}
function deleteCategory($id){
    if(!empty($id)){
    $conn = connectDB();
    $sql = "DELETE FROM tbl_category WHERE cID=".$id."";
    $conn->query($sql);
    back('category.php','deleted');
    }
    else{
        back('category.php','error can\'t delete category, please try again!');
    }
}
function deleteNews($id,$pic){
    if(!empty($id)){

        if (!empty($pic)) {
            $picturePath = '../public/uploads/news/' . $pic;
            if (file_exists($picturePath)) {
                unlink($picturePath);
            }
        $conn = connectDB();
        $sql = "DELETE FROM tbl_news WHERE nID=".$id."";
        $conn->query($sql);
        // echo $picturePath;
        
        }
        else{
            $conn = connectDB();
            $sql = "DELETE FROM tbl_news WHERE nID=".$id."";
            $conn->query($sql);
        }
    
    // $conn->query($sql);
    
    back('news.php','deleted');
    // back('user.php');
    }
    else{
        back('news.php','error can\'t delete user, please try again!');
    }
    exit();
}
$action = !empty($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
    case 'deleteUser':
        $id = $_GET['id'];
        $pic = $_GET['pic'];
    deleteUser($id,$pic);
    break;
    case 'deleteNews':
        $id = $_GET['id'];
        $pic = $_GET['pic'];
    deleteNews($id,$pic);
    break;
    // case 'addnews' :
    // addNews();
    // break;
    // case 'addeven' :
    // addEvents();
    // break;
    case 'deleteCategory' :
        $id = $_GET['id'];
        deleteCategory($id);
    break;

}

$conn = connectDB();

$conn = null;