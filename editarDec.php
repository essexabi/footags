<?php
session_start();
include "bbdd/conexion.php";
include "bbdd/funciones_bd.php";
include "validar.php";
if (isset($_POST["submitEditDec"])) {

    $decId=$_POST["decId"];
    $lugar=$_POST["lugar"];
    $color= $_POST["colorSet"];
    $caracteristicas = $_POST["caracteristicas"];

    updateDec($decId, $lugar, $color, $caracteristicas);

    $res= selecDecorado($decId);
    $fila = mysqli_fetch_assoc($res);
    $pId = $fila["id_proyecto"];
    



    header("location: setRodaje.php?id=". $pId ."");
}
?>