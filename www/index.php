<style type="text/css">
	*{
		font-size: 14px;
		font-family: consolas;
	}
	form.login {
		background: none repeat scroll 0 0 #101010;
		border: 5px solid #FFF;
		margin: 0 auto;
		padding: 20px;
		width: 278px;
	}
	form.login div {
		margin-bottom: 15px;
		overflow: hidden;
	}
	form.login div label {
		display: block;
		float: left;
		line-height: 25px;
		color: #FF0000;
	}
	form.login div input[type="text"], form.login div input[type="password"] {
		background: none repeat scroll 0 0 #666;
		border: 1px solid #FFF;
		float: right;
		padding: 4px;
		color: #FFF;
	}
	form.login div input[type="submit"] {
		background: none repeat scroll 0 0 #111;
		border: 1px solid #FFF;
		float: right;
		font-weight: bold;
		padding: 4px 20px;
		color: #F00;
	}
	form.buttons div {
		overflow: hidden;
	}
	form.buttons div input[type="submit"] {
		background: none repeat scroll 0 0 #111;
		border: 1px solid #A00;
		float: left;
		font-weight: bold;
		padding: 4px 5px;
		color: #F00;
	}
	div.clock{
		position: absolute;
		background: none repeat scroll 0 0 #111;
		border: 1px solid #F00;
		color: #FFF;
		font-size: 12px;
		padding: 10px;
		text-align: center;
	}
	div.clock div{
		font-size: 20px;

	}
	div.title{
		position: absolute;
		color: red;
		font-size: 20px;
		font-weight: 900;
		text-decoration: underline;
	}
	div.title a{
		color: red;
		font-size: 20px;
		font-weight: 900;
		text-decoration: underline;
	}
	div.footer{
		width: 99%;
		text-align: center;
		position: absolute;
		bottom: 0;
		color: #AAA;
		font-size: 12px;
	}
	div.footer a{
		color: #BBB;
		font-size: 12px;
	}
	div.footer a:hover{
		color: #F00;
		font-size: 12px;
	}
	iframe{
		background: none repeat scroll 0 0 #111;
		border: 2px solid #F00;
	}
	.error{
		color: #FFF;
		font-weight: bold;
		margin: 10px;
		text-align: center;
	}
</style>

<?php
	session_start();
	
	include 'login/acceso_db.php';
	if(empty($_SESSION['usuario'])){//Si no hay usuario loggeado
?>
		<!-- PÁGINA DE LOGIN -->
		<html>
			<head>
				<title>Otto: Ingresar</title>
				<!--Favicon-->
				<link rel="icon" type="image/png" href="img/otto_favicon.png">

				<!--Logo-->
		        <center><img border="0" src="img/otto_logo.png" style="width: 25%"></center>
			</head>
			<body bgcolor="black">
				<br>
				<form action="login/comprobar.php" method="POST" class="login">
					<div><label>Usuario</label><input name="usuario" type="text" ></div>
					<div><label>Contraseña</label><input name="pass" type="password"></div>
					<div><input name="enviar" type="submit" value="Ingresar"></div>
				</form>
			</body>
			<div class="footer"><a href="mailto:bacelolucas@gmail.com">Lucas Maximiliano Bacelo</a> - <a href="mailto:ivanabmm@yahoo.com.ar">Ivana Bernabela Mlinarevick Medl</a> - <a href="https://github.com/luxarts/Otto">GitHub</a> - 2016</div>
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
				<div class="title" style="top: 175px; left: 20px"><a href="speaklog.html">Registro de conversación</a></div>
				<iframe src="speaklog.html" height="100px" width="505px" style="position: absolute; left: 20px; top: 200px"></iframe>
				<!--Reproductor-->
				<div class="title" style="left: 20px; top: 310px; text-decoration: none; font-size: 27px">
					Último audio: 
					<audio controls>
						<source src="../out.mp3" type="audio/mpeg">
						<source src="../out.wav" type="audio/wav">
						El navegador no soporta este reproductor.
					</audio>
				</div>
		  	</body>
		  	<div class="footer"><a href="mailto:bacelolucas@gmail.com">Lucas Maximiliano Bacelo</a> - <a href="mailto:ivanabmm@yahoo.com.ar">Ivana Bernabela Mlinarevick Medl</a> - <a href="https://github.com/luxarts/Otto">GitHub</a> - 2016</div>
		</html>
<?php
    }
?>