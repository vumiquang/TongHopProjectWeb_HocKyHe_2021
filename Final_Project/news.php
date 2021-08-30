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
    <link rel="stylesheet" href="./css/news.css" />
    <link rel="stylesheet" href="./css/hero-head.css" />
  </head>
  <body>
    <!-- Header -->
    <?php include(__DIR__.'/component/header.php')?>
    <!-- //Header -->
    <!-- Hero head -->
    <?php $hero_title = "News";include('./component/hero-head.php') ?>
    <!-- Hero head -->
    <!-- All News -->
    <section class="all-news mb-50 mt-30">
      <div class="posts">
      <?php 
              $sql = "SELECT 
              tb_news.id,
              tb_news.news_image,
              tb_news_type.name,
              tb_news.title,
              tb_news.id_type 
               FROM tb_news,tb_news_type WHERE tb_news.id_type = tb_news_type.id";
              $res = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($res);

              if($count>0)
              {
                  while($row=mysqli_fetch_assoc($res))
                  {
                      $news_id = $row['id'];
                      $news_id_type = $row['id_type'];
                      $news_img = $row['news_image'];
                      if($news_img == ""){
                        $news_img = "./assets/images/empty.png";
                      }
                      $news_type = $row['name'];
                      $news_desc = $row['title'];
                      include('./component/news-item.php');
                  }
              }
            ?>
      </div>
    </section>
    <!-- //All News -->
    <!-- Footer -->
    <?php include(__DIR__.'/component/footer.php')?>
    <!-- //Footer -->
    <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="./js/nav.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./js/news-search.js"></script>
  </body>
</html>