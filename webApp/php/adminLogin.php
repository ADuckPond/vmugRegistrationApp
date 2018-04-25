<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //username and password sent from form

        $currentUser = pg_escape_string($_POST['currentUser']);
        $currentPwd = pg_escape_string($_POST['currentPwd']);

        $query = "SELECT id FROM admin WHERE username = '$currentUser' and password = crypt('$currentPwd',password)";
        $result = pg_query($db,$query);

        $count = pg_num_rows($result);

        //Must only match 1 table row

        if($count == 1){
            $_SESSION['login_user'] = $currentUser;

            header("location: admin.php");
            exit();
        }else{
            $error = "Invalid login name or password";
        }
    }
?>