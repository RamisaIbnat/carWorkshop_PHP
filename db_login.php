<?php

$db_host = 'localhost';
$db_username='root';
$db_password='';
$db_database='carworkshop';

$con= mysqli_connect($db_host, $db_username, $db_password, $db_database);

// $sqlMech="INSERT INTO mechanics (Name, Appointments) VALUES ('Akali',0), ('Ahri',0), ('Jamie',0), ('Mike',0), ('Riven',0) ";
// $res1 = mysqli_query($con,$sqlMech);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
