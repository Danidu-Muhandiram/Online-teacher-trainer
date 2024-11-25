<?php

    require 'config.php';

    $sFName = $_POST["sfname"];
    $sLName = $_POST["slname"];
    $sEmail = $_POST["semail"];
    $sTelephone = $_POST["stelephone"];
    $sSubject = $_POST["ssubject"];
    $sCountry = $_POST["scountry"];
    $sPassword = $_POST["spassword"];

    
    // Fetch the latest teacher_id and calculate the next one
    $query = "SELECT teacher_id FROM teacher ORDER BY teacher_id DESC LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $last_teacher_id = $row['teacher_id'];
        $next_teacher_id = 'ST' . str_pad(((int)substr($last_teacher_id, 2)) + 1, 4, '0', STR_PAD_LEFT); // Increment ID
    } else {
        $next_teacher_id = 'ST0001'; // Start from ST0001 if no records found
    }

    $stdSql = "INSERT INTO teacher VALUES ('$next_teacher_id', '$sFName', '$sLName', '$sEmail', '$sTelephone', '$sSubject', '$sCountry', '$sPassword')";

    if($con -> query($stdSql)) {
        header("Location: login.html");
    } else {
        echo "Error".$con -> error;
    }

    $con->close();

?>