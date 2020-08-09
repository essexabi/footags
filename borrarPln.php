<?php

include "bbdd/conexion.php";

include "bbdd/funciones_bd.php";

$plano= $_GET['id'];
$proyecto= $_GET['prId'];
$imgSt = $_GET['idSt'];
echo $plano, $proyecto, $imgSt;
$carpeta_uploads = $_SERVER['DOCUMENT_ROOT'] . '/footags/uploads/';
unlink($carpeta_uploads.'/'.$imgSt);

deletePlano($plano);


header("location: planos.php?id=".$proyecto."");


?>