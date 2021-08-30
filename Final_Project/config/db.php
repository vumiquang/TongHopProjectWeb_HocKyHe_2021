<?php 
    //Start Session
    session_start();

    // // Cau hinh trên host
    // define('SITEURL', 'cubicclone.unaux.com/');
    // define('LOCALHOST', 'sql100.unaux.com');
    // define('DB_USERNAME', 'unaux_29581752');
    // define('DB_PASSWORD', 'y46bsjge6nmz');
    // define('DB_NAME', 'unaux_29581752_cubic');
    

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