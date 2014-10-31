<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<!-- Feedback Form Starts Here -->
		<div id="feedback">
			<!-- Heading Of The Form -->
			<div class="head">
			<h3>Contacta</h3>
				<p>Este es un formulario de contacto</p>
			</div>
			<!-- Feedback Form -->
			<form action="#" id="form" method="post" name="form">
				<input name="vname" placeholder="Nombre:" type="text" value="">
				<input name="vemail" placeholder="Correo electrónico:" type="text" value="">
				<input name="sub" placeholder="Título" type="text" value="">
				<label>Comentario:</label>
				<textarea name="msg" placeholder="Escribe tu comentario aquí..."></textarea>
				<input id="send" name="submit" type="submit" value="Enviar">
			</form>
			<h3><?php include "secure_email_code.php";?></h3>
		</div>
	</div>
	<!-- Feedback Form Ends Here -->
</body>
</html>