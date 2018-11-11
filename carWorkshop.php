<?php
    include "db_login.php"; 
    if (!$con)   /*  check if the connection was actually successful  */
    {
        exit("Could not connect to the database: <br/>" . 
            htmlspecialchars(mysql_error()) );
    }
    else{
        // echo "connected";
        if (isset($_POST["submit"])){

            $name = mysqli_real_escape_string($con, $_POST['name']);
            $address = mysqli_real_escape_string($con, $_POST['address']); 
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $license = mysqli_real_escape_string($con, $_POST['license']);
            $date = mysqli_real_escape_string($con, $_POST['date']);
            $engine = mysqli_real_escape_string($con, $_POST['engine']);
            $mechanic = mysqli_real_escape_string($con, $_POST['mechanic']);
            
            $sql="INSERT INTO client (name, address, phone, email, license, date, engine, mechanic)
                VALUES
                ('$name','$address', '$phone','$email', '$license',' $date', '$engine', '$mechanic')";

                $res = mysqli_query($con,$sql);
                header("Car/carWorkshop.php");

                if (!mysqli_query($con, $sql)){
                    die('Error: ' . mysqli_connect_error($con));
                }
        }
        else{
            // echo "I'm not here";
        }
    }
    ?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Car Workshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        html, body{
            width:100vw;
            margin: 0 0 0 0;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-style: italic;
            font-weight: bold;
        }

        .fullpage{
            height:100vh;
            width:100vw;
            position:relative;
            display:inline-block;
            background-color: whitesmoke;
            }

        #firstPage{
            background-image: url(benefit-workshop.png);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: 8% 91%;
            background-color:#21c5f3ab;
        }

        #formID{

            height: 90%;
            width: 100%;

        }

        #admin{
            margin-left: 94%;
            margin-top: 1%;
            font-family: 'Courier New', Courier, monospace;
            font-size: 1.2em;
            text-decoration-line: underline;
        }

        #heading{
            margin-top:18%;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        #subheading{
            margin-left:21%;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-style: italic;
        }

        .panel{
            height: 47%;
            width: 50%;
            margin: 4% 17%;
            border: 1px solid #00BCD4;
            padding: 6% 7% 12%;
            background-color: #00bcd429;
        }

        .panel_heading{
            height:10%;
            font-size: 1.1em;

        }

        .userInput{
            height: 14%;
            font-size: 1.1em;
        }

        .user_inputText{
            width: 96%;
            height: 40%;
        }
        
        button{
            height:5%;
            width:5%;
            position:relative;
            display:inline-block;
                    }

    </style>
</head>
<body>

    
        
    <div class="fullpage" id="firstPage">
        <div id="admin"><a href="admin.php">Admin</a></div>
        <div id="heading"><center><h1>Car Workshop</h1></div></center>
        <div id="subheading"><center><h3>Book your appointment online!</h3></div></center>
    </div>
    <div class="fullpage" id="secondPage">
        <div class="panel" id="userPanel">
            <div class="panel_heading" id="user_heading">Register below for online Appoinment..</div>
            <br><br>
            <form name="myForm" id="formID" method="post">
                <div class="userInput"><label class="user_label">Name : </label> <input type="text" name="name" class="user_inputText" required/></div>
                <div class="userInput"><label class="user_label">Address : </label> <input type="text" name="address" class="user_inputText" required/></div>
                <div class="userInput"><label class="user_label">Phone no: </label> <input type="text" name="phone" class="user_inputText" required/></div>
                <div class="userInput"><label class="user_label">Email id : </label> <input type="email" name="email" class="user_inputText" required/></div>
                <div class="userInput"><label class="user_label">Car license no. : </label> <input type="text" name="license" class="user_inputText" required/></div>
                <div class="userInput"><label class="user_label">Car engine no. : </label> <input type="text" name="engine" class="user_inputText" required/></div>
                <div class="userInput"><label class="user_label">Appointment date : </label> <input type="date" name="date" class="user_inputText" required/></div>
                <div class="userInput"><label class="user_label">Desired mechanic : </label>
                <!-- <input list="mechanic">
                    <datalist id="mechanic"> -->

                    <select name="mechanic">
                        <option value="Riven">Riven Potter</option>
                        <option value="Mike">Mike Weasley</option>
                        <option value="Jamie">Jamie Gordon</option>
                        <option value="Ahri">Ahri Granger</option>
                    </select>
                    <!-- </datalist> -->
                <center><input type="submit" name="submit"/></center>
            </form>
            </div>
            </div>
            <script>
                
            </script>
    </body>
</html>