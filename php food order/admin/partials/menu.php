<?php

include(".././constants/config.php");

// authorization to keep access control
include('logIn_check.php');

?>
<html>
    <head>
        <title>food order website Home page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage_admin.php">Admin</a></li>
                    <li><a href="manage_category.php">Category</a></li>
                    <li><a href="manage_food.php">Food</a></li>
                    <li><a href="manage_order.php">Order</a></li>
                    <li><a href="logIn/logOut.php">logOut</a></li>
                </ul>
            </div>
        </div>
    </body>