<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
<body>
    <h1>Delete a Nurse</h1>

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


    <form action = "deletenurse.php" method = "POST">
            <label for = "nurseID">Enter a Nurse ID to delete:</label><br>  
            <input type="text" id="nurseID" name="nurseID" ><br> 

            <button type="submit" value="Submit">Submit</button>
            <button type = "sumbit" formaction = "admin.php">Home</button>
    </form>

    <?php
        if($_POST["nurseID"]){
            $myQ = "DELETE FROM nurse WHERE EID = ". $_POST["nurseID"] ;
            if($conn->query($myQ)) echo "The nurse was deleted successfully!";
            else echo "Error: " . $conn->error;;
        }
        $conn->close();
    ?>
</body>

</html>