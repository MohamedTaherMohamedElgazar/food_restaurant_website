<?php
include('./partials/menu.php');
?>


        <div class="main_content">
            <div class="wrapper">
                <h1>UPDATE ADMIN</h1>
                <br /><br />

                <?php
                // GET ID of selected admin
                $id = $_GET['id'];
                // query to get the id of the admin
                $sql = "SELECT* from tbl_admin where id = $id";
                $result = mysqli_query($conn,$sql);
                if($result) {
                    $count = mysqli_num_rows($result);
                    if($count == 1) {
                        if($row = mysqli_fetch_array($result)){
                            $full_name=$row['full_name'];
                            $user_name=$row['user_name'];
                        }
                    }else{
                            header("Location:".SITEURL."admin/manage_admin.php");
                    }
                }
                
                ?>
                <form method="post" action="">
                    <table class="tbl_30">
                    <tr>
                        <td>Full Name: </td>
                        <td><input type="text" name="full_name" value="<?php echo $full_name?>"/></td>
                    </tr>
                    <tr>
                        <td>User Name: </td>
                        <td><input type="text" name="user_name" value="<?php echo $user_name?>"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id?>"/>
                            <input type="submit" value="Update Admin" name="update_admin" class="btn-secondary"/>
                        </td>
                    </tr>
                    </table>
                </form>
            </div>
        </div>


<?php


if(isset($_POST['update_admin'])){
    // get all values from form
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $user_name = $_POST['user_name'];
    // sql query
    $sql = "UPDATE tbl_admin SET
     full_name='$full_name',
     user_name = '$user_name'
      WHERE id='$id'";
      if (mysqli_query($conn, $sql)) {
        $_SESSION['update'] = '<div class="success">Admin updated successfully</div>';
        header('Location:'.SITEURL.'admin/manage_admin.php');
      } else {
        $_SESSION['update'] = '<div class="error">Admin updated successfully</div>';
        header('Location:'.SITEURL.'admin/manage_admin.php');
      }
}


?>



<?php
include('./partials/footer.php');
?>