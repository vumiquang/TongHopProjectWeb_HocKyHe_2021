<?php include_once('../config/db.php');?>
<?php include_once('project_function.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
    }

    
    if(!isset($_GET['id'])){
        $_SESSION['msg_project'] = "<script> alert('không tìm thấy id')</script>";
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý dự án</title>
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="../assets/js/font-awesome.min.js"></script>
    <style>
      table select.form-control {
        display: unset;
        width: unset;
      }
    </style>
  </head>
  <body>
    <?php include('./component/header.php'); ?>
    <?php 
     $id = $_GET['id'];
     $sql = "SELECT * FROM tb_project WHERE id = $id";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);

    $name =$row['name'];
    $description =$row['description'];
    $address =$row['address'];
    $client =$row['client'];
    $year =$row['year'];
    $scale =$row['scale'];
    $gfa =$row['gfa'];
    $id_status =$row['id_status'];
    $uploadImg = getImageLinkProject($id,$conn);
    $types = getProjectTypeName($id,$conn);

//    echo '<br>'.$name;
//    echo '<br>'.$description;
//    echo '<br>'.$address;
//    echo '<br>'.$client;
//    echo '<br>'.$year;
//    echo '<br>'.$scale;
//    echo '<br>'.$gfa;
//    echo '<br>'.$id_status;
//    echo '<pre>';
//    var_dump($uploadImg) ;
//    var_dump($types) ;
//    echo '</pre>';
//    die();
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <form action="edit_project.php?id=<?php echo $id; ?>" class="col-5" method="POST" enctype="multipart/form-data">
                <h1 class="text-center text-primary fs-1">Sửa dự án</h1>
                <div class="form-group">
                    <label>Tên dự án</label>
                    <input type="text" name="name" class="form-control" required value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label>Mô tả</label><br>
                    <textarea id="w3review" name="description" rows="4" cols="50" value=""><?php echo $description; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control"  value="<?php echo $address; ?>">
                </div>
                <div class="form-group">
                    <label>Khách hàng</label>
                    <input type="text" name="client" class="form-control" value="<?php echo $client; ?>" >
                </div>
                <div class="form-group">
                    <label>Thời gian</label>
                    <input type="text" name="year" class="form-control"  value="<?php echo $year; ?>">
                </div>
                <div class="form-group">
                    <label>Quy mô</label>
                    <input type="text" name="scale" class="form-control"  value="<?php echo $scale; ?>">
                </div>
                <div class="form-group">
                    <label>Diện tích</label>
                    <input type="text" name="gfa" class="form-control"  value="<?php echo $gfa; ?>">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="id_status" value="<?php echo $id_status; ?>">
                        <?php 
                        $sql = "SELECT * FROM tb_project_status";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0) { $stt = 0;
                        while($row=mysqli_fetch_assoc($res)) { 
                            $id = $row['id']; 
                            $name = $row['name'];
                            ?>
                            <option value="<?php echo $id?>" <?php if($id == $id_status) echo 'selected'; ?>>
                                <?php echo $name?>
                            </option>
                        <?php }}?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Loại</label>
                    <select class="form-control form-control-sm" name="type[]" multiple >
                        <?php 
                        $sql = "SELECT * FROM tb_project_type";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0) { $stt = 0;
                        while($row=mysqli_fetch_assoc($res)) { 
                            $id = $row['id']; 
                            $name = $row['name'];
                            ?>
                            <option value="<?php echo $id?>" <?php foreach($types as $type){if($name == $type) echo 'selected';} ?>>
                                <?php echo $name?>
                            </option>
                        <?php }}?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image[]" class="form-control" multiple accept="image/png, image/jpeg,image/jpg">
                </div>
                <div class="d-flex justify-content-between"><button type="submit" name="submit"class="btn btn-primary">Sửa</button><a href="./index.php" class="btn btn-danger">Hủy</a></div>
            </form>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
