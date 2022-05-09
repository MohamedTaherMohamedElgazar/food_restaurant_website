<?php
include("../constants/config.php");
// more protection on id and image clicked btn
if(isset($_GET['id']) && isset($_GET['image'])){
    $id = $_GET['id'];
    $image = $_GET['image'];
    // remove the physical image from the path
    if($image != ''){
        // get the path of the image
        $path = '../images/category/'.$image;
        $remove = unlink($path);
        if(!$remove){
            $_SESSION['remove'] = '<div class="error">image is NOT deleted successfully from path</div>';
            header('Location:'.SITEURL.'admin/manage_category.php');
        };
    }
    $sql = "DELETE FROM tbl_category where id='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['delete_category'] = '<div class="success">category is deleted successfully</div>';
        header('Location:'.SITEURL.'admin/manage_category.php');
    }
    else{
        $_SESSION['delete_category'] = '<div class="error">category is NOT deleted successfully</div>';
        header('Location:'.SITEURL.'admin/manage_category.php');
    }
}else{
    header('Location:'.SITEURL.'admin/manage_category.php');
}





?>