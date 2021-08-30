<?php 
$title = "Projects";
if(isset($hero_title)){
    $title = $hero_title;
}

?>


<section class="hero-head">
        <div class="head-logo"><a href="index.php"><img src="./assets/images/cubic_logo_dark_glow_2.png" alt="logo"></a></div>
        <h1 class="hero-head-title"><?php echo $title; ?></h1>
        <div class="hero-head-filter">
            <div class="filter">
                <div class="filter-type">
                    <div class="filter-name">Type</div>
                    <div class="filter-select">
                        <?php 
                        $sql = "SELECT * FROM tb_project_type";
                        if($title == "News")
                            $sql = "SELECT * FROM tb_news_type";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
        
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $name = $row['name'];
                                echo '<span class="filter-item" data-type_id="'.$id.'">
                                        <span class="icon"><i class="fas fa-plus"></i></span><span>'.$name.'</span>
                                    </span>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php 
                    if($title == "Projects"){
                ?>
                <div class="filter-type filter-status">
                    <div class="filter-name">Status</div>
                    <div class="filter-select">
                        <?php 
                        $sql = "SELECT * FROM tb_project_status";
                        if($title == "News")
                            $sql = "SELECT * FROM tb_news_type";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
        
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $name = $row['name'];
                                echo '<span class="filter-item" data-status_id="'.$id.'">
                                        <span class="icon"><i class="fas fa-plus"></i></span><span>'.$name.'</span>
                                    </span>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
                    }
                ?>


            </div>
            <div class="search"><input class="search-input text" placeholder="Search..."></input></div>
        </div>
    </section>