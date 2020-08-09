<?php

include "bbdd/conexion.php";

include "bbdd/funciones_bd.php";

$proyecto= $_GET['id'];
$guion = $_GET['gId'];
$carpeta_uploads_pdfs = $_SERVER['DOCUMENT_ROOT'] . '/footags/uploads/pdfs';
unlink($carpeta_uploads_pdfs.'/'.$guion);
deletePr($proyecto);

header("location: fooAdmin.php?op=proyectos");


?>