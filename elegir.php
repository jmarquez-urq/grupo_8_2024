<?php
require_once 'src/UsuarioNormal.php';

if ($_POST['usuario'] == "publico") {
    $cuenta = new UsuarioNormal($_POST['nombre']);
}
else if ($_POST['usuario'] == "admin") {
    header('Location: code.html');
}
else {
    die("Error en el tipo de cuenta");
}

$respuesta['nombre'] = $cuenta->getNombre();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($respuesta);