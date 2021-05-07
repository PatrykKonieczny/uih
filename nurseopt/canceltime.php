<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
    <body>
    <h1> Cancel a timesolt</h1>
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

    <form action = "canceltime.php" method = "POST">
        <label for="nurse_id">Enter Your ID: </label><br>
        <input type="text" id="nurse_id" name="nurse_id" ><br>
        <label for="date">Enter Date: </label><br>
        <input type="text" id="date" name="date" ><br>
        <label for="time">Enter Timeslot: </label><br>
        <input type="text" id="time" name="time" ><br>
        <button type="submit" value="Submit">Submit</button>
        <button type = "sumbit" formaction = "nurse.php">Home</button>
    </form>

    <?php
        if($_POST["nurse_id"]){
            $myQ = "DELETE FROM NURSE_SCHEDULE WHERE NURSE_ID = ". $_POST["nurse_id"] ." AND SCH_DATE = '" . $_POST["date"] . "' AND TIMESLOT = '" . $_POST["time"] . "'";            
            if($conn->query($myQ)) echo "The time was cancelled!";
            else echo "Error: " . $conn->error; 
        }
        $conn->close();

        ?>

    </body>
</html>