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

        <div class="row d-flex">

            <?php include "includes/nav/asidePryctAdmin.php"; ?>


            <!--ICONO ESCENAS-->
            <div class="row-cols-1 d mt-2 fixed-top">


                <div class="d-block d-md-none">
                    <center><img src="img/planos.png" class="img-fluid mb-1 " alt="" width="45px"></center>
                </div>
                <div class=" d-block d-md-none">
                    <h5 class=" text-success text-center"><small>PLANOS</small></h5>
                </div>

                <div class="row w-100 d-none d-md-flex fixed-top">
                    <div class="col  mt-2">
                        <h4 class="text-success float-right"><small>PLANOS</small></h4>
                    </div>
                    <div class="col-4 "><img src="img/planos.png" class="img-fluid mt-1" alt="" width="80px"></div>
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

                <!--BOTÓN CREAR PLANO Y VOLVER AL SET-->
                <div class="container-fluid col-12 w-100 ">




                    <!--BOTÓN AÑADIR PLANO y BOTÓN VOLVER AL SET de md a xl-->

                    <div class="row w-100  mt-2 ml-1 bg-transparent d-none d-md-inline-flex pt-1 pb-1 pl-1 rounded">

                        <!--BOTÓN AÑADIR PLANO-->
                        <button type="button" class="btn btn-warning btn-sm text-right text-dark text-monospace shadow mt-2 ml-0 col-md-4" data-toggle="modal" data-target=<?php echo '"#plForm' . $pId . '"' ?>>
                            <img src="img/planoBlack.png" class="img-fluid mb-1 float-left" alt="" width="30px"><small>añadir plano</small>
                        </button>

                        <!--BOTÓN AÑADIR Storyboard-->
                        <button type="button" class="btn btn-warning btn-sm text-right text-dark text-monospace shadow mt-2 ml-0 ml-sm-2 col-md-4" data-toggle="modal" data-target=<?php echo '"#strForm' . $pId . '"' ?>>
                            <img src="img/subirStory.png" class="img-fluid mb-1 float-left" alt="" width="30px"><small>subir storyboard</small>
                        </button>


                        <!--BOTÓN VOLVER AL SET-->
                        <div class="col d-none d-lg-block"></div>
                        <div class="col-3 col-sm-2 mt-2 float-right" role="group" aria-label="Basic example" style=" height: 90%;">
                            <a class="btn rounded btn-sm ml-3 ml-sm-0  bg-transparent text-light shadow" <?php echo " href='setRodaje.php?id=" . $pId . "'" ?>>
                                <img src="img/setBlack.png" class="d-block d-sm-none" alt="" width="35px">
                                <img src="img/setBlack.png" class="d-none d-sm-block" alt="" width="40px">
                            </a>
                        </div>


                    </div>

                    <!--BOTÓN AÑADIR PLANO y BOTÓN VOLVER AL SET col hasta md-->
                    <div class="dropdown mt-2 d-md-none ml-1">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="img/planoBlack.png" class="img-fluid float-left" alt="" width="30px">
                            <img src="img/subirStory.png" class="img-fluid ml-1 float-left" alt="" width="30px">
                            <img src="img/setBlack.png" class="img-fluid ml-1 mr-1 float-left" alt="" width="30px">

                        </button>
                        <div class="dropdown-menu btn-sm" aria-labelledby="dropdownMenu1">
                            <!--BOTÓN AÑADIR PLANO-->
                            <button type="button" class="dropdown-item btn btn-warning btn-sm text-right text-dark text-monospace mt-2" data-toggle="modal" data-target=<?php echo '"#plForm' . $pId . '"' ?>>
                                <img src="img/planoBlack.png" class="img-fluid mb-1 mr-4" alt="" width="30px"><small><small>&nbsp;añadir plano</small></small>
                            </button>

                            <!--BOTÓN AÑADIR Storyboard-->
                            <button type="button" class="dropdown-item btn btn-warning btn-sm text-right text-dark text-monospace mt-2 " data-toggle="modal" data-target=<?php echo '"#strForm' . $pId . '"' ?>>
                                <img src="img/subirStory.png" class="img-fluid mb-1 mr-1" alt="" width="30px"><small><small>&nbsp;subir storyboard</small></small>
                            </button>

                            <div class="dropdown-item row" role="group" style=" height: 90%;">
                                <a class="btn rounded btn-sm  bg-transparent text-right text-dark text-monospace" <?php echo " href='setRodaje.php?id=" . $pId . "'" ?>>
                                    <img src="img/setBlack.png" class="img-fluid ml-1 mr-3" alt="" width="30px">

                                    <small><small>volver al set</small></small>
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- MODAL AÑADIR PLANO -->
                    <div class="modal" id="plForm<?php echo $pId ?>" tabindex="-1" role="dialog" aria-labelledby="plForm<?php echo $pId ?>Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="plForm<?php echo $pId ?>Label"><img src="img/planos.png" class=" " alt="" width="45px">&nbsp;Añadir plano</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="planos.php?id=<?php echo $pId ?>" method="POST">

                                        <!--INPUT OCULTO PROYECTO_ID-->
                                        <input type="text" class="d-none" name="idPryct" value="<?php echo $pId ?>">


                                        <!--INPUT ESC_ID-->
                                        <label for=custom select>Elige una escena
                                        <select class="custom-select bg-dark text-white" name="idEsc" required>
                                            <option selected></option>
                                            <?php

                                            $res = selecEscenaDecoradoProyecto($pId);
                                            $cont = mysqli_num_rows($res);

                                            for ($i = 0; $i < $cont; $i++) {

                                                $fila = mysqli_fetch_assoc($res);

                                                echo '<option value="' . $fila["sc_id"] . '" style="background-color: ' . $fila["color"] . '; ">escena # ' . $fila["numero"] . '</option>';
                                            }

                                            ?>
                                        </select>

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

                    <!-- MODAL AÑADIR STORY -->
                    <div class="modal" id="strForm<?php echo $pId ?>" tabindex="-1" role="dialog" aria-labelledby="strForm<?php echo $pId ?>Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="strForm<?php echo $pId ?>Label"><img src="img/subirStory.png" class=" " alt="" width="45px">&nbsp;Añadir Storyboard</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="lanzarImagen.php" method="POST" enctype="multipart/form-data">

                                        <div class="rowml-2 mb-2">
                                            <select class="col custom-select bg-dark text-white mb-2 float-left" name="plStory">
                                                <option selected="">Número de plano</option>
                                                <?php
                                                //SELECCIONAR DATOS ESCENAS Y PLANOS PARA SELECT CON VALUE PL_ID
                                                $res = selecPlanoEscenaInsertStory($pId);
                                                $cont = mysqli_num_rows($res);

                                                for ($i = 0; $i < $cont; $i++) {
                                                    $fila = mysqli_fetch_assoc($res);

                                                    echo '<option value="' . $fila['pl_id'] . '" style=" background-color:' . $fila['color'] . ';"> Plano # ' . $fila['numero'] . ' . ' . $fila['numeropl'] . '</option>';
                                                } ?>
                                            </select>
                                            <div class="col-2"></div>

                                            <input type="text" class="d-none" name="strPryctId" value="<?php echo $pId ?>">
                                            <input type="text" class="d-none" name="escId" value="<?php echo $fila['sc_id'] ?>">
                                            <input type="text" class="d-none" name="storyStd" value="<?php echo $fila['storyboard'] ?>">

                                        </div>

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="story">
                                            <label class="custom-file-label bg-dark text-white" for="customFile">Sube una imagen para tu story</label>
                                        </div>

                                        <button type="submit" name="submitStr" class="bg-warning text-dark border-0 rounded shadow mt-2">subir storyboard</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!--DIV PLANOS-->

                    <?php if (isset($_POST["submitPlForm"])) {
                        valCrearPLano();
                    } ?>

                    <?php if (isset($_POST["submitAp"])) {
                        valAparicion();
                    } ?>

                    <?php if (isset($_POST["submitUs"])) {
                        valUso();
                    } ?>


                    <?php
                    //DEVUELVE ESCENAS ORDENADAS
                    $resEsc = selecEscenaDecoradoProyectoOrderNum($pId);
                    $contEsc = mysqli_num_rows($resEsc);


                    for ($i = 0; $i < $contEsc; $i++) {
                        $filaEsc = mysqli_fetch_assoc($resEsc); ?>

                        <div class=" row w-100  mt-2 ml-1 d-inline-flex shadow bg-light pt-1 pb-1 pl-1 rounded">

                            <!--ESCENA NÚMERO LUGAR EXTINT TIEMPO COLOR-->
                            <div class="row pl-2 pt-1 pb-1 mr-1 pr-1 mt-2 mb-1 d-inline-flex w-100 rounded shadow">

                                <h5 class=" mb-0 ml-2 " style="color:<?php echo $filaEsc['color']; ?>">
                                    Escena # <?php echo $filaEsc['numero'] ?>
                                </h5>

                                <h5 class=" mb-0 " style="color:<?php echo $filaEsc['color']; ?>">
                                    &nbsp;/ <?php echo $filaEsc['lugar'] ?>
                                </h5>

                                <div class="col">
                                    <?php
                                    //SI ES EXTDIA O INTDIA O EXTNOCHE O INTNOCHE
                                    if (($filaEsc['ext_int'] == "exterior") && ($filaEsc['tiempo'] == "día")) { ?>

                                        <img src="img/extDiaBlack.png" class="" alt="" width="35px">

                                    <?php } elseif (($filaEsc['ext_int'] == "interior") && ($filaEsc['tiempo'] == "día")) { ?>


                                        <img src="img/intDiaBlack.png" class=" img-right" alt="" width="35px">

                                    <?php } elseif (($filaEsc['ext_int'] == "interior") && ($filaEsc['tiempo'] == "noche")) { ?>

                                        <img src="img/intNocheBlack.png" class="" alt="" width="35px">

                                    <?php } elseif (($filaEsc['ext_int'] == "exterior") && ($filaEsc['tiempo'] == "noche")) { ?>

                                        <img src="img/extNocheBlack.png" class="" alt="" width="35px">

                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>


                            <?php
                            //DEVUELVE PLANOS DE LA ESCENA
                            $resPl = selecPlanoEscena($filaEsc['sc_id']);
                            $contPl = mysqli_num_rows($resPl);
                            for ($j = 0; $j < $contPl; $j++) {
                                $filaPl = mysqli_fetch_assoc($resPl);
                                if ($filaPl['id_escena'] == $filaEsc['sc_id']) { ?>
                                    <div class="row w-100 shadow rounded pl-1 pt-2 pr-2">

                                        <!--SE LANZA DIV PLANO-->
                                        <div class="row w-100 ml-0 pb-0 pl-1 pr-0 pt-1 mb-2 bg-transparent rounded shadow-lg">

                                            
                                            <!--SE LANZA DIV NÚMERO PLANO CON COLOR DE ESCENA-->
                                            <button type="button" id="showPl<?php $filaPl['pl_id'] ?>" 
                                            class="row w-100 mt-1 ml-2 mr-2 pt-0 pb-0 mb-2 pl-1 rounded shadow border-0" 
                                            onclick="location.assign('detailPlano.php?id=<?php echo $pId ?>&idPl=<?php echo $filaPl['pl_id'] ?>&idEsc=<?php echo $filaEsc['sc_id'] ?>')" style="background-color: <?php echo $filaEsc['color'] ?>">
                                                <h6 class="col-1 text-white text-center mt-2 mr-1 mb-0 d-none d-md-block">#<?php echo $filaEsc['numero'] ?>.<?php echo $filaPl['numeropl'] ?></h6>
                                                <p class="col-1 text-white text-center mt-2 mr-1 mb-0 d-block d-md-none" ><small>#<?php echo $filaEsc['numero'] ?>.<?php echo $filaPl['numeropl'] ?></small></p>

                                                <!--SE LANZA DIV ESPECIFICACIONES PLANO-->

                                                <h6 class=" col text-white font-weight-lighter d-none d-md-block text-justify mt-2">
                                                    <?php echo $filaPl['tamaño'] ?> / <?php echo $filaPl['angulo'] ?>
                                                    <?php echo $filaPl['posicion'] ?> / <?php echo $filaPl['movimiento'] ?> / Cámara <?php echo $filaPl['soporte'] ?>
                                                </h6>
                                                

                                                <p class=" col text-white  flex-wrap font-weight-lighter d-block d-md-none text-justify mt-3" style="line-height:0.5em;">
                                                    <small><small>
                                                        <?php echo $filaPl['tamaño'] ?> / <?php echo $filaPl['angulo'] ?>
                                                        <?php echo $filaPl['posicion'] ?> / <?php echo $filaPl['movimiento'] ?> / Cámara <?php echo $filaPl['soporte'] ?>
                                                    </small></small>
                                                </p>




                                            </button>

                                           
                                        </div>





                                    </div>
                            <?php }
                            } ?>
                        </div>
                    <?php } ?>








                </div>

                <?php include "includes/general/footer.php"; ?>

            </div>






        </div>



        <?php include "includes/general/src.php" ?>
</body>

</html>