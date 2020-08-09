<?php

include "bbdd/conexion.php";

include "bbdd/funciones_bd.php";

$personaje= $_GET['id'];
$plano= $_GET['plId'];
$proyecto= $_GET['prId'];
$escena= $_GET['escId'];

deleteAparicion($personaje, $plano);


header("location:detailPlano.php?id=".$proyecto."&idPl=".$plano."&idEsc=".$escena."");


?>