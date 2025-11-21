<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_teacher_trainer";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];

// Delete query
$sql = "DELETE FROM trainer2 WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    // Destroy session and redirect to login page
    session_destroy();
    echo "<script>alert('Account deleted successfully'); window.location.href='login.php';</script>";
} else {
    echo "<script>alert('Error deleting account'); window.location.href='dashboard.php';</script>";
}

$stmt->close();
$conn->close();
?>