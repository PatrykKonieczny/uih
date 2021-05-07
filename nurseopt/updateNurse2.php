<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
<body>
<h1>Update nurse information</h1>

<?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $name = "uih_vacc";

    $conn = new mysqli($host,$user,$pwd, $name);
    if($conn->connect_error) 
    {
        echo "Error: could not connect to the DB";
        exit;
    }
    ?>

<form action = "updateNurse2.php" method = "POST">
    <label for="eid">Enter Your ID: </label><br>
    <input type="text" id="eid" name="eid" ><br>
    <label for="phone_num">New Phone Number:</label><br>
    <input type="text" id="phone_num" name="phone_num" ><br>
    <label for="adder">New Address:</label><br>
    <input type="text" id="adder" name="adder" ><br>
    <button type="submit" value="Submit">Submit</button>
    <button type = "sumbit" formaction = "nurse.php">Home</button>
</form>

<?php 
            if($_POST["eid"]){
                if($_POST["phone_num"]){
                    $myQ = "UPDATE NURSE SET PHONE_NUM = '" . $_POST["phone_num"]. "' WHERE EID = ". $_POST["eid"]."" ; 
                    if($conn->query($myQ)) echo "The first name updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["adder"]){
                    $myQ = "UPDATE NURSE SET ADDRESS = '" . $_POST["adder"]. "' WHERE EID = ". $_POST["eid"]."" ; 
                    if($conn->query($myQ)) echo "The last name updated successfully!";
                    else echo "Error: " . $conn->error; 
                }

            }
            $conn->close();
        ?>



        </body>
</html>