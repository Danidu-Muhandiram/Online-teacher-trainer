<?php

$con = new mysqli("localhost", "root", "", "online_teacher_trainer");

if($con -> connect_error) {
    die("connection failed ".$con -> connect_error);
} 

?>