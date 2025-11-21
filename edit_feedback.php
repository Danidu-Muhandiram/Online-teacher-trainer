<?php
// Include database conn
include 'conn.php';

$id = $_GET['id'];
$sql = "SELECT * FROM feedback WHERE feedback_id='$id'";
$result = $conn->query($sql);
$feedback = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback_text = $_POST['feedback'];
    $rating = $_POST['rating'];

    // Update feedback data
    $sql = "UPDATE feedback SET name='$name', email='$email', feedback='$feedback_text', rating='$rating' WHERE feedback_id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: view_feedback.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Feedback</title>
        <link rel="stylesheet" href="feedback.css">
		<style>

			/* form styling */
			form {
				width: 100%;
				max-width: 600px;
				margin: 20px auto;
				padding: 20px;
				background-color: #f9f9f9;
				border-radius: 10px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			}

			form label {
				font-weight: bold;
				margin-top: 10px;
				display: block;
			}

			form input[type="text"], 
			form input[type="email"], 
			form textarea {
				width: 100%;
				padding: 10px;
				margin: 10px 0;
				border: 1px solid #ccc;
				border-radius: 5px;
				box-sizing: border-box;
				font-size: 16px;
			}

			form textarea {
				resize: vertical;
				min-height: 120px;
			}

			form input[type="radio"] {
				margin-right: 5px;
			}

			form button[type="submit"] {
				padding: 10px 20px;
				color: white;
				border: none;
				border-radius: 5px;
				cursor: pointer;
				font-size: 15px;
				background-color: #152153;
				color: white;
				border: none;
				border-radius: 40px;
			}

			form button[type="submit"]:hover {
				    background-color: #152153;
					color: white;
					border: none;
			}

			/* Responsive Media Queries */
			@media (max-width: 600px) {
				form {
					padding: 15px;
				}

				form label {
					font-size: 14px;
				}

				form input[type="text"], 
				form input[type="email"], 
				form textarea {
					font-size: 14px;
				}

				form button[type="submit"] {
					width: 100%;
					font-size: 14px;
				}
				

			}
		</style>
    </head>

    <body>

       <!--Navigation Bar-->



					 <!--feeback edit form-->

					<br><br><br><br><br><br>

					<center><h1 class="h_heading">Edit Feedback</h1></center>

					<form action="" method="POST">
						<label>Name:</label>
						<input type="text" name="name" value="<?= $feedback['name'] ?>" required><br>
						
						<label>Email:</label>
						<input type="email" name="email" value="<?= $feedback['email'] ?>" required><br>
						
						<label>Feedback:</label>
						<textarea name="feedback" required><?= $feedback['feedback'] ?></textarea><br>
						
						<label>Rating:</label><br>
						<input type="radio" name="rating" value="5" <?= $feedback['rating'] == '5' ? 'checked' : '' ?>> 5
						<input type="radio" name="rating" value="4" <?= $feedback['rating'] == '4' ? 'checked' : '' ?>> 4
						<input type="radio" name="rating" value="3" <?= $feedback['rating'] == '3' ? 'checked' : '' ?>> 3
						<input type="radio" name="rating" value="2" <?= $feedback['rating'] == '2' ? 'checked' : '' ?>> 2
						<input type="radio" name="rating" value="1" <?= $feedback['rating'] == '1' ? 'checked' : '' ?>> 1
						<br><br>
						
						<button type="submit">Update</button>
					</form>




        <!--Footer -->



</body>
</html>
