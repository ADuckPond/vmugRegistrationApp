<html> 
    <body> 
        <?php 
        $db = pg_connect('host=localhost dbName=vmug user=Max pwd=postgres'); 

        $firstname = pg_escape_string($_POST['firstname']); 
        $lastname = pg_escape_string($_POST['lastname']); 
        $email = pg_escape_string($_POST['email']); 
        $company = pg_escape_string($_POST['company']);
        $option = pg_escape_string($_POST['option']);

        $query = "INSERT INTO users(firstname, lastname, email, company, option) VALUES('" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $company . "', '" . $option . "')"; 
        $result = pg_query($query); 
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        printf ("These values were inserted into the database - %s %s %s %s %s", $firstname, $lastname, $emailaddress, $company, $option); 
        pg_close(); 
        ?> 
    </body> 
</html>