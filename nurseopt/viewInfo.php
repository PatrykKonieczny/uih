<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
    <body>
        <h1>View Info</h1> 

        <form action = "viewInfo.php" method = "POST">
        <label for="eid">Enter your ID: </label><br>
        <input type="text" id="eid" name="eid" ><br>
        <button type="submit" value="Submit">Submit</button>
        <button type = "sumbit" formaction = "nurse.php">Home</button>
        </form>
        

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

            $myTable1 = "SELECT * FROM nurse WHERE EID = ". $_POST["eid"];
            $myTable2 = "SELECT * FROM NURSE_SCHEDULE WHERE NURSE_ID = " . $_POST["eid"];
            print("<h2>Persnal Information</h2>");
            $result1 = mysqli_query($conn, $myTable1);
            print("<table border = '1'>");
            print("<tr><th>First Name</th>
            <th>Last Name</th>
            <th>Middle Initial</th>
            <th>ID</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Address</th>
            </tr>");
            while($row = mysqli_fetch_array($result1)){
                print("<tr>");
                print("<td>".$row["FNAME"]. "</td>");
                print("<td>".$row["LNAME"]. "</td>");
                print("<td>".$row["MI"]. "</td>");
                print("<td>".$row["EID"]. "</td>");
                print("<td>".$row["AGE"]. "</td>");
                print("<td>".$row["GENDER"]. "</td>");
                print("<td>".$row["PHONE_NUM"]. "</td>");
                print("<td>".$row["ADDRESS"]. "</td>");
                print("</tr>");
            }

            print("</table>");

            print("<h2>Schedule Information</h2>");
            $result2 = mysqli_query($conn, $myTable2);
            print("<table border = '1'>");
            print("<tr>
            <th>Day</th>
            <th>Schedule Date</th>
            <th>Timeslot</th>
            </tr>");
            while($row2 = mysqli_fetch_array($result2)){
                print("<tr>");
                print("<td>".$row2["DAY"]. "</td>");
                print("<td>".$row2["SCH_DATE"]. "</td>");
                print("<td>".$row2["TIMESLOT"]. "</td>");
                print("</tr>");
            }

            print("</table>");
        ?>

    </body>
<html>