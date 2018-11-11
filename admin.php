
<?php

include "db_login.php";
if (!$con)   /*  check if the connection was actually successful  */
    {
        exit("Could not connect to the database: <br/>" . 
            htmlspecialchars(mysql_error()) );
    }
    else{
        echo "connected";

// $username="username";
// $password="password";
// $database="your_database";
// $mysqli = new mysqli("localhost", $username, $password, $database);
// @mysql_select_db($database) or die( "Unable to select database");


// $query = mysql_query("SELECT * FROM client");


// while ($rows = mysql_fetch_array($query)):

//     $name = $rows['name'];
//     $address = $rows['address']; 
//     $phone = $rows['phone'];
//     $email = $rows['email'];
//     $license = $rows['license'];
//     $date = $rows['date'];
//     $engine = $rows['engine'];
//     $mechanic = $rows['mechanic'];

//    echo "$name<br>$address<br>$email<br>$license<br>$phone<br>$date<br>$engine<br>$mechanic";

//    endwhile;

?>