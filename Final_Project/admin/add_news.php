<?php include_once('../config/db.php');?>
<?php include_once('./file.php'); ?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
    }
?>
<?php
if(isset($_POST['submit'])){
   $title = $_POST['name'];
   $content = $_POST['content'];
   $time = $_POST['time'];
   $uploadImg = $_FILES['image'];
    $type = $_POST['type'];

    $sql = "select id from tb_account where username = '".$_SESSION['user']."'";
    $res = mysqli_query($conn,$sql);
    $id_account = mysqli_fetch_assoc($res)['id'];
//    echo '<br>'.$name;
//    echo '<br>'.$description;
//    echo '<br>'.$address;
//    echo '<br>'.$client;
//    echo '<br>'.$year;
//    echo '<br>'.$scale;
//    echo '<br>'.$gfa;
//    echo '<br>'.$id_status;
//    echo '<pre>';
//    var_dump($type) ;
//    echo '</pre>';
//    die();
    $fileName = [];
    $path = '../assets/images/news';
    $listFileName = uploadFile($uploadImg,$path);
    if(empty($listFileName)){
        $_SESSION['msg_project'] = "<script> alert($errors)</script>";
        header('location:index.php');
        // exit;
    }else{
        foreach($listFileName as $n){
            $fileName[] = $n;
        }
    }
   
    $sql= "INSERT INTO `tb_news`( `title`, `time`, `content`, `id_type`, `id_account`, `news_image`) VALUES (
        '$title',
        '$time',
        '$content',
        $type,
        $id_account,
        '$fileName[0]'
        )";
//   echo $sql;
//   exit;
    $res = mysqli_query($conn,$sql);


    if($res){
        $_SESSION['msg_project'] = "<script> alert('Thêm thành công')</script>";
        header('location:news.php');
    }
    else{
        $_SESSION['msg_project'] = "<script> alert('Thêm thất bại')</script>";
        header('location:news.php');
    }
}else{
    header('location:news.php');
}
