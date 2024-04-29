<!--
    TechTitans Contact Us Page
    Date last modified: 4/13/24
    Who last modified: Adam Pousson
-->

<!DOCTYPE html>
<html lang="en">

    <header>
        <!-- Author of webpage-->
		<meta name = "author" content = "Jett Rogers, Adam Pousson"/>
		
		<!-- Description of webpage-->
		<meta name = "description" content = "TexhTitans Store"/>
		
		<!-- Keywords of webpage-->
		<meta name = "keywords" content = "HTML, Web Programming"/>
		
		<!-- Charachter set of webpage-->
		<meta charset = "UTF-8"/>
		
		<!--Link to external stylesheet -->
		<link href = "style.css" type = "text/css" rel = "stylesheet">
    </header>

    <body>

        <?php include("Header.php") ?>
		<!-- Contact Form -->
		<div class="contact-form">
		  <h2>Contact Us</h2>
		  <form id="contactForm">
			<label for="email">Email:</label><br>
			<input type="email" id="email" name="email" required><br>
			<label for="orderNumber">Order Number:</label><br>
			<input type="text" id="orderNumber" name="orderNumber"><br>
			<label for="message">Message:</label><br>
			<textarea id="message" name="message" rows="4" cols="50" required></textarea><br>
			<input type="submit" value="Submit">
		  </form>
		</div>

		<!-- Popup Message -->
		<div id="popup" class="popup" sytle="display: none;">
		  <p>Thank you for contacting us! A member of our team will be with you shortly.</p>
		  <button id="closePopup" onclick="closePopup()">Close</button>
		</div>
 
		 <!--Footer Code-->
        <?php include("Footer.php") ?>
        <script src="store.js" defer></script>
    </body>

</html>
