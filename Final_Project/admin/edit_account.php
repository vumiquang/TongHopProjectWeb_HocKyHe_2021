<?php include_once('../config/db.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
    }
?>
<?php
if(isset($_POST['submit'])){
   $password = $_POST['password'];
   $repassword = $_POST['repassword'];
   $oldpassword = $_POST['oldpassword'];
    $id = $_GET['id'];
   $pwh=md5(md5($oldpassword).'vmq');

   //Kiem tra mat khau cu da dung chua
   $sqlCheck = "select * from tb_account where id = $id and password='$pwh'";
   $res = mysqli_query($conn,$sqlCheck);
   $count = mysqli_num_rows($res);

   if($count != 1)
   {   
       $_SESSION['msg_project'] = "<script> alert('Mật khẩu cũ không đúng')</script>";
       header('location:form_edit_account.php?id='.$id);
   }else{
        // Kiem tra mk moi va cu co trung nhau
        if($password !== $repassword){
            $_SESSION['msg_project'] = "<script> alert('Mật khẩu mới không trùng nhau')</script>";
            header('location:form_edit_account.php?id='.$id);
        }else{
            $pwh = md5(md5($password).'vmq');
            $sql = "update  `tb_account` set `password`='$pwh' where id = $id";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                $_SESSION['msg_project'] = "<script> alert('Đổi mật khẩu thành công')</script>";
                header('location:accounts.php');
            }
        }
   }
}
else{
    header('location:accounts.php');
}
