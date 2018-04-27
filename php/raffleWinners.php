<?php
    include('session.php');

    if(isset($_GET['action']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $action=$_GET['action'];
    }

    if($action == 'spin'){
        $pickWinnerQuery = "SELECT * FROM members WHERE haswon = 'f' ORDER BY random() LIMIT 1";
		$pickWinnerResult = pg_query($db,$pickWinnerQuery);
		
		while($row=pg_fetch_array($pickWinnerResult)){
			$firstName = $row['firstname'];
			$lastName = $row['lastname'];
            $winner = $firstName . " " . $lastName;
            echo $winner;
		}
    }
?>