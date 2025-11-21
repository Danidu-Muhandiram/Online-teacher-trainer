<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Message</title>

    <style>

        .update_container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .update_title{
            font-size: 20px;
            padding-bottom: 10px;
        }

        label{
            display: block;
        }

        .update_message_box {
            width: 600px;
            height: auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 10px;
        }

        .button{
            display: block;
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
        }

        .update_message_box:focus {
            border-color: lightgreen;
            outline: none;
        }
    </style>
</head>
<body>

<div class="update_container">

<?php

//data base connction

require_once 'config.php';

if(isset($_GET['msg_id'])){
    $msg_id  = $_GET['msg_id'];

    //retrive the details
    $sql="SELECT*FROM contact_us WHERE msg_id  = '$msg_id' ";
    $result= $con->query($sql);

    if ($result->num_rows>0){
    $row=$result->fetch_assoc();
    $message = $row["message"];



    // form
    echo "<form action='update_insert.php' method='post'>";
    echo "<input type='hidden' name='msg_id' value='$msg_id'>";             
    echo "<label class='update_title' >Update Your Message :</label>";
    echo "<textarea class='update_message_box' cols='30' rows='8' placeholder='Your message' name='message'>" . $message . "</textarea>";   
    echo "<input class='button' type='submit' value='submit' class='contact_us_button'>";      
    echo "</form>";}
    

    else {
    echo "No record available";
    }
}

else {
    echo "ID parameter is misiing";
}

?>

</div>
</body>
</html>