<?php
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$out = '';
$error = false;
if(isset($_POST["submit"])){
// Checking For Blank Fields..
	if($_POST["vname"]==""||$_POST["vemail"]==""||$_POST["sub"]==""||$_POST["msg"]==""){
		$out = searchForValue('email_incomplete', $data);
		$error = true;
	}else{
// Check if the "Sender's Email" input field is filled out
		$email=$_POST['vemail'];
// Sanitize E-mail Address
		$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
		$email= filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!$email){
			$out = searchForValue('email_incomplete', $data);
			$error = true;
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

			//$mail->SMTPDebug = 3;                               			// Enable verbose debug output

			$mail->isSMTP();                                      			// Set mailer to use SMTP
			$mail->Host 		= searchForValue('email_smtphost', $data);  // Specify main and backup SMTP servers
			$mail->SMTPAuth 	= searchForValue('email_SMTPAuth', $data);  // Enable SMTP authentication
			$mail->Username 	= searchForValue('email_user', $data);      // SMTP username
			$mail->Password 	= searchForValue('email_password', $data);  // SMTP password
			$mail->SMTPSecure 	= searchForValue('email_SMTPSecure', $data);// Enable TLS encryption, `ssl` also accepted
			$mail->Port 		= searchForValue('email_port', $data);      // TCP port to connect to

			$mail->From = $email;
			$mail->FromName = $_POST["vname"];
			$mail->addAddress('egomecor@gmail.com', 'Administrador Mapping LPA');     // Add a recipient

			$mail->Subject = utf8_decode($_POST['sub']);
			$mail->Body    .= (isset($_POST['vname'])?"Nombre: " . $_POST['vname']:"")
							. (isset($_POST['telf'])?"\nTeléfono: " . $_POST['telf']:"")
							. (isset($_POST['vemail'])?"\nCorreo electrónico: " . $_POST['vemail']:"")
							. (isset($_POST['sub'])?"\nNombre del recurso: " . $_POST['sub']:"")
							. (isset($_POST['lat'])?"\nLatitud: " . $_POST['lat']:"")
							. (isset($_POST['long'])?"\nLongitud: " . $_POST['long']:"")
							. (isset($_POST['fuente'])?"\nFuente: " . $_POST['fuente']:"")
							. (isset($_POST['msg'])?"\nComentario: " . $_POST['msg']:"");
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
			    $out = searchForValue('email_error', $data) . '<br>';
			    $out .= 'Error: ' . $mail->ErrorInfo;
			    $error = true;
			} else {
			    $out = searchForValue('email_correcto', $data);
			}
		}
	}
	$class = 'alert-success';
	if ($error){
		$class = 'alert-danger';
	}
	echo "<br><br><div class=\"alert $class\" role=\"alert\">$out</div><br><br><br><br>";
}



