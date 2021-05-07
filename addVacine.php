<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
    </body>
    <h1>Add Vaccine to Database</h1>
    
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

    <form action = "addVacine.php" method = "POST">
            <label for = "name">Enter Lot Number:</label><br>  
            <input type="text" id="name" name="name" ><br> 
            <label for = "comp">Choose Company:
                <select name="comp">
                <option value="moderna">Moderna</option>
                <option value="pfizer">Pfizer</option>
                <option value="jandj">Johnson & Johnson</option>
                </select><br>
            </label><br>
            <label for = "avail">Enter the available doses:</label><br>  
            <input type="text" id="avail" name="avail" ><br> 
            <label for = "disc">Enter discription for the vaccine:</label><br>  
            <input type="text" id="disc" name="disc" ><br> 

            <button type="submit" value="Submit">Submit</button>
            <button type = "sumbit" formaction = "admin.php">Home</button>
    </form>

    <?php
        $on_hold = 0;
        $numDoses = 0;
        if ($_POST["comp"]){
            if($_POST["comp"] != "jandj"){
                $numDoses = 2;
            }
            else{
                $numDoses = 1;
            }
        }
    
        if($_POST["name"]){
            $myQ = "INSERT INTO VACCINE (NAME,COMPANY,REQ_DOSES,TEXT,AVAILABILITY,ON_HOLD) VALUES('";
            $myQ .= $_POST["name"]."','";
            $myQ .= $_POST["comp"]."',";
            $myQ .= $numDoses.",'";
            $myQ .= $_POST["disc"]."',";
            $myQ .= $_POST["avail"].",";
            $myQ .= $on_hold.")";
            if($conn->query($myQ)) echo "The vaccine added successfully!";
            else echo "Error: " . $conn->error;
        }
        $conn->close();

    ?> 



    <body>
</html>