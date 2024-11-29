<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online_teacher_trainer";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Form data
    $sFName = $_POST["fname"] ?? '';
    $sLName = $_POST["lname"] ?? '';
    $sEmail = $_POST["email"] ?? '';
    $sTelephone = $_POST["phone_number"] ?? '';
    $sCountry = $_POST["country"] ?? '';
    $sSubject = $_POST["subject"] ?? '';
    $sQualification = $_POST["education"] ?? '';
    $sPassword = $_POST["password"] ?? '';
    $confirmPassword = $_POST["confirm_password"] ?? '';

    if (empty($sFName) || empty($sLName) || empty($sEmail) || empty($sPassword) || empty($confirmPassword)) {
        die("All required fields must be filled.");
    }

    if ($sPassword !== $confirmPassword) {
        die("Passwords do not match.");
    }

    $sPasswordHash = password_hash($sPassword, PASSWORD_DEFAULT);

    // Check if email exists
    $emailCheckStmt = $conn->prepare("SELECT email FROM trainer WHERE email = ?");
    $emailCheckStmt->bind_param("s", $sEmail);
    $emailCheckStmt->execute();
    $emailCheckResult = $emailCheckStmt->get_result();
    if ($emailCheckResult->num_rows > 0) {
        die("Email is already registered.");
    }

    // Fetch the latest trainer_id and calculate the next one
$query = "SELECT trainer_id FROM trainer ORDER BY CAST(SUBSTR(trainer_id, 3) AS UNSIGNED) DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $last_numeric_id = (int)substr($row['trainer_id'], 2); // Extract numeric part (after TR)
    $next_trainer_id = 'TR' . str_pad($last_numeric_id + 1, 3, '0', STR_PAD_LEFT); // Increment ID
} else {
    $next_trainer_id = 'TR002'; // Start from TR002 if no records exist
}

    // Insert new trainer
    $stmt = $conn->prepare("INSERT INTO trainer (trainer_id, fname, lname, email, phone_number, country, subject, qualification_level, password) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $next_trainer_id, $sFName, $sLName, $sEmail, $sTelephone, $sCountry, $sSubject, $sQualification, $sPasswordHash);

    if ($stmt->execute()) {
        header("Location: ../login.html");
        exit;
    } else {
        die("Error executing query: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
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