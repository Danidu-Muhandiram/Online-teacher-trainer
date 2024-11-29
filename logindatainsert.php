<?php
    session_start();
?>

<?php
    require 'config.php'; // Database connection

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email_or_username = $_POST['logemail'];
        $password = $_POST['logpassword'];
    

        // Check in teacher table
        $teacher_query = "SELECT * FROM teacher WHERE (email = ?) AND password = ? ";
        $stmt = $con->prepare($teacher_query);
        $stmt->bind_param("ss", $email_or_username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $teacher = $result->fetch_assoc();
            // Teacher login successful
            $_SESSION['email'] = $teacher['email'];
            $_SESSION['user_id'] = $teacher['teacher_id'];
            $_SESSION['role'] = 'teacher';
             echo "Welcome Teacher, " . $teacher['fname'];
            $_SESSION['fname'] = $teacher['fname'];
            header("Location: home.php"); // Handle teacher login here (e.g., redirect to teacher dashboard)
            exit;
        }

       // Check in trainer table
$trainer_query = "SELECT * FROM trainer WHERE email = ?";
$stmt = $con->prepare($trainer_query);
$stmt->bind_param("s", $email_or_username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch trainer details
    $trainer = $result->fetch_assoc();

    // Verify password using password_verify
    if (password_verify($password, $trainer['password'])) {
        // Trainer login successful
        $_SESSION['user_id'] = $trainer['trainer_id'];
        $_SESSION['role'] = 'trainer';
        $_SESSION['email'] = $trainer['email'];
        $_SESSION['fname'] = $trainer['fname'];

        // Redirect to trainer's dashboard
        header("Location: course.php");
        exit;
    } else {
        echo "<script>alert('Invalid password');</script>";
    }
} else {
    echo "<script>alert('No trainer found with this email');</script>";
}


        // Check in admin table
        $admin_query = "SELECT * FROM admin WHERE email = ?  AND password = ?";
        $stmt = $con->prepare($admin_query);
        $stmt->bind_param("ss", $email_or_username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Admin login successful
            $admin = $result->fetch_assoc();
            $_SESSION['user_id'] = $admin['admin_id'];
            $_SESSION['role'] = 'admin';
            echo "Welcome Admin, " . $admin['fname'];
            header("Location: Admin.html"); // Handle admin login here (e.g., redirect to admin dashboard)
            exit;
        }

        // If no user is found in any table
        echo "Invalid login credentials. Please try again.";
    }

    $con->close();
?>
