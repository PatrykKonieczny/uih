<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
    <body>
    <h1> Record Vaccination</h1>
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


    <form action = "vaccination.php" method = "POST">
        <label for="ssn">Enter Paitents SSN: </label><br>
        <input type="text" id="ssn" name="ssn" ><br>
        <label for="nurse_id">Enter your ID: </label><br>
        <input type="text" id="nurse_id" name="nurse_id" ><br>
        <label for = "vaccine">Choose Company:
                <select name="vaccine">
                <option value="moderna">Moderna</option>
                <option value="pfizer">Pfizer</option>
                <option value="jandj">Johnson & Johnson</option>
                </select><br>
            </label><br> 
        <label for = "dose">Number of Doses:
                    <select name="dose">
                    <option value= 1>1</option>
                    <option value= 2>2</option>
                    </select><br>
                </label><br>
        <label for="time">Enter Timeslot: </label><br>
        <input type="text" id="time" name="time" ><br>
        <button type="submit" value="Submit">Submit</button>
        <button type = "sumbit" formaction = "nurse.php">Home</button>
        </form>
    </body>

    <?php
    if($_POST["ssn"]){
        $myQ2 = "SELECT * FROM vaccine WHERE COMPANY = '". $_POST["comp"]. "' and AVAILABILITY - ON_HOLD > 0 " ;
        $result = mysqli_query($conn, $myQ2);
        $row = mysqli_fetch_array($result);
        $avail = $row["AVAILABILITY"] - 1;
        $hold = $row["ON_HOLD"] - 1;
        $id = $row["NAME"];

        $myQ5 = "DELETE FROM PATIENT_SCHEDULE WHERE PSSN = ". $_POST["ssn"];
        if($conn->query($myQ5)) echo "";
        else echo "Error: " . $conn->error; 

        $myQ3 = "UPDATE VACCINE SET AVAILABILITY =" .$avail . " WHERE NAME = '" . $id. "'";
        if($conn->query($myQ3)) echo "";
        else echo "Error: " . $conn->error; 

        $myQ4 = "UPDATE VACCINE SET ON_HOLD =" .$hold . " WHERE NAME = '" . $id. "'";
        if($conn->query($myQ4)) echo "";
        else echo "Error: " . $conn->error; 


        $myQ1 = "SELECT DOSE, VACCINE FROM VAC_RECORD WHERE PATIENT_SSN = '" . $_POST ["ssn"] . "'"; 
        $result1 = mysqli_query($conn, $myQ1);
        $row1 = mysqli_fetch_array($result1);
        $dose = $row1["DOSE"];
        if($dose == 1 && $row1["DOSE"] != "jandj"){
            $dose += 1;
            $myQ9 = "UPDATE VAC_RECORD SET DOSE = " .$dose . " WHERE PATIENT_SSN = '" . $_POST ["ssn"] . "'";
            if($conn->query($myQ9)) echo "";
            else echo "Error: " . $conn->error; 
        }
        else{ 
            $myQ = "INSERT INTO VAC_RECORD(PATIENT_SSN, NURSE_ID, VACCINE, DOSE,TIMESLOT) VALUES ('";
            $myQ .= $_POST["ssn"]."',";
            $myQ .= $_POST["nurse_id"].",'";
            $myQ .= $_POST["vaccine"]."',";
            $myQ .= $_POST["dose"].",'";
            $myQ .= $_POST["time"]."')";
            if($conn->query($myQ)) echo "The nurse added successfully!";
                else echo "Error: " . $conn->error;
            }   
        }

     $conn->close();
        ?>

</html> 