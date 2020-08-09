<?php
session_start();
include "bbdd/conexion.php";
include "bbdd/funciones_bd.php";
include "validar.php";
if (isset($_POST["submitPry"])) {

    $userId = $_SESSION['logueadoId'];
    
    $res = selecProyectoAdmin($userId);
    $cont = mysqli_num_rows($res);

    valCrearProyecto();

    $res = selecProyectoAdmin($userId);
    $fila = mysqli_fetch_assoc($res);
    $pId= $fila['p_id'];


    header("location: setRodaje.php?id=". $pId ."");
}
?>