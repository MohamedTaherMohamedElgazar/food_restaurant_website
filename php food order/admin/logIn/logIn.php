<?php

include('../../constants/config.php');



?>
<html>
    <head>
        <title>logIn food_order system</title>
        <link rel="stylesheet" href="logStyle.css" type="text/css">
    </head>
    <body>
        <div class="logIn">
            <h1 class="text-center">logIn</h1>
            <br />
            <?php
            
            
            if(isset($_SESSION['logZAIn'])){
                echo $_SESSION['logZAIn'];
                //unset($_SESSION['logIn']); // dispaly msg only one time
            };
            if(isset($_SESSION['no_logIn'])){
                echo $_SESSION['no_logIn'];
                unset($_SESSION['logIn']);
            }
            
            
            
            ?>
            <br/>
            <!-- logIn form starts here -->
            <form method="post" action="" class="text-center">
                username:
                <br/>
                <input type="text" name="username" placeholder="enter username"/>
                <br/>
                <br/>
                password: 
                <br/>               
                <input type="password" name="password" placeholder="enter password"/>
                <br/>
                <br/>
                <input type="submit" name="login" value="login" class="btn-primary"/>
            </form>
            <!-- logIn form ends here -->
            <p class="text-center">created by <a href="#">Mohamed Elgazar</a></p>
        </div>
    </body>
</html>
<?php



if(isset($_POST['login'])){
    // get the data from form
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // check wither the form inputs exist in db or not
    $sql = "SELECT * FROM tbl_admin WHERE user_name='$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count= mysqli_num_rows($result);
    if($count==1){
        $_SESSION['logZAIn'] = '<div class="success">logIn successfully</div>';
        $_SESSION['user'] = $username;
        header('Location:'.SITEURL.'admin/index.php');
    }else{
        $_SESSION['logZAIn'] = '<div class="error">logIn failed</div>';
        header('Location:'.SITEURL.'admin/logIn/logIn.php');
    }
}







?>