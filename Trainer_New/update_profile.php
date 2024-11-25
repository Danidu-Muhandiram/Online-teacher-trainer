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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $new_email = $_POST['email'];
    $password = $_POST['password'];

    // Split name into first and last name
    $name_parts = explode(' ', $name);
    $fname = $name_parts[0];
    $lname = isset($name_parts[1]) ? $name_parts[1] : '';

    // Update query
    $sql = "UPDATE trainer SET fname = ?, lname = ?, email = ?, phone_number = ?, country = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $fname, $lname, $new_email, $phone, $address, $email);

    if ($stmt->execute()) {
        // Update session email if it was changed
        $_SESSION['email'] = $new_email;
        echo "<script>alert('Profile updated successfully'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating profile'); window.location.href='dashboard.php';</script>";
    }

    // Update password if it was provided
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE trainer SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $new_email);
        $stmt->execute();
    }

    $stmt->close();
}

$conn->close();
?>