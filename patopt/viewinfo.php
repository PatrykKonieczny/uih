<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css" media = "screen" />
</head>
    <body>
        <h1>View Info</h1> 
            <form action = "viewInfo.php" method = "POST">
            <label for="ssn">Enter your SSN: </label><br>
            <input type="text" id="ssn" name="ssn" ><br>
            <button type="submit" value="Submit">Submit</button>
            <button type = "sumbit" formaction = "patient.php">Home</button>
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
            $table1 = "SELECT * FROM PATIENT WHERE SSN =" . $_POST["ssn"];
            $table2 = "SELECT * FROM PATIENT_SCHEDULE WHERE PSSN =" . $_POST["ssn"];
            $table3 = "SELECT * FROM VAC_RECORD WHERE PATIENT_SSN =" . $_POST["ssn"];


            print("<h2> Personal Information </h2>");
            $result = mysqli_query($conn, $table1);
            print("<table border = '1'>");
            print("<tr><th>First Name</th>
            <th>Last Name</th>
            <th>Middle Initial</th>
            <th>Socail Security Number</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Race</th>
            <th>Occupation</th>
            <th>Medical History</th>
            <th>Phone Number</th>
            <th>Address</th>
            </tr>");
            while($row = mysqli_fetch_array($result)){
                print("<tr>");
                print("<td>".$row["FNAME"]. "</td>");
                print("<td>".$row["LNAME"]. "</td>");
                print("<td>".$row["MI"]. "</td>");
                print("<td>".$row["SSN"]. "</td>");
                print("<td>".$row["AGE"]. "</td>");
                print("<td>".$row["GENDER"]. "</td>");
                print("<td>".$row["RACE"]. "</td>");
                print("<td>".$row["OCCUPATION"]. "</td>");
                Print("<td>".$row["HISTORY"]. "</td>");
                print("<td>".$row["PHONE_NUM"]. "</td>");
                print("<td>".$row["ADDRESS"]. "</td>");
                print("</tr>");
            }
            print("</table>");
            print("<h2> Vaccine Schedule </h2>");
            $result2 = mysqli_query($conn, $table2);
            print("<table border = '1'>");
            print("<tr>
            <th>Scheduled Date For Vaccination</th>
            <th>Vaccination Timeslot</th>
            <th>Vaccine Company</th>
            </tr>");
            while($row2 = mysqli_fetch_array($result2)){
                print("<tr>");
                print("<td>".$row2["SCH_DATE"]. "</td>");
                print("<td>".$row2["TIMESLOT"]. "</td>");
                print("<td>".$row2["VACCINE"]. "</td>");
                print("</tr>");
            }
            print("</table>");



            $result3 = mysqli_query($conn, $table3);
            print("<h2> Vaccine Record </h2>");
            print("<table border = '1'>");
            print("<tr>
            <th>Nurse ID</th>
            <th>Vaccine Recived</th>
            <th>Vaccine Dose Recived</th>
            <th>Vaccine Timeslot</th>
            </tr>");
            while($row3 = mysqli_fetch_array($result3)){
                print("<tr>");
                print("<td>".$row3["NURSE_ID"]. "</td>");
                print("<td>".$row3["VACCINE"]. "</td>");
                print("<td>".$row3["DOSE"]. "</td>");
                print("<td>".$row3["TIMESLOT"]. "</td>");
                print("</tr>");
            }
            print("</table>");

            $conn->close();


        ?>

    </body>
</html> 