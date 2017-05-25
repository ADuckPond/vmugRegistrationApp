<?php
    include('session.php');

    if(isset[$_FILES] && $_FILES.count == 1){

        $file=$_FILES;

        $queryCreate = "CREATE TEMPORARY TABLE temp (atend text, name text, company text)";
        $resultCreate = pg_query($db,$queryCreate);

        $queryCopy = "COPY temp (atend, name, company) FROM '$_FILES' DELIMETER ',' CSV HEADER"; 
    }
?>