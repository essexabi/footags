<?php

include "bbdd/conexion.php";

include "bbdd/funciones_bd.php";

$personaje= $_GET['id'];
$proyecto= $_GET['prId'];

deletePersonaje($personaje);


header("location: setRodaje.php?id=".$proyecto."");


?>