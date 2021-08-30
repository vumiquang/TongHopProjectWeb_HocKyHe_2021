<?php include_once('../config/db.php');?>
<?php include_once('./file.php'); ?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
    }
?>
<?php
if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $password = $_POST['password'];
   $repassword = $_POST['repassword'];
 

   // Kiem tra mk moi va cu co trung nhau
   if($password !== $repassword){
    $_SESSION['msg_project'] = "<script> alert('Mật khẩu mới không trùng nhau')</script>";
    header('location:form_add_account.php');
   }else{

   // Kiem tra tai khoan da ton tai hay chua
   $sqlCheck = "select * from tb_account where username = '$username'";
   $res = mysqli_query($conn,$sqlCheck);
   $count = mysqli_num_rows($res);

   if($count==1)
   {
       $_SESSION['msg_project'] = "<script> alert('Tài khoản đã tồn tại')</script>";
       header('location:form_add_account.php');
   }
   else{
       $pwh = md5(md5($password).'vmq');
       $sql = "INSERT INTO `tb_account`( `username`, `password`) VALUES ('$username','$pwh')";
       $res = mysqli_query($conn,$sql);
       if($res == true){
           $_SESSION['msg_project'] = "<script> alert('Thêm tài khoản thành công')</script>";
           header('location:accounts.php');
        }
    }
}
}else{
    header('location:accounts.php');

}
