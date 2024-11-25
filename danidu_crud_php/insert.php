<?php

//include connection PHP file

require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST ["name"];
    $phone_number = $_POST ["phone_number"];
    $email = $_POST ["email"];
    $subject = $_POST ["subject"];
    $message = $_POST ["message"];
}

//insert data in to
$sql = "INSERT INTO contact_us (name,phone_number,email,subject,message)
VALUES ('$name','$phone_number','$email', '$subject', '$message')";

//check if the insert was successful

if($con->query($sql) === TRUE){
    echo "<script>alert('Data Added Sucessfully')</script>";
    echo "<script>window.location.href='../contact_us.php';</script>";
}

else{
    echo "Error : " .$sql . "<br>" . $con->error;
}

//close connection
$con->close();
?>