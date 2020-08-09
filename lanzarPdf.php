<?php

session_start();
include "bbdd/conexion.php";
include "bbdd/funciones_bd.php";

$guion=$_GET['id'];

echo $guion;
$carpeta_uploads = $_SERVER['DOCUMENT_ROOT'] . '/footags/uploads/';
unlink($carpeta_uploads . $guion);

$pId = $_POST['PryctId'];

echo $pId;

//recibir datos de archivo
$name_guion = $_FILES["guion"]["name"];
echo $name_guion;
$type_guion = $_FILES["guion"]["type"];
echo $type_guion;
$size_guion = $_FILES["guion"]["size"];

if ($size_guion <= 2000000) {

    if ($type_guion == "application/pdf") {


        //mover de dir temporal a definitivo
        move_uploaded_file($_FILES['guion']['tmp_name'], $carpeta_uploads . $name_guion);
    } else {
        echo "Ese archivo no es un pdf.";
    }
} else {
    echo "El tamaño del archivo tiene que ser menor que 2 MB. La imagen no se ha subido.";
}

updateGuion($pId, $name_guion);

header("location:setRodaje.php?id=".$pId."");
?>

