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
	<!-- build:css(.tmp) styles/main.css -->
	<link rel="stylesheet" href="../../.tmp/styles/main.css">
	<!-- endbuild -->
</head>
<body>
<script>
    window.onload = function() {
    if (parent) {
        var oHead = document.getElementsByTagName("head")[0];
        var arrStyleSheets = parent.document.getElementsByTagName("link");
        for (var i = 0; i < arrStyleSheets.length; i++){    
            oHead.appendChild(arrStyleSheets[i].cloneNode(true));
        }            
    }    
}
</script>
	<div class="container">
		<!-- Feedback Form Starts Here -->
		<div id="feedback">
			<!-- Heading Of The Form -->
			<div class="head">
    <form class="form-horizontal" action="#" id="form" method="post" name="form">

        <div class="form-group<?php echo (isset($_POST['submit']) && (trim($_POST['vname'])=='')?' has-error':'')?>">
            <label for="inputName" class="control-label col-xs-3" style="text-align:right">*Nombre:</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="inputName" placeholder="Nombre" name="vname"
                <?php echo (isset($_POST['vname'])?'value="'.$_POST['vname'].'"':''); ?>>
            </div>
        </div>

        <div class="form-group">
            <label for="inputTelf" class="control-label col-xs-3" style="text-align:right">Teléfono:</label>
            <div class="col-xs-8">
                <input type="tel" class="form-control" id="inputTelf" placeholder="Teléfono" name="telf"
                <?php echo (isset($_POST['telf'])?'value="'.$_POST['telf'].'"':''); ?>>
            </div>
        </div>

        <div class="form-group<?php echo (isset($_POST['submit']) && (trim($_POST['vemail'])=='')?' has-error':'')?>">
            <label for="inputEmail" class="control-label col-xs-3" style="text-align:right">*Correo electrónico:</label>
            <div class="col-xs-8">
                <input type="email" class="form-control" id="inputEmail" placeholder="Correo electrónico" name="vemail" 
                <?php echo (isset($_POST['vemail'])?'value="'.$_POST['vemail'].'"':''); ?>>
            </div>
        </div>

        <div class="form-group<?php echo (isset($_POST['submit']) && (trim($_POST['sub'])=='')?' has-error':'')?>">
            <label for="inputNombre" class="control-label col-xs-3" style="text-align:right">*Nombre del recurso:</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="inputNombre" placeholder="Nombre del recurso" name="sub"
                <?php echo (isset($_POST['sub'])?'value="'.$_POST['sub'].'"':''); ?>>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" style="text-align:right">Localización:</label>
        </div>        
        <div class="form-group">
            <label for="inputLat" class="control-label col-xs-5" style="text-align:right">Latitud:</label>
            <div class="col-xs-6">
                <input type="number" class="form-control" id="inputLat" placeholder="Latitud" name="lat"
                <?php echo (isset($_POST['lat'])?'value="'.$_POST['lat'].'"':''); ?>>
            </div>
        </div>
        <div class="form-group">
            <label for="inputLong" class="control-label col-xs-5" style="text-align:right">Longitud:</label>
            <div class="col-xs-6">
                <input type="number" class="form-control" id="inputLong" placeholder="Longitud" name="long"
                <?php echo (isset($_POST['long'])?'value="'.$_POST['long'].'"':''); ?>>
            </div>
        </div>
        <div class="form-group">
            <label for="inputFuente" class="control-label col-xs-3" style="text-align:right">Fuente:</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="inputFuente" placeholder="Fuente" name="fuente"
                <?php echo (isset($_POST['fuente'])?'value="'.$_POST['fuente'].'"':''); ?>>
            </div>
        </div>
        <div class="form-group<?php echo (isset($_POST['submit']) && (trim($_POST['msg'])=='')?' has-error':'')?>">
            <label for="inputComentario" class="control-label col-xs-3" style="text-align:right">*Comentario:</label>
            <div class="col-xs-8">
                <textarea class="form-control" rows="3" id="inputComentario" placeholder="Comentario" name="msg"><?php echo (isset($_POST['msg'])?trim($_POST['msg']):''); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-10">
                <button type="submit" class="btn btn-primary" id="send" name="submit">Enviar</button>
            </div>
        </div>
    </form>
<h4><?php include "secure_email_code.php";?></h4>
<p class="text-danger">*Campos obligatorios</p>
<br><br>
<p>Tus datos serán tratados de acuerdo a la L.O.P.D. 15/99 y no serán transmitidos a terceros sin tu consentimiento.</p>
		</div>
	</div>
</body>
</html>