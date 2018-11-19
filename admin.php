
<?php

include "db_login.php";
if (!$con)   /*  check if the connection was actually successful  */
    {
        exit("Could not connect to the database: <br/>" . 
            htmlspecialchars(mysql_error()) );
           
    }
    else{
    }

if (isset($_POST["update"])){

    // echo "I'm inside Update condition";


    $Sl = mysqli_real_escape_string($con, $_POST['Sl']);

    if(!empty($_POST['date'])){
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $query1="UPDATE client SET date = '$date' WHERE Sl = '$Sl'";
    $retval = mysqli_query($con, $query1);
    }

    if(!empty($_POST['mechanic'])){
    $mechanic = mysqli_real_escape_string($con, $_POST['mechanic']);

    $prevMech = "SELECT mechanic from client WHERE Sl=$Sl";
    $sqlMech="UPDATE mechanics SET Appointments = 'Appointments'-1 WHERE Name = '$prevMech'";
    $res1 = mysqli_query($con,$sqlMech);

    $query1="UPDATE client SET mechanic = '$mechanic' WHERE Sl = '$Sl'";
    $retval = mysqli_query($con, $query1);

    $sqlMech="UPDATE mechanics SET Appointments = 'Appointments'+1 WHERE Name = '$mechanic'";
    $res1 = mysqli_query($con,$sqlMech);}

    // echo "parameter set";

    header("CarWorkshop_PHP/admin.php");

    if(!$retval ) {
        die('Could not update data: ' . mysql_error());
        }
        else{
        echo "Updated data successfully\n";
        }
        // mysqli_close($con);
    //         $res = mysqli_query($con,$sql);
    //         header("CarWorkshop_PHP/carWorkshop.php");

    //         if (!mysqli_query($con, $sql)){
    //             die('Error: ' . mysqli_connect_error($con));
    //         }
    // 
} else{
        echo "I'm not in Update connection";
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
        <form name="updateList" action="admin.php" method="post">To Update information: 
        <span>Client id <input type="number" name="Sl" placeholder="insert Client id " id="clientID"></span>
        <span>Appointment date <input type="date" name="date" placeholder="insert appointment date " id="DateID"></span>
        <span>Mechanic </span>
            <select name="mechanic" placeholder="Select mechanc">
            <option value="" disabled selected hidden>Please Choose...</option>
                <option value="Riven">Riven Potter</option>
                <option value="Mike">Mike Weasley</option>
                <option value="Jamie">Jamie Gordon</option>
                <option value="Ahri">Ahri Granger</option>
                <option value="Akali" id="mech5">Akali Black</option>
            </select> <br>
        <input type="Submit" name="update" value="Update information"/><br><br>

        <!-- //     if (isset($_POST["update"])){

        //         echo "I'm inside Update condition";
        //         $Sl = mysqli_real_escape_string($con, $_POST['Sl']);
        //         $date = mysqli_real_escape_string($con, $_POST['date']);
        //         $mechanic = mysqli_real_escape_string($con, $_POST['mechanic']);

        //         echo $Sl, $date, $mechanic;
                
        //         $query="UPDATE client ". "SET date = $date ". "SET mechanic = $mechanic".
        //         "WHERE Sl = $Sl";
        //         mysql_select_db('carworkshop');
        //         $retval = mysqli_query($con, $query);

        //         if(! $retval ) {
        //             die('Could not update data: ' . mysql_error());
        //          }
        //          echo "Updated data successfully\n";
                 
        //          mysql_close($conn);

        //     //         $res = mysqli_query($con,$sql);
        //     //         header("CarWorkshop_PHP/carWorkshop.php");

        //     //         if (!mysqli_query($con, $sql)){
        //     //             die('Error: ' . mysqli_connect_error($con));
        //     //         }
        //     // 
        //     }
        //     else{
        //         echo "I'm not in Update connection";
        //     }
        //     ?> -->
            
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
    </table>
</div>
</html>
