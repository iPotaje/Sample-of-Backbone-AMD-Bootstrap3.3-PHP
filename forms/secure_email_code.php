<?php
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

if(isset($_POST["submit"])){
// Checking For Blank Fields..
	if($_POST["vname"]==""||$_POST["vemail"]==""||$_POST["sub"]==""||$_POST["msg"]==""){
		echo "Fill All Fields..";
	}else{
// Check if the "Sender's Email" input field is filled out
		$email=$_POST['vemail'];
// Sanitize E-mail Address
		$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
		$email= filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!$email){
			echo "Invalid Sender's Email";
		}
		else{
			// $subject = $_POST['sub'];
			// $message = $_POST['msg'];
			// $headers = 'From:'. $email . "\r\n"; // Sender's Email
			// // $headers .= 'Cc:'. $email . "\r\n"; // Carbon copy to Sender
			// // Message lines should not exceed 70 characters (PHP rule), so wrap it
			// $message = wordwrap($message, 70);
			// // Send Mail By PHP Mail Function
			// if (mail("egomecor@gmail.com", $subject, $message, $headers)){
			// 	echo "Se ha enviado el correo, gracias!!!";
			// }else{
			// 	echo "Error al mandar correo";
			// }
			
			$mail = new PHPMailer;

			// $mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'palmtron@gmail.com';                 // SMTP username
			$mail->Password = '193645';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                    // TCP port to connect to

			$mail->From = $email;
			$mail->FromName = $_POST["vname"];
			$mail->addAddress('egomecor@gmail.com', 'Joe User');     // Add a recipient
			// $mail->addAddress('ellen@example.com');               // Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			// $mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $_POST['sub'];
			$mail->Body    = $_POST['msg'];
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
			    echo 'No se pudo mandar el correo';
			    echo 'Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Se ha enviado el correo, gracias!!!';
			}
		}
	}
}
?>



