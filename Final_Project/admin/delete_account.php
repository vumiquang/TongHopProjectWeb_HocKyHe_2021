<?php include_once('../config/db.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
    }
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT username FROM tb_account where id = $id";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

    if($row['username'] == "admin")
    {
        $_SESSION['msg_project'] = "<script> alert('Không thể xóa tài khoản admin')</script>";
        header('location:accounts.php');
    }
    else if($row['username'] == $_SESSION['user']){
        $_SESSION['msg_project'] = "<script> alert('Tài khoản đang đăng nhập')</script>";
        header('location:accounts.php');
    }else{
        // xoa cac bai viet do nguoi dung do viet
        $sql = "DELETE FROM tb_news WHERE id_account = $id";
        $res = mysqli_query($conn,$sql);
        // xoa tk nguoi dung
        $sql = "DELETE FROM tb_account WHERE id = $id";
        $res = mysqli_query($conn,$sql);
        if($res == true){
            $_SESSION['msg_project'] = "<script> alert('Xóa thành công')</script>";
            header('location:accounts.php');
        }
    }
}else{
    header('location:accounts.php');
}
