<?php
    include('session.php');

    // query db for info
    $queryGet = "SELECT * FROM members";
    $resultGet = pg_query($db, $queryGet);

    // validate that there is a result
    if(!$resultGet) die('Could\'t fetch records');

    // establish variables
    $numFields = pg_num_fields($resultGet);
    $headers = array();
    // populate headers
    for($i=0; $i<$numFields; $i++){
        $headers[] = pg_field_name($resultGet,$i);  
    }

    $fp = fopen('php://output','w');
    if($fp && $resultGet){
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="export.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');
        fputcsv($fp, $headers);

        $rows = pg_fetch_all($resultGet);
        $rowCount = count($rows);
        for($c=0; $c<$rowCount; $c++){
            $row=$rows[$c];
            fputcsv($fp, array_values($row));
        }
    }

    pg_close();
?>