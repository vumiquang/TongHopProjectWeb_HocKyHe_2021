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
        <h1 class="text-center">Quản lý dự án</h1>
      </div>
    <div class="container">
        <div class="search position-relative">
              <form>
                <div class="form-group">
                  <label>Tên dự án</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name_project"
                    placeholder="Tên dự án ..."
                    name="name"
                  />
                </div>
                <button type="submit" class="btn btn-primary btn-search">Tìm kiếm</button>
              </form>
              <div class="position-absolute" style="bottom: 0; right:0;"><a href="./form_add_project.php" class="btn btn-primary">Thêm dự án</a></div>
            </div>
    </div>
    <div class="container">
      <table class="table table-hover table-bordered">
        <thead>
          <tr style="background-color: #0097dd;color:#fff;">
            <th>STT</th>
            <th>Tên dự án</th>
            <th>Mô tả</th>
            <th>Địa chỉ</th>
            <th>Khách hàng</th>
            <th>Thời gian</th>
            <th>Diện tích</th>
            <th>Quy mô</th>
            <th>Loại</th>
            <th>Trạng thái</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php 
                $sql = "select 
                  tb_project.name,
                  tb_project.id,
                  tb_project.description,
                  tb_project.year,
                  tb_project.address,
                  tb_project.client,
                  tb_project.scale,
                  tb_project.gfa,
                  tb_project_status.name as status
                 from tb_project left join tb_project_status on tb_project.id_status = tb_project_status.id";
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
                        $description = $row['description'];
                        $client = $row['client'];
                        $year = $row['year'];
                        $address = $row['address'];
                        $scale = $row['scale'];
                        $gfa = $row['gfa'];
                        $status = $row['status'];
                        $link_img = getImageLinkProject($id,$conn);
                        $type = getProjectTypeName($id,$conn);
                        ?>
                        <tr>
                            <th scope="row"><?php echo $stt?></th>
                            <td><?php echo $name?></td>
                            <td><?php echo $description?></td>
                            <td><?php echo $address?></td>
                            <td><?php echo $client?></td>
                            <td><?php echo $year?></td>
                            <td><?php echo $gfa?></td>
                            <td><?php echo $scale?></td>
                            <td><?php foreach($type as $t) echo '<span class="label label-type">'.$t.'</span>';?></td>
                            <td><?php echo '<span class="label label-status">'.$status.'</span>'?></td>
                            <td><?php foreach($link_img as $img) echo ' <img src="../'.$img.'" style="height:30px;width:auto;margin-bottom:3px;">';?></td>
                            <td><a href="./form_edit_project.php?id=<?php echo $id?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                            <td><a href="./delete_project.php?id=<?php echo $id?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
        console.log(table);
        for (i = 0; i < tr.length; i++) {
            let tdName = tr[i].querySelectorAll("td")[0];
            let txtName =  tdName.textContent || tdName.innerText;
            console.log( txtName );
          
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
