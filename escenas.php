<?php
session_start();
$id = $_GET['id'];
?>

<!DOCTYPE html>

<html lang="es">


<?php include "includes/general/head.php";

$res = selecProyecto($id);
$cont = mysqli_num_rows($res);

$fila = mysqli_fetch_assoc($res);
$titulo = $fila['titulo'];
$sinopsis = $fila['sinopsis'];
$genero = $fila['genero'];
$pId = $fila['p_id'];
$_SESSION['proyectoId'] = $pId;
?>

<body class=" bg-light">


    <?php include "includes/nav/headerPryctAdmin.php" ?>

    <div class="container-fluid align-items-stretch w-100">

        <div class="row">

            <?php include "includes/nav/asidePryctAdmin.php"; ?>


            <!--ICONO ESCENAS-->
            <div class="row-cols-1 d mt-2 fixed-top">


                <div class="d-block d-md-none">
                    <center><img src="img/escenas.png" class="img-fluid mb-1 " alt="" width="45px"></center>
                </div>
                <div class=" d-block d-md-none">
                    <h5 class="text-dark text-center"><small>ESCENAS</small></h5>
                </div>

                <div class="row w-100 d-none d-md-flex fixed-top">
                    <div class="col  mt-2">
                        <h4 class="text-dark float-right"><small>ESCENAS</small></h4>
                    </div>
                    <div class="col-4 "><img src="img/escenas.png" class="img-fluid mt-1" alt="" width="80px"></div>
                </div>

            </div>
            <!--TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS----TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS----TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS----TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS-->
            <div class="col-12 col-sm-10 col-lg-8 w-100">

                <!--TÍTULO PROYECTO COL-->
                <div class=" d-block  d-md-none bg-warning  shadow" style="margin-top: 20%;">
                    <div class='d-flex flex-row justify-content-end w-100'>

                        <span class="badge badge-dark rounded-0 float-right">

                            <small><?php echo $genero ?></small>

                        </span>

                    </div>

                    <h2 class="font-weight-lighter text-dark mb-0">
                        <?php echo $titulo ?>
                    </h2>


                </div>

                <!--TÍTULO PROYECTO SM-XL-->
                <div class=" d-none  d-md-block bg-warning  shadow" style="margin-top: 15%;">
                    <!--ETIQUETA RECIBE GÉNERO-->
                    <div class='d-flex flex-row justify-content-end w-100'>

                        <span class="badge badge-dark rounded-0 float-right">

                            <small><?php echo $genero ?></small>

                        </span>

                    </div>

                    <!--RECIBE TÍTULO-->
                    <h1 class="font-weight-lighter text-justify ml-2 mb-2">

                        <?php echo $titulo ?>

                    </h1>

                </div>

                <!--BOTÓN CREAR ESCENA Y VOLVER AL SET-->
                <div class="container-fluidCOL-12 w-100 ml-3">


                    <!--BOTONES AÑADIR SET, AÑADIR ESCENA,  SUBIR GUIÓN----BOTONES AÑADIR SET, AÑADIR ESCENA,  SUBIR GUIÓN----BOTONES AÑADIR SET, AÑADIR ESCENA,  SUBIR GUIÓN----BOTONES AÑADIR SET, AÑADIR ESCENA,  SUBIR GUIÓN----BOTONES AÑADIR SET, AÑADIR ESCENA,  SUBIR GUIÓN-->


                    <!--BOTÓN AÑADIR ESCENA-->

                    <div class="row w-100  mt-2 m bg-transparent d-inline-flex pt-1 pb-1 pl-1 rounded">
                        <button type="button" class="btn btn-warning btn-sm text-right text-dark text-monospace shadow mt-2 ml-0 col-6 col-sm-4 col-lg-3" data-toggle="modal" data-target=<?php echo '"#escForm' . $_SESSION['proyectoId'] . '"' ?>>
                            <img src="img/escenas.png" class="img-fluid mb-1 float-left" alt="" width="30px"><small>añadir escena</small>
                        </button>

                        <div class="col "></div>
                        <div class="col-3 col-sm-2 mt-2 float-right" role="group" aria-label="Basic example" style=" height: 90%;">
                            <a class="btn rounded btn-sm ml-3 ml-sm-0  bg-transparent text-light shadow" <?php echo " href='setRodaje.php?id=" . $pId . "'" ?>>
                                <img src="img/setBlack.png" class="d-block d-sm-none" alt="" width="35px">
                                <img src="img/setBlack.png" class="d-none d-sm-block" alt="" width="40px">
                            </a>
                        </div>

                    </div>



                    <?php if (isset($_POST["submitEsc"])) {
                        valCrearEscena();
                    } ?>

                    <?php if (isset($_POST["submitPlForm"])) {
                        valCrearPLano();
                    } ?>



                    <!--MODAL FORMULARIO AÑADIR ESCENA----MODAL FORMULARIO AÑADIR ESCENA----MODAL FORMULARIO AÑADIR ESCENA----MODAL FORMULARIO AÑADIR ESCENA----MODAL FORMULARIO AÑADIR ESCENA----MODAL FORMULARIO AÑADIR ESCENA----MODAL FORMULARIO AÑADIR ESCENA-->
                    <div class="modal" id=<?php echo '"escForm' . $_SESSION['proyectoId'] . '"' ?> tabindex="-1" role="dialog" aria-labelledby=<?php echo ' "escForm' . $_SESSION['proyectoId'] . 'Label"' ?> aria-hidden="true">
                        <div class="modal-dialog" role="document">

                            <div class="modal-content">

                                <!--MODAL HEADER FORMULARIO-->
                                <div class="modal-header bg-white">
                                    <h5 class="modal-title" id=<?php echo '"escForm' . $_SESSION['proyectoId'] . 'Label"' ?>><img src="img/escenas.png" class="img-fluid mb-1 " alt="" width="45px">&nbsp;Añadir escena</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class=" btn-white" aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!--MODAL BODY FORMULARIO-->
                                <div class="modal-body container-fluid bg-white">
                                    <form action="escenas.php?id=<?php echo $_SESSION['proyectoId'] ?>" method="POST">

                                        <!--INPUT NÚMERO Y ID_DECORADO-->
                                        <div class="row w-100">
                                            <!--INPUT NÚMERO-->
                                            <div class="col-6 col-sm-4 ">

                                                <div class="form-group">

                                                    <input type="number" class="form-control-sm col-8 bg-dark text-white border-0" id="lugar" placeholder="#num" name="numero" min="1" max="20">
                                                </div>

                                            </div>
                                            <!--INPUT OCULTO ID_PROYECTO-->
                                            <input type="text" class="form-control invisible col-6" id="pId" value=<?php echo ' "' . $_SESSION['proyectoId'] . '"' ?> name="idProyecto">

                                            <!--SELECT ID_DECORADO-->
                                            <div class="col-6 col-sm-8">
                                                <select class="custom-select bg-dark text-white" name="idDecorado">
                                                    <option selected><small>decorado</small></option>

                                                    <?php
                                                    $res = selecDecoradoProyecto($pId);
                                                    $cont = mysqli_num_rows($res);

                                                    for ($i = 0; $i < $cont; $i++) {
                                                        $fila = mysqli_fetch_assoc($res);

                                                        $lugar = $fila['lugar'];
                                                        $decId = $fila['dec_id'];
                                                        $color = $fila['color'];

                                                        echo '<option value="' . $decId . '" style=" background-color:' . $color . ';"> ' . $lugar . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!--RADIO INT-EXT Y DÍA-NOCHE-->
                                        <div class="row ">
                                            <!--RADIO INT-EXT-->
                                            <div class="container col-6 w-100">

                                                <label class="radio-inline " for="ext"><img src="img/exterior.png" class="img-fluid mb-1 float-right" alt="" width="45px">

                                                    <input type="radio" id="ext" name="extInt" value="exterior" checked>

                                                </label>

                                                <label class="radio-inline ml-2 p-1" for="int"><img src="img/interior.png" class="img-fluid mb-1 float-right" alt="" width="45px">

                                                    <input type="radio" id="int" class="" name="extInt" value="interior">

                                                </label>

                                            </div>
                                            <!--RADIO TIEMPO-->
                                            <div class="container col-6 float-right mt-0">


                                                <label class="radio-inline pb-2" for="dia"><img src="img/dia.png" class="img-fluid  float-right" alt="" width="35px">

                                                    <input type="radio" id="dia" class="" name="tiempo" value="día" checked>

                                                </label>



                                                <label class="radio-inline ml-2 p-1" for="noche"><img src="img/noche.png" class="img-fluid mb-1 float-right" alt="" width="38px">

                                                    <input type="radio" id="noche" class="" name="tiempo" value="noche">

                                                </label>


                                            </div>

                                        </div>

                                        <!--INPUT DESCRIPCIÓN-->
                                        <div class="row m-auto">

                                            <textarea class="form-control-sm border-0 bg-dark text-white w-100" rows="6" name="descripcion" placeholder="descripción"></textarea>
                                        </div>


                                        <!--SUBMIT FORMULARIO E INPUT OCULTO ID_PROYECTO-->
                                        <div class="row mt-2 float-right">

                                            <!--BOTÓN SUBMIT-->
                                            <button type="submit" class="btn-sm btn-warning border-0 mr-3" name="submitEsc">crear escena</button>
                                        </div>

                                    </form>

                                </div>



                            </div>
                        </div>

                    </div>
                </div>


                <?php
                /*--SELECCIONAR ESCENAS DE PROYECTO--**--SELECCIONAR ESCENAS DE PROYECTO--**--SELECCIONAR ESCENAS DE PROYECTO--**--SELECCIONAR ESCENAS DE PROYECTO--**--SELECCIONAR ESCENAS DE PROYECTO--**--SELECCIONAR ESCENAS DE PROYECTO--**--SELECCIONAR ESCENAS DE PROYECTO--*/
                $res = selecEscenaDecoradoProyectoOrderNum($pId);
                $cont = mysqli_num_rows($res);
                for ($i = 0; $i < $cont; $i++) {

                    $fila = mysqli_fetch_assoc($res);
                    $numero = $fila['numero'];
                    $extInt = $fila['ext_int'];
                    $tiempo = $fila['tiempo'];
                    $color = $fila['color'];
                    $lugar = $fila['lugar'];
                    $descripcion = $fila["descripcion"];
                    $scId = $fila["sc_id"];
                    $idDecorado = $fila["id_decorado"];

                ?>

                    <!--DIV ESCENA GENERADO----DIV ESCENA GENERADO----DIV ESCENA GENERADO----DIV ESCENA GENERADO----DIV ESCENA GENERADO----DIV ESCENA GENERADO----DIV ESCENA GENERADO----DIV ESCENA GENERADO----DIV ESCENA GENERADO----DIV ESCENA GENERADO----DIV ESCENA GENERADO-->
                    <div class=" row w-100  mt-2 ml-1 bg-light d-inline-flex shadow pt-1 pb-1 pl-1 rounded">

                        <div class="row col-10 pl-2 pt-1 pb-1 mr-1 pr-1 d-inline-flex  w-100 rounded shadow">
                            <div class="col-12 d-inline-flex ml-1 rounded shadow" style="background-color: <?php echo $color ?>">
                                <h5 class="col-2 text-white d-inline">#<?php echo $numero ?></h5>
                                <h6 class="col-6 text-white text-center text-uppercase d-inline mt-1 "><small><small><?php echo $lugar ?></small></small></h6>

                                <div class="col">
                                    <?php
                                    if (($extInt == "exterior") && ($tiempo == "día")) { ?>

                                        <img src="img/extDia.png" class="" alt="" width="35px">

                                    <?php } elseif (($extInt == "interior") && ($tiempo == "día")) { ?>


                                        <img src="img/intDia.png" class=" img-right" alt="" width="35px">

                                    <?php } elseif (($extInt == "interior") && ($tiempo == "noche")) { ?>

                                        <img src="img/intNoche.png" class="" alt="" width="35px">

                                    <?php } elseif (($extInt == "exterior") && ($tiempo == "noche")) { ?>

                                        <img src="img/extNoche.png" class="" alt="" width="35px">

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row d-flex btn-group btn-group-sm col-12 mb-1 mt-1 ml-1 rounded border-0 ">

                                <p class="text-justify font-weight-lighter"><small><small><?php echo $descripcion ?></small></small></p>

                            </div>

                        </div>

                        <!--BOTONES Y MODALS PLANO, BORRAR, EDITAR-->
                        <div class="col-2  mt-1 rounded bg-transparent d-flex-wrap p-1 mr-1">

                            <!--BOTÓN AÑADIR PLANO-->
                            <button type="button" class="btn btn-transparent p-1 shadow" data-toggle="modal" data-target="#plForm<?php echo $scId ?>">

                                <div class="w-100">
                                    <img src="img/planos.png" class=" " alt="" width="30px">
                                </div>


                            </button>

                            <!-- MODAL AÑADIR PLANO -->
                            <div class="modal" id="plForm<?php echo $scId ?>" tabindex="-1" role="dialog" aria-labelledby="plForm<?php echo $scId ?>Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="plForm<?php echo $scId ?>Label"><img src="img/planos.png" class=" " alt="" width="45px">&nbsp;Añadir plano en escena # <?php echo $numero ?> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="escenas.php?id=<?php echo $pId ?>" method="POST">

                                                <!--INPUT OCULTO ESC_ID-->
                                                <input type="text" class="d-none" name="idEsc" value="<?php echo $scId ?>">

                                                <!--INPUT OCULTO PROYECTO_ID-->
                                                <input type="text" class="d-none" name="idPryct" value="<?php echo $pId ?>">

                                                <div class="row ml-2 w-100">

                                                    <!--INPUT NÚMERO PLANO-->
                                                    <div class="form-group mr-1">
                                                        <label for="numero">Plano</label>
                                                        <input type="number" class="form-control bg-dark text-light" name="numeroPl" id="numero" placeholder="número" min="1" max="100">
                                                    </div>

                                                    <!--SELECT TAMAÑO PLANO-->
                                                    <div class="form-group col-11 pl-1 pl-sm-0 col-sm">
                                                        <label for="numero">Tamaño</label>
                                                        <select class="custom-select bg-dark text-light" name="tamaño">
                                                            <option selected>Seleccionar encuadre</option>
                                                            <option value="P.D.">Plano Detalle (P.D.)</option>
                                                            <option value="P.P.P.">Primerísimo Primer Plano (P.P.P.)</option>
                                                            <option value="P.P.">Primer Plano (P.P.)</option>
                                                            <option value="P.M.C.">Plano Medio Corto (P.M.C.)</option>
                                                            <option value="P.M.">Plano Medio (P.M.)</option>
                                                            <option value="P.3/4">Plano 3/4 (P. 3/4)</option>
                                                            <option value="P.E.">Plano Entero (P.E.)</option>
                                                            <option value="P.G.">Plano General (P.G.)</option>
                                                            <option value="G.P.G">Gran Plano General (G.P.G)</option>
                                                        </select>

                                                    </div>



                                                </div>

                                                <div class="row w-100">
                                                    <!--SELECT POSICIÓN-->
                                                    <div class="form-group col ml-1 mr-0">
                                                        <label for="numero">Ángulo</label>
                                                        <select class="custom-select bg-dark text-light" name="angulo">

                                                            <option selected>Ángulo cámara</option>
                                                            <option value="cenital">cenital</option>
                                                            <option value="picado">picado</option>
                                                            <option value="normal">normal</option>
                                                            <option value="contrapicado">contrapicado</option>
                                                            <option value="nadir">nadir</option>

                                                        </select>


                                                    </div>

                                                    <!--SELECT POSICIÓN-->
                                                    <div class="form-group col">
                                                        <label for="numero">Posición</label>
                                                        <select class="custom-select bg-dark text-light" name="posicion">

                                                            <option selected>Posición personaje</option>
                                                            <option value="frontal">frontal</option>
                                                            <option value="lateral">lateral</option>
                                                            <option value="escorzo">escorzo</option>
                                                            <option value="trasero">trasero</option>


                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="row w-100">
                                                    <!--SELECT MOVIMIENTO-->
                                                    <div class="form-group col ml-1 mr-0">
                                                        <label for="numero">Movimiento</label>
                                                        <select class="custom-select bg-dark text-light" name="movimiento">

                                                            <option selected>Movimiento cámara</option>
                                                            <option value="paneo vertical">paneo vertical</option>
                                                            <option value="paneo horizontal">paneo horizontal</option>
                                                            <option value="plano fijo">plano fijo</option>
                                                            <option value="travelling de acercamiento">travelling de acercamiento</option>
                                                            <option value="travelling de alejamiento">travelling de alejamiento</option>
                                                            <option value="travelling de seguimiento">travelling de seguimiento</option>
                                                            <option value="zoom">zoom</option>

                                                        </select>


                                                    </div>

                                                    <!--SELECT SOPORTE-->
                                                    <div class="form-group col">
                                                        <label for="soporte">Soporte cámara</label>
                                                        <select class="custom-select bg-dark text-light" name="soporte">

                                                            <option selected>Cámara</option>
                                                            <option value="al hombro">al hombro</option>
                                                            <option value="steadycam">steadycam</option>
                                                            <option value="sobre trípode">sobre trípode</option>
                                                            <option value="sobre dolly">sobre dolly</option>
                                                            <option value="sobre vías">sobre vías</option>
                                                            <option value="sobre pluma">sobre pluma</option>
                                                            <option value="sobre grúa">sobre grúas</option>
                                                            <option value="dron">dron</option>


                                                        </select>
                                                    </div>

                                                </div>

                                                <!--INPUT DESCRIPCIÓN PLANO-->
                                                <div class="row w-100 p-3">

                                                    <label for="descnPl"></label>
                                                    <textarea type="text" name="descPl" class="form-control bg-dark text-white" id="desPl" placeholder="descripción"></textarea>

                                                </div>
                                                <div class="modal-footer">

                                                    <button type="submit" name="submitPlForm" class="btn btn-warning">añadir plano</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--BOTÓN EDITAR ESCENA-->
                            <button type="button" id="escIdEdit" class="btn btn-transparent shadow" data-toggle="modal" data-target="#editEsc<?php echo $scId ?>">
                                <small><i class="fas fa-pencil-alt" style="color: <?php echo $color ?>"></i></small></a>

                            </button>

                            <!-- MODAL EDITAR ESCENA-->
                            <div class="modal rounded" id="editEsc<?php echo $scId ?>" tabindex="-1" role="dialog" aria-labelledby="editEsc<?php echo $scId ?>Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">

                                    <div class="modal-content">

                                        <!--MODAL HEADER EDITAR ESCENA-->
                                        <div class="modal-header bg-white ">
                                            <h5 class="modal-title" id="editEsc"><img src="img/escenas.png" class="img-fluid mb-1 " alt="" width="45px">
                                                &nbsp; editar escena # <?php echo $numero ?>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class=" btn-white" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <!--MODAL BODY EDITAR ESCENA-->
                                        <div class="modal-body container-fluid bg-white">
                                            <form action="editarEsc.php?id=<?php echo "" . $pId . "&scId=" . $scId . "" ?>" method="POST">

                                                <!--INPUT NÚMERO Y ID_DECORADO-->
                                                <div class="row w-100">
                                                    <!--INPUT NÚMERO-->
                                                    <div class="col-2 w-100 ">

                                                        <div class="form-group">

                                                            <input type="text" class="form-control-sm col-8 bg-dark text-white border-0" id="numeroModal" placeholder="#num" name="numero" value="<?php echo $numero ?>">
                                                        </div>



                                                    </div>

                                                    <!--RADIO INT-EXT Y DÍA-NOCHE-->
                                                    <div class="row ">
                                                        <!--RADIO INT-EXT-->
                                                        <div class="container col-4 w-100">

                                                            <label class="radio-inline ml-1" for="ext"><img src="img/exterior.png" class="img-fluid mb-1 float-right" alt="" width="40px">
                                                                <?php if ($extInt == "exterior") {
                                                                    echo '<input type="radio" id="ext" name="extInt" value="exterior" checked>';
                                                                } else {
                                                                    echo '<input type="radio" id="ext" name="extInt" value="exterior">';
                                                                } ?>

                                                            </label>

                                                            <label class="radio-inline p-1" for="int"><img src="img/interior.png" class="img-fluid mb-1 float-right" alt="" width="40px">
                                                                <?php if ($extInt == "interior") {
                                                                    echo '<input type="radio" id="int" name="extInt" value="interior" checked>';
                                                                } else {
                                                                    echo '<input type="radio" id="int" name="extInt" value="interior">';
                                                                } ?>

                                                            </label>

                                                        </div>
                                                        <!--RADIO TIEMPO-->
                                                        <div class="container col-4 float-right mt-0">


                                                            <label class="radio-inline pb-2 ml-1" for="dia"><img src="img/dia.png" class="img-fluid  float-right" alt="" width="30px">

                                                                <?php if ($tiempo == "día") {
                                                                    echo '<input type="radio" id="dia" name="tiempo" value="día" checked>';
                                                                } else {
                                                                    echo '<input type="radio" id="dia" name="tiempo" value="día">';
                                                                } ?>

                                                            </label>



                                                            <label class="radio-inline  pl-1" for="noche"><img src="img/noche.png" class="img-fluid mb-1 float-right" alt="" width="30px">

                                                                <?php if ($tiempo == "noche") {
                                                                    echo '<input type="radio" id="noche" name="tiempo" value="noche" checked>';
                                                                } else {
                                                                    echo '<input type="radio" id="noche" name="tiempo" value="noche">';
                                                                } ?>

                                                            </label>


                                                        </div>


                                                    </div>

                                                </div>




                                                <!--INPUT DESCRIPCIÓN-->
                                                <div class="row m-auto">

                                                    <textarea class="form-control-sm border-0 bg-dark text-white w-100" rows="6" name="descripcion" placeholder="descripción"><?php echo $descripcion ?></textarea>
                                                </div>


                                                <!--SUBMIT FORMULARIO-->
                                                <div class="row mt-2 border-top col-12 w-100 ">
                                                    <!--INPUT SC_ID OCULTO-->

                                                    <input type="text" class="form-control-sm invisible col-10" id="escIdModal" value="<?php $scId ?>">


                                                    <!--BOTÓN SUBMIT-->
                                                    <button type="submit" class="btn-sm btn-warning border-0 mt-2" name="submitEditEsc">editar escena</button>

                                                </div>


                                            </form>

                                        </div>
                                    </div>


                                </div>
                            </div>


                            <!--BOTÓN ELIMINAR ESCENA-->
                            <button type="button" class="btn btn-transparent shadow" data-toggle="modal" data-target=<?php echo '"#delEsc' . $scId . '"' ?>>
                                <small><i class="fas fa-trash-alt" style="color: <?php echo $color ?>"></i></small>
                            </button>

                            <!-- MODAL ELIMINAR ESCENA-->
                            <div class="modal" id=<?php echo '"delEsc' . $scId . '"' ?> tabindex="-1" role="dialog" aria-labelledby="eliminar escena" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Borrar decorado</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body bg-dark text-danger">
                                            ¿Seguro que quieres borrar esta escena?<br>
                                            Borrarás todos los planos asociados.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary bg-danger" onclick="location.assign('borrarEsc.php?id=<?php echo $scId ?>&prId=<?php echo $pId ?>')">Borrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>

                <?php } ?>

                <?php include "includes/general/footer.php"; ?>
            </div>

        </div>


    </div>



    <?php include "includes/general/src.php" ?>
</body>


</html>