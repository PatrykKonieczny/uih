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

<form action = "updateNurse.php" method = "POST">
    <label for="eid">Nurse ID to update: </label><br>
    <input type="text" id="eid" name="eid" ><br>
    <label for="fname">First Name:</label><br>
    <input type="text" id="fname" name="fname" ><br>
    <label for="lname">Last Name:</label><br>
    <input type="text" id="lname" name="lname" ><br>
    <label for="mi">Middle Initial:</label><br>
    <input type="text" id="mi" name="mi" ><br>
    <label for="age">Age:</label><br>
    <input type="text" id="age" name="age" ><br>
    <label for="gender">Gender:</label><br>
    <input type="text" id="gender" name="gender" ><br>
    <button type="submit" value="Submit">Submit</button>
    <button type = "sumbit" formaction = "admin.php">Home</button>
</form>

<?php 
            if($_POST["eid"]){
                if($_POST["fname"]){
                    $myQ = "UPDATE NURSE SET FNAME = '" . $_POST["fname"]. "' WHERE EID = ". $_POST["eid"]."" ; 
                    if($conn->query($myQ)) echo "The first name updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["lname"]){
                    $myQ = "UPDATE NURSE SET LNAME = '" . $_POST["lname"]. "' WHERE EID = ". $_POST["eid"]."" ; 
                    if($conn->query($myQ)) echo "The last name updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["mi"]){
                    $myQ = "UPDATE NURSE SET MI = '" . $_POST["mi"]. "' WHERE EID = ". $_POST["eid"]."" ; 
                    if($conn->query($myQ)) echo "The mi updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["age"]){
                    $myQ = "UPDATE NURSE SET AGE = '" . $_POST["age"]. "' WHERE EID = ". $_POST["eid"]."" ; 
                    if($conn->query($myQ)) echo "The age updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["gender"]){
                    $myQ = "UPDATE NURSE SET GENDER = '" . $_POST["gender"]. "' WHERE EID = ". $_POST["eid"]."" ; 
                    if($conn->query($myQ)) echo "The gender updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
            }
            $conn->close();
        ?>



        </body>
</html>