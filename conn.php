<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_teacher_trainer";

// Create conn
$conn = new mysqli($servername, $username, $password, $dbname);

// Check conn
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
