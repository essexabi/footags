<?php
session_start();
include "bbdd/conexion.php";
include "bbdd/funciones_bd.php";
include "validar.php";
if (isset($_POST["submitEditAt"])) {

    $atId=$_POST["atId"];
    $objeto=$_POST["objeto"];
    $colorAt=$_POST["colorAt"];
    

    updateAtrezzo($atId, $objeto, $colorAt);

    $res= selecAtrezzo($atId);
    $fila = mysqli_fetch_assoc($res);
    $pId = $fila["id_proyecto"];
    



    header("location: setRodaje.php?id=". $pId ."");
}
?>