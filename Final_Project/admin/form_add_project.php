<?php include_once('../config/db.php');?>
<?php include_once('project_function.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:login.php');
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
    <?php include('./component/header.php'); 
      if(isset($_SESSION['msg_project'])){
        echo $_SESSION['msg_project'];
        unset($_SESSION['msg_project']);
      }
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <form action="add_project.php" class="col-5" method="POST" enctype="multipart/form-data">
                <h1 class="text-center text-primary fs-1">Thêm dự án</h1>
                <div class="form-group">
                    <label>Tên dự án</label>
                    <input type="text" name="name" class="form-control" required >
                </div>
                <div class="form-group">
                    <label>Mô tả</label><br>
                    <textarea id="w3review" name="description" rows="4" cols="50"></textarea>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control"  >
                </div>
                <div class="form-group">
                    <label>Khách hàng</label>
                    <input type="text" name="client" class="form-control"  >
                </div>
                <div class="form-group">
                    <label>Thời gian</label>
                    <input type="text" name="year" class="form-control"  >
                </div>
                <div class="form-group">
                    <label>Quy mô</label>
                    <input type="text" name="scale" class="form-control"  >
                </div>
                <div class="form-group">
                    <label>Diện tích</label>
                    <input type="text" name="gfa" class="form-control"  >
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="id_status" value="">
                        <?php 
                        $sql = "SELECT * FROM tb_project_status";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0) { $stt = 0;
                        while($row=mysqli_fetch_assoc($res)) { 
                            $id = $row['id']; 
                            $name = $row['name'];
                            ?>
                            <option value="<?php echo $id?>">
                                <?php echo $name?>
                            </option>
                        <?php }}?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Loại</label>
                    <select class="form-control form-control-sm" name="type[]" multiple value="">
                        <?php 
                        $sql = "SELECT * FROM tb_project_type";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0) { $stt = 0;
                        while($row=mysqli_fetch_assoc($res)) { 
                            $id = $row['id']; 
                            $name = $row['name'];
                            ?>
                            <option value="<?php echo $id?>">
                                <?php echo $name?>
                            </option>
                        <?php }}?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image[]" class="form-control" multiple accept="image/png, image/jpeg,image/jpg">
                </div>
                <div class="d-flex justify-content-between"><button type="submit" name="submit"class="btn btn-primary">Thêm</button><a href="./index.php" class="btn btn-danger">Hủy</a></div>
            </form>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
