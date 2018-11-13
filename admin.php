
<?php

include "db_login.php";
if (!$con)   /*  check if the connection was actually successful  */
    {
        exit("Could not connect to the database: <br/>" . 
            htmlspecialchars(mysql_error()) );
           
    }
    else{
      "Hello";
      
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>

    body{
        background-color:aliceblue;
    }
    .clientInfo{
        margin-top: 20%;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        background-color: white;
        /* height:50%;
        width:70%; */
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    </style>
</head>
<body>
<div id="clientInfo"><h3>Client Information: </h3>
    <table >

        <tr>
        <th> User Name</th>
        <th> Phone Number </th>
        <th> Car registration Number </th>
        <th> Appointment Date </th>
        <th> Mechanic Name </th>
        </tr> 

        <?php 
            $q = "SELECT * from client";
            $r = mysqli_query($con,$q);
            while($row = mysqli_fetch_array($r)){
                echo "<tr>";
                echo "<td>". $row['name']."</td>";
                echo "<td>". $row['phone']."</td>";
                echo "<td>". $row['license']."</td>";
                echo "<td>". $row['date']."</td>";
                echo "<td>".$row['mechanic']."</td>";
                echo "</tr>";
            }
   
        ?>
    </table>
</div>
</html>
