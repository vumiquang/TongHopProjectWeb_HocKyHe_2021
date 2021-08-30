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
    <title>Cubic</title>
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
            <form action="add_staff.php" class="col-5" method="POST" enctype="multipart/form-data">
                <h1 class="text-center text-primary fs-1">Thêm nhân viên</h1>
                <div class="form-group">
                    <label>Tên nhân viên</label>
                    <input type="title" name="name" class="form-control" required >
                </div>
                <div class="form-group">
                    <label>Chức vụ</label>
                    <select class="form-control form-control-sm" name="type"  value="">
                     <option value="founder">Founder</option>
                     <option value="expert">Expert</option>
                     <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Vị trí</label>
                    <input type="title" name="office" class="form-control" required >
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image[]" class="form-control" accept="image/png, image/jpeg,image/jpg">
                </div>
                <div class="d-flex justify-content-between"><button type="submit" name="submit"class="btn btn-primary">Thêm</button><a href="./staff.php" class="btn btn-danger">Hủy</a></div>
            </form>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
