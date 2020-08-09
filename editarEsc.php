<?php
session_start();
$id = $_GET['id'];
$scId = $_GET['scId'];

include "bbdd/funciones_bd.php";


if (isset($_POST["submitEditEsc"])) {

        
       
        $numero = $_POST["numero"];
        $extInt = $_POST["extInt"];
        $tiempo = $_POST["tiempo"];
        $descripcion = $_POST["descripcion"];


        updateEscenas($scId, $numero, $extInt, $tiempo, $descripcion);

       
        




        header("location: escenas.php?id=" . $id . "");
    }
