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
    
    <script src="./assets/js/font-awesome.min.js"></script>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/about.css" />
    <link rel="stylesheet" href="./assets/css/slick.css" />

  </head>
  <body>
    <!-- Header -->
    <?php include(__DIR__.'/component/header.php')?>
    <!-- //Header -->
    <!-- Hero -->
    <section class="about-hero">
        <div class="head-logo"><a href="index.php"><img src="./assets/images/cubic_logo_dark_glow_2.png" alt="logo"></a></div>
       <div class="hero-title">
        <div>We are</div>
        <div>Cubic architects</div>
       </div>
    </section>
    <!-- //Hero -->
    <!-- Company -->
    <section class="about-company" id="about-cubic">
        <div class="wrap-940">
            <div class="row">
                <div class="cpn-img"><img src="./assets/images/cubic_logo_white_green-p-500x285.png" alt=""></div>
                <div class="cpn-content">
                    <p>At CUBIC, our primary goal is creating high-rise buildings with comfortable living environments answering human, social, cultural and climatic needs. We are proud of being the first Vietnamese architecture firm joining the Council on Tall Buildings and Urban Habitat (CTBUH). Currently, more than 30 from mid to large-scale high-rise buildings designed by CUBIC have been built in Hanoi.</p>
                    <p>CUBIC Architects established the head office in Hanoi in 2004, followed by an expansion of branch office in Ho Chi Minh City in 2009. Our team of experts has a thorough understanding of architectural features and a wide knowledge of architectural design criteria in Vietnam. In 2016, CUBIC opened a subsidiary named ForBIM, in order to approach global trends in BIM research.</p>
                </div>
            </div>
            <h1 class="about-title"><div class="line"></div><span class="background: #292929;">SUBSIDIARY</span><div class="line"></div></h1>
            <div class="row">
                <div class="cpn-img"><img src="./assets/images/ForBIM-Logo-p-500x492.png" alt=""></div>
                <div class="cpn-content">
                    <p class="cpn-title">ForBIM</p>
                    <p>
                    The Building Information Modeling (BIM) have become a global trend. It helps to make more informed design decisions, build more efficiently and cost-effectively, and manage and maintain buildings. Therefore, ForBIM was established in 2016 in order to provide professional and state-of-the-art BIM services, that able to meet high demands from design firms and contractors.
                    </p>
                    <p><a href="#">ForBim Website</a></p>
                </div>
            </div>
            <h1 class="about-title"><div class="line"></div><span class="background: #292929;">Work-area</span><div class="line"></div></h1>
            <div class="row row-wa">
                <div>
                    <div class="wa-title">Design</div>
                    <div class="wa-desc">Architectural design (Specialized in High-rise segment)</div>
                </div>
                <div>
                    <div class="wa-title">Design</div>
                    <div class="wa-desc">Urban planning</div>
                </div>
                <div>
                    <div class="wa-title">Design</div>
                    <div class="wa-desc">Structural design</div>
                </div>
                <div>
                    <div class="wa-title">Design</div>
                    <div class="wa-desc">Interior design</div>
                </div>
                <div>
                    <div class="wa-title">Design</div>
                    <div class="wa-desc">Landscape Design</div>
                </div>
                <div>
                    <div class="wa-title">Consult</div>
                    <div class="wa-desc">Invesment Consulting</div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Company -->
    <!-- Philosophy -->
    <section class="about-philosophy">
        <div class="wrap-940">
            <h1>Philosophy</h1>
           <div class="philosophy-content">
           <p>CUBIC is the shape of the most basic but important object. It contains not only technical and artistic values but also humanity values.
                 The shape of a cube shows the space structure of architecture and the technical accuracy.
            </p>
            <p>Finally, we also know that a cube is developed from a square, to which, according to Eastern philosophy, humans are well connected.
            </p>
            <p>This thought of ours about the cube is also our main philosophy when we research for solutions in designing our projects, which is:
            </p>
           </div>

           <div class="philosophy-slider">
               <div>Practical and accuracy in technical solution</div>
               <div>Practical and accuracy in technical solution</div>
               <div>Practical and accuracy in technical solution</div>
           </div>
        </div>
    </section>
    <!-- //Philosophy -->
    <!-- Staff -->
    <section class="staff" id="staff">
        <div class="wrap-940">
            <div class="staff-head">
                <h1>STAFF</h1>
                <div class="quote">
                    <q>"I believe that the way people live can be directed a little by architecture."  </q>
                    <br><br>
                    <span>-  Tadao Ando -</span>
                </div>
            </div>
            <div class="staff-list">
                <h1 class="about-title"><div class="line"></div><span class="background: #292929;">LEADERS</span><div class="line"></div></h1>
                <div class="row about-bio-leader">
                    <?php 
                     $sql = "SELECT * FROM tb_staff";
                     $res = mysqli_query($conn, $sql);
                     $count = mysqli_num_rows($res);
                     $res1 = $res;
                       if($count>0)
                       {
                         while($row=mysqli_fetch_assoc($res))
                         {
                             if($row['type'] == "founder")
                                echo '
                                <div class="avatar-div avatar-leader">
                                    <div class="avatar-img" style="background-image: url('.substr($row['link_image'],1).');"></div>
                                    <div class="avatar-name">'.$row['name'].'</div>
                                    <div class="avatar-title">Founder</div>
                                    <div class="avatar-office">'.$row['office'].'</div>
                                </div>
                                ';
                         }
                      }
                    ?>
                </div>
                <h1 class="about-title"><div class="line"></div><span class="background: #292929;">EXPERTS</span><div class="line"></div></h1>
                <div class="row about-bio-expert">
                <?php 
                 $sql = "SELECT * FROM tb_staff";
                 $res = mysqli_query($conn, $sql);
                 $count = mysqli_num_rows($res);
                 $res1 = $res;
                if($count>0)
                       {
                         while($row=mysqli_fetch_assoc($res))
                         {
                             if($row['type'] == "expert")
                                echo '
                                <div class="avatar-div avatar-expert">
                                    <div class="avatar-img" style="background-image: url('.substr($row['link_image'],1).');"></div>
                                    <div class="avatar-name">'.$row['name'].'</div>
                                    <div class="avatar-office">'.$row['office'].'</div>
                                </div>
                                ';
                         }
                      }
                ?>
                </div>
                <div class="line"></div>
                <div class="row about-bio-staff">
                <?php 
                 $sql = "SELECT * FROM tb_staff";
                 $res = mysqli_query($conn, $sql);
                 $count = mysqli_num_rows($res);
                 $res1 = $res;
                if($count>0)
                       {
                         while($row=mysqli_fetch_assoc($res))
                         {
                             if($row['type'] == "staff")
                                echo '
                                <div class="avatar-div">
                                    <div class="avatar-img" style="height:180px;background-image: url('.substr($row['link_image'],1).');"></div>
                                    <div class="avatar-name">'.$row['name'].'</div>
                                    <div class="avatar-office">'.$row['office'].'</div>
                                </div>
                                ';
                         }
                      }
                ?>
                </div>
            </div>
        </div>
    </section>
    <!-- //Staff -->
    <div class="line"></div>
    <!-- Partner -->
    <section class="partner" id="partners">
        <div class="wrap-940">
            <h1 class="about-title"><div class="line"></div><span class="background: #292929;">PARTNERS</span><div class="line"></div></h1>
            <div class="row">
            <?php 
                 $sql = "SELECT * FROM tb_branch";
                 $res = mysqli_query($conn, $sql);
                 $count = mysqli_num_rows($res);
                 $res1 = $res;
                if($count>0)
                       {
                         while($row=mysqli_fetch_assoc($res))
                         {
                             if($row['type'] == 0)
                                echo '
                                <span  class="partner-item" style="background:url(\''.substr($row['link_image'],1).'\');
                                background-position: center center;
                                background-repeat: no-repeat;
                                background-size: contain;"></span>
                                ';
                         }
                      }
                ?>
            
            </div>
        </div>
    </section>
    <!-- //Partner -->
    <!-- Client -->
    <section class="client" style="padding-top: 0px;" id="clients">
        <div class="wrap-940">
            <h1 class="about-title"><div class="line"></div><span class="background: #292929;">clientS</span><div class="line"></div></h1>
            <div class="row">
            <?php 
                 $sql = "SELECT * FROM tb_branch";
                 $res = mysqli_query($conn, $sql);
                 $count = mysqli_num_rows($res);
                 $res1 = $res;
                if($count>0)
                       {
                         while($row=mysqli_fetch_assoc($res))
                         {
                             if($row['type'] == 1)
                                echo '
                                <span  class="client-item" style="background:url(\''.substr($row['link_image'],1).'\');
                                background-position: center center;
                                background-repeat: no-repeat;
                                background-size: contain;"></span>
                                ';
                         }
                      }
                ?>
            </div>
        </div>
    </section>
    <!-- //Client -->
    <!-- Profile download -->
    <section class="profile" id="download">
            <div>
                <a href="./assets/images/cubic_logo_white_green-p-500x285.png" download><img src="./assets/images/download-icon.png" alt="#"></a>
                <div>DOWNLOAD CUBIC PROFILE</div>
            </div>
    </section>
    <!-- //Profile download -->
    <!-- Footer -->
    <?php include(__DIR__.'/component/footer.php')?>
    <!-- //Footer -->
    <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="./js/nav.js"></script>
    <script src="./assets/js/slick.min.js"></script>
     <!-- Slider script -->
     <script>
      $(document).ready(function () {
        $(".philosophy-slider").slick({
          autoplay: true,
          autoplaySpeed: 1000,
          nextArrow: `<span class="slick-next"><i class="fas fa-chevron-right"></i></span>`,
          prevArrow: `<span class="slick-prev"><i class="fas fa-chevron-left"></i></span>`,
          dots:true,
          customPaging: function(slider, i) {
      // this example would render "tabs" with titles
            return '<span class="dot"></span>';
            }
        });
      });
    </script>
  </body>
</html>