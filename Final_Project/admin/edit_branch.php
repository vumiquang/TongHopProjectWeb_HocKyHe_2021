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
   $uploadImg = $_FILES['image'];
    $id = $_GET['id'];

   //Kiem tra co thuong hieu trung hay khong
   $sqlCheck = "select * from tb_branch where id = $id and name='$name' and type = $type";
   $res = mysqli_query($conn,$sqlCheck);
   $count = mysqli_num_rows($res);

   if($count == 1)
   {   
       $_SESSION['msg_project'] = "<script> alert('Thương hiệu đã có')</script>";
       header('location:form_edit_branch.php?id='.$id);
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

    $sql= "UPDATE `tb_branch` SET 
    `name`='$name',
    `type`=$type
    WHERE id = $id;";
    $res = mysqli_query($conn,$sql);
    if($res == true){
        if(!empty($fileName[0])){
            // lay link anh cu
            $sql = "select link_image from tb_branch where id = $id";
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
            $sql = " update tb_branch set link_image = '$fileName[0]' where id = $id";
        
            $res = mysqli_query($conn,$sql);
            
        }

        $_SESSION['msg_project'] = "<script> alert('Sửa thành công')</script>";
        header('location:branch.php');
    }else{
        $_SESSION['msg_project'] = "<script> alert('Có lỗi xảy ra')</script>";
        header('location:branch.php');
    }   
   }
}
else{
    header('location:branch.php');
}
