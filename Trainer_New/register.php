<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_teacher_trainer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sFName = $_POST["fname"];
$sLName = $_POST["lname"];
$sEmail = $_POST["email"];
$sTelephone = $_POST["phone_number"];
$sCountry = $_POST["country"];
$sSubject = $_POST["subject"];
$sQualification = $_POST["education"];
$sPassword = password_hash($_POST["password"], PASSWORD_DEFAULT); // Use hashed password for security

// Fetch the latest trainer_id and calculate the next one
$query = "SELECT trainer_id FROM trainer ORDER BY trainer_id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $last_trainer_id = $row['trainer_id'];
    $next_trainer_id = 'TR' . str_pad(((int)substr($last_trainer_id, 2)) + 1, 4, '0', STR_PAD_LEFT); // Increment ID
} else {
    $next_trainer_id = 'TR0001'; // Start from TR0001 if no records found
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO trainer (trainer_id, fname, lname, email, phone_number, country, subject, qualification_level, password) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $next_trainer_id, $sFName, $sLName, $sEmail, $sTelephone, $sCountry, $sSubject, $sQualification, $sPassword);

// Execute the query and check for success
if ($stmt->execute()) {
    header("Location: login.php"); // Redirect to login page on success
} else {
    echo "Error: " . $stmt->error; // Display error message
}

$stmt->close(); // Close the prepared statement
$conn->close(); // Close the database connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            font-family: sans-serif, Arial, Helvetica;
            background-color: #FAF9F6;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .toggle-button {
            display: flex;
            justify-content: end;
            margin: 15px 15px 50px;
        }

        .toggle-button button {
            font-size: 16px;
            color: white;
            padding: 5px;
            margin-right: 2px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            background-color: #18185c;
            cursor: pointer;
        }

        .register-details {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-field {
            margin-top: 10px;
        }

        input {
            width: 300px;
            padding: 10px;
            border-color: black;
            border-width: 2px;
            border-radius: 3px;
        }

        #edu-select {
            width: 323px;
            padding: 10px;
            border-color: black;
            border-width: 2px;
            border-radius: 3px;
        }

        #errorMessage, #charcheck, #numbermessage {
            color: red;
            font-size: 12px;
        }

        form button {
            font-size: 16px;
            color: white;
            padding: 10px;
            width: 200px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #18185c;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="register-details">
        <form method="POST" action="register.php">
            <div class="input-field">
                <input type="text" name="fname" placeholder="First Name" required>
            </div>
            <div class="input-field">
                <input type="text" name="lname" placeholder="Last Name" required>
            </div>
            <div class="input-field">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-field">
                <input type="number" name="phone_number" placeholder="Phone Number" required>
            </div>
            <div class="input-field">
                <input type="text" name="country" placeholder="Country" required>
            </div>
            <div class="input-field">
                <input type="text" name="subject" placeholder="Subject" required>
            </div>
            <div class="input-field">
                <select name="education" id="edu-select" required>
                    <option value="Bachelor">Bachelor</option>
                    <option value="Master">Master</option>
                    <option value="Doctorate">Doctorate</option>
                </select>
            </div>
            <div class="input-field">
                <input id="password" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-field">
                <input id="confirm-password" type="password" name="confirm_password" placeholder="Re-enter password" required>
            </div>
            <button type="submit" class="register">Create an account</button>
        </form>
        <p class="sign-in">already have an account? <a href="login.php">Sign in</a></p>
    </div>
    <?php
 ?>
</body>
</html>