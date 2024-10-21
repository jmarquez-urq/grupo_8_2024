<?php
require_once 'bootstrap.php';
session_start();

if ($_SESSION['tipo'] == "NormalUser"){
    $cuenta = $entityManager->find('UsuarioNormal', $_SESSION['usuario']);
    $metodo = "setUsuario";
}elseif( $_SESSION['tipo'] == "Admin"){
    $cuenta = $entityManager->find('Admin', $_SESSION['usuario']);
    $metodo = "setAdmin";
}
var_dump($_SESSION['tipo']);
if ($_POST['posteo'] == "publi") {
    $posting = new Posteo($_POST['content']);
    $posting -> $metodo($cuenta);
}

$respuesta['posteo'] = $posting-> getContenido();

try {
    $entityManager->persist($posting);
    $entityManager->flush();
    $respuesta['bd'] = "Se guardó exitosamente";
} catch (\Exception $e) {
    $respuesta['bd'] = "Error: " . $e->getMessage();
}

$lista = $entityManager->getRepository("Posteo")->findAll();

    try {
        $respuesta['tipo'] = "usuario";
        foreach ($lista as $p) {
            $respuesta['posteo'] = [
                'id' => $p->getId(),
                'contenido' => $p->getContenido(),
                'users' => $p->getUsuarios()
            ];
        }
        $respuesta['error'] = false;
    } catch (\Exception $e) {
        $respuesta['bd'] = "Error: " . $e->getMessage();
    }

header('Content-Type: application/json; charset=utf-8');
echo json_encode($respuesta);