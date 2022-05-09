<?php
//starting a session from here that wull not be begin until login is activated

session_start();

define('SITEURL','http://localhost/php food order/');
define('SERVER','localhost');
define('ROOT','root');
define('PASSWORD','');
define('DBNAME','food_order');



$conn = mysqli_connect(SERVER,ROOT,PASSWORD,DBNAME)  or die("failed: " . mysqli_connect_error());




?>