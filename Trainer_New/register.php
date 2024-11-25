<?php
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

$notification = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $country = $_POST['country'];
    $subject = $_POST['subject'];
    $qualification_level = $_POST['education'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO trainer (fname, lname, email, phone_number, country, subject, qualification_level, password)
            VALUES ('$fname', '$lname', '$email', '$phone_number', '$country', '$subject', '$qualification_level', '$password')";

    if ($conn->query($sql) === TRUE) {
        $notification = "Registered successfully";
    } else {
        $notification = "Error: " . $sql . "<br>" . $conn->error;
    }

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
    <?php if ($notification): ?>
        <script>
            alert("<?php echo $notification; ?>");
        </script>
    <?php endif; ?>
</body>
</html>