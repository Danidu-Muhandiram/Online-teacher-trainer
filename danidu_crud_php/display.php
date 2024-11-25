<?php

//insert DB connection

require_once 'config.php';

$sql = "SELECT msg_id , message FROM contact_us";
$result=$con->query($sql);

// Create an empty array to store the messages
$messages = [];

if ($result->num_rows > 0) {
    // Fetch messages and store them in the array
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$con->close();

// Return messages array for use in the HTML page
return $messages;

?>