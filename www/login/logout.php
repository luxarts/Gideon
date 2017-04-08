<?php
    session_start();
    include('acceso_db.php'); // incluímos los datos de acceso a la BD
    // comprobamos que se haya iniciado la sesión
    if(isset($_SESSION['usuario'])) {
        session_destroy();
        header("Location: http://" . $_SERVER['HTTP_HOST']. "/index.php");
    }else {
        echo "Operación incorrecta.";
    }
?>  