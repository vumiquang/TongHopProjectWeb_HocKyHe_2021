<?php include_once('../config/db.php');?>
<?php include_once('./file.php'); ?>
<?php include_once('./project_function.php'); ?>

<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
    }

    $idNews = $_GET['id'];
?>
<?php
if(isset($_POST['submit'])){
    $title = $_POST['name'];
    $content = $_POST['content'];
    $time = $_POST['time'];
    $uploadImg = $_FILES['image'];
    $type = $_POST['type'];

   

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
   
    $sql= "UPDATE `tb_news` SET 
    `title`='$title',
    `content`='$content',
    `time`='$time',
    id_type='$type' 
    WHERE id = $idNews;";
  
    $res = mysqli_query($conn,$sql);
    if($res)
    {
        if(!empty($fileName[0])){
            
        // lay link anh cu
        $sql = "select news_image from tb_news where id = $idNews";
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
        // xoa link anh trong project image
        $sql = " update tb_news set news_image = '$fileName[0]' where id = $idNews";
    
        $res = mysqli_query($conn,$sql);
        
            
        }

        if($res){
            $_SESSION['msg_project'] = "<script> alert('Sửa thành công')</script>";
            header('location:news.php');
        }
        else{
            $_SESSION['msg_project'] = "<script> alert('Sửa thất bại')</script>";
            header('location:news.php');
        }
        
    }
    else{
        $_SESSION['msg_project'] = "<script> alert('Sửa thất bại')</script>";
        header('location:news.php');
    }
}else{
    header('location:news.php');
}
