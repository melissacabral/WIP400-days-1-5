<?php 
//parse the form IF they submitted it
if( $_POST['did_submit'] ){
	//extract the data
	//TODO: CLEAN the data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$reason = $_POST['reason'];
	$message = $_POST['message'];

	//prepare the parts of the email
	$to = 'melissacabral@gmail.com';
	$subject = 'A contact form submission from ' . $name ;

	$body = "Sent by: $name \n";
	$body .= "Email Address: $email \n";
	$body .= "Phone: $phone \n";
	$body .= "Reason for contact: $reason \n\n";
	$body .= "Message: $message";

	$headers = "Bcc: $email \r\n"; //send a copy to the person who filled in the form
	$headers .= "Reply-to: $email \r\n";
	$headers .= "From: contact@melissacabral.com";

	//try to send the mail
	$mail_sent = mail( $to, $subject, $body, $headers );

	//set up user feedback
	if( $mail_sent ){
		$feedback = "Thank you for contacting me, $name. I'll be in touch!";
		$css_class = 'success';
	}else{
		$feedback = 'Sorry, there was a problem sending your message. Try again.';
		$css_class = 'error';
	}

}//end parser
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Form Demo</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Contact Me</h1>

	<?php //show user feedback if the form was submitted
	if( isset( $feedback ) ){
		echo '<div class="' . $css_class . '">';
		echo $feedback;
		echo '</div>';
	}
	?>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<ol>
			<li>
				<label for="thename">Name:</label>
				<input type="text" name="name" id="thename">
			</li>
			<li>
				<label for="theemail">Email Address:</label>
				<input type="email" name="email" id="theemail">
			</li>
			<li>
				<label for="thephone">Phone Number:</label>
				<input type="tel" name="phone" id="thephone">
			</li>
			<li>
				<label for="thereason">How can I help you?</label>
				<select name="reason" id="thereason">
					<option selected>Choose One:</option>
					<option value="customer service">I need customer service</option>
					<option value="just sayin' hi!">I just want to say 'hi'</option>
					<option value="website issue">I found an issue on your site</option>	
				</select>
			</li>
			<li>
				<label for="themessage">Your Message:</label>
				<textarea name="message" id="themessage"></textarea>
			</li>
			<li>
				<input type="submit" value="Send Message">
				<input type="hidden" name="did_submit" value="true">
			</li>
		</ol>
	</form>
</body>
</html>