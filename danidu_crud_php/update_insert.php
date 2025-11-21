<?php

//include Db connectrion
require_once 'config.php';

if(($_SERVER)['REQUEST_METHOD'] == 'POST'){
    $msg_id = $_POST['msg_id'];
    $message = $_POST ["message"];

    //update data in the database
    $sql = "UPDATE contact_us SET message='$message'WHERE msg_id='$msg_id'";

    //check update success

    if($con->query($sql) === TRUE){
        echo "<script>alert('User details updated successfully');</script>";
        echo "<script>window.location.href = '../contact_us.php';</script>";
    }

    else{
        echo "Details update failed : " .$con->error;
    }
}

//close connection
$con->close();

?>