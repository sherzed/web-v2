<?php

	// site owner
	$site_name = 'erenyilmaz.ml';
	$sender_domain = 'info@erenyilmaz.ml';
	$to = 'sherzed0@gmail.com';
	
	// contact form fields
	$name = trim( $_POST['name'] );
	$email = trim( $_POST['email'] );
	$subject = trim( $_POST['subject'] );
	$message = trim( $_POST['message'] );
	
	// check for error
	$error = false;
	if ( $name === "" ) { $error = true; }
	if ( $email === "" ) { $error = true; }
	if ( $subject === "" ) { $error = true; }
	if ( $message === "" ) { $error = true; }
	
	// anti-spam check
	// http://nfriedly.com/techblog/2009/11/how-to-build-a-spam-free-contact-forms-without-captchas/
	// if the url field is empty 
	if(isset($_POST['url']) && $_POST['url'] == ''){
		 
		 // if no error, then send mail
		if ( $error == false )
		{
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
			
			$headers = "From: " . $site_name . ' <' . $sender_domain . '> ' . "\r\n";
			$headers .= "Reply-To: " . $name . ' <' . $email . '> ' . "\r\n";
			
			$mail_result = mail( $to, $subject, $body, $headers );
			
			if ( $mail_result == true )
				{ echo 'success'; }
			else
				{ echo 'unsuccess'; }
		}
		else // not validated
		{
			echo 'error';
		}
		// end if
		 
	}
?>