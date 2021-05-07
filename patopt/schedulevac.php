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

    <form action = "schedulevac.php" method = "POST">
    <label for="ssn">Enter your SSN: </label><br>
    <input type="text" id="ssn" name="ssn" ><br>
    <label for="date">Enter Schedule Date: </label><br>
    <input type="text" id="date" name="date" ><br> 
    <label for="time">Enter the One Hour Timeslot: </label><br>
    <input type="text" id="time" name="time" ><br> 
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
            $myQ5 = "SELECT COUNT(NURSE_ID) FROM NURSE_SCHEDULE WHERE SCH_DATE = '". $_POST["date"] . "' AND TIMESLOT = '". $_POST["time"] . "'";
            $result5 = mysqli_query($conn, $myQ5);
            $row5 = mysqli_fetch_array($result5);
            $timeSlotTotal = $row5["COUNT(NURSE_ID)"];
            $min = $timeSlotTotal * 10;
            $max = 100;


            if($min > 0 && $min <= $max){

                
                $myQ2 = "SELECT * FROM vaccine WHERE COMPANY = '". $_POST["comp"]. "' and AVAILABILITY - ON_HOLD > 0 " ;
                $result = mysqli_query($conn, $myQ2);
                $row = mysqli_fetch_array($result);
                $hold = $row["ON_HOLD"] +  1;
                $id = $row["NAME"];

                $myQ4 = "UPDATE VACCINE SET ON_HOLD =" . $hold . " WHERE NAME = '" . $id. "'";
                if($conn->query($myQ4)) echo "We put a dose on hold for you!";
                else echo "Error: " . $conn->error; 


                $myQ = "INSERT INTO PATIENT_SCHEDULE(PSSN, SCH_DATE,TIMESLOT, VACCINE) VALUES('";
                $myQ .= $_POST["ssn"]. "','";
                $myQ .= $_POST["date"]. "','";
                $myQ .= $_POST["time"]. "','";
                $myQ .= $_POST["comp"]. "')";
                

                if($conn->query($myQ)) echo "The schedule added successfully!";
                else echo "Error: " . $conn->error; 
            }
            else{
                echo "This slot is not available";
            }

        }
        $conn->close();

    ?>

    </body>

</html>