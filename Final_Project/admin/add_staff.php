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
    $office = $_POST['office'];

    // Kiem tra nhân viên da ton tai hay chua
    $sqlCheck = "select * from tb_staff where name = '$name' and type = '$type' and office = '$office'";
    $res = mysqli_query($conn,$sqlCheck);
    $count = mysqli_num_rows($res);
    // echo $count;
    // echo ($count == 0 ? "co" : "ko");
    // exit;
    if(!$count == 0)
   {
       echo "chay vao day";
       $_SESSION['msg_project'] = "<script> alert('Nhân viên đã tồn tại')</script>";
       header('location:form_add_staff.php');
   }else{
    //upload anh
    $fileName = [];
    $path = '../assets/images/staff';
    $listFileName = uploadFile($uploadImg,$path);
    if(empty($listFileName)){
        $_SESSION['msg_project'] = "<script> alert('Chưa chọn ảnh')</script>";
        header('location:form_add_staff.php');
        // exit;
    }else{
        foreach($listFileName as $n){
            $fileName[] = $n;
        }
    }
   
    $sql= "insert into tb_staff(`name`,`link_image`,`type`,`office`) values(
        '$name',
        '$fileName[0]',
        '$type',
        '$office'
        )";
    $res = mysqli_query($conn,$sql);


    if($res){
        $_SESSION['msg_project'] = "<script> alert('Thêm thành công')</script>";
        header('location:staff.php');
    }
    else{
        $_SESSION['msg_project'] = "<script> alert('Thêm thất bại')</script>";
        header('location:staff.php');
    }
   }
   
}else{
    header('location:staff.php');
}
