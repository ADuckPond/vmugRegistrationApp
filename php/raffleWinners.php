<?php
    include('session.php');

    if(isset($_GET['action']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $action=$_GET['action'];
    }

    if($action == 'spin'){
        $pickWinnerQuery = "SELECT * FROM members WHERE haswon = 'f' AND exclude = 'f' AND checkedin = 't' ORDER BY random() LIMIT 1";
        $pickWinnerResult = pg_query($db,$pickWinnerQuery);
		
		if($row=pg_fetch_array($pickWinnerResult)){
			    $firstName = $row['firstname'];
                $lastName = $row['lastname'];
                $id = $row['id'];

                $updateRecordQuery = "UPDATE members SET haswon = 't' WHERE id = '$id'";
                $updateRecordResult = pg_query($db,$updateRecordQuery);

                $winner = $firstName . " " . $lastName;
                echo $winner;
        }
        else{
            echo "No eligible attendees.";
        }
    }

    if($action == 'reset'){
        $resetHasWonQuery = "UPDATE members SET haswon = 'f'";
        $resetHasWonResult = pg_query($db,$resetHasWonQuery);    
    }

    if($action == 'updateWinners'){
           
    }
?>