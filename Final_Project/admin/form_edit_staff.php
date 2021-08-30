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
      if(!isset($_GET['id'])){
          $_SESSION['msg_project'] = "<script> alert('Trang không tồn tài')</script>";
          header('location:staff.php');
      }
  
      $id = $_GET['id'];
      $sql = "SELECT * FROM tb_staff WHERE id = $id";
      $res = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($res);
  
     $name =$row['name'];
     $type = $row['type'];
     $office = $row['office'];
     $link_image = $row['link_image'];
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <form action="edit_staff.php?id=<?php echo $id; ?>" class="col-5" method="POST" enctype="multipart/form-data">
                <h1 class="text-center text-primary fs-1">Sửa thông tin nhân viên</h1>
                <div class="form-group">
                    <label>Tên nhân viên</label>
                    <input type="title" name="name" class="form-control" required value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label>Chức vụ</label>
                    <select class="form-control form-control-sm" name="type"  value="">
                     <option value="founder" <?php if($type == 'founder') echo 'selected'; ?>>Founder</option>
                     <option value="expert" <?php if($type == 'expert') echo 'selected'; ?>>Expert</option>
                     <option value="staff" <?php if($type == 'staff') echo 'selected'; ?>>Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Vị trí</label>
                    <input type="title" name="office" class="form-control" required value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image[]" class="form-control" accept="image/png, image/jpeg,image/jpg">
                </div>
                <div class="d-flex justify-content-between"><button type="submit" name="submit"class="btn btn-primary">Sửa</button><a href="./staff.php" class="btn btn-danger">Hủy</a></div>
            </form>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
