<?php 
    //Start Session
    session_start();

   
    // Cau hinh local hót 
    define('SITEURL', 'http://localhost/cubic/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'database_cubic');


    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //Database Connection
    mysqli_set_charset($conn, 'UTF8');// Lay dư lieu theo kieu utf-8
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //SElecting Database


?>
