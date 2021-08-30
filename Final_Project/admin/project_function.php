<?php 

function getProjectTypeName($id,$conn){
    $name =[];
     $sql = "SELECT name FROM tb_project_type_rel left join tb_project_type on tb_project_type_rel.id_type = tb_project_type.id where tb_project_type_rel.id_project = $id";
     $resRowType = mysqli_query($conn, $sql);
    //  echo $sql;
     $countRowType = mysqli_num_rows($resRowType);
    
       if($countRowType>0)
       {
         while($rowType=mysqli_fetch_assoc($resRowType))
         {
         $name[] = $rowType['name'];
         }
      }

      return $name;
}


function getImageLinkProject($id,$conn){
 
    $listImg =[];
    $sql = "SELECT link_image FROM tb_project_image where id_project = $id";
    $resLinkImg = mysqli_query($conn, $sql);
    $countImg = mysqli_num_rows($resLinkImg);
   
      if($countImg>0)
      {
        while($rowImg=mysqli_fetch_assoc($resLinkImg))
        {
        $listImg[] = $rowImg['link_image'];
        }
     }

     return $listImg;
}


function getLinkImageNews($id,$conn){
 
  $listImg =[];
  $sql = "SELECT news_image FROM tb_news where id = $id";
  $resLinkImg = mysqli_query($conn, $sql);
  $countImg = mysqli_num_rows($resLinkImg);
 
    if($countImg>0)
    {
      while($rowImg=mysqli_fetch_assoc($resLinkImg))
      {
      $listImg[] = $rowImg['link_image'];
      }
   }

   return $listImg;
}


function getLinkImageBranch($id,$conn){
 
  $listImg =[];
  $sql = "SELECT link_image FROM tb_branch where id = $id";
  $resLinkImg = mysqli_query($conn, $sql);
  $countImg = mysqli_num_rows($resLinkImg);
 
    if($countImg>0)
    {
      while($rowImg=mysqli_fetch_assoc($resLinkImg))
      {
      $listImg[] = $rowImg['link_image'];
      }
   }

   return $listImg;
}

function getLinkImageStaff($id,$conn){
 
  $listImg =[];
  $sql = "SELECT link_image FROM tb_staff where id = $id";
  $resLinkImg = mysqli_query($conn, $sql);
  $countImg = mysqli_num_rows($resLinkImg);
 
    if($countImg>0)
    {
      while($rowImg=mysqli_fetch_assoc($resLinkImg))
      {
      $listImg[] = $rowImg['link_image'];
      }
   }

   return $listImg;
}


function deleteImage($listOldImg){
  // xoa anh di
  foreach($listOldImg as $oldImg){
    unlink('.'.$oldImg);
}
}
?>