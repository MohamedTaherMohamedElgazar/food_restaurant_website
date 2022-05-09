<!--menu section starts here-->
<?php include('./partials/menu.php')?>
<!--menu section ends here-->




    <div class="main_content">
        <div class="wrapper">
            <h1>Add Admin</h1>
            <br/>
            <?php
                if(isset($_SESSION["add"])){
                    echo $_SESSION["add"];
                    unset($_SESSION["add"]);
                }
            
            
            ?>
            <form action="" method="post">
                <table class="tbl_30">
                    <tr>
                        <td>Full Name: </td>
                        <td><input type="text" name="full_name" placeholder="enter full name here"/></td>
                    </tr>
                    <tr>
                        <td>User Name: </td>
                        <td><input type="text" name="user_name" placeholder="enter user name here"/></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password" placeholder="enter password here"/></td>
                    </tr>


                    <tr colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-primary"/>
                    </tr>
                </table>
            </form>
        </div>
    </div>






<!--footer section starts here-->
<?php include('./partials/footer.php')?>
<!--footer section ends here-->


<?php
    // get data from form and insert it into database
    if(isset($_POST['submit'])){
        // get data
        $full_name= $_POST['full_name'];
        $user_name= $_POST['user_name'];
        $pwd = md5($_POST['password']);

        // query data
        $sql = "INSERT INTO tbl_admin SET 
        full_name='$full_name',
        user_name='$user_name',
        password='$pwd'
        ";

        //echo $sql;
        
        $result = mysqli_query($conn,$sql) or die("failed: " . mysqli_connect_error());
        $_SESSION["add"];
        if($result){
            //echo "successfully inserted";
            $_SESSION["add"] = "admin is added successfuly";
            header("Location:".SITEURL."admin/manage_admin.php");
        }else{
             $_SESSION["add"] = "admin is NOT added successfuly";
            header("Location:".SITEURL."admin/add_admin.php");
        }
    }




?>