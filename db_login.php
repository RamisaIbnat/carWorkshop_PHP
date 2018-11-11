<?php

$db_host = 'localhost';
$db_username='root';
$db_password='';
$db_database='carworkshop';

$con= mysqli_connect($db_host, $db_username, $db_password, $db_database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
