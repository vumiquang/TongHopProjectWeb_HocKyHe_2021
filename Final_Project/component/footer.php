<footer>
      <nav>
        <ul>
          <li class="menu-title active"><a href="projects.php">Project</a></li>
          <?php 
                $sql = "SELECT * FROM tb_project_type";
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
        <ul>
          <li class="menu-title active"><a href="about.php">ABOUT CUBIC</a></li>
          <li><a href="about.php#about-cubic">AboutCUBIC</a></li>
            <li><a href="about.php#staff">Staff</a></li>
            <li><a href="about.php#partners">Partners</a></li>
            <li><a href="about.php#clients">Clients</a></li>
            <li><a href="about.php#download">Download</a></li>
        </ul>
        <ul>
          <li class="menu-title active"><a href="news.php">NEWS</a></li>
          <?php 
                $sql = "SELECT * FROM tb_news_type";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $name = $row['name'];
                        echo '<li><a href="news.php?type='.$id.'" >'.$name.'</a></li>';
                      }
                }
              ?>
        </ul>
        <ul class="social">
          <li class="menu-title"><a href="">Social media</a></li>
          <li class="active"><a href=""><img src="./assets/images/LinkedIn_Logo_2-p-500x133.png" alt=""></a></li>
          <li class="active"><a href="">CTBUH</a></li>
          <li class="active"><a href=""><img src="./assets/images/facebooklogo_2-p-500x127.png" alt=""></a></li>
        </ul>
        <ul>
          <li class="menu-title"><a href="">CUBIC</a></li>
          <li class="active footer-language"><span>Language:&nbsp;</span>
            <a href=""><img src="./assets/images/vietnam.png" alt=""></a>
            <a href=""><img src="./assets/images/united-kingdom.png" alt=""></a>
          </li>
          <li><a href="about.php">About us</a></li>
          <li><a href="#">Sitemap</a></li>
        </ul>
        
      </nav>
      <div class="copyright">
        <div>© 2016 –  CUBIC Architects ,. JSC  All Rights Reserved/ © 2016 – Bản quyền của Công ty Cổ phần kiến trúc Lập Phương.</div>
      <div>Designed and Powered by Chord</div>
      </div>
    </footer>