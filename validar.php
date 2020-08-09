<?php

function valReg()
{

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $passConf = $_POST["passConf"];


    //Si se han enviado los datos y están completos realizará el INSERT

    if (($nombre != "") && ($email != "") && ($pass != "")) {

        $name = testName();

        /* if (isset($_POST["submit"]) && $name == 1) {
                echo "<p class='text-danger font-weight-bold'>Un usuario ya tiene ese nombre.</p>";
            }*/

        $mail = testMail();

        /*if (isset($_POST["submit"]) && $mail == 1) {
                echo "<p class='text-danger font-weight-bold'>Un usuario ya tiene ese email.</p>";
            }*/


        if ($pass != $passConf) {
            echo "<p class='text-danger font-weight-bold'>Las contraseñas no coinciden.</p>";
        }


        if (($name == 0) && ($mail == 0) && ($pass == $passConf)) {

            insertUser($nombre, $email, $passConf);

        }
    } else {
        echo "<p class='text-danger font-weight-bold'>Por favor, completa tus datos de usuario</p>";
    }
}

function valLogin()
{
    $usuario = $_POST["nombre"];

    $id = selectUsuarioId($usuario);
    while ($fila = mysqli_fetch_assoc($id)) {
        $idUsuario = $fila['id'];
    }
    $logOk = testLog();
    if ($logOk > 0) {

        session_start();
        $_SESSION["logueado"] = $usuario;
        $_SESSION["logueadoId"] = $idUsuario;
        header("Location: index.php");
    } else {
        echo "<p class='text-danger font-weight-bold'>El usuario y/o la contraseña no son válidos</p>";
    }
}


function valCrearProyecto()
{
    include_once "bbdd/funciones_bd.php";
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $sinopsis = $_POST["sinopsis"];
    $idUsuario = $_POST["idUsuario"];
    $pass = $_POST["pass"];
    $passConf = $_POST["passConf"];


    //Si se han enviado los datos y están completos realizará el INSERT

    if (($titulo != "") && ($genero != "") && ($sinopsis != "") && ($idUsuario != "") && ($pass != "") && ($passConf != "")) {


        if ($pass != $passConf) {
            echo "<p class='text-danger font-weight-bold'>Las contraseñas no coinciden.</p>";
        }


        if ($pass == $passConf) {

            insertProyecto($idUsuario, $titulo, $sinopsis, $passConf, $genero);
        }
    } else  echo "<p class='text-danger font-weight-bold'>Por favor, completa tus datos de usuario</p>";
}

function valCrearEscena()
{
    include_once "bbdd/funciones_bd.php";
    $idDecorado = $_POST["idDecorado"];
    $idProyecto = $_POST["idProyecto"];
    $numero = $_POST["numero"];
    $extInt = $_POST["extInt"];
    $tiempo = $_POST["tiempo"];
    $descripcion = $_POST["descripcion"];


    $res = selecEscenaNumeroDecoradoProyecto($_SESSION['proyectoId'], $numero);
    $cont = mysqli_num_rows($res);

    //Si se han enviado los datos y están completos realizará el INSERT

    if (($idProyecto != "") && ($idDecorado != "") && ($numero != "") && ($extInt != "") && ($tiempo != "")) {

        if ($cont == 0) {
            insertEscena($idProyecto, $idDecorado, $numero, $extInt, $tiempo, $descripcion);
            echo "<p class='text-success font-weight-bold'>La escena se ha creado.</p>";
        } else {

            echo "<p class='text-danger font-weight-bold'>Ese número de escena ya existe. La escena no se ha creado.</p>";
        }
    } else  echo "<p class='text-danger font-weight-bold'>Por favor, completa todos los campos</p>";
}

function valCrearDecorado()
{
    include_once "bbdd/funciones_bd.php";
    $idProyecto = $_POST["idProyecto"];
    $lugar = $_POST["lugar"];
    $color = $_POST["colorSet"];
    $caracteristicas = $_POST["caracteristicas"];


    $res = selecDecoradoProyectoLugar($idProyecto, $lugar);
    $cont = mysqli_num_rows($res);
    //Si se han enviado los datos y están completos realizará el INSERT

    if (($idProyecto != "") && ($lugar != "") && ($color != "")) {

        if ($cont == 0) {
            insertDecorado($idProyecto, $lugar, $color, $caracteristicas);
            echo "<p class='text-success text-center font-weight-bold'>Decorado construido. Selecciona '" . $lugar . "' para crear una escena. </p>";
        } else {

            echo "<p class='text-danger text-center font-weight-bold'>Ya existe ese decorado</p>";
        }
    } else  echo "<p class='text-danger text-center font-weight-bold'>Por favor, completa todos los campos</p>";
}

function valCrearPersonaje()
{
    include_once "bbdd/funciones_bd.php";
    $idProyecto = $_POST["idProyecto"];
    $nombre = $_POST["nombre"];
    $apuntes = $_POST["apuntes"];
    $colorPrsn = $_POST["colorPrsn"];

    $res = selecPersonajeProyectoNombre($idProyecto, $nombre);
    $cont = mysqli_num_rows($res);

    if (($idProyecto != "") && ($nombre != "") && ($colorPrsn != "")) {

        if ($cont == 0) {
            insertPersonaje($idProyecto, $nombre, $apuntes, $colorPrsn);
            echo "<p class='text-success text-center font-weight-bold'>Has añadido a '" . $nombre . "'. </p>";
        } else {

            echo "<p class='text-danger text-center font-weight-bold'>Ya existe ese personaje</p>";
        }
    } else  echo "<p class='text-danger text-center font-weight-bold'>Por favor, completa todos los campos</p>";
}

function valCrearAtrezzo()
{
    include_once "bbdd/funciones_bd.php";
    $idProyecto = $_POST["idProyecto"];
    $objeto = $_POST["objeto"];
    $colorAt = $_POST["colorAt"];

    

    $res = selecAtrezzoProyectoObjeto($idProyecto, $objeto, $colorAt);
    $cont = mysqli_num_rows($res);

    if (($idProyecto != "") && ($objeto != "") && ($colorAt != "")) {

        if ($cont == 0) {
            insertAtrezzo($idProyecto, $objeto, $colorAt);
            echo "<p class='text-success text-center font-weight-bold'>Has añadido '" . $objeto . "'. </p>";
        } else {

            echo "<p class='text-danger text-center font-weight-bold'>Ya has incluido ese objeto</p>";
        }
    } else  echo "<p class='text-danger text-center font-weight-bold'>Por favor, completa todos los campos</p>";
}

function valCrearPLano()
{
    include_once "bbdd/funciones_bd.php";

    $idEscena =  $_POST['idEsc'];
    $idProyecto= $_POST['idPryct'];
    $numeroPl = $_POST['numeroPl'];
    $tamaño = $_POST['tamaño'];
    $soporte =  $_POST['soporte'];
    $angulo =  $_POST['angulo'];
    $posicion = $_POST['posicion'];
    $movimiento = $_POST['movimiento'];
    $descPl =  $_POST['descPl'];
    echo $idEscena, $numeroPl;


    $res = selecNumeroPlanoEscena($numeroPl, $idEscena);
    $cont = mysqli_num_rows($res);

    //Si se han enviado los datos y están completos realizará el INSERT

    if (($idEscena != "") && ($idProyecto != "") && ($numeroPl != "") ) {

        if ($cont == 0) {
            insertPlano($idEscena, $idProyecto, $numeroPl, $tamaño, $soporte, $angulo, $posicion, $movimiento, $descPl);
            echo "<p class='text-success font-weight-bold'> Has creado un plano nuevo.</p>";
        } else {

            echo "<p class='text-danger font-weight-bold'>Ese número de plano ya existe. El plano no se ha creado.</p>";
        }
    } else  echo "<p class='text-danger font-weight-bold'>Por favor, al menos asigna un número a tu plano.</p>";
}

function valAparicion()
{
    include_once "bbdd/funciones_bd.php";
    $idPersonaje = $_POST['prsnId'];
    $idPlano = $_POST['apPl'];
   

    if (($idPersonaje != "") && ($idPlano != ""))  {

        $res= selecAparicion($idPersonaje, $idPlano);
        $cont= mysqli_num_rows($res);

        if($cont == 0){

            insertAparicion( $idPersonaje, $idPlano);

        }

       
        
  
    } else  echo "<p class='text-danger text-center font-weight-bold'>Por favor, completa todos los campos</p>";
}

function valUso()
{
    include_once "bbdd/funciones_bd.php";
    $idAtrezzo = $_POST['atId'];
    $idPlano = $_POST['apPl'];
    $res= selecUso($idAtrezzo, $idPlano);
    $cont= mysqli_num_rows($res);

    if (($idAtrezzo != "") && ($idPlano != ""))  {

        if($cont == 0){

            insertUso( $idAtrezzo, $idPlano);

        }

       
        
  
    } else  echo "<p class='text-danger text-center font-weight-bold'>Por favor, completa todos los campos</p>";
}

function valHoraDia()
{
    include_once "bbdd/funciones_bd.php";
    $pId = $_POST['pId'];
    $plId = $_POST['numPl'];
    $hora = $_POST['hora'];
    $dia = $_POST['dia'];
    echo $pId, $hora;
   
    $res= selecPlanosHoraDia($pId, $hora, $dia);
    $cont= mysqli_num_rows($res);
   

    if (($pId!="")&&($hora != "") && ($dia != ""))  {

        if($cont == 0){

            updateHoraDia( $plId, $hora, $dia);

            echo "<p class='text-success'>Hora y día añadidos al plan</p>";

        }else echo "<p class='text-danger'>Esa hora está cogida.</p>";

       
        
  
    } else  echo "<p class='text-danger text-center font-weight-bold'>Por favor, completa todos los campos</p>";
}