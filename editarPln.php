<?php
session_start();
include "bbdd/conexion.php";
include "bbdd/funciones_bd.php";
include "validar.php";


if (isset($_POST["submitPlEdit"])) {

    $plId=$_POST["plId"];
    $pId=$_POST["pId"];
    $escId=$_POST["escId"];
    $numeroPl=$_POST["numeroPl"];
    $tamaño= $_POST["tamaño"];
    $soporte = $_POST["soporte"];
    $angulo = $_POST["angulo"];
    $posicion = $_POST["posicion"];
    $movimiento = $_POST["movimiento"];
    $descripcionPl = $_POST["descPl"];
        echo $plId, $numeroPl, $tamaño, $soporte, $angulo, $posicion, $movimiento, $descripcionPl;
    updatePlano($plId, $numeroPl, $tamaño, $soporte, $angulo, $posicion, $movimiento, $descripcionPl);





    header("location:detailPlano.php?id=".$pId."&idPl=".$plId."&idEsc=".$escId."");
}
?>