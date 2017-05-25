<?php
    include('session.php');

    if($_SERVER["REQUEST_METHOD"] == "POST" && sizeof($_FILES) == 1){

        $file=$_FILES['importFile']['tmp_name'];

        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['importFile']['name']);
        $fileType = pathinfo($targetFile,PATHINFO_EXTENSION);

        $uploadOk = 1;

        if(file_exists($targetFile)){
            $uploadOk = 0;
        }

        if($_FILES['importFile']['size'] > 500000){
            $uploadOk = 0;
        }

        if($fileType != "csv"){
            $uploadOk = 0;
        }

        if($uploadOk == 0){

        }else{
            if(move_uploaded_file($_FILES['importFile']['tmp_name'],$targetFile)){
                echo 'The file '. basename($_FILES['importFile']['name']). ' has been uploaded.';
            }
        }

        $queryTableExists = "SELECT 1 FROM pg_tables WHERE schemaname = 'public' AND tablename = 'temp'";
        $resultTableExists = pg_query($db,$queryTableExists);
        if($count == 1){
            
        }{
            $queryCreate = "CREATE TABLE temp (attend text, name text, company text)";
            $resultCreate = pg_query($db,$queryCreate);

            $queryCopy = "COPY temp (attend, name, company) FROM '/var/www/html/php/$targetFile' DELIMITER ',' CSV HEADER";
            $resultCopy = pg_query($db,$queryCopy);
        }
    }
?>