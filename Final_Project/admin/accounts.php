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

    <div class="container title">
        <h1 class="text-center">Account</h1>
      </div>
    <div class="container">
        <div class="position-relative" style="bottom: 0; right:0;"><a href="./form_add_account.php" class="btn btn-primary">Thêm tài khoản</a></div>
    </div>
    <div class="container">
      <table class="table table-hover table-bordered">
        <thead>
          <tr style="background-color: #0097dd;color:#fff;">
            <th>STT</th>
            <th>Username</th>
            <th>Đổi mật khẩu</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php 
                $sql = "SELECT * FROM tb_account";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    $stt = 0;
                    
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $stt++;
                        $id = $row['id'];
                        $username = $row['username'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $stt?></th>
                            <td><?php echo $username?></td>
                            <td><a href="./form_edit_account.php?id=<?php echo $id?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                            <td><a href="./delete_account.php?id=<?php echo $id?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
              <?php 
                    }
                }
              ?>
        </tbody>
      </table>
    </div>
    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
