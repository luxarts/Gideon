 <html>
    <head>
        <title>Otto: Comprobación...</title>
        <!--Favicon-->
        <link rel="icon" type="image/png" href="otto_favicon.png">
    </head>
 </html>
 <?php
    session_start();
    include('acceso_db.php');
    if(isset($_POST['enviar'])) { // comprobamos que se hayan enviado los datos del formulario
        // comprobamos que los campos usuarios_nombre y usuario_clave no estén vacíos
        if(empty($_POST['usuario']) || empty($_POST['pass'])) {
            header("Location: http://".$_SERVER['HTTP_HOST']."/index.php");
        }else {
            // "limpiamos" los campos del formulario de posibles códigos maliciosos
            $usuario_nombre = strip_tags($_POST['usuario']);
            $usuario_clave = strip_tags($_POST['pass']);
            $usuario_clave = sha1($usuario_clave);
            // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
            $sql = mysqli_query($conexion,"SELECT id, usuario, psswd FROM usuarios WHERE usuario='$usuario_nombre' AND psswd='$usuario_clave';");
            if($row = mysqli_fetch_array($sql, MYSQLI_BOTH)) {
                $_SESSION['id'] = $row['id']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
                $_SESSION['usuario'] = $row["usuario"]; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
                header("Location: http://".$_SERVER['HTTP_HOST']."/index.php");
            }else {
                header("Location: http://".$_SERVER['HTTP_HOST']."/index.php");
?>
<?php
            }
        }
    }else {
        header("Location: http://".$_SERVER['HTTP_HOST']."/index.php");
    }
?> 