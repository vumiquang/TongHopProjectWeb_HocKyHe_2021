<?php 
$id = "#";
$img = "./assets/images/posts/post1.jpg";
$type = "News";
$desc = "Binh dinh";
$id_type = "";
if(isset($news_id_type))
    $id_type = $news_id_type;
if(isset($news_id))
    $id = $news_id;
if(isset($news_img))
    $img = substr($news_img,1);
if(isset($news_type))
    $type = $news_type;
if(isset($news_desc))
    $desc = $news_desc;

?>


<div class="post" data-type="<?php echo $id_type; ?>">
            <a href="news-detail.php?id=<?php echo $id;?>">
              <img class="post-img" src="<?php echo $img;?>" />
              <h4 class="post-type"><?php echo $type;?></h4>
              <p class="post-desc"><?php echo $desc;?></p>
            </a>
</div>