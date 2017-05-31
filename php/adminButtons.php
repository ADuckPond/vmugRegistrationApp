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
        $names = array('Company','CompanyTitle');
        $nameValue = array('Name');
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
                        // check for name field
                        if(in_array($data[$c], $nameValue))
                            $pickedName[] = $c;
                        // check for other fields
                        elseif(in_array($data[$c], $names))
                            $picked[] = $c;
                    // set isFirstRow to false to move onto else block
                    $isFirstRow = false;
                }
                else{
                    for($c=0; $c < $numCols; $c++)
                        // check for the column number to match the column number for name then split the name field into first and last
                        if(in_array($c, $pickedName)){
                            $firstLast = explode(" ", $data[$c]);
                            $row[] = $firstLast[0];
                            $row[] = $firstLast[1];
                        }elseif(in_array($c, $picked)){
                            $row[] = $data[$c];
                        }
                    $theData[] = $row;
                }
            }
        }
        // close the file
        fclose($handle);
        // loop through the output array from the file
        foreach($theData as $dataArray){
            $arrayLen = count($dataArray);
            // for each item in a row of data establish the different parts and set them to appropriate vars
            for( $c=0; $c < $arrayLen; $c++){
                switch ($c){
                    case 0:
                        $first = $dataArray[$c]; 
                    case 1:
                        $last = $dataArray[$c];
                    case 2:
                        $company = $dataArray[$c];
                    case 3:
                        $title = $dataArray[$c];
                }
            }
            // import values from vars into db
            $queryInsert = "INSERT INTO members (firstname,lastname,company,title,prereg,timestamp) VALUES ('$first','$last','$company','$title','t')";
            $resultInsert = pg_query($db,$queryInsert);
        }
    }

    // export function
    if($action == 'export'){

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

    }

    // testPrint function
    if($action == 'testPrint'){

    }

    pg_close();
?>