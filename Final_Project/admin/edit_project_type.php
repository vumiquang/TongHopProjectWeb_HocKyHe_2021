<?php include_once('../config/db.php');?>
<?php include_once('./file.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
    }
?>
<?php
if(isset($_POST['submit'])){
   $name = $_POST['name'];
    $id = $_GET['id'];

   //Kiem tra type trung hay khong
   $sqlCheck = "select * from tb_project_type where id <> $id and name='$name'";
   $res = mysqli_query($conn,$sqlCheck);
   $count = mysqli_num_rows($res);

   if($count == 1)
   {   
       $_SESSION['msg_project'] = "<script> alert('Loại project đã có')</script>";
       header('location:form_edit_project_type.php?id='.$id);
   }else{
    $sql= "UPDATE `tb_project_type` SET 
    `name`='$name'
    WHERE id = $id;";
    $res = mysqli_query($conn,$sql);
    if($res == true){

        $_SESSION['msg_project'] = "<script> alert('Sửa thành công')</script>";
        header('location:project_type.php');
    }else{
        $_SESSION['msg_project'] = "<script> alert('Có lỗi xảy ra')</script>";
        header('location:project_type.php');
    }   
   }
}
else{
    header('location:project_type.php');
}
