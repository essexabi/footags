<?php

include "bbdd/conexion.php";

include "bbdd/funciones_bd.php";

$escena= $_GET['id'];
$proyecto= $_GET['prId'];

deleteEscena($escena);


header("location: escenas.php?id=".$proyecto."");


?>