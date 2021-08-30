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

    //xoa lien ket voi project
    $sql = "DELETE FROM tb_project_type_rel WHERE id_type =  $id";
    $res = mysqli_query($conn,$sql);
    
    //xoa project type
    $sql = "DELETE FROM tb_project_type WHERE id =  $id";
    $res = mysqli_query($conn,$sql);

    if($res == true){
        $_SESSION['msg_project'] = "<script> alert('Xóa thành công')</script>";
        header('location:project_type.php');
    }
    else{
        $_SESSION['msg_project'] = "<script> alert('Xóa thất bại')</script>";
        header('location:project_type.php');
    }
}else{
    header('location:project_type.php');
}
