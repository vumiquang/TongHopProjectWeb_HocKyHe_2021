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
   $uploadImg = $_FILES['image'];
    $type = $_POST['type'];

    // Kiem tra thương hiệu da ton tai hay chua
    $sqlCheck = "select * from tb_branch where name = '$name' and type = $type";
    $res = mysqli_query($conn,$sqlCheck);
    $count = mysqli_num_rows($res);
    if($count==1)
   {
       $_SESSION['msg_project'] = "<script> alert('Thương hiệu đã tồn tại')</script>";
       header('location:form_add_branch.php');
   }
   //upload anh
    $fileName = [];
    $path = '../assets/images/branch';
    $listFileName = uploadFile($uploadImg,$path);
    if(empty($listFileName)){
        $_SESSION['msg_project'] = "<script> alert('Chưa chọn ảnh')</script>";
        header('location:form_add_branch.php');
        // exit;
    }else{
        foreach($listFileName as $n){
            $fileName[] = $n;
        }
    }
   
    $sql= "insert into tb_branch(`name`,`link_image`,`type`) values(
        '$name',
        '$fileName[0]',
        $type
        )";
    $res = mysqli_query($conn,$sql);


    if($res){
        $_SESSION['msg_project'] = "<script> alert('Thêm thành công')</script>";
        header('location:branch.php');
    }
    else{
        $_SESSION['msg_project'] = "<script> alert('Thêm thất bại')</script>";
        header('location:branch.php');
    }
}else{
    header('location:branch.php');
}
