<?php
session_start();

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
    $logemail = $_POST['logemail'];
    $logpassword = $_POST['logpassword'];

    $sql = "SELECT * FROM trainer2 WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $logemail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($logpassword, $row['password'])) {
            $_SESSION['trainer_id'] = $row['trainer_id'];
            $_SESSION['email'] = $row['email'];
            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Invalid password');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h2>Welcome</h2>
        <form action="" method="POST">
            <div class="input-field">
                <input type="email" name="logemail" placeholder="Email or Username" required>
            </div>
            <div class="input-field">
                <input type="password" name="logpassword" placeholder="Password" required>
            </div>
            <button type="submit" class="login">Login</button>
            <p>Don't have an account? <a class="register" href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>