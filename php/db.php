<html>
    <body>
        <?php
        $dbHost = getenv('DB_HOST');
        $dbUser = getenv('DB_USER');
        $dbPwd = getenv('DB_PWD');
        $dbName = getenv('DB_NAME');
        $conn_str = "host=$dbHost dbname=dbName user=$dbUser password=dbPwd";
        $db = pg_connect($conn_str);

        $firstname = pg_escape_string($_POST['firstname']);
        $lastname = pg_escape_string($_POST['lastname']);
        $email = pg_escape_string($_POST['email']);
        $company = pg_escape_string($_POST['company']);
        $option = pg_escape_string($_POST['option']);

        $query = "INSERT INTO members(firstname, lastname, email, company, comptype) VALUES('" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $company . "', '" . $option . "')";
        $result = pg_query($query);
        if (!$result) {
            $errormessage = pg_last_error();
            echo "Error with query: " . $errormessage;
            exit();
        }
        printf ("These values were inserted into the database - %s %s %s %s %s", $firstname, $lastname, $email, $company, $option);
        pg_close();
        ?>
    </body>
</html>