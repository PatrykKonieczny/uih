<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
    </body>
    <h1>Add schedule</h1>

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

    <form action = "schedule.php" method = "POST">
    <label for="eid">Enter Your ID: </label><br>
    <input type="text" id="eid" name="eid" ><br>
    <label for = "day">Choose Day:
                <select name="day">
                <option value="m">Monday</option>
                <option value="t">Tuesday</option>
                <option value="w">Wednesday</option>
                <option value="t">Thursday</option>
                <option value="f">Friday</option>
                <option value="s">Saturday</option>
                </select><br>
            </label><br>
    <label for="date">Enter Schedule Date: </label><br>
    <input type="text" id="date" name="date" ><br> 
    <label for="time">Enter the One Hour Timeslot: </label><br>
    <input type="text" id="time" name="time" ><br>         
    <button type="submit" value="Submit">Submit</button>
    <button type = "sumbit" formaction = "nurse.php">Home</button>
    </form>

    <?php 
        if($_POST["eid"]){


            $myQ2 = "SELECT COUNT(NURSE_ID) FROM NURSE_SCHEDULE WHERE SCH_DATE = '". $_POST["date"] . "' AND TIMESLOT = '". $_POST["time"] . "'";
            $result2 = mysqli_query($conn, $myQ2);
            $row2 = mysqli_fetch_array($result2);
            $timeSlotTotal = $row2["COUNT(NURSE_ID)"];
            if($totalSlotTotal < 13){
                $myQ = "INSERT INTO NURSE_SCHEDULE(NURSE_ID,DAY, SCH_DATE,TIMESLOT) VALUES(";
                $myQ .= $_POST["eid"]. ",'";
                $myQ .= $_POST["day"]. "','";
                $myQ .= $_POST["date"]. "','";
                $myQ .= $_POST["time"]. "')";
                
                if($conn->query($myQ)) echo "The schedule added successfully!";
                else echo "Error: " . $conn->error;   
            }
            else{
                print("That timeslot is not available.");
            }
        }
        $conn->close();

    ?>

    </body>

</html>