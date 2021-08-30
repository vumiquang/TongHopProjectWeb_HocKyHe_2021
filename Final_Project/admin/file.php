<?php 

function uploadFile($fileUpLoad,$uploadPath){
    $files =array();
    $errors =array();
    $listFileName=array();

    foreach($fileUpLoad as $key => $value){
        foreach($value as $index => $value){
            $files[$index][$key]=$value;
        }
    }
    if(!is_dir($uploadPath)){
        mkdir($uploadPath,0777,true);
    }
    
    for($i = 0;$i < sizeof($files);$i++){
       
        $file = validateUploadFile($files[$i],$uploadPath);
      
       
        if($file != false){
            move_uploaded_file($file['tmp_name'],$uploadPath.'/'.$file['name']);
            $listFileName[] = $uploadPath.'/'.$file['name'];
           
        }else{
            // $errors[] = "The file ".basename($file['name'])." is'nt valid";
            return $errors;
        }
     
    }
    return $listFileName;
}

function validateUploadFile($file,$uploadPath){
    //Kieam tra dung luong cho phep
    if($file['size'] > 2*1024*1024){ // 1 mb = 1024 kb *1024 bite
        return false;
    }
    
    //Kiem tra kieu file hop le
    $validTypes = array("jpg","jpeg","png","JPG","PNG","JPEG");
    $fileType = substr($file['name'],strrpos($file['name'],'.') + 1);
    // echo $fileType;
    if(!in_array($fileType,$validTypes)){
        return false;
    }
    // echo 'chay den day';
    // exit;
    // check file da ton tai chua, neu co thi doi ten
    $num = 1;
    $filename = substr($file['name'],0,strrpos($file['name'],'.'));
    $filenameModel = substr($file['name'],0,strrpos($file['name'],'.'));
    // echo $filename;
    // exit;
// echo $file['name'];
// echo $filename;
    while(file_exists($uploadPath.'/'.$filename.'.'.$fileType)){
         $filename = $filenameModel .'-'.$num;
        $num++;
    }
    $file['name'] =$filename.'.'.$fileType;
    // echo $file['name'];
    return $file;
}
?>