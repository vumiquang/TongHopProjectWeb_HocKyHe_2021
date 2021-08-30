<?php 
$class = "project-item";
$style = "";
$radius = 0;
$none = "";
$title = "";
$addr = "";
$filter = "";
$link = "#";
$img = "#";
$listType =[];
$status =[];
if(isset($id)){

  $sql = "SELECT * FROM tb_project_type_rel where id_project = $id";
  $res1 = mysqli_query($conn, $sql);
  $count1 = mysqli_num_rows($res1);
  if($count1>0)
  {
      while($row=mysqli_fetch_assoc($res1))
      {
          $listType[] = $row['id_type'];
      }
  }
  $sql = "SELECT * FROM tb_project where id = $id";
  $res2 = mysqli_query($conn, $sql);
  $count2 = mysqli_num_rows($res2);
  if($count2>0)
  {
      while($row=mysqli_fetch_assoc($res2))
      {
        global $status;
        $status = $row['id_status'];
      }
  }
}

if(isset($item_link))
    $link = $item_link;
if(isset($item_img))
    $img = $item_img;
if(isset($item_zoom) && $item_zoom ==false)
    $class = $class.' no-zoom';
if(isset($item_border))
    $style = $style.'border:'.$item_border.'px solid #fff;';
if(isset($item_radius))
    $radius = ' border-radius: '.$item_radius.'px;';
if(isset($item_info) && $item_info == false)
    $none = 'display:none';
if(isset($item_title))
    $title = $item_title;
if(isset($item_address))
    $addr = $item_address;
if(isset($item_filter) && $item_filter == false)
  $filter = '-webkit-filter: unset; filter: unset;';

echo '<div class="'.$class.'" style="'.$style.'">';
?>
          <a
            href=<?php echo "\"".$link."\""; ?>
            style="background-image: url('<?php echo $img; ?>'); <?php echo $radius;echo $filter;?>"
          >
            <div class="project-info" style="<?php echo $radius;echo $none;?>" 
            data-status="<?php echo $status ?>" 
            data-type="<?php foreach($listType as $ftype){ echo "$ftype-"; }?>">
              <div class="project-name"><?php echo $title; ?></div>
              <div class="project-addr"><?php echo $addr; ?></div>
            </div>
          </a>
</div>

