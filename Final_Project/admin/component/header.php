<?php include_once('../config/db.php');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$index = false;
$staff = false;
$news = false;
$branch = false;
$account = false;
$prjType = false;
$active = "active";
if (strpos($actual_link, 'index') !== false) {
  $index = true;
}else if(strpos($actual_link, 'staff') !== false){
  $staff = true;
}else if(strpos($actual_link, 'news') !== false){
  $news = true;
}else if(strpos($actual_link, 'branch') !== false){
  $branch = true;
}else if(strpos($actual_link, 'accounts') !== false){
  $account = true;
}
else if(strpos($actual_link, 'project_type') !== false){
  $prjType = true;
}
?>
<div class="container">
    <header class="d-flex flex-wrap justify-content-between py-3 mb-4 border-bottom">
      <a href="<?php echo SITEURL.'admin/index.php'?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="../assets/images/cubic_logo_white_green-p-500x285.png" alt="logo cubic" style="height:30px;width:auto;object-fit:contain;">
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link <?php if($index) echo $active?>">Projects</a></li>
        <li class="nav-item"><a href="news.php" class="nav-link <?php if($news) echo $active?>">News</a></li>
        <li class="nav-item"><a href="staff.php" class="nav-link <?php if($staff) echo $active?>">Staff</a></li>
        <li class="nav-item"><a href="branch.php" class="nav-link <?php if($branch) echo $active?>">Branch</a></li>
        <li class="nav-item"><a href="accounts.php" class="nav-link <?php if($account) echo $active?>">Account</a></li>
        <li class="nav-item"><a href="project_type.php" class="nav-link <?php if($prjType) echo $active?>">Project Type</a></li>
        <li class="nav-item"><a href="./logout.php" class="nav-link">Log out</a></li>
      </ul>
    </header>

  </div>