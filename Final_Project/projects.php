<?php 
  require_once('./config/db.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link
      rel="shortcut icon"
      href="./assets/images/cubicfavicon.png"
      type="image/x-icon"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=vietnamese"
      rel="stylesheet"
    />
    <script src="./assets/js/font-awesome.min.js"></script>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/hero-head.css" />
    <link rel="stylesheet" href="./css/project.css" />
  </head>
  <body>
    <!-- Header -->
    <?php include(__DIR__.'/component/header.php')?>
    <!-- //Header -->
    <!-- Hero head -->
    <?php $hero_title="Projects" ?>
    <?php include('./component/hero-head.php') ?>
    <!-- Hero head -->
    <!-- All projects -->
    <section class="all-projects mb-50">
    <div class="projects">
      <?php 
            $sql = "SELECT DISTINCT tb_project.id,tb_project_image.link_image,tb_project.address,tb_project.name  FROM tb_project left join tb_project_image on tb_project.id = tb_project_image.id_project group by tb_project.id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            // echo $sql;
            if($count>0)
            { 
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $item_link = 'project-detail.php?id='.$id;
                    $item_img = $row['link_image'];
                    if($item_img == ""){
                      $item_img = "./assets/images/empty.png";
                    } 
                    $item_zoom = false;
                    $item_border = "5";
                    $item_radius = "3";
                    $item_info = "true";
                    $item_address = $row['address'];
                    $item_title = $row['name'];
                    $item_filter = true;
                    
                    include('./component/project-item.php');
                }
            }
          ?>
      </div>
    </section>
    <!-- //All projects -->
    <!-- Footer -->
    <?php include(__DIR__.'/component/footer.php')?>
    <!-- //Footer -->
    <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="./js/nav.js"></script>    
    <script src="./js/projects-search.js"></script>
  </body>
</html>