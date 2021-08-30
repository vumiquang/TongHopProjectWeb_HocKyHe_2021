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
        <h1 class="text-center">Quản lý thương hiệu liên kết</h1>
      </div>
    <div class="container">
        <div class="search position-relative">
              <div class="position-absolute" style="bottom: 0; right:0;"><a href="./form_add_branch.php" class="btn btn-primary">Thêm thương hiệu</a></div>
        </div>
    </div>
    <div class="container">
      <table class="table table-hover table-bordered">
        <thead>
          <tr style="background-color: #0097dd;color:#fff;">
            <th>STT</th>
            <th>Tên thương hiệu</th>
            <th>Ảnh</th>
            <th>Loại thương hiệu</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php 
                $sql = "select * from tb_branch";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    $stt = 0;
                    
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $stt++;
                        $id = $row['id'];
                        $name = $row['name'];
                        $img = $row['link_image'];
                        $type = $row['type'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $stt?></th>
                            <td><?php echo $name?></td>
                            <td><?php echo '<img src="'.$img.'" style="height:30px;width:auto;margin-bottom:3px;"> '?></td>
                            <td><?php echo '<span class="label '.($type == 0 ? 'label-type':'label-status').'">'.($type == 0 ? 'partner':'client').'</span>'?></td>
                            <td><a href="./form_edit_branch.php?id=<?php echo $id?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                            <td><a href="./delete_branch.php?id=<?php echo $id?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
    <script>
    const btnSearch  = document.querySelector(".btn-search");
   
    btnSearch.addEventListener('click',search);
    function search(e){
        e.preventDefault();

        let inputName = document.querySelector("input[name=name]").value.toUpperCase();
      
        let table = document.getElementById("myTable");
        let tr = table.getElementsByTagName("tr");
        // console.log(table);
        for (i = 0; i < tr.length; i++) {
            let r1 = tr[i].querySelectorAll("td")[0];
            let r2 = tr[i].querySelectorAll("td")[1];
            let r3 = tr[i].querySelectorAll("td")[2];
            let r4 = tr[i].querySelectorAll("td")[3];
            let txt1 =  r1.textContent || r1.innerText;
            let txt2 =  r2.textContent || r2.innerText;
            let txt3 =  r3.textContent || r3.innerText;
            let txt4 =  r4.textContent || r4.innerText;

            let txtName = txt1.concat(txt2,txt3,txt4);
        //  console.log( txtName );
            if ( txtName.toUpperCase().indexOf(inputName) > -1) {
                tr[i].style.display = "";
                console.log(1);
            } else {
                console.log(2);
                tr[i].style.display = "none";
            }
        }
    }
    </script>
  </body>
</html>
