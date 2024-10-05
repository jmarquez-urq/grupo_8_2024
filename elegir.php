<?php
require_once 'bootstrap.php';
$ingresado = false;

if ($_POST['usuario'] == "publico") {
    $ingresado = true;
    $cuenta = new UsuarioNormal($_POST['nombre'],$_POST['contraseña']);
}
else if ($_POST['usuario'] == "admin" && $_POST['contraseña'] == "1234"){
    $ingresado = true;
    $cuenta = new Admin($_POST['nombre'],$_POST['contraseña']);
}

if ($ingresado) {
    $respuesta['nombre'] = $cuenta->getNombre();
    try {
        $entityManager->persist($cuenta);
        $entityManager->flush();
        $respuesta['bd'] = "Se guardó exitosamente";
    } catch (\Exception $e) {
        $respuesta['bd'] = "Error: " . $e->getMessage();
    }
}
else{
    $respuesta['nombre'] = "Error en los datos";
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($respuesta);