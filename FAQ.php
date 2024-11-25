<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TeachConnect</title>
	<link rel="stylesheet" href="navigation_footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
					<style>
					
					/* Body Styles*/

					* {
						margin: 0;
						padding: 0;
						box-sizing: border-box;
						font-family: "Poppins", sans-serif;
						
					}

					body {
						background-color: white;
					}

					html{
						scroll-behavior: smooth;
					}



					/* FAQ Style */
					.faq-section {
						margin-top: 12px;
						padding: 50px;
						background-color: #f4f4f9;
						text-align: center;
					}

					.faq-section h1 {
						color: #152153;
						font-size: 36px;
						margin-bottom: 10px;
					}

					.faq-tagline {
						font-size: 20px;
						color: #555;
						margin-bottom: 20px;
						text-align: center	;
						text-justify: inter-word;
					}


					.faq-box {
						max-width: 800px;
						margin: 0 auto;
						text-align: left;
					}

					.faq-item {
						background-color: white;
						border: 1px solid #ddd;
						margin-bottom: 10px;
						padding: 15px;
						border-radius: 5px;
						box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
					}

					.faq-question {
						font-size: 18px;
						font-weight: bold;
						color: #152153;
						cursor: pointer;
						margin: 0;
					}

					.faq-answer {
						font-size: 16px;
						color: #333;
						padding-top: 3px;
						max-height: 0;
						overflow: hidden;
						transition: max-height 0.3s ease-out;
					}

					.faq-answer.open {
						max-height: 150px; 
					}

				  </style>
</head>
<body>

        <!--Navigation Bar-->

 		<!-- Include the navigation bar -->
		<?php include 'navigation_bar.html'; ?>
 
 
 
	
				<!-- FAQ -->
				<section class="faq-section">
					<h1>Frequently Asked Questions</h1>
					<p class="faq-tagline">Connecting you to the answers you need with TeachConnect.</p>
					<div class="faq-box">
						<div class="faq-item">
							<h3 class="faq-question">What is TeachConnect?</h3>
							<p class="faq-answer">TeachConnect serves as a comprehensive resource hub for educators and teachers, offering specialized courses and training in essential soft skills.</p>
						</div>
						<div class="faq-item">
							<h3 class="faq-question">Who can benefit from TeachConnect?</h3>
							<p class="faq-answer">Both experienced educators and newcomers to the profession can benefit from our courses and professional development resources.</p>
						</div>
						<div class="faq-item">
							<h3 class="faq-question">How do I enroll in a course?</h3>
							<p class="faq-answer">Simply create an account, select your course, and click Enroll.</p>
						</div>
						<div class="faq-item">
							<h3 class="faq-question">Are the courses certified?</h3>
							<p class="faq-answer">Yes, all our courses offer certificates upon successful completion.</p>
						</div>
						<div class="faq-item">
							<h3 class="faq-question">How can I access my account?</h3>
							<p class="faq-answer">You can access your account by logging in with your registered email and password from the homepage.</p>
						</div>
						<div class="faq-item">
							<h3 class="faq-question">Is there a refund policy?</h3>
							<p class="faq-answer">Yes, for refund inquiries, please contact our support team through the "Contact Us" page.</p>
						</div>
						<div class="faq-item">
							<h3 class="faq-question">Can I access the courses on mobile?</h3>
							<p class="faq-answer">Yes, TeachConnect is fully responsive and can be accessed on mobile devices.</p>
						</div>
						<div class="faq-item">
							<h3 class="faq-question">What payment methods are accepted?</h3>
							<p class="faq-answer">We accept major credit cards and online payment services such as PayPal.</p>
						</div>
						<div class="faq-item">
							<h3 class="faq-question">How do I contact support?</h3>
							<p class="faq-answer">You can contact support via the "Contact Us" page or email us at support@teachconnect.com.</p>
						</div>
						<div class="faq-item">
							<h3 class="faq-question">Do you offer discounts for bulk course registrations?</h3>
							<p class="faq-answer">Yes, we offer discounts for institutions and groups registering in bulk. Contact our support team for more details.</p>
						</div>
							<div class="faq-item">
								<h3 class="faq-question">Can trainers teach on the platform?</h3>
								<p class="faq-answer">Yes, trainers can teach on TeachConnect. You can select a trainer when registering for TeachConnect.</p>
							</div>
					</div>
				</section>
	
       	<!--Footer-->
		<!-- Include the footer -->
		<?php include 'footer.html'; ?>
    	<script src="danidu_js/script.js"></script>
 
 
 
 
<script>
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling; 

            if (answer.classList.contains('open')) {
                answer.classList.remove('open');
                answer.style.maxHeight = "0"; 
            } else {
                answer.classList.add('open');
                answer.style.maxHeight = answer.scrollHeight + "px"; 
            }
        });
    });
</script>


</body>
</html>
