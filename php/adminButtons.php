<?php
    include('session.php');

    if(isset($_GET['action']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $action=$_GET['action'];
    }

    // import function
    if($action == 'import' && sizeof($_FILES) == 1){
        // establish relative file name / path
        $fileName=$_FILES['importFile']['tmp_name'];
        // establish arrays for column selection
        $names = array('FirstName','LastName','Company','CompanyTitle');
        // $nameValue = array('Name');
        // initialize required vars
        $picked = array();
        $theData = array();
        $isFirstRow = true;
        // attempt to open the file and loop through it
        if(($handle = fopen($fileName, 'r')) !== FALSE){
            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE){
                // establish the number of columns
                $numCols = count($data);
                // initialize row array
                $row = array();
                // find values in first row and associate column numbers
                if($isFirstRow){
                    for($c=0; $c < $numCols; $c++)
                        // check for fields matching values defined in names
                        if(in_array($data[$c], $names))
                            $picked[] =  [ $c, $data[$c] ];
                    // set isFirstRow to false to move onto else block in next iteration
                    $isFirstRow = false;
                }
                else{
                    for($c=0; $c < $numCols; $c++)
                        // check for the column number to match the column number for picked defined in first row logic
                        foreach($picked as $pick){
                            if($c === $pick[0])
                                $row[] = [ $pick[1], $data[$c] ];
                        }
                    $theData[] = $row;
                }
            }
        }
        // close the file
        fclose($handle);
        // loop through the output array from the file
        foreach($theData as $dataArray){
            foreach($dataArray as $thisData){
                
                $arrayLen = count($thisData);

                // for each item in a row of data establish the different parts and set them to appropriate vars
                for( $c=0; $c < $arrayLen; $c++){
                    switch ($thisData[0]){
                        case "FirstName":
                            $first = $thisData[1]; 
                        case "LastName":
                            $last = $thisData[1];
                        case "Company":
                            $company = $thisData[1];
                        case "CompanyTitle":
                            $title = $thisData[1];
                    }
                }
            }
                
            // import values from vars into db
            $queryInsert = "INSERT INTO members (firstname,lastname,company,title,prereg,timestamp) VALUES ('$first','$last','$company','$title','t','now')";
            $resultInsert = pg_query($db,$queryInsert);
        }
    }

    // reset function
    if($action == 'reset'){

        // reset the db
        $queryTruncate = "TRUNCATE members";
        $resultTruncate = pg_query($db, $queryTruncate);

        // reset the id sequence so that future values will start at 1
        $queryResetSeq = "ALTER SEQUENCE members_id_seq RESTART";
        $resultResetSeq = pg_query($db, $queryResetSeq);

    }

    // theme function
    if($action == 'theme'){

        // get theme radio data
        $theme=pg_escape_string($_POST['radio']);

        // Set all theme color options to false before setting the correct one to true
        $querySetAllFalse = "UPDATE theme SET enabled = 'f'";
        $resultSetAllFalse = pg_query($db, $querySetAllFalse);

        // Set appropriate theme color enabled value to true
        $querySetColor = "UPDATE theme SET enabled = 't' WHERE theme = '$theme'";
        $resultSetColor = pg_query($db, $querySetColor);
        
    }

    // testPrint function
    if($action == 'testPrint'){

    }

    pg_close();
?>