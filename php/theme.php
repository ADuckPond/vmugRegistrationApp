<?php
    include('config.php');

    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }

    // getTheme function
    if($action == 'getTheme'){
        // get theme value from db
        $queryGetTheme = "SELECT * FROM theme WHERE enabled = 't'";
        $resultGetTheme = pg_query($db,$queryGetTheme);
        $row = pg_fetch_array($resultGetTheme);
        echo $row["theme"];
    }

    pg_close();
?>