<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
    <body>
    <h1>Update Patient Inforamtion</h1>

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

    
    <form action = "updatepat.php" method = "POST">
        <label for="ssn">Enter SSN: </label><br>
        <input type="text" id="ssn" name="ssn" ><br>
        <label for="fname">Change First Name:</label><br>
        <input type="text" id="fname" name="fname" ><br>
        <label for="lname">Change Last Name:</label><br>
        <input type="text" id="lname" name="lname" ><br>
        <label for="mi">Change Middle Initial:</label><br>
        <input type="text" id="mi" name="mi" ><br>
        <label for="age">Change Age:</label><br>
        <input type="text" id="age" name="age" ><br>
        <label for="gender">Change Gender:</label><br>
        <input type="text" id="gender" name="gender" ><br>
        <label for="race">Change Race:</label><br>
        <input type="text" id="race" name="race" ><br>
        <label for="occupation">Change Enter Occupation:</label><br>
        <input type="text" id="occupation" name="occupation" ><br>
        <label for="history">Change Medical History:</label><br>
        <input type="text" id="history" name="history" ><br>
        <label for="phone_num">Change Phone Number:</label><br>
        <input type="text" id="phone_num" name="phone_num" ><br>
        <label for="adder">Change Address:</label><br>
        <input type="text" id="adder" name="adder"><br>
        <button type="submit" value="Submit">Submit</button>
        <button type = "sumbit" formaction = "patient.php">Home</button>
    </form>

    <?php 
            if($_POST["ssn"]){
                if($_POST["fname"]){
                    $myQ = "UPDATE PATIENT SET FNAME = '" . $_POST["fname"]. "' WHERE SSN = '". $_POST["ssn"]."'" ; 
                    if($conn->query($myQ)) echo "The first name updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["lname"]){
                    $myQ = "UPDATE PATIENT SET LNAME = '" . $_POST["lname"]. "' WHERE SSN = ". $_POST["ssn"]."" ; 
                    if($conn->query($myQ)) echo "The last name updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["mi"]){
                    $myQ = "UPDATE PATIENT SET MI = '" . $_POST["mi"]. "' WHERE SSN = ". $_POST["ssn"]."" ; 
                    if($conn->query($myQ)) echo "The mi updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["age"]){
                    $myQ = "UPDATE PATIENT SET AGE = '" . $_POST["age"]. "' WHERE SSN = ". $_POST["ssn"]."" ; 
                    if($conn->query($myQ)) echo "The age updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["gender"]){
                    $myQ = "UPDATE PATIENT SET GENDER = '" . $_POST["gender"]. "' WHERE SSN = ". $_POST["ssn"]."" ;  
                    if($conn->query($myQ)) echo "The gender updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["race"]){
                    $myQ = "UPDATE PATIENT SET RACE = '" . $_POST["race"]. "' WHERE SSN = ". $_POST["ssn"]."" ; 
                    if($conn->query($myQ)) echo "The race updated successfully!";
                    else echo "Error: " . $conn->error; 
                }

                if($_POST["occupation"]){
                    $myQ = "UPDATE PATIENT SET OCCUPATION = '" . $_POST["occupation"]. "' WHERE SSN = ". $_POST["ssn"]."" ; 
                    if($conn->query($myQ)) echo "The occupation updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["history"]){
                    $myQ = "UPDATE PATIENT SET HISTORY = '" . $_POST["history"]. "' WHERE SSN = ". $_POST["ssn"]."" ; 
                    if($conn->query($myQ)) echo "The history updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["phone_num"]){
                    $myQ = "UPDATE PATIENT SET PHONE_NUM = '" . $_POST["phone_num"]. "' WHERE SSN = ". $_POST["ssn"]."" ; 
                    if($conn->query($myQ)) echo "The phone number updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
                if($_POST["adder"]){
                    $myQ = "UPDATE PATIENT SET ADDRESS = '" . $_POST["adder"]. "' WHERE SSN = ". $_POST["ssn"]."" ; 
                    if($conn->query($myQ)) echo "The address updated successfully!";
                    else echo "Error: " . $conn->error; 
                }
            }

            
            $conn->close();
        ?>



    </body>
</html>