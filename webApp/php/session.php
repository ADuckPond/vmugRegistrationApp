<?php
    include('config.php');
    session_start();

    $userCheck=$_SESSION['login_user'];

    $query=pg_query($db,"SELECT user FROM admin WHERE username = '$userCheck' ");

    if(!isset($_SESSION['login_user'])){
        header("location: ../adminLogin.html");
    }
?>