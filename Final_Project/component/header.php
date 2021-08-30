

<header>
      <nav class="nav">
        <ul class="menu">
          <li class="sticky-hidden">
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="projects.php" data-ix="dropdown-project">Project</a>
          </li>
          <li class="sticky-order">
            <a href="about.php" data-ix="dropdown-about">About</a>
          </li>
          <li class="sticky-show sticky-home"><a href="index.php"><img src="./assets/images/cubic_logo_notext_128.png"></a></li>
          <li>
            <a href="news.php" data-ix="dropdown-news">News</a>
          </li>
          <li><a href="#" class="btn-open-contact">Contact us</a></li>
        </ul>
        <div class="language d-flex">
          <a href="#"><img src="./assets/images/vietnam.png" alt="VN" /></a>
          <a href="#"
            ><img src="./assets/images/united-kingdom.png" alt="US"
          /></a>
        </div>
        <div class="dropdown-menu">
          <ul
            class="sub-menu dropdown-project active"
            style="transition: opacity 400ms ease 0s; opacity: 0; display: none"
          >
          <li><span>By project status: </span></li>
          <?php 
                $sql = "SELECT * FROM tb_project_status";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $name = $row['name'];
                        echo '<li><a href="projects.php?status='.$id.'" >'.$name.'</a></li>';
                      }
                }
              ?>
           
          </ul>
          <ul
            class="sub-menu dropdown-about"
            style="transition: opacity 400ms ease 0s; opacity: 0; display: none"
          >
            <!-- <li><span>Lsasasum.</span></li> -->
            <li><a href="about.php#about-cubic">AboutCUBIC</a></li>
            <li><a href="about.php#staff">Staff</a></li>
            <li><a href="about.php#partners">Partners</a></li>
            <li><a href="about.php#clients">Clients</a></li>
            <li><a href="about.php#download">Download</a></li>
          </ul>
          <ul
            class="sub-menu dropdown-news"
            style="transition: opacity 400ms ease 0s; opacity: 0; display: none"
          >
            <li><span>By type:</span></li>
            <?php 
                $sql = "SELECT * FROM tb_news_type";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                  
                    while($row=mysqli_fetch_assoc($res))
                    {
                      // echo '<script>  alert(0)</script>';
                        $id = $row['id'];
                        $name = $row['name'];
                        echo '<li><a href="news.php?type='.$id.'" >'.$name.'</a></li>';
                    }
                }
              ?>
          </ul>
        </div>
        <div class="toggle-menu"><a href="#"><img src="./assets/images/cubic_logo_notext_128.png" alt=""></a><span><i class="fas fa-bars"></i></span></div>
        <div class="wrap-menu-mobile">
          <ul class="menu-mobile">
            <li><a href="index.php">Home</a></li>
            <li><a href="projects.php">Projects</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="#" class="m-contact-us">Contact us</a></li>
            <li>
              <a href="#"><img src="./assets/images/vietnam.png" alt=""></a>
              <a href="#"><img src="./assets/images/united-kingdom.png" alt=""></a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="contact-us">
        <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d119181.6375282127!2d105.78506687593169!3d21.015627168587447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d21.015735!2d105.855007!5e0!3m2!1sen!2s!4v1630083120159!5m2!1sen!2s" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <div class="contact-info">
          <div class="contact-head mb-50">
            <span class="btn-close-contact">Close [x]</span>
            <img src="./assets/images/cubic_logo_notext_128.png" alt="logo">
            <div>
              <div>JOIN-STOCK COMPANY</div>
              <div style="font-size: 25px;font-weight:600;">CUBIC ARCHITECTS</div>
            </div>
          </div>
          <div class="contact-area mb-30">
            <div class="contact-title">HEADQUARTERS</div>
            <div class="branch">
              <div class="branch-addr">7th Floor - CORA Building - 24 Hoa Ma Str. - Hai Ba Trung Dist. - Hanoi - Vietnam - Postcode: 11281</div>
              <div class="branch-contact">
                <div><div class="branch-contact-title">TEL</div><div class="branch-contact-content">024 35 37 90 92</div></div>
                <div><div class="branch-contact-title">FAX</div><div class="branch-contact-content">024 35 37 90 92</div></div>
                <div><div class="branch-contact-title">EMAIL</div><div class="branch-contact-content">info@cubic.com.vn</div></div>
              </div>
            </div>
          </div>
          <div class="contact-area mb-30">
            <div class="contact-title">HEADQUARTERS</div>
            <div class="branch">
              <div class="branch-addr">7th Floor - CORA Building - 24 Hoa Ma Str. - Hai Ba Trung Dist. - Hanoi - Vietnam - Postcode: 11281</div>
              <div class="branch-contact">
                <div><div class="branch-contact-title">TEL</div><div class="branch-contact-content">024 35 37 90 92</div></div>
                <div><div class="branch-contact-title">FAX</div><div class="branch-contact-content">024 35 37 90 92</div></div>
                <div><div class="branch-contact-title">EMAIL</div><div class="branch-contact-content">info@cubic.com.vn</div></div>
              </div>
            </div>
          </div>
          <div class="contact-area mb-30">
            <div class="contact-title">
              <div class="contact-head">
                <img src="./assets/images/ForBIM-Logo-p-500x492.png" alt="logo">
                <div>
                  <div style="font-size: 13px;font-weight:400;">SUBSIDIARY</div>
                  <div style="font-size: 25px;font-weight:600;">FORBIM</div>
                </div>
              </div>
            </div>
            <div class="branch">
              <div class="branch-addr">7th Floor - CORA Building - 24 Hoa Ma Str. - Hai Ba Trung Dist. - Hanoi - Vietnam - Postcode: 11281</div>
              <div class="branch-contact">
                <div><div class="branch-contact-title">TEL</div><div class="branch-contact-content">024 35 37 90 92</div></div>
                <div><div class="branch-contact-title">FAX</div><div class="branch-contact-content">024 35 37 90 92</div></div>
                <div><div class="branch-contact-title">EMAIL</div><div class="branch-contact-content">info@cubic.com.vn</div></div>
              </div>
            </div>
          </div>
          <div class="contact-social">
            <a href="#"><img src="./assets/images/facebook_logo_black.png" alt=""></a>
            <a href="#">CTBUH</a>
            <a href="#"><img src="./assets/images/LinkedIn_Logo_black-p-1600x425.png" alt=""></a>
          </div>
        </div>
        </div>
      </div>
    
    </header>