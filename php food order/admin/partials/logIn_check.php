<?php

if (!isset($_SESSION['user'])){
    // not logged in--> redirected to logIn again
    $_SESSION['no_logIn'] = '<div class="error">please log in to access admin panel</div>';
    header('Location:'.SITEURL.'admin/logIn/logIn.php');
}



?>