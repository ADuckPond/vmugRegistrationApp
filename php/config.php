<?php
    $dbHost = getenv('DB_HOST');
    $dbUser = getenv('DB_USER');
    $dbPwd = getenv('DB_PWD');
    $dbName = getenv('DB_NAME2');
    $conn_str = "host=$dbHost dbname=$dbName user=$dbUser password=$dbPwd";
    $db = pg_connect($conn_str);
?>