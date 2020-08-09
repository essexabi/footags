<?php
session_start();
include "bbdd/conexion.php";
include "bbdd/funciones_bd.php";

$imgSt= $_POST['storyStd'];

echo $imgSt;
$carpeta_uploads = $_SERVER['DOCUMENT_ROOT'] . '/footags/uploads/';

if($imgSt != NULL){
unlink($carpeta_uploads . $_POST['storyStd']);}
$plId = $_POST['plStory'];
$pId = $_POST['strPryctId'];
$escId = $_POST['escId'];
echo $pId;
echo $plId;
//recibir datos de imagen
$name_story = $_FILES["story"]["name"];
echo $name_story;
$type_story = $_FILES["story"]["type"];

$size_story = $_FILES["story"]["size"];

if ($size_story <= 1000000) {

    if ($type_story == "image/jpeg" || $type_story == "image/jpg" || $type_story == "image/png" || $type_story == "image/gif") {


        //mover de dir temporal a definitivo
        move_uploaded_file($_FILES['story']['tmp_name'], $carpeta_uploads . $name_story);
    } else {
        echo "Ese archivo no es una imagen.";
    }
} else {
    echo "El tamaño de la imagen tiene que ser menor que 1 MB. La imagen no se ha subido.";
}

updateStory($plId, $name_story);

header("location:detailPlano.php?id=".$pId."&idPl=".$plId."&idEsc=".$escId."")
?>

