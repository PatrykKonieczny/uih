<html>
    <Location "/">
  AllowMethods GET POST OPTIONS
</Location>
    
    <body>
<?php
    if($_POST["user"])
        $name = $_POST["user"];
        echo "<h1>Welcome " .  $name ."</h1>";

    if($_POST["selectUsers"]){
        $choice = $_POST["selectUsers"];
    }
        
    
    if($choice == "Admin"){
        header("Location: admin.php");
    }
    if($choice == "Nurse"){
        header("Location: nurseopt/nurse.php");
    }
    if($choice == "Patient"){
        header("Location: patopt/patient.php");
    }
        
?>

</body>
</html>
