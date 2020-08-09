<?php

include "bbdd/conexion.php";

include "bbdd/funciones_bd.php";

$objeto= $_GET['id'];
$plano= $_GET['plId'];
$proyecto= $_GET['prId'];
$escena=$_GET['escId'];

deleteUso($objeto, $plano);


header("location:detailPlano.php?id=".$proyecto."&idPl=".$plano."&idEsc=".$escena."");


?>