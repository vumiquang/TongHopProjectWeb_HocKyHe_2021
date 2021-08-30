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
    <link rel="stylesheet" href="./css/project-detail.css" />
    <link rel="stylesheet" href="./css/hero-slider.css" />
    <!-- <link rel="stylesheet" href="./assets/css/slick-theme.css" /> -->
    <link rel="stylesheet" href="./css/project.css" />
    <link rel="stylesheet" href="./assets/css/slick.css" />
  </head>
  <body>
    <!-- Header -->
    <?php include(__DIR__.'/component/header.php')?>
    <!-- //Header -->
    <?php 
    if(!isset($_GET['id'])){
      die();  
    }
    ?>
    <!-- Logo head -->
    <div class="head-logo"><a href="index.php"><img src="./assets/images/cubic_logo_dark_glow_2.png" alt="logo"></a></div>
    <!-- //Logo head -->
    
    <section class="show-project-name">
      <?php 
       $sql = "SELECT * FROM tb_project where id =".$_GET['id'];
       $res = mysqli_query($conn, $sql);
       $count = mysqli_num_rows($res);

       if($count>0)
       {
           $row=mysqli_fetch_assoc($res);
           $id = $row['id'];
           $name = $row['name'];
           $addr =$row['address'];

          echo ' <h2 class="title">'.$name.'</h2>
                <div class="address">'.$addr.'</div>';
       }
      ?>
       
    </section>
    <!-- Slider -->
    <section class="slider slider-product mb-50">
      <div class="hero">
      <?php 
 
      $sql = "SELECT * FROM tb_project_image where id_project =".$_GET['id'];
    
      $resIMG = mysqli_query($conn, $sql);
      $countIMG = mysqli_num_rows($resIMG);
      // echo "<pre>";
      // print_r($resIMG);
      // echo "</pre>";
   
      if($countIMG>0)
      {
        $dem= 1;
        $link_image = "";
          while($row=mysqli_fetch_assoc($resIMG))
          {
              $link_image = $row['link_image'];
              echo '<div class="hero-item">
                      <img src="'.$link_image.'"  />
                    </div>';
              
              $dem++;
          }
          if($dem < 3){
              echo '<div class="hero-item">
                      <img src="'.$link_image.'"  />
                    </div>';
          }
         
      }
      else{
        for($i = 1;$i <3;$i++){
          echo ' <div class="hero-item">
                  <img src="./assets/images/empty.png" alt="">
                </div>';
        }
       
      }
    ?>

   
      </div>
    </section>
    <!-- //Slider -->
    <!-- Detail -->
    <section class="project-detail-info mb-50">
        <div class="wrap-959">
          <?php 
              $sql = "SELECT * FROM tb_project_type_rel,tb_project_type where id_project =".$_GET['id']." and tb_project_type.id = tb_project_type_rel.id_type";
              $res = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($res);
              $type_project = "";
              if($count>0)
              {
                while($row=mysqli_fetch_assoc($res)){
                  $type_project .= '<a href="projects.php?type='.$row['id_type'].'">'.$row['name'].'</a>';
                }
              }
              $sql = "SELECT * FROM tb_project where id =".$_GET['id'];
              $res = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($res);

              if($count>0)
              {
                  $row=mysqli_fetch_assoc($res);
                  $id = $row['id'];

                  
                  echo '
                  <div class="info-title"><div><span>></span>Description</div></div>
                  <p class="info-desc mb-30">>>>'.$row['description'].'</p>
                  <div class="info-title"><div><span>></span>Detail</div></div>
                  <ul class="info-detail">
                      <li><span class="detail-title">Address</span><div class="detail-content">'.$row['address'].'</div></li>
                      <li><span class="detail-title">Client</span><div class="detail-content high-light"><a href="#">'.$row['client'].'</a></div></li>
                      <li><span class="detail-title">Year</span><div class="detail-content ">'.$row['year'].'</div></li>
                      <li><span class="detail-title">Type</span><div class="detail-content high-light">'.$type_project.'</div></li>
                      <li><span class="detail-title">GFA</span><div class="detail-content ">'.$row['gfa'].'m<sup>2</sup></div></li>
                      <li><span class="detail-title">Scale</span><div class="detail-content ">'.$row['scale'].'</div></li>
                  </ul>
                  ';
              }
            ?>
        </div>
    </section>
    <!-- //Detail -->
    <!-- Gallery -->
    <section class="gallery mb-50">
        <h2 class="project-title">Gallery</h2>
        <div class="projects">
        <?php 
         $sql = "SELECT * FROM tb_project_image where id_project =".$_GET['id'];
    
         $resIMG = mysqli_query($conn, $sql);
         $countIMG = mysqli_num_rows($resIMG);
        if($countIMG>0)
        {
            while($row=mysqli_fetch_assoc($resIMG))
            {
              $id = $_GET['id'];
              $item_link = 'project-detail.php?id='.$id;
              $item_img = $row['link_image'];
              $item_zoom = false;
              $item_border = "5";
              $item_radius = "3";
              $item_info = false;
              $item_address = "";
              $item_title = "";
              $item_filter = false;
              include('./component/project-item.php');
            }
        }
            ?>
        </div>
    </section>
    <!-- //Gallery -->
    <!-- Relative projects -->
    <section class="relative-project mb-80">
        <h2 class="project-title">Relative Projects</h2>
        <div class="projects">
        <?php 
            $sql = "SELECT DISTINCT tb_project.id,tb_project_image.link_image,tb_project.address,tb_project.name FROM tb_project left join tb_project_image on tb_project.id = tb_project_image.id_project where tb_project.id <> ".$_GET['id']." group by tb_project.id limit 10";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
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
    <!-- //Relative projects -->
    <!-- Footer -->
    <?php include(__DIR__.'/component/footer.php')?>
    <!-- //Footer -->
    <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="./js/nav.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- Slider script -->
    <script>
      $(document).ready(function () {
        $(".hero").slick({
          autoplay: true,
          autoplaySpeed: 3000,
          centerMode: true,
          centerPadding: '400px',
          centerMode:true,
          slidesToShow: 1,
          slidesToScroll: 1,
          nextArrow: `<span class="slick-next"><i class="fas fa-chevron-right"></i></span>`,
          prevArrow: `<span class="slick-prev"><i class="fas fa-chevron-left"></i></span>`,
        });
      });
    </script>
  </body>
</html>
