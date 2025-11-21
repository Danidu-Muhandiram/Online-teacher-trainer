<?php
    $con=new mysqli("localhost","root","","online_teacher_trainer");

    if($con->connect_error)
    {
        
        if($con->connect_error)
        {
            die("Connection failed: ".$con->connect_error);
        }

        else{
            echo "Connected successfully";
        }
    }
?>