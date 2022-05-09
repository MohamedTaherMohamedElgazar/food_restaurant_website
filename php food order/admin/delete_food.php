<?php 



include('../constants/config.php');
if(isset($_GET['id']) && isset($_GET['image_name'])){
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    if($image_name){
        $remove_path = "../images/food/".$image_name;
        unlink($remove_path);
    }
    $sql = "DELETE FROM tbl_food WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['delete'] = "<div class='success'>food is deleted successfully</div>";
        header("Location:".SITEURL."admin/manage_food.php");
    }else{
        $_SESSION['delete'] = "<div class='error'>food is NOT deleted successfully</div>";
        header("Location:".SITEURL."admin/manage_food.php");
    }
}else{
    $_SESSION['Unauthorized'] = "<div class='error'>unauthorized access</div>";
    header("Location:".SITEURL."admin/manage_food.php");
}




















?>
