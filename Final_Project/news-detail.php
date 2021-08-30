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
    <link rel="stylesheet" href="./css/news-detail.css" />
  </head>
  <body>
    <!-- Header -->
    <?php include(__DIR__.'/component/header.php')?>
    <!-- //Header -->
    <div class="head-logo"><a href="index.php"><img src="./assets/images/cubic_logo_dark_glow_2.png" alt="logo"></a></div>
    <?php 
    if(!isset($_GET['id'])){
      die();  
    }
    ?>
     <?php 
       $sql = "SELECT 
       tb_news.title,tb_news.time,tb_news.content,tb_news.news_image,tb_news_type.name,tb_account.username,tb_news_type.id as idtype
       FROM tb_news 
       left join tb_news_type on tb_news_type.id = tb_news.id_type 
       left join tb_account on tb_account.id = tb_news.id_account
       where tb_news.id =".$_GET['id'];
      
       $res = mysqli_query($conn, $sql);
       $count = mysqli_num_rows($res);

       $author = "";
        $title ="";
        $time ="";
        $content ="";
        $type = "";
        $id_type = "";
        $news_img = "";
       if($count>0)
       {
           $row=mysqli_fetch_assoc($res);
           global $author ;
          global $title ;
          global $time ;
          global $content ;
          global $type ;
          global $id_type ;
          global $img;
           $author = $row['username'];
           $title =$row['title'];
           $time =$row['time'];
           $content =$row['content'];
           $type = $row['name'];
           $id_type = $row['idtype'];
            $news_img = $row['news_image'];
       }
      ?>
    <!-- Bread-crum -->
    <div class="bread-crum mb-30">
      <div class="wrap-940">
        <div class="row">
          <a href="news.php" class="yellow-text">Cubic Architects</a> > <a href="news.php?type=<?php echo $id_type;?>" class="yellow-text"><?php echo $type; ?></a> > <span><?php echo $title; ?></span>
        </div>
      </div>
    </div>
    <!-- //Bread-crum -->
    <!-- News detail -->
    <section class="news-detail mb-50">
      <div class="wrap-940">
        <div>
          <h1 class="mb-20"><?php echo $title; ?></h1>
          <div class="news-time mb-20"><span><?php echo $time; ?></span> | by <span><?php echo $author; ?></span></div>
          <div class="news-content">
            <?php echo $content; ?>
            <div>
            <img src="<?php echo substr($news_img,1); ?>" alt="" style="width:100%;height:auto;">
            </div>
          </div>
        </div>
        <div class="col-highlight">
          <h2 class="news-title mt-80" style="padding-left: 20px;">Highlight</h2>
          <div class="posts posts-column">
          <?php 
              $sql = "SELECT 
              tb_news.id,
              tb_news.news_image,
              tb_news_type.name,
              tb_news.title
               FROM tb_news,tb_news_type WHERE tb_news.id_type = tb_news_type.id order by tb_news.time DESC limit 3";
              $res = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($res);

              if($count>0)
              {
                  while($row=mysqli_fetch_assoc($res))
                  {
                      $news_id = $row['id'];
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
        </div>
      </div>
    </section>
    <!-- //News detail -->
    <!-- Relative news -->
    <section class="relative-news mb-50">
      <div class="wrap-940">
      <div>
        <h2 class="news-title mt-80" style="padding-left: 20px;">Relative news</h2>
        <div class="posts posts-3">
        <?php 
              $sql = "SELECT 
              tb_news.id,
              tb_news.news_image,
              tb_news_type.name,
              tb_news.title
               FROM tb_news,tb_news_type WHERE tb_news.id_type = tb_news_type.id and tb_news.id <> ".$_GET['id']." limit 3";
              $res = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($res);

              if($count>0)
              {
                  while($row=mysqli_fetch_assoc($res))
                  {
                      $news_id = $row['id'];
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
      </div>
      </div>
    </section>
    <!-- //Relative news -->
    <!-- Footer -->
    <?php include(__DIR__.'/component/footer.php')?>
    <!-- //Footer -->
    <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="./js/nav.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    
  </body>
</html>