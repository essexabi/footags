<?php

include "bbdd/conexion.php";

include "bbdd/funciones_bd.php";

$decorado= $_GET['id'];
$proyecto= $_GET['prId'];

deleteDec($decorado);


header("location: setRodaje.php?id=".$proyecto."");


?>