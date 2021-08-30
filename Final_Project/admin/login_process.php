<?php 
include('../config/db.php');
//CHeck whether the Submit Button is Clicked or NOt
if(isset($_POST['submit']))
{
    echo "step 1";
    //Process for Login
    //1. Get the Data from Login form
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    echo "step 2";
    $raw_password = $_POST['password'];
    echo "step 3";
    $password = mysqli_real_escape_string($conn, $raw_password);
    echo "step 4";
    $pwh = md5(md5($password).'vmq');
    echo "step 5";
    //2. SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM tb_account WHERE username='$username' AND password='$pwh'";
    echo "step 6";
    //3. Execute the Query
    $res = mysqli_query($conn, $sql);
    echo "step 7";
    //4. COunt rows to check whether the user exists or not
    $count = mysqli_num_rows($res);
    echo "step 8";
    if($count==1)
    {
        echo "step 9";
        //User AVailable and Login Success
        $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it
        $_SESSION['login-success'] = "login";
        echo "step 10";
        // step to HOme Page/Dashboard
        echo 'location:'.'admin/index.php';
        
        header('location:index.php');
        // http://cubicclone.unaux.com/admin/cubicclone.unaux.com/admin/index.php
        // http://cubicclone.unaux.com/admin/
        echo "step 11";
    }
    else
    {
        echo "step 12";
        //User not Available and Login FAil
        $_SESSION['login-error'] = '<div class="alert alert-danger">Tài khoản hoặc mật khẩu không đúng</div>';
        //REdirect to HOme Page/Dashboard
        header('location:login.php');
    }


}
else{
    echo "not post";
}

?>
