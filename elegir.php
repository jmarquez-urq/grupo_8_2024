<?php
require_once 'bootstrap.php';
$ingresado = false;

if ($_POST['usuario'] == "publico") {
    $ingresado = true;
    $type = "NormalUser";
    $cuenta = new UsuarioNormal($_POST['nombre'],$_POST['contraseña']);
}
else if ($_POST['usuario'] == "admin" && $_POST['contraseña'] == "1234"){
        $ingresado = true;
        $type = "Admin";
        $cuenta = new Admin($_POST['nombre'],$_POST['contraseña']);
    }

if ($ingresado){
    $respuesta['nombre'] = $cuenta->getNombre();
    $respuesta['tipo'] = "usuario";

    $lista = $entityManager->getRepository("Posteo")->findAll();

    try {
        foreach ($lista as $p) {
            $respuesta['posteo'][] = [
                'id' => $p->getId(),
                'contenido' => $p->getContenido(),
                'users' => $p->getUsuarios()
            ];
        }
        $respuesta['error'] = false;
    } catch (\Exception $e) {
        $respuesta['bd'] = "Error: " . $e->getMessage();
    }

    try {
        $entityManager->persist($cuenta);
        $entityManager->flush();
        session_start();
        $_SESSION['usuario'] = $cuenta-> getId();
        $_SESSION['tipo'] = $type;
        $respuesta['bd'] = "Se guardó exitosamente";
    } catch (\Exception $e) {
        $respuesta['bd'] = "Error: " . $e->getMessage();
    }
}
else{
    $respuesta['nombre'] = "Erroror en los datos";
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($respuesta);