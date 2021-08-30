<?php include_once('../config/db.php');?>
<?php include_once('./file.php'); ?>
<?php include_once('./project_function.php'); ?>

<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
    }

    $idProject = $_GET['id'];
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
   
    $sql= "UPDATE `tb_project` SET 
    `name`='$name',
    `description`='$description',
    `address`='$address',
    `client`='$client',
    `year`='$year',
    `scale`='$scale',
    `gfa`='$gfa',
    `id_status`='$id_status' WHERE id = $idProject;";
    // echo $sql;
    // exit;
    $res = mysqli_query($conn,$sql);
    if($res)
    {
        // xoa type cu
        $sql = "delete from tb_project_type_rel where id_project = $idProject";
        $res = mysqli_query($conn,$sql);

        // cap nhat type moi
            foreach($types as $type){
                $sql= "INSERT INTO `tb_project_type_rel`(`id_project`, `id_type`) VALUES (
                    $idProject,
                    $type
                )";
                $res = mysqli_query($conn,$sql);
            }
           
        // xoa anh
        if(!empty($fileName)){// kiem tra nhap anh
            // lay link anh cu
            $listOldImg = getImageLinkProject($idProject,$conn);
            // xoa anh di
            foreach($listOldImg as $oldImg){
                unlink('.'.$oldImg);
            }
            // xoa link anh trong project image
            $sql = "delete from tb_project_image where id_project = $idProject";
            $res = mysqli_query($conn,$sql);
            // cap nhat link anh moi len
            foreach($fileName as $linkImg){
                $img = substr($linkImg,1);
                $sql= "INSERT INTO `tb_project_image`(`id_project`, `link_image`) VALUES (
                    $idProject,
                    '$img'
                )";
                $res = mysqli_query($conn,$sql);
            }

        } 
        
            if($res){
                $_SESSION['msg_project'] = "<script> alert('Sửa thành công')</script>";
                header('location:index.php');
            }
            else{
                $_SESSION['msg_project'] = "<script> alert('Sửa thất bại')</script>";
                header('location:index.php');
            }
        
    }
    else{
        $_SESSION['msg_project'] = "<script> alert('Sửa thất bại')</script>";
        header('location:index.php');
    }
}else{
         header('location:index.php');
}
