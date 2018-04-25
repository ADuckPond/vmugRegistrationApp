<?php

    $targetDir = "/var/www/html/images/";
    $targetFile = $targetDir . "adminLogin.png";
    $targetFileHome = $targetDir . "homeLogo.png";
    $uploadOk = 1;

    include('session.php');

    if(isset($_GET['action']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $action=$_GET['action'];
    }

    if($action == 'upload'){
        $fileUpload = 'f';
        
        if($_FILES["logoFile"]["error"] != UPLOAD_ERR_NO_FILE){
            $check = getimagesize($_FILES["logoFile"]["tmp_name"]);
            if($check !== false){
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if(file_exists($targetFile)){
                unlink($targetFile);
            }
            if($uploadOk == 1){
                if(move_uploaded_file($_FILES["logoFile"]["tmp_name"],$targetFile)){
                    $fileUpload = 't';
                }
            }
        }

        if($_FILES["homeFile"]["error"] != UPLOAD_ERR_NO_FILE){
            $check = getimagesize($_FILES["homeFile"]["tmp_name"]);
            if($check !== false){
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if(file_exists($targetFileHome)){
                unlink($targetFileHome);
            }
            if($uploadOk == 1){
                if(move_uploaded_file($_FILES["homeFile"]["tmp_name"],$targetFileHome)){
                    $fileUpload = 't';
                }
            }
        }
    }

?>