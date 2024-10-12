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



try {
    $lista = $entityManager->getRepository("Posteo")->findAll();

    foreach ($lista as $p) {
        $respuesta[] = $p->getContenido();
    }
    $respuesta['error'] = false;
} catch (\Exception $e) {
    $respuesta['error'] = true;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($respuesta);