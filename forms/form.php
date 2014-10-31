<?php

function searchForValue($campo, $array) {
   // echo $campo;
   // print_r($array);
   foreach ($array as $val) {
   		foreach ($val as $key => $obj){
   			if ($obj === $campo){
   				return $val['valor'];
   			}
   		}
   }
   
   return null;
}


$url1 = 'http://localhost/map/require3/db/toJSON.php?cmd=configuracionesemail';
$data = json_decode(file_get_contents($url1), true);

$url2 = 'http://localhost/map/require3/db/toJSON.php?cmd=paginasform';
$page =	json_decode(file_get_contents($url2), true);

// print_r($data);
// print_r(searchForValue('email_user', $data));
?>
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
<!-- 			
			<h3>Contacta</h3>
			<p>Este es un formulario de contacto</p>
			</div>
			
			<form action="#" id="form" method="post" name="form">
				<input name="vname" placeholder="Nombre:" type="text" value="">
				<input name="vemail" placeholder="Correo electrónico:" type="text" value="">
				<input name="sub" placeholder="Título" type="text" value="">
				<label>Comentario:</label>
				<textarea name="msg" placeholder="Escribe tu comentario aquí..."></textarea>
				<input id="send" name="submit" type="submit" value="Enviar">
			</form> 
			-->
			<?php
				// print_r($page);
				echo $page[0]['content'];
			?>
<form action="#" id="form" method="post" name="form">

	*Nombre:<br><input name="vname" placeholder="Nombre:" type="text" value="">

	Teléfono:<br><input name="telefono" placeholder="Teléfono:" type="text" value="">

	*Correo electrónico:<br><input name="vemail" placeholder="Correo electrónico:" type="text" value="">

	Nombre del recurso:<input name="sub" placeholder="Título" type="text" value="">

	Localización:Latitud:Longitud:

	Fuente:<br>
	<p>A continuación, puedes escribir la información que te gustaría incluir en Mapping Las Palmas de Gran Canaria. También puedes advertirnos de posibles errores y realizar comentarios o sugerencias. Gracias por tu colaboración.</p>

	<label>Comentario:</label>
	<textarea name="msg" placeholder="Escribe tu comentario aquí..."></textarea>

	<input id="send" name="submit" type="submit" value="Enviar">
</form>
*Campos obligatorios

Tus datos serán tratados de acuerdo a la L.O.P.D. 15/99 y no serán transmitidos a terceros sin tu consentimiento.			
			<h3><?php include "secure_email_code.php";?></h3>
		</div>
	</div>
</body>
</html>