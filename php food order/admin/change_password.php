<?php
include('./partials/menu.php');
?>


    <div class="main_menu">
        <div class="wrapper">
            <h1>CHANGE PASSWORD HERE</h1>
            <br /><br />
            <?php
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            
            
            ?>
            <form action="" method="post">
                <table class="tbl_30">
                    <tr>
                        <td>Current Pwd:</td>
                        <td>
                            <input type="password" name="current_pwd" placeholder="Enter old password"/>
                        </td>
                    </tr>
                    <tr>
                        <td>New Pwd:</td>
                        <td>
                            <input type="password" name="new_pwd" placeholder="Enter new password"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm New Pwd:</td>
                        <td>
                            <input type="password" name="confirm_new_pwd" placeholder="Enter confirmed new password"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="submit" class="btn-secondary" name="changePwd" value="change pwd"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>



    <?php
    
    
    if(isset($_POST['changePwd'])){
        // get data from form
        $id = $_POST['id'];
        $current_pwd = md5($_POST['current_pwd']);
        $new_pwd = md5($_POST['new_pwd']);
        $confirm_new_pwd = md5($_POST['confirm_new_pwd']);
        // check current pwd exists in db
        $sql  = "SELECT * FROM tbl_admin where id =$id AND
        password = '$current_pwd'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $count = mysqli_num_rows($result);
            if($count==1){
                if($confirm_new_pwd==$new_pwd){
                    // update password
                    $sql2 = "UPDATE tbl_admin SET password='$new_pwd' WHERE id=$id";
                    if(mysqli_query($conn,$sql2)){
                        // display mesg of successful update
                        $_SESSION['change']= '<div class="success">changed successfully</div>';
                        header('Location:'.SITEURL.'admin/manage_admin.php');
                    }
                }else{
                    
                    $_SESSION['notMatch']= '<div class="error">notMatch</div>';
                    header('Location:'.SITEURL.'admin/manage_admin.php');
                }
            }else{
                $_SESSION['user_not_found']= '<div class="error">user not found</div>';
                header('Location:'.SITEURL.'admin/manage_admin.php');
            }
        }
    }
    
    
    ?>
<?php
include('./partials/footer.php');
?>