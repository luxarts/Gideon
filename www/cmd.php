<style type="text/css">
	form.decir input[type="submit"]{
		background: none repeat scroll 0 0 #111;
		border: 1px solid #FFF;
		font-weight: bold;
		color: #F00;
		position: absolute;
		top: 105px;
		left: 8px;
		width: 305px;
		height: 30px;
	}
</style>
<?php
	if(isset($_POST['txt'])){
		$mensaje = $_POST["txt"];
		exec('sudo decir "' . $mensaje . '"');
		echo("Enviado:" . $mensaje);
		unset($_POST['txt']);
	}
?>
 
<html>
	<body bgcolor="#000">
	<form action="" method="POST" class="decir">
		<textarea name="txt" placeholder="Escribe algo..." required maxlength="1000" autofocus rows="6" cols="41" style="resize: none"></textarea>
		<input type="submit" value="Decir">
	</form>
	</body>
</html>
