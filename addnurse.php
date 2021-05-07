<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
<body>
<h1> Register a nurse</h1>

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

<form action = "addnurse.php" method = "POST">
    <label for="fname">First Name:</label><br>
    <input type="text" id="fname" name="fname" ><br>
    <label for="lname">Last Name:</label><br>
    <input type="text" id="lname" name="lname" ><br>
    <label for="mi">Middle Initial:</label><br>
    <input type="text" id="mi" name="mi" ><br>
    <label for="eidd">Employee Id:</label><br>
    <input type="text" id="eid" name="eid" ><br>
    <label for="age">Age:</label><br>
    <input type="text" id="age" name="age" ><br>
    <label for="gender">Gender:</label><br>
    <input type="text" id="gender" name="gender" ><br>
    <label for="phone_num">Phone number (digits only):</label><br>
    <input type="text" id="phone_num" name="phone_num" ><br>
    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" ><br>
    <button type="submit" value="Submit">Submit</button>

    <button type = "sumbit" formaction = "admin.php">Home</button>
</form>


<?php
    if ($_POST["fname"]){
        $myQ = "INSERT INTO NURSE(FNAME,LNAME,MI,EID,AGE,GENDER,PHONE_NUM,ADDRESS) VALUES('";
        $myQ .= $_POST["fname"]."','";
        $myQ .= $_POST["lname"]."','";
        $myQ .= $_POST["mi"]."',";
        $myQ .= $_POST["eid"].",";
        $myQ .= $_POST["age"].",'";
        $myQ .= $_POST["gender"]."','";
        $myQ .= $_POST["phone_num"]."','";
        $myQ .= $_POST["address"]."')";
        if($conn->query($myQ)) echo "The nurse added successfully!";
            else echo "Error: " . $conn->error;
        }
     $conn->close();
?>

</body>
</html>