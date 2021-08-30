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
    <?php include('./component/header.php'); ?>
    <?php 
     $id = $_GET['id'];
     $sql = "SELECT * FROM tb_news WHERE id = $id";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);

    $title =$row['title'];
    $content =$row['content'];
    $time =$row['time'];
    $id_type =$row['id_type'];

    ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <form action="edit_news.php?id=<?php echo $id; ?>" class="col-5" method="POST" enctype="multipart/form-data">
                <h1 class="text-center text-primary fs-1">Sửa thông tin tin tức</h1>
                <div class="form-group">
                    <label>Tên tin tức</label>
                    <input type="title" name="name" class="form-control" required value="<?php echo $title; ?>">
                </div>
                <div class="form-group">
                    <label>Nội dung</label><br>
                    <textarea id="w3review" name="content" rows="5" cols="60" value=""><?php echo $content; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Thời gian</label>
                    <input type="date" name="time" class="form-control" value="<?php echo $time; ?>" >
                </div>
                <div class="form-group">
                    <label>Loại</label>
                    <select class="form-control form-control-sm" name="type"  value="">
                        <?php 
                        $sql = "SELECT * FROM tb_news_type";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0) { $stt = 0;
                        while($row=mysqli_fetch_assoc($res)) { 
                            $id = $row['id']; 
                            $name = $row['name'];
                            ?>
                            <option value="<?php echo $id?>" <?php if($id == $id_type) echo 'selected'; ?>>
                                <?php echo $name?>
                            </option>
                        <?php }}?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image[]" class="form-control" accept="image/png, image/jpeg,image/jpg">
                </div>
                <div class="d-flex justify-content-between"><button type="submit" name="submit"class="btn btn-primary">Sửa</button><a href="./news.php" class="btn btn-danger">Hủy</a></div>
            </form>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
