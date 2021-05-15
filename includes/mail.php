<?php 
if (isset($_POST['myEmail']) && $_POST['myEmail'] !='') {
	$name = $_POST['name'];
	$email = $_POST['myEmail'];
	$message = $_POST['message'];

	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	$string_exp = "/^[A-Za-z .'-]+$/";

	// Input validation
	if (!preg_match($email_exp, $email)) {
			$error_message .= 'The Email address you entered does not appear to be valid.<br>';
		}

	if (!preg_match($string_exp, $name)) {
		$error_message .= 'The Name you entered does not appear to be valid.<br>';
		}

	if (strlen($message) < 2) {
			$error_message .= 'The Message you entered do not appear to be valid.<br>';
		}

	$formcontent="From: $name \n Message: $message";
	$recipient = "donya.mashalapour@gmail.com";
	$subject = "Ali's website contact";
	$mailheader = "From: $email \r\n";
	mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
	echo "Thank You!";

	function clean_string($string) {
			$bad = array("content-type", "bcc:", "to:", "cc:", "href");
			return str_replace($bad, "", $string);
		}
		
	$email_message .= "Name: " . clean_string($name) . "\n";
	$email_message .= "Email: " . clean_string($email) . "\n";
	$email_message .= "Message: " . clean_string($message) . "\n";
	
	// create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

	<!-- include your success message below -->

    Thank you for contacting me. I will be in touch with you soon.

<?php
}
?>