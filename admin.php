
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

    .UpdateInfo{
        padding-bottom:10%;
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
        <th> Sl</th>
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
                echo "<td>". $row['Sl']."</td>";
                echo "<td>". $row['name']."</td>";
                echo "<td>". $row['phone']."</td>";
                echo "<td>". $row['license']."</td>";
                echo "<td>". $row['date']."</td>";
                echo "<td>".$row['mechanic']."</td>";
                echo "</tr>";
            }
        ?>
        <div id=UpdateInfo>
        <form name="updateList">To Update information: 
        <span>Client id <input type="number" placeholder="insert Client id " id="clientID"></span>
        <span>Appointment date <input type="date" placeholder="insert appointment date " id="DateID"></span>
        <span>Mechanic </span>
            <select name="mechanic">
                <option value="Riven">Riven Potter</option>
                <option value="Mike">Mike Weasley</option>
                <option value="Jamie">Jamie Gordon</option>
                <option value="Ahri">Ahri Granger</option>
            </select> <br>
        <input type="Submit" name="Click to update!" action="admin.php"/><br><br>
        <?php 
            if (isset($_POST["submit"])){

                $Sl = mysqli_real_escape_string($con, $_POST['Sl']);
                $date = mysqli_real_escape_string($con, $_POST['date']);
                $mechanic = mysqli_real_escape_string($con, $_POST['mechanic']);
                
                $query="UPDATE client (date, mechanic) WHERE Sl=$sl";
                    mysql_select_db('client');
                    $retval = mysql_query( $query, $con);

            //         $res = mysqli_query($con,$sql);
            //         header("CarWorkshop_PHP/carWorkshop.php");

            //         if (!mysqli_query($con, $sql)){
            //             die('Error: ' . mysqli_connect_error($con));
            //         }
            // 
            }
            else{
                echo "I'm not here";
            }
            ?>
            
        </form>
        </div>

            <!-- $date = mysqli_real_escape_string($con, $_POST['date']);
            $mechanic = mysqli_real_escape_string($con, $_POST['mechanic']);
            
            $query = mysql_query("UPDATE client ". "SET date = $date ". "SET mechanic = $mechanic ". "WHERE Sl=$Sl", $con);
            mysql_select_db('client');
            $retval = mysql_query( $query, $conn );

            $query = mysql_query("select * from client", $con);
            while ($row = mysql_fetch_array($query)) {
            echo "<b><a href='updatephp.php?update={$row['date']}'>{$row['mechanic']}</a></b>";
            echo "<br />"; -->
            }
   
        ?>
    </table>
</div>
</html>
