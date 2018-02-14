<?php
    include('session.php');

    if(isset($_GET['action']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $action=$_GET['action'];
    }

    // import function
    if($action == 'register'){

        $firstName = pg_escape_string($_POST['firstName']);
        $lastName = pg_escape_string($_POST['lastName']);
        $email = pg_escape_string($_POST['email']);
        $company = pg_escape_string($_POST['company']);
        $title = pg_escape_string($_POST['title']);
        $exclude = pg_escape_string($_GET['radio']);

        if($exclude == "yes"){
            $excludeValue = 't';
        }else{
            $excludeValue = 'f';
        }

        $querySelect = "SELECT * FROM members WHERE LOWER(firstname) = LOWER('$firstName') AND LOWER(lastname) = LOWER('$lastName')";
        $resultSelect = pg_query($db,$querySelect);
        $count = pg_num_rows($resultSelect);
        if($count !== 1){
            $queryInsert = "INSERT INTO members(firstname, lastname, email, company, title, exclude, checkedin) VALUES('$firstName','$lastName','$email','$company','$title','$excludeValue','t')";
            $resultInsert = pg_query($db,$queryInsert);
        }else{
            $queryCheckedin = "SELECT * FROM members WHERE LOWER(firstname) = LOWER('$firstName') AND LOWER(lastname) = LOWER('$lastName') AND checkedin = 't'";
            $resultCheckedin = pg_query($db,$queryCheckedin);
            $count = pg_num_rows($resultCheckedin);
            if($count ==1){
                print 'Member already checked-in!';
            }else{
                print 'Member already registered please use the check-in page!';
            }
        }
        
        pg_close();
    }
?>