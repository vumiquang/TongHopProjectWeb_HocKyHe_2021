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
   $type = $_POST['type'];
   $office = $_POST['office'];
   $uploadImg = $_FILES['image'];
    $id = $_GET['id'];

   // Kiem tra nhân viên da ton tai hay chua
   $sqlCheck = "select * from tb_staff where name = '$name' and type = '$type' and office = '$office' and id <> $id";
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
    $fileName = [];
    $path = '../assets/images/branch';
    $listFileName = uploadFile($uploadImg,$path);
    if(empty($listFileName)){
        $_SESSION['msg_project'] = "<script> alert($errors)</script>";
        header('location:branch.php');
        // exit;
    }else{
        foreach($listFileName as $n){
            $fileName[] = $n;
        }
    }

    $sql= "UPDATE `tb_staff` SET 
    `name`='$name',
    `type`='$type',
    `office` = '$office' 
    WHERE id = $id;";
    $res = mysqli_query($conn,$sql);

    if($res == true){
        if(!empty($fileName[0])){
            // lay link anh cu
            $sql = "select link_image from tb_staff where id = $id";
            // echo $sql;
            // exit;
            $res = mysqli_query($conn,$sql);
            $oldImg =  mysqli_fetch_assoc($res)['news_image'];
            // echo $oldImg;
            // exit;
            // xoa anh di
            // foreach($listOldImg as $oldImg){
                unlink('.'.$oldImg);
            // }
            // update link anh trong branch image
            $sql = " update tb_staff set link_image = '$fileName[0]' where id = $id";
        
            $res = mysqli_query($conn,$sql);
            
        }

        $_SESSION['msg_project'] = "<script> alert('Sửa thành công')</script>";
        header('location:staff.php');
    }else{
        $_SESSION['msg_project'] = "<script> alert('Có lỗi xảy ra')</script>";
        header('location:staff.php');
    }  
  }
}
else{
    header('location:staff.php');
}
