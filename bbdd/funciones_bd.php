
<?php

/*---INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS---*/
/*---INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS---*/
/*---INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS------INSERTS---*/


/*----------------------------------------------------INSERTS TABLA USUARIO-----------------------------------------------------------*/
/*----------------------------------------------------INSERTS TABLA USUARIO-----------------------------------------------------------*/

//INSERTA VALORES DE INCLUDES/BODY/FORMREG.PHP EN TABLA USUARIO 
function insertUser($nombre, $email, $passConf)
{
    //Archivo de conexión
    include "bbdd/conexion.php";

    //Realizamos los INSERTs
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $passConf = mysqli_real_escape_string($con, $_POST['passConf']);
    $pass = md5($passConf);
    $query = "INSERT INTO usuarios
        VALUES(NULL, '$nombre', '$email', '$pass')";

    //Control de que se haya realizado correctamente la consulta
    if (mysqli_query($con, $query)) {
        echo "<center><button class='btn btn-default text-info border-info mt-2 mb-2' onclick= 'formAcc.php'>
            <a class='text-info' href='home.php?op=iniciar sesión'>Ya puedes acceder a footags</a>
            </button></center>";
    } else {
        echo "<p class='text-danger font-weight-bold'>No has podido registrarte.</p>";
    }

    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------INSERTS TABLA PROYECTO-----------------------------------------------------------*/
/*----------------------------------------------------INSERTS TABLA PROYECTO-----------------------------------------------------------*/

//INSERTA VALORES DE FORMPROYECTO DESDE LANZARPRYCT.PHP EN TABLA PROYECTO
function insertProyecto($idUsuario, $titulo, $sinopsis, $passConf, $genero)
{
    //Archivo de conexión
    include "bbdd/conexion.php";

    //Realizamos los INSERTs
    $sinopsis = mysqli_real_escape_string($con, $_POST['sinopsis']);
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $idUsuario = mysqli_real_escape_string($con, $_POST['idUsuario']);
    $genero = mysqli_real_escape_string($con, $_POST['genero']);
    $passConf = mysqli_real_escape_string($con, $_POST['passConf']);
    $pass = $passConf;
    $query = "INSERT INTO proyectos
        VALUES (NULL, '$idUsuario', '$titulo', '$sinopsis', '$pass', '$genero', 'NULL')";

    //Control de que se haya realizado correctamente la consulta
    if (mysqli_query($con, $query) == FALSE) {
        echo "<p class='text-danger font-weight-bold'>Ha habido un problema al crear el proyecto.</p>";
    }

    //Cerramos conexión
    mysqli_close($con);
}


/*----------------------------------------------------INSERTS TABLA DECORADO-----------------------------------------------------------*/
/*----------------------------------------------------INSERTS TABLA DECORADO-----------------------------------------------------------*/

//INSERTA VALORES DE FORMULARIO EN MODAL SETRODAJE.PHP EN TABLA DECORADO
function insertDecorado($idProyecto, $lugar, $color, $caracteristicas)
{
    include "bbdd/conexion.php";

    $idProyecto = mysqli_real_escape_string($con, $_POST['idProyecto']);
    $lugar = mysqli_real_escape_string($con, $_POST['lugar']);
    $color = mysqli_real_escape_string($con, $_POST['colorSet']);
    $caracteristicas = mysqli_real_escape_string($con, $_POST['caracteristicas']);

    $query = "INSERT INTO decorados
    VALUES (NULL, '$idProyecto', '$lugar', '$color', '$caracteristicas')";

    //Control de que se haya realizado correctamente la consulta
    if (mysqli_query($con, $query) == FALSE) {
        echo "<p class='text-danger font-weight-bold'>Ha habido un problema al crear el decorado.</p>";
    }

    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------INSERTS TABLA PERSONAJES-----------------------------------------------------------*/
/*----------------------------------------------------INSERTS TABLA PERSONAJES-----------------------------------------------------------*/

//INSERTA VALORES DE FORMULARIO EN MODAL SETRODAJE.PHP EN TABLA DECORADO
function insertPersonaje($idProyecto, $nombre, $apuntes, $colorPrsn)
{
    include "bbdd/conexion.php";

    $idProyecto = mysqli_real_escape_string($con, $_POST['idProyecto']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $apuntes = mysqli_real_escape_string($con, $_POST['apuntes']);
    $colorPrsn = mysqli_real_escape_string($con, $_POST['colorPrsn']);

    $query = "INSERT INTO personajes
    VALUES (NULL, '$idProyecto', '$nombre', '$apuntes', '$colorPrsn')";

    //Control de que se haya realizado correctamente la consulta
    if (mysqli_query($con, $query) == FALSE) {
        echo "<p class='text-danger font-weight-bold'>Ha habido un problema al crear el personaje.</p>";
    }

    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------INSERTS TABLA ATREZZO-----------------------------------------------------------*/
/*----------------------------------------------------INSERTS TABLA ATREZZO-----------------------------------------------------------*/

//INSERTA VALORES DE FORMULARIO EN MODAL SETRODAJE.PHP EN TABLA DECORADO
function insertAtrezzo($idProyecto, $objeto, $colorAt)
{
    include "bbdd/conexion.php";

    $idProyecto = mysqli_real_escape_string($con, $_POST['idProyecto']);
    $objeto = mysqli_real_escape_string($con, $_POST['objeto']);
    $colorAt = mysqli_real_escape_string($con, $_POST['colorAt']);

    $query = "INSERT INTO atrezzo
    VALUES (NULL, '$idProyecto', '$objeto', '$colorAt')";

    //Control de que se haya realizado correctamente la consulta
    if (mysqli_query($con, $query) == FALSE) {
        echo "<p class='text-danger font-weight-bold'>Ha habido un problema al crear el objeto.</p>";
    }

    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------INSERTS TABLA ESCENAS-----------------------------------------------------------*/
/*----------------------------------------------------INSERTS TABLA ESCENAS-----------------------------------------------------------*/

//INSERTA VALORES DE FORMULARIO EN MODAL SETRODAJE.PHP EN TABLA ESCENAS
function insertEscena($idProyecto, $idDecorado, $numero, $extInt, $tiempo, $descripcion)
{
    //Archivo de conexión
    include "bbdd/conexion.php";

    //Realizamos los INSERTs
    $idProyecto = mysqli_real_escape_string($con, $_POST['idProyecto']);
    $idDecorado = mysqli_real_escape_string($con, $_POST['idDecorado']);
    $numero = mysqli_real_escape_string($con, $_POST['numero']);
    $extInt = mysqli_real_escape_string($con, $_POST['extInt']);
    $tiempo = mysqli_real_escape_string($con, $_POST['tiempo']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);


    $query = "INSERT INTO escenas
        VALUES (NULL, '$idProyecto','$idDecorado', '$numero', '$extInt', '$tiempo', '$descripcion')";

    //Control de que se haya realizado correctamente la consulta
    if (mysqli_query($con, $query) == FALSE) {
        echo "<p class='text-danger font-weight-bold'>Ha habido un problema al crear la escena.</p>";
    }

    //Cerramos conexión
    mysqli_close($con);
}


/*----------------------------------------------------INSERTS TABLA PLANOS-----------------------------------------------------------*/
/*----------------------------------------------------INSERTS TABLA PLANOS-----------------------------------------------------------*/

//INSERTA VALORES DE FORMULARIO EN MODAL SETRODAJE.PHP EN TABLA PLANOS
function insertPlano($idEscena, $idProyecto, $numeroPl, $tamaño, $soporte, $angulo, $posicion, $movimiento, $descPl)
{
    //Archivo de conexión
    include "bbdd/conexion.php";

    //Realizamos los INSERTs
    $idEscena = mysqli_real_escape_string($con, $_POST['idEsc']);
    $idProyecto = mysqli_real_escape_string($con, $_POST['idPryct']);
    $numeroPl = mysqli_real_escape_string($con, $_POST['numeroPl']);
    $tamaño = mysqli_real_escape_string($con, $_POST['tamaño']);
    $soporte = mysqli_real_escape_string($con, $_POST['soporte']);
    $angulo = mysqli_real_escape_string($con, $_POST['angulo']);
    $posicion = mysqli_real_escape_string($con, $_POST['posicion']);
    $movimiento = mysqli_real_escape_string($con, $_POST['movimiento']);
    $descPl = mysqli_real_escape_string($con, $_POST['descPl']);



    $query = "INSERT INTO planos
        VALUES (NULL, '$idEscena', '$idProyecto', '$numeroPl', '$tamaño',  '$soporte', '$angulo', '$posicion', '$movimiento', '$descPl', NULL, NULL, NULL)";

    //Control de que se haya realizado correctamente la consulta
    if (mysqli_query($con, $query) == FALSE) {
        echo $idEscena, $idProyecto, $numeroPl, $tamaño,  $soporte, $angulo, $posicion, $movimiento, $descPl;
        echo "<p class='text-danger font-weight-bold'>Ha habido un problema al crear el plano.</p>";
    }

    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------INSERTS TABLA APARICIÓN-----------------------------------------------------------*/
/*----------------------------------------------------INSERTS TABLA APARICIÓN-----------------------------------------------------------*/

//INSERTA VALORES DE FORMULARIO EN MODAL SETRODAJE.PHP EN TABLA DECORADO
function insertAparicion( $idPersonaje, $idPlano)
{
    include "bbdd/conexion.php";

    
    $idPersonaje = mysqli_real_escape_string($con, $_POST['prsnId']);
    $idPlano = mysqli_real_escape_string($con, $_POST['apPl']);

    $query = "INSERT INTO aparicion
    VALUES (NULL, '$idPersonaje', '$idPlano')";

    //Control de que se haya realizado correctamente la consulta
    if (mysqli_query($con, $query) == FALSE) {
        echo "<p class='text-danger font-weight-bold'>Ha habido un problema al crear el objeto.</p>";
    }

    //Cerramos conexión
    mysqli_close($con);
}


/*----------------------------------------------------INSERTS TABLA USO-----------------------------------------------------------*/
/*----------------------------------------------------INSERTS TABLA USO-----------------------------------------------------------*/

//INSERTA VALORES DE FORMULARIO EN MODAL SETRODAJE.PHP EN TABLA DECORADO
function insertUso( $idAtrezzo, $idPlano)
{
    include "bbdd/conexion.php";

    
    $idAtrezzo = mysqli_real_escape_string($con, $_POST['atId']);
    $idPlano = mysqli_real_escape_string($con, $_POST['apPl']);

    $query = "INSERT INTO uso
    VALUES (NULL, '$idAtrezzo', '$idPlano')";

    //Control de que se haya realizado correctamente la consulta
    if (mysqli_query($con, $query) == FALSE) {
        echo "<p class='text-danger font-weight-bold'>Ha habido un problema al crear el objeto.</p>";
    }

    //Cerramos conexión
    mysqli_close($con);
}

/*---UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES---*/
/*---UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES---*/
/*---UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES------UPDATES---*/


/*----------------------------------------------------UPDATES TABLA PROYECTOS---------------------------------------------------------*/
/*----------------------------------------------------UPDATES TABLA PROYECTOS---------------------------------------------------------*/

//EDITAR DATOS EN EDITARPRYCT.PHP
function updatePryct($pId, $titulo, $sinopsis, $contraseña, $genero)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    //Actualiza un campo concreto de un usuario con un ID determinado.
    $query = "UPDATE proyectos SET titulo = '$titulo', sinopsis= '$sinopsis', contraseña_pr= '$contraseña', genero= '$genero'  WHERE p_id = $pId";

    mysqli_query($con, $query) or die("database error:" . mysqli_error($con));

    if (mysqli_query($con, $query)) {
        TRUE;
    } else {
        echo "<p>No se ha podido actualizar el proyecto.</p>";
    }
    //Cerramos conexión
    mysqli_close($con);
}

//EDITA  RUTA PDF
function updateGuion($pId, $name_guion)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    //Actualiza campo sotryboard con un PL_ID determinado.
    $query = "UPDATE proyectos SET guion = '$name_guion'   WHERE p_id = $pId";

    mysqli_query($con, $query) or die("database error:" . mysqli_error($con));

    if (mysqli_query($con, $query)) {
        TRUE;
    } else {
        echo "<p>No se ha podido subir el storyboard.</p>";
    }
    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------UPDATES TABLA DECORADOS---------------------------------------------------------*/
/*----------------------------------------------------UPDATES TABLA DECORADOS---------------------------------------------------------*/

//EDITAR DATOS EN SETRODAJE.PHP
function updateDec($decId, $lugar, $color, $caracteristicas)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    //Actualiza un campo concreto de un usuario con un ID determinado.
    $query = "UPDATE decorados SET lugar = '$lugar', color= '$color', caracteristicas= '$caracteristicas'  WHERE dec_id = $decId";

    mysqli_query($con, $query) or die("database error:" . mysqli_error($con));

    if (mysqli_query($con, $query)) {
        TRUE;
    } else {
        echo "<p>No se ha podido actualizar el proyecto.</p>";
    }
    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------UPDATES TABLA PERSONAJES---------------------------------------------------------*/
/*----------------------------------------------------UPDATES TABLA PERSONAJES---------------------------------------------------------*/

//EDITAR DATOS EN SETRODAJE.PHP
function updatePersonaje($prsnId, $nombre, $apuntes, $colorPrsn)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    //Actualiza un campo concreto de un usuario con un ID determinado.
    $query = "UPDATE personajes SET nombre = '$nombre', apuntes= '$apuntes', color_prsn= '$colorPrsn'  WHERE prsn_id = $prsnId";

    mysqli_query($con, $query) or die("database error:" . mysqli_error($con));

    if (mysqli_query($con, $query)) {
        TRUE;
    } else {
        echo "<p>No se ha podido actualizar el proyecto.</p>";
    }
    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------UPDATES TABLA ATREZZO---------------------------------------------------------*/
/*----------------------------------------------------UPDATES TABLA ATREZZO---------------------------------------------------------*/

//EDITAR DATOS EN SETRODAJE.PHP
function updateAtrezzo($atId, $objeto, $colorAt)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    //Actualiza un campo concreto de un usuario con un ID determinado.
    $query = "UPDATE atrezzo SET objeto = '$objeto', color_at = '$colorAt'  WHERE at_id = $atId";

    mysqli_query($con, $query) or die("database error:" . mysqli_error($con));

    if (mysqli_query($con, $query)) {
        TRUE;
    } else {
        echo "<p>No se ha podido actualizar el proyecto.</p>";
    }
    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------UPDATES TABLA ESCENAS---------------------------------------------------------*/
/*----------------------------------------------------UPDATES TABLA ESCENAS---------------------------------------------------------*/
function updateEscenas($scId, $numero, $extInt, $tiempo, $descripcion)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    //Actualiza un campo concreto de un usuario con un ID determinado.
    $query = "UPDATE escenas SET numero = '$numero', ext_int = '$extInt', tiempo = '$tiempo', descripcion = '$descripcion'  WHERE sc_id = $scId";

    mysqli_query($con, $query) or die("database error:" . mysqli_error($con));

    if (mysqli_query($con, $query)) {
        TRUE;
    } else {
        echo "<p>No se ha podido actualizar el proyecto.</p>";
    }
    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------UPDATES TABLA PLANOS---------------------------------------------------------*/
/*----------------------------------------------------UPDATES TABLA PLANOS---------------------------------------------------------*/

function updatePlano($plId, $numeroPl, $tamaño, $soporte, $angulo, $posicion, $movimiento, $descripcionPl)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    //Actualiza un campo concreto de un usuario con un ID determinado.
    $query = "UPDATE planos SET numeropl = '$numeroPl', tamaño = '$tamaño', soporte = '$soporte', angulo = '$angulo',
    posicion= '$posicion', movimiento= '$movimiento', descripcion_pl= '$descripcionPl'  WHERE pl_id = $plId";

    mysqli_query($con, $query) or die("database error:" . mysqli_error($con));

    if (mysqli_query($con, $query)) {
        TRUE;
    } else {
        echo "<p>No se ha podido actualizar el plano.</p>";
    }
    //Cerramos conexión
    mysqli_close($con);
}

function updateStory($plId, $name_story)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    //Actualiza campo sotryboard con un PL_ID determinado.
    $query = "UPDATE planos SET storyboard= '$name_story'   WHERE pl_id = $plId";

    mysqli_query($con, $query) or die("database error:" . mysqli_error($con));

    if (mysqli_query($con, $query)) {
        TRUE;
    } else {
        echo "<p>No se ha podido subir el storyboard.</p>";
    }
    //Cerramos conexión
    mysqli_close($con);
}

function updateHoraDia($plId, $hora, $dia)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    //Actualiza campo sotryboard con un PL_ID determinado.
    $query = "UPDATE planos SET hora= '$hora', dia='$dia'   WHERE pl_id = $plId";

    mysqli_query($con, $query) or die("database error:" . mysqli_error($con));

    if (mysqli_query($con, $query)) {
        TRUE;
    } else {
        echo "<p>No se ha podido subir el storyboard.</p>";
    }
    //Cerramos conexión
    mysqli_close($con);
}

/*---SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS---*/
/*---SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS---*/
/*---SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS------SELECTS---*/


/*----------------------------------------------------SELECTS TABLA USUARIOS-----------------------------------------------------------*/
/*----------------------------------------------------SELECTS TABLA USUARIOS-----------------------------------------------------------*/

//SELECCIONA FILA CON CAMPO ID ESPECÍFICO EN TABLA NOMBRE
function selectUsuarioId($nombre)
{
    //Archivo de conexión
    include "bbdd/conexion.php";

    //Seleccionar usuario que coincida con el nombre introducido en el formulario de registro
    $query = "SELECT id FROM usuarios
    WHERE nombre = '$nombre' ";

    //variable que contiene el resultado de la consulta
    $res = mysqli_query($con, $query) or die("error base de datos:" . mysqli_error($con));
    //

    //Cerramos conexión
    mysqli_close($con);

    return $res;
}
//CUENTA FILAS DE USUARIOS CON UN NOMBRE CONCRETO
function testName()
{
    //Archivo de conexión
    include "bbdd/conexion.php";

    //Seleccionar usuario que coincida con el nombre introducido en el formulario de registro
    $query = "SELECT * FROM usuarios
        WHERE nombre = '$_POST[nombre]' ";

    //variable que contiene el resultado de la consulta
    $res = mysqli_query($con, $query) or die("error base de datos:" . mysqli_error($con));
    //
    $cont = mysqli_num_rows($res);

    //Cerramos conexión
    mysqli_close($con);

    return $cont;
}
//CUENTA FILAS DE USUARIOS CON UN MAIL CONCRETO
function testMail()
{
    //Archivo de conexión
    include "bbdd/conexion.php";

    //Seleccionar usuario que coincida con el nombre introducido en el formulario de registro
    $query = "SELECT * FROM usuarios
        WHERE email = '$_POST[email]' ";

    //variable que contiene el resultado de la consulta
    $res = mysqli_query($con, $query) or die("error base de datos:" . mysqli_error($con));
    //
    $cont = mysqli_num_rows($res);

    //Cerramos conexión
    mysqli_close($con);

    return $cont;
}
//CUENTA FILAS CON USUARIO Y CONTRASEÑA CONCRETOS
function testLog()
{
    //Archivo de conexión
    include "bbdd/conexion.php";

    $pass = $_POST['pass'];
    $md5pass = md5($pass);
    $nombre= $_POST['nombre'];

    //Seleccionar usuario que coincida con el nombre introducido en el formulario de registro
    $query = "SELECT * FROM usuarios
        WHERE nombre = '$nombre' AND contraseña = '$md5pass' ";

    //variable que contiene el resultado de la consulta
    $res = mysqli_query($con, $query) or die("error base de datos:" . mysqli_error($con));
    //
    $cont = mysqli_num_rows($res);

    //Cerramos conexión
    mysqli_close($con);

    return $cont;
}

/*----------------------------------------------------SELECTS TABLA PROYECTOS-----------------------------------------------------------*/
/*----------------------------------------------------SELECTS TABLA PROYECTOS-----------------------------------------------------------*/

//SELECCIONA PROYECTOS CON ID USUARIO CONCRETO EN ORDEN DESCENDENTE
function selecProyectoAdmin($idUsuario)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM proyectos 
     WHERE id_usuario = '$idUsuario' ORDER BY p_id DESC";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}
//SELECCIONA  LAS FILAS  EN TABLA PROYECTOS Y  FILAS EN TABLA USUARIOS DONDE COINCIDAN PROYECTOS.ID_USUARIO Y USUARIOS.ID 
function selecProyectoPlusUsuario()
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM proyectos, usuarios WHERE proyectos.id_usuario = usuarios.id ORDER BY p_id DESC";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}
//SELECCIONA PROYECTO CON P_ID CONCRETO
function selecProyecto($pId)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM proyectos WHERE p_id = '$pId'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}


/*----------------------------------------------------SELECTS TABLA DECORADOS-----------------------------------------------------------*/
/*----------------------------------------------------SELECTS TABLA DECORADOS-----------------------------------------------------------*/

//SELECCIONAR DECORADO CON DEC_ID CONCRETO
function selecDecorado($decId)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM decorados WHERE dec_id = '$decId'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}
//SELECCIONAR DECORADO CON ID_PROYECTO CONCRETO
function selecDecoradoProyecto($idProyecto)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las escenas 
    $query = "SELECT dec_id, lugar, color, caracteristicas FROM decorados WHERE id_proyecto = '$idProyecto'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a escenas.php
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}
//SELECCIONAR DECORADO CON LUGAR Y DEC_ID CONCRETO

function selecDecoradoProyectoLugar($idProyecto, $lugar)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM decorados
     WHERE id_proyecto = '$idProyecto' AND lugar = '$lugar'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------SELECTS TABLA PERSONAJES-----------------------------------------------------------*/
/*----------------------------------------------------SELECTS TABLA PERSONAJES-----------------------------------------------------------*/

//SELECCIONAR PERSONAJE CON ID_PROYECTO CONCRETO
function selecPersonaje($prsnId)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM personajes WHERE prsn_id = '$prsnId'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecPersonajeProyecto($idProyecto)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las escenas 
    $query = "SELECT prsn_id, nombre, apuntes, color_prsn FROM personajes WHERE id_proyecto = '$idProyecto'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a escenas.php
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecPersonajeProyectoNombre($idProyecto, $nombre)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT nombre FROM personajes
     WHERE id_proyecto = '$idProyecto' AND nombre = '$nombre'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecPersonajeAparecePlano( $idPLano)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT personajes.nombre, personajes.color_prsn, personajes.prsn_id FROM personajes, aparicion
     WHERE aparicion.id_personaje = personajes.prsn_id AND aparicion.id_plano = '$idPLano'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}


/*----------------------------------------------------SELECTS TABLA ATREZZO-----------------------------------------------------------*/
/*----------------------------------------------------SELECTS TABLA ATREZZO-----------------------------------------------------------*/

//SELECCIONAR DECORADO CON ID_PROYECTO CONCRETO
function selecAtrezzo($atId)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM atrezzo WHERE at_id = '$atId'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecAtrezzoProyecto($idProyecto)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las escenas 
    $query = "SELECT * FROM atrezzo WHERE id_proyecto = '$idProyecto'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a escenas.php
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecAtrezzoProyectoObjeto($idProyecto, $objeto)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT objeto, color_at FROM atrezzo
     WHERE id_proyecto = '$idProyecto' AND objeto = '$objeto'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecObjetoAparecePlano( $idPLano)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT atrezzo.objeto, atrezzo.color_at, atrezzo.at_id FROM atrezzo, uso
     WHERE uso.id_atrezzo = atrezzo.at_id AND uso.id_plano = '$idPLano'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------SELECTS TABLA ESCENAS-----------------------------------------------------------*/
/*----------------------------------------------------SELECTS TABLA ESCENAS-----------------------------------------------------------*/

//SELECCIONAR ESCENA CON SC_ID CONCRETO
function selecEscena($scId)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM escenas WHERE sc_id = '$scId'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}
//SELECCIONAR ESCENA CON ID_DECORADO CONCRETO
function selecEscenaDecorado($id)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las escenas 
    $query = "SELECT numero, ext_int, tiempo FROM escenas WHERE id_decorado = '$idDecorado' ORDER BY numero ASC";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a escenas.php
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}
//SELECCIONAR ESCENA CON  NÚMERO E ID_DECORADO CONCRETO
function selecEscenaDecoradoNumero($idDecorado, $numero)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM escenas
     WHERE id_decorado = '$idDecorado' AND numero= '$numero'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}



function selecEscenaDecoradoProyecto($pId)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM escenas, decorados
     WHERE decorados.id_proyecto = '$pId' AND escenas.id_decorado= decorados.dec_id ORDER BY numero";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecEscenaNumeroDecoradoProyecto($pId, $numero)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM escenas, decorados
     WHERE decorados.id_proyecto = '$pId' AND escenas.id_decorado= decorados.dec_id AND escenas.numero = $numero";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecEscenaDecoradoProyectoOrderNum($pId)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM escenas, decorados
     WHERE decorados.id_proyecto = '$pId' AND escenas.id_decorado= decorados.dec_id ORDER BY numero ASC";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecEscenaProyecto($idProyecto){

    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM escenas
     WHERE id_proyecto = $idProyecto ORDER BY numero ASC";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);


}

/*----------------------------------------------------SELECTS TABLA PLANOS-----------------------------------------------------------*/
/*----------------------------------------------------SELECTS TABLA PLANOS-----------------------------------------------------------*/

//SELECCIONAR NUMERO PLANO CON P_ID CONCRETO
function selecNumeroPlanoEscena($numeroPl, $idEscena)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM planos 
    WHERE id_escena = $idEscena AND  numeropl = $numeroPl";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

//SELECCIONAR PLANO CON SC_ID CONCRETO
function selecPlanoEscena( $scId)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM planos 
    WHERE id_escena = $scId ORDER BY numeropl";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}
//SELECCIONAR  CON ID_PROYECTO CONCRETO
function selecPlanosProyecto($pId)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM planos, escenas, decorados 
    WHERE planos.id_escena = escenas.sc_id 
    AND escenas.id_decorado = decorados.dec_id 
    AND decorados.id_proyecto = $pId";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecPlanosProyectoPlIdDia($pId, $plId, $dia)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT escenas.numero, escenas.sc_id, planos.numeropl, planos.tamaño,
     planos.soporte, planos.angulo, planos.posicion, planos.movimiento, planos.hora decorados.color  FROM planos, escenas, decorados 
    WHERE planos.pl_id = $plId AND planos.dia = '$dia' AND planos.id_escena = escenas.sc_id 
    AND escenas.id_decorado = decorados.dec_id 
    AND decorados.id_proyecto = $pId";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}
function selecProyectoPLanoId($plId){

     //Archivo de conexión
     include "./bbdd/conexion.php";
     //Realizamos la consulta de las noticias en orden descendente
     $query = "SELECT id_proyecto FROM planos
     WHERE pl_id = $plId";
     $res = mysqli_query($con, $query);
     //Devuelve la consulta a list_noticias
     return $res;
     //Cerramos conexión
     mysqli_close($con);



}

function selecPLanoPorId($plId){

    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM planos
    WHERE pl_id = $plId";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);



}

function selecPlanosHoraDia($pId, $hora, $dia)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT escenas.numero, planos.numeropl, planos.tamaño,
    planos.soporte, planos.angulo, planos.posicion, planos.movimiento, decorados.color  FROM planos, escenas, decorados 
   WHERE planos.hora = $hora AND planos.dia = '$dia' AND planos.id_escena = escenas.sc_id 
   AND escenas.id_decorado = decorados.dec_id 
   AND decorados.id_proyecto = $pId";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecPlanosDistDia($pId)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT DISTINCT dia FROM planos WHERE  id_proyecto = $pId";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecPlanosPlIdConDia($dia)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT pl_id FROM planos WHERE  dia = '$dia'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecPlanosDia($pId, $dia)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM planos WHERE  dia = '$dia' AND id_proyecto = $pId ORDER BY hora";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecPlanosProyectoDia($pId, $dia)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT escenas.numero, escenas.sc_id, planos.numeropl, planos.tamaño, planos.pl_id, 
    planos.soporte, planos.angulo, planos.posicion, planos.movimiento, decorados.color, planos.hora  FROM planos, escenas, decorados 
    WHERE planos.dia = '$dia' AND planos.id_escena = escenas.sc_id 
    AND escenas.id_decorado = decorados.dec_id 
    AND decorados.id_proyecto = $pId
    ORDER BY hora ASC";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}


/*----------------------------------------------------SELECTS STORYBOARDS-----------------------------------------------------------*/
/*----------------------------------------------------SELECTS STORYBOARDS-----------------------------------------------------------*/
///SELECCIONAR PLANO CON SC_ID CONCRETO
function selecPlanoEscenaInsertStory($pId )
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT planos.pl_id, planos.numeropl, planos.id_proyecto, planos.storyboard, escenas.sc_id, escenas.numero  FROM planos INNER JOIN escenas 
    WHERE planos.id_escena = escenas.sc_id AND planos.id_proyecto = $pId";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

function selecNombreStory($story )
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT storyboard FROM planos
    WHERE storyboard = '$story'";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}

/*----------------------------------------------------SELECTS TABLA APARICION-----------------------------------------------------------*/
/*----------------------------------------------------SELECTS TABLA APARICION-----------------------------------------------------------*/

//SELECCIONAR ESCENA CON SC_ID CONCRETO
function selecAparicion($idPersonaje, $idPlano)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM aparicion WHERE id_personaje=$idPersonaje AND id_plano = $idPlano";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}


/*----------------------------------------------------SELECTS TABLA APARICION-----------------------------------------------------------*/
/*----------------------------------------------------SELECTS TABLA APARICION-----------------------------------------------------------*/

//SELECCIONAR ESCENA CON SC_ID CONCRETO
function selecUso($idAtrezzo, $idPlano)
{
    //Archivo de conexión
    include "./bbdd/conexion.php";
    //Realizamos la consulta de las noticias en orden descendente
    $query = "SELECT * FROM uso WHERE id_atrezzo=$idAtrezzo AND id_plano = $idPlano";
    $res = mysqli_query($con, $query);
    //Devuelve la consulta a list_noticias
    return $res;
    //Cerramos conexión
    mysqli_close($con);
}



/*---DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES---*/
/*---DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES---*/
/*---DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES------DELETES---*/



/*----------------------------------------------------DELETE TABLA PROYECTOS-----------------------------------------------------------*/
/*----------------------------------------------------DELETE TABLA PROYECTOS-----------------------------------------------------------*/

//BORRAR TABLA PROYECTOS
function deletePr($pId)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    /*Borramos el usuario con la ID que nos ha mandado por parámetro el
    link de la tabla de list_usuarios*/
    $query = "DELETE FROM proyectos WHERE p_id = '$pId'";
    //Lanzamos la orden a la base de datos
    mysqli_query($con, $query);
    //Cerramos conexión
    mysqli_close($con);
}

function deleteDec($decId)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    /*Borramos el usuario con la ID que nos ha mandado por parámetro el
    link de la tabla de list_usuarios*/
    $query = "DELETE FROM decorados WHERE dec_id = '$decId'";
    //Lanzamos la orden a la base de datos
    mysqli_query($con, $query);
    //Cerramos conexión
    mysqli_close($con);
}

function deletePersonaje($prsnId)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    /*Borramos el usuario con la ID que nos ha mandado por parámetro el
    link de la tabla de list_usuarios*/
    $query = "DELETE FROM personajes WHERE prsn_id = '$prsnId'";
    //Lanzamos la orden a la base de datos
    mysqli_query($con, $query);
    //Cerramos conexión
    mysqli_close($con);
}

function deleteAtrezzo($atrezzo)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    /*Borramos el usuario con la ID que nos ha mandado por parámetro el
    link de la tabla de list_usuarios*/
    $query = "DELETE FROM atrezzo WHERE at_id = '$atrezzo'";
    //Lanzamos la orden a la base de datos
    mysqli_query($con, $query);
    //Cerramos conexión
    mysqli_close($con);
}


function deleteEscena($escena)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    /*Borramos el usuario con la ID que nos ha mandado por parámetro el
    link de la tabla de list_usuarios*/
    $query = "DELETE FROM escenas WHERE sc_id = '$escena'";
    //Lanzamos la orden a la base de datos
    mysqli_query($con, $query);
    //Cerramos conexión
    mysqli_close($con);
}

function deletePlano($plano)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    /*Borramos el usuario con la ID que nos ha mandado por parámetro el
    link de la tabla de list_usuarios*/
    $query = "DELETE FROM planos WHERE pl_id = '$plano'";

    //Lanzamos la orden a la base de datos
    mysqli_query($con, $query);

    //Cerramos conexión
    mysqli_close($con);
}

function deleteAparicion($personaje, $plano)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    /*Borramos el usuario con la ID que nos ha mandado por parámetro el
    link de la tabla de list_usuarios*/
    $query = "DELETE FROM aparicion
     WHERE id_personaje = '$personaje' AND id_plano= '$plano'";
    //Lanzamos la orden a la base de datos
    mysqli_query($con, $query);
    //Cerramos conexión
    mysqli_close($con);
}

function deleteUso($objeto, $plano)
{
    //Archivo de conexión
    include "bbdd/conexion.php";
    /*Borramos el usuario con la ID que nos ha mandado por parámetro el
    link de la tabla de list_usuarios*/
    $query = "DELETE FROM uso
     WHERE id_atrezzo = '$objeto' AND id_plano= '$plano'";
    //Lanzamos la orden a la base de datos
    mysqli_query($con, $query);
    //Cerramos conexión
    mysqli_close($con);
}



?>