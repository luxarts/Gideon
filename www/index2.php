<?php
	session_start();
	
	include 'login/acceso_db.php';
	if(empty($_SESSION['usuario'])){//Si no hay usuario loggeado
?>
		<!-- PÁGINA DE LOGIN -->
		<html>
			<head>
				<!--Juego de caracteres-->
				<meta charset="utf-8">
				<link rel="stylesheet" type="text/css" href="css/styles2.css">
				<title>Otto: Ingresar</title>
				<!--Favicon-->
				<link rel="icon" type="image/png" href="img/otto_favicon.png">
			</head>
			<body bgcolor="black">
				<!--Logo-->
				<center><img border="0" src="img/otto_logo.png" width="25%"></center>
				<br>
				<form action="login/comprobar.php" method="POST" class="login">
					<div><label>Usuario</label><input name="usuario" type="text" ></div>
					<div><label>Contraseña</label><input name="pass" type="password"></div>
					<div><input name="enviar" type="submit" value="Ingresar"></div>
				</form>

		    	<!--Footer-->
				<div class="footer"><a href="mailto:bacelolucas@gmail.com">Lucas Maximiliano Bacelo</a> - <a href="mailto:ivanabmm@yahoo.com.ar">Ivana Bernabela Mlinarevick Medl</a> - <a href="https://github.com/luxarts/Otto">GitHub</a> - 2016</div>
			</body>
		</html>
<?php
    }else {
?>
		<!-- PÁGINA DE INICIO -->
		<html>
			<head>
				<title>Otto: Panel de control</title>
				<!--Favicon-->
				<link rel="icon" type="image/png" href="img/otto_favicon.png">

		        <!--Logo-->
		        <img border="0" src="img/otto_logo.png" style="width: 400px; position: absolute; left: 440px"> 
			</head>
		  	
		  	<body bgcolor="#000000" link="#FF0000" vlink="#FF0000" alink="#A00000" text="#FFFFFF" onload="startTime()">
		  		<!--Nombre y logout-->
		  		<p style="position: absolute; top: 0px; left: 45px">Hola <strong><?=$_SESSION['usuario']?></strong> | <a href="login/logout.php">Salir</a></p>
		    	
				<!--Reloj-->
				<div class="clock" style="left: 582px; top: 200px">
					<label>Hora actual:</label>
					<div id="clock"></div>
					<script> 
						function startTime() {
						    var today = new Date();    
						    var h = today.getHours();
						    var m = today.getMinutes();
						    var s = today.getSeconds();
						    h = checkTime(h);
						    m = checkTime(m);
						    s = checkTime(s);
						   document.getElementById('clock').innerHTML =
						    h + ":" + m + ":" + s;
						    var t = setTimeout(startTime, 500);
						}
						function checkTime(i) {
						    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
						    return i;
						}
					</script>
				</div>

				<!--Log de voz-->
				<div class="title" style="top: 175px; left: 20px"><a href="voicelog.html">Registro de conversación</a></div>
				<iframe src="voicelog.html" height="101px" width="505px" style="position: absolute; left: 20px; top: 200px"></iframe>
				
				<!--Reproductor-->
				<div class="title" style="left: 20px; top: 312px; text-decoration: none; font-size: 27px">
					Último audio:
					<audio controls>
						<?php $lastvoice = file_get_contents("sound/lastvoice.txt");?> 
						<?php echo("<source src=\"../sound/last_voice_".$lastvoice.".wav\" type=\"audio/wav\">")?>
						<?php echo("<source src=\"../sound/last_voice_".$lastvoice.".mp3\" type=\"audio/mp3\">")?>
						El navegador no soporta este reproductor.
					</audio>
				</div>
				
				<!--Decir-->
				<?php
					if(isset($_POST['txt'])){
						$mensaje = $_POST["txt"];
						exec('decir "' . $mensaje . '"');//Envia el comando
						echo "<meta http-equiv='refresh' content='0'>";//Actualiza la página
						unset($_POST['txt']);
					}
				?>
				<form action="" method="POST" class="decir">
					<textarea name="txt" placeholder="Escribe algo..." required maxlength="1000" autofocus rows="6" cols="37" style="resize: none; background: #111; color: #FFF; border: 0px"></textarea>
					<input type="submit" value="Decir">
				</form>
				<div style="margin: auto; width: 50%; position: relative; top: 380px"><iframe src="webconsole/webconsole" height="250px" width="630px"></iframe></div>
		  	</body>
		  	<!--Footer-->
		  	<div class="footer"><a href="mailto:bacelolucas@gmail.com">Lucas Maximiliano Bacelo</a> - <a href="mailto:ivanabmm@yahoo.com.ar">Ivana Bernabela Mlinarevick Medl</a> - <a href="https://github.com/luxarts/Otto">GitHub</a> - 2016</div>
		</html>
<?php
    }
?>
