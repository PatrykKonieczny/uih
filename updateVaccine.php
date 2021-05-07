<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
    <body>
        <h1>Update Vaccine Info</h1>
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


        <form action = "updateVaccine.php" method = "POST">
            <label for = "name">Enter Lot Number To Update:</label><br>  
            <input type="text" id="name" name="name" ><br> 
            <label for = "numVac">Enter updated vaccine doses available:</label><br>  
            <input type="text" id="numVac" name="numVac" ><br> 

            
            <button type="submit" value="Submit">Submit</button>
            <button type = "sumbit" formaction = "admin.php">Home</button>
        </form>

        <?php 
            if($_POST["name"]){
                $myQ = "UPDATE VACCINE SET AVAILABILITY =" . $_POST["numVac"]. " WHERE NAME = '". $_POST["name"]."'" ; 
                if($conn->query($myQ)) echo "The vaccine updated successfully!";
                else echo "Error: " . $conn->error;
            }
            $conn->close();

        ?>

    </body>
</html>