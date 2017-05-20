<html> 
    <body> 
        <?php 
        $db = pg_connect('host=localhost dbname=vmug user=admin password=admin'); 

        $firstname = pg_escape_string($_POST['firstname']); 
        $lastname = pg_escape_string($_POST['lastname']); 
        $emailaddress = pg_escape_string($_POST['email']); 
        $company = pg_escape_string($_POST['company']);

        $query = "INSERT INTO users(firstname, lastname, email, company) VALUES('" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $company . "')"; 
        $result = pg_query($query); 
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        printf ("These values were inserted into the database - %s %s %s %s", $firstname, $lastname, $emailaddress, $company); 
        pg_close(); 
        ?> 
    </body> 
</html>