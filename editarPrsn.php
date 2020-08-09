<?php
session_start();
include "bbdd/conexion.php";
include "bbdd/funciones_bd.php";
include "validar.php";
if (isset($_POST["submitEditPrsn"])) {

    $prsnId=$_POST["prsnId"];
    $nombre=$_POST["nombre"];
    $apuntes= $_POST["apuntes"];
    $colorPrsn = $_POST["colorPrsn"];

    updatePersonaje($prsnId, $nombre, $apuntes, $colorPrsn);

    $res= selecPersonaje($prsnId);
    $fila = mysqli_fetch_assoc($res);
    $pId = $fila["id_proyecto"];
    



    header("location: setRodaje.php?id=". $pId ."");
}
?>