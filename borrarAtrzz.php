<?php

include "bbdd/conexion.php";

include "bbdd/funciones_bd.php";

$atrezzo= $_GET['id'];
$proyecto= $_GET['prId'];

deleteAtrezzo($atrezzo);


header("location: setRodaje.php?id=".$proyecto."");


?>