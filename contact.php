<?php 
	print '
	<h1>Contact Us</h1>
	<div id="contact">
		<iframe src="https://maps.google.com/maps?q=trg%20josipa%20bana%20jela&t=&z=13&ie=UTF8&iwloc=&output=embed" width="50%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	
			<form action="http://work2.eburza.hr/pwa/responsive-page/html/send-contact.php" id="contact_form" name="contact_form" method="POST">
			<label for="fname">First Name:</label><br>
			<input type="text" id="fname" name="firstname" placeholder="Your name.." required><br>
			<label for="lname">Last Name:</label><br>
			<input type="text" id="lname" name="lastname" placeholder="Your last name.." required><br>
				
			
			<label for="email">Your E-mail:</label><br>

			<input type="email" id="email" name="email" placeholder="Your e-mail.." required><br>
			<label for="subject">Subject</label><br>
			<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
			<input type="submit" value="Submit">
		</form>
	</div>';
?>