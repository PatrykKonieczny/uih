<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
    </body>
    <h1>Schedule Vaccination</h1>

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

    <form action = "cancelvac.php" method = "POST">
    <label for="ssn">Enter your SSN: </label><br>
    <input type="text" id="ssn" name="ssn" ><br>   
    <label for = "comp">Choose Company:
                <select name="comp">
                <option value="moderna">Moderna</option>
                <option value="pfizer">Pfizer</option>
                <option value="jandj">Johnson & Johnson</option>
                </select><br>
            </label><br>        
    <button type="submit" value="Submit">Submit</button>
    <button type = "sumbit" formaction = "patient.php">Home</button>
    </form>

    <?php 
        if($_POST["ssn"]){
            $myQ2 = "SELECT * FROM vaccine WHERE COMPANY = '". $_POST["comp"]. "'" ;
            $result = mysqli_query($conn, $myQ2);
            $row = mysqli_fetch_array($result);
            $hold = $row["ON_HOLD"] -  1;
            $id = $row["NAME"];

            $myQ4 = "UPDATE VACCINE SET ON_HOLD =" .$hold . " WHERE NAME = '" . $id. "'";
            if($conn->query($myQ4)) echo "We took a dose off hold for you!";
            else echo "Error: " . $conn->error; 


            $myQ = "DELETE FROM PATIENT_SCHEDULE WHERE PSSN = ". $_POST["ssn"];
            
            
            if($conn->query($myQ)) echo "The time was cancelled!";
            else echo "Error: " . $conn->error; 
        }
        $conn->close();

    ?>

    </body>

</html>