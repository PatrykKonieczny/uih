<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
    <body>

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


    <h1>Register</h1>

    <form action = "register.php" method = "POST">
        <label for="fname">Enter First Name:</label><br>
        <input type="text" id="fname" name="fname" ><br>
        <label for="lname">Enter Last Name:</label><br>
        <input type="text" id="lname" name="lname" ><br>
        <label for="mi">Enter Middle Initial:</label><br>
        <input type="text" id="mi" name="mi" ><br>
        <label for="ssn">Enter SSN:</label><br>
        <input type="text" id="ssn" name="ssn" ><br>
        <label for="race">Enter Race:</label><br>
        <input type="text" id="race" name="race" ><br>
        <label for="age">Enter Age:</label><br>
        <input type="text" id="age" name="age" ><br>
        <label for="gender">Gender:</label><br>
        <input type="text" id="gender" name="gender" ><br>
        <label for="occupation">Enter Occupation:</label><br>
        <input type="text" id="occupation" name="occupation" ><br>
        <label for="history">Enter Medical History:</label><br>
        <input type="text" id="history" name="history" ><br>
        <label for="phone_num">Enter Phone Number:</label><br>
        <input type="text" id="phone_num" name="phone_num" ><br>
        <label for="address">Enter Address:</label><br>
        <input type="text" id="address" name="address" ><br>
        <button type="submit" value="Submit">Submit</button>
        <button type = "sumbit" formaction = "patient.php">Home</button>
    </form>


    <?php
    if ($_POST["fname"]){
        $myQ = "INSERT INTO PATIENT(FNAME,LNAME,MI,SSN,AGE,GENDER,RACE,OCCUPATION,HISTORY,PHONE_NUM,ADDRESS) VALUES('";
        $myQ .= $_POST["fname"]."','";
        $myQ .= $_POST["lname"]."','";
        $myQ .= $_POST["mi"]."','";
        $myQ .= $_POST["ssn"]."',";
        $myQ .= $_POST["age"].",'";
        $myQ .= $_POST["gender"]."','";
        $myQ .= $_POST["race"]."','";
        $myQ .= $_POST["occupation"]."','";
        $myQ .= $_POST["history"]."','";
        $myQ .= $_POST["phone_num"]."','";
        $myQ .= $_POST["address"]."')";
        if($conn->query($myQ)) echo "The patient was registered successfully!";
            else echo "Error: " . $conn->error;
        }
     $conn->close();
    ?>

    </body>
</html> 