<?php

$nombreServidor = "DESKTOP-QTFI5IV\SQLEXPRESS";
$usuario = "ernesto";
$contrasena = "03012001Ed";
$nombreBaseDatos = "pozosppja";

try {

    $conn = new PDO("sqlsrv:server=$nombreServidor;database=$nombreBaseDatos", $usuario, $contrasena);

    //echo "Conexion exitosa en el servidor $nombreServidor";

} catch (Exception $e) {
    echo "Ocurrió un error en la conexion. " . $e->getMessage();
}
