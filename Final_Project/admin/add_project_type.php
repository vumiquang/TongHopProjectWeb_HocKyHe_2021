<?php include_once('../config/db.php');?>
<?php include_once('./file.php'); ?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
    }
?>
<?php
if(isset($_POST['submit'])){
   $name = $_POST['name'];

    // Kiem tra ten da ton tai hay chua
    $sqlCheck = "select name from tb_project_type where name = '$name'";
    $res = mysqli_query($conn,$sqlCheck);
    $count = mysqli_num_rows($res);
    if(!$count == 0)
   {
       $_SESSION['msg_project'] = "<script> alert('Loại project đã tồn tại')</script>";
       header('location:form_add_project_type.php');
   }else{
    $sql= "insert into tb_project_type(`name`) values(
        '$name'
        )";
    $res = mysqli_query($conn,$sql);


    if($res){
        $_SESSION['msg_project'] = "<script> alert('Thêm thành công')</script>";
        header('location:project_type.php');
    }
    else{
        $_SESSION['msg_project'] = "<script> alert('Thêm thất bại')</script>";
        header('location:project_type.php');
    }
   }
   
    
}else{
    header('location:project_type.php');
}
