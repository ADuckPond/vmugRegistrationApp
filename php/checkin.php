<?php
    include('session.php');

    if(isset($_GET['action']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $action=$_GET['action'];
    }

    // import function
    if($action == 'checkin'){

        $name = pg_escape_string($_POST['name']);
        $email = pg_escape_string($_POST['email']);
        $exclude = pg_escape_string($_GET['radio']);

        //Need to handle middle name / initials / weird last names
        $firstLast = explode(" ", $name);
        $firstName = $firstLast[0];
        $lastName = $firstLast[1];

        if($exclude == "yes"){
            $excludeValue = 't';
        }else{
            $excludeValue = 'f';
        }
        
        //Need to output information in the event of duplicate names
        $querySelect = "SELECT * FROM members WHERE LOWER(firstname) = LOWER('$firstName') AND LOWER(lastname) = LOWER('$lastName') AND checkedin != 't'";
        $resultSelect = pg_query($db,$querySelect);
        $count = pg_num_rows($resultSelect);
        if($count == 1){
            $queryUpdate = "UPDATE members SET (email, exclude, checkedin, timestamp) = ('$email', '$excludeValue', 't', 'now') WHERE LOWER(firstname) = LOWER('$firstName') AND LOWER(lastname) = LOWER('$lastName') AND checkedin != 't'";
            $resultUpdate = pg_query($db,$queryUpdate);
        }else{
            print 'No match found!';
        }
        
        pg_close();
    }
?>