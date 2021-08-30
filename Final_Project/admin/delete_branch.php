<?php include_once('../config/db.php');?>
<?php include_once('./project_function.php');?>

<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
    }
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_branch WHERE id =  $id";
    $res = mysqli_query($conn,$sql);
    
    //lay anh project
    $listOldImg = getLinkImageBranch($id,$conn);
    //xoa anh
    deleteImage($listOldImg);
    if($res == true){
        $_SESSION['msg_project'] = "<script> alert('Xóa thành công')</script>";
        header('location:branch.php');
    }
    else{
        $_SESSION['msg_project'] = "<script> alert('Xóa thất bại')</script>";
        header('location:branch.php');
    }
}else{
    header('location:branch.php');
}
