<?php

//include database connection

require_once 'config.php';

//check the delete_id parameter exists in the url

if(isset($_GET['msg_id'])){
    $deleteID = $_GET['msg_id'];

    $sql="DELETE FROM contact_us WHERE msg_id = '$deleteID'";
    if($con->query($sql)===TRUE){
        echo "<script> alert ('Message Delete Successfully'); </script>";
        echo "<script> window.location.href='../contact_us.php';</script>";}

        else{
            echo "Message deleted Failed. Please try again later";
        }
    }

    else{
        echo "delete id parameter not found";

    }

    $con->close();
?>