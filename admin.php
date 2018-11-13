
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
</head>
<body>
    
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
</body>
</html>
