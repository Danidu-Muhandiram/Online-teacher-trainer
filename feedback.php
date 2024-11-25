<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Feedback</title>
        <link rel="stylesheet" href="feedback.css">
		<link rel="stylesheet" href="navigation_footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>

    <body>

       <!--Navigation Bar-->
		<!-- Include the navigation bar -->
        <?php include 'navigation_bar.html'; ?>
 

		
			<!--FEEDBACK form -->
        <div class="feedback_container">
            <h1 class="h_heading">Your Feedback</h1>
            <p class="p_heading">Help Us Teach Better – Share Your Journey!</p>
		
			<div class="feedback-form">
			<form id="feedback_form" action="create_feedback.php" method="POST">

			<h2>How would you recommend our platform to a friend?</h2>
			<div class="star-rating">
				<input type="radio" id="star1" name="rating" value="5" required>
				<label for="star1" class="star">&#9733;</label>
				<input type="radio" id="star2" name="rating" value="4" required>
				<label for="star2" class="star">&#9733;</label>
				<input type="radio" id="star3" name="rating" value="3" required>
				<label for="star3" class="star">&#9733;</label>
				<input type="radio" id="star4" name="rating" value="2" required>
				<label for="star4" class="star">&#9733;</label>
				<input type="radio" id="star5" name="rating" value="1" required>
				<label for="star5" class="star">&#9733;</label>
			</div>

			<h2>Drop your Experience here, We'd love to hear from you!</h2>

			<div class="input-fields">
				<input type="text" name="name" placeholder="Your Name" required>
				<input type="email" name="email" placeholder="Your Email" required>
				<textarea name="feedback" placeholder="Your Experience" rows="4" required></textarea>
			</div>

			<div class="buttons">
				<button type="submit">Submit</button>
				<button type="reset">Reset</button>
			</div>
		</form>

		</div>

			<!-- Feedback Display Section -->
			<div class="header_container">
				<h3>What Others Say</h3>
			</div>


					   <!-- Feedback Boxes Section -->
						<div class="feedback_section">
							<div class="feedback_box">
								
								<div class="feedback_content">
									<h3>Shehan Perera</h3>
									<p>⭐⭐⭐⭐⭐</p>
									<p>"An exceptional platform that transformed my teaching skills!"</p>
								</div>
							</div>

							<div class="feedback_box">
								
								<div class="feedback_content">
									<h3>D Perera</h3>
									<p>⭐⭐⭐⭐</p>
									<p>"The courses are well-structured and engaging!"</p>
								</div>
							</div>

							<div class="feedback_box">
								
								<div class="feedback_content">
									<h3>Aarav Sharma</h3>
									<p>⭐⭐⭐⭐⭐</p>
									<p>"A fantastic learning experience that I highly recommend!"</p>
								</div>
							</div>

							<div class="feedback_box">
								
								<div class="feedback_content">
									<h3>Emily Brown</h3>
									<p>⭐⭐⭐⭐</p>
									<p>"The UI is intuitive, and the learning material is top-notch."</p>
								</div>
							</div>

							<div class="feedback_box">
								
								<div class="feedback_content">
									<h3>Michael Clark</h3>
									<p>⭐⭐⭐⭐⭐</p>
									<p>"Best platform I’ve ever used for online learning!"</p>
								</div>
							</div>

							<div class="feedback_box">
								
								<div class="feedback_content">
									<h3>Deepal Iyer</h3>
									<p>⭐⭐⭐⭐⭐</p>
									<p>"Empowering courses that make learning enjoyable and effective!"</p>
								</div>
							</div>

							<div class="feedback_box">
								
								<div class="feedback_content">
									<h3>Chris Martin</h3>
									<p>⭐⭐⭐⭐⭐</p>
									<p>"Very easy to navigate and full of useful features!"</p>
								</div>
							</div>

							<div class="feedback_box">
								
								<div class="feedback_content">
									<h3>Freya Johnson</h3>
									<p>⭐⭐⭐⭐</p>
									<p>"A brilliant experience; I've gained so much from this platform!"</p>
								</div>
							</div>
							
							<div class="feedback_box">
								
								<div class="feedback_content">
									<h3>David Johnson</h3>
									<p>⭐⭐⭐⭐⭐</p>
									<p>"TeachConnect has been a valuable resource in my learning journey."</p>
								</div>
							</div>

							<div class="feedback_box">
									
								<div class="feedback_content">
									<h3>Amanda Green</h3>
									<p>⭐⭐⭐⭐</p>
									<p>"The platform is great, though I’d love to see more advanced courses."</p>
								</div>
							</div>
						</div>

							
							
						</div>
					</div>
				</section>

        <!--Footer---->
		<!-- Include the footer -->
        <?php include 'footer.html'; ?>
        <script src="danidu_js/script.js"></script>
		
    </body>

</html>