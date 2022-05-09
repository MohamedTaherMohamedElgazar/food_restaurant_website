<?php
include '../constants/config.php';
// get of GET
$id = $_GET['id'];
//echo $id;


// query to delete from database
$sql = "DELETE FROM tbl_admin WHERE id = '$id'";
$result =mysqli_query($conn, $sql);
if($result){
    $_SESSION['delete'] = '<div class="success">Admin deleted successfully</div>';
    header('Location:'.SITEURL.'admin/manage_admin.php');
}else{
    $_SESSION['delete'] = '<div class="error">Admin NOT deleted successfully</div>';
    header('Location:'.SITEURL.'admin/manage_admin.php');
}











?>