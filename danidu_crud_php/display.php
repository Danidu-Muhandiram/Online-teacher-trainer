<?php

//insert DB connection

require_once 'config.php';
// Get the logged-in user's ID
$userId = $_SESSION['user_id'];

// Query to fetch messages for this teacher
$sql = "SELECT msg_id, message FROM contact_us WHERE user_id = ? AND role = 'teacher'";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();

$result = $stmt->get_result();
$messages = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$stmt->close();
$con->close();
?>