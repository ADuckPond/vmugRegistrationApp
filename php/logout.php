<?php
    session_start();
    session_unset();
    session_destroy();
    header("localhost: ../adminLogin.html");
?>