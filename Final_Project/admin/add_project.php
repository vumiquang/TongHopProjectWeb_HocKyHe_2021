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
   $description = $_POST['description'];
   $address = $_POST['address'];
   $client = $_POST['client'];
   $year = $_POST['year'];
   $scale = $_POST['scale'];
   $gfa = $_POST['gfa'];
   $id_status = $_POST['id_status'];
   $uploadImg = $_FILES['image'];
    $types = $_POST['type'];

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
    $path = '../assets/images/project';
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
   
    $sql= "INSERT INTO `tb_project`(`name`, `description`, `address`, `client`, `year`, `scale`, `gfa`, `id_status`) VALUES (
        '$name','$description','$address','$client','$year','$scale','$gfa',$id_status
        )";
    // echo $sql;
    // exit;
    $res = mysqli_query($conn,$sql);
    if($res)
    {
        $sql= "select id from tb_project order by id desc limit 1";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        $idProject = mysqli_fetch_assoc($res)['id'];  
        
        if($count == true){
            foreach($types as $type){
                $sql= "INSERT INTO `tb_project_type_rel`(`id_project`, `id_type`) VALUES (
                    $idProject,
                    $type
                )";
                $res = mysqli_query($conn,$sql);

            }
           
            foreach($fileName as $linkImg){
                $img = substr($linkImg,1);
                $sql= "INSERT INTO `tb_project_image`(`id_project`, `link_image`) VALUES (
                    $idProject,
                    '$img'
                )";
                $res = mysqli_query($conn,$sql);
            }
          
            if($res){
                $_SESSION['msg_project'] = "<script> alert('Thêm thành công')</script>";
                header('location:index.php');
            }
            else{
                $_SESSION['msg_project'] = "<script> alert('Thêm thất bại')</script>";
                header('location:index.php');
            }
        }
    }
    else{
        $_SESSION['msg_project'] = "<script> alert('Thêm thất bại')</script>";
                header('location:index.php');
    }
}
else{
                header('location:index.php');
}