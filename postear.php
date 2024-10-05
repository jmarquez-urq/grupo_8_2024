<?php
require_once 'bootstrap.php';

if ($_POST['posteo'] == "publi") {
    $cuenta = new Posteo($_POST['content']);
}

$respuesta['posteo'] = $cuenta-> getContenido();

try {
    $entityManager->persist($cuenta);
    $entityManager->flush();
    $respuesta['bd'] = "Se guardó exitosamente";
} catch (\Exception $e) {
    $respuesta['bd'] = "Error: " . $e->getMessage();
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($respuesta);