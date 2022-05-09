<?php
include('../../constants/config.php');
// destroy all sessions
session_destroy();

// redirect to logIn page
header('Location:'.SITEURL.'admin/logIn/logIn.php');


?>