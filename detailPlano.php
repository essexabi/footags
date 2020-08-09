<?php
session_start();
$id = $_GET['id'];
$plId = $_GET['idPl'];
$scId = $_GET['idEsc'];

?>

<!DOCTYPE html>

<html lang="es">


<?php include "includes/general/head.php";

$res = selecProyecto($id);
$cont = mysqli_num_rows($res);

$fila = mysqli_fetch_assoc($res);

$pId = $fila['p_id'];
$_SESSION['proyectoId'] = $pId;


$resPl = selecPLanoPorId($plId);


$filaPl = mysqli_fetch_assoc($resPl);

$resEsc = selecEscenaDecoradoProyecto($id);

$filaEsc = mysqli_fetch_assoc($resEsc);

$resEscNum = selecEscena($scId);

$filaEscNum = mysqli_fetch_assoc($resEscNum);





?>

<body class=" bg-light">

    <?php include "includes/nav/headerPryctAdmin.php" ?>
    <div class="container-fluid align-items-stretch w-100">
    
        <div class="row d-flex">

            <?php include "includes/nav/asidePryctAdmin.php";?>


            <!--ICONO PLANOS-->
            <div class="row-cols-1 d mt-2 fixed-top">


                <div class="d-block d-md-none">
                    <center><img src="img/planos.png" class="img-fluid mb-1 " alt="" width="45px"></center>
                </div>
                <div class=" d-block d-md-none">
                    <h5 class=" text-success text-center"><small>PLANO # <?php echo $filaEscNum['numero'] ?> . <?php echo $filaPl['numeropl'] ?> </small></h5>
                </div>



                <div class="row w-100 d-none d-md-flex fixed-top">
                    <div class="col  mt-2">
                        <h4 class="text-success float-right"><small>PLANO # <?php echo $filaEscNum['numero'];?> . <?php echo $filaPl['numeropl'] ?> </small></h4>
                    </div>
                    <div class="col-4 "><img src="img/planos.png" class="img-fluid mt-1" alt="" width="80px"></div>
                </div>

            </div>
            <div class="col-12 col-sm-10 col-lg-8 w-100" style="margin-top: 10%;">
                <div class="col">


                    <h4 class=" col text-dark font-weight-lighter d-none d-md-block text-justify mt-2">
                        <?php echo $filaPl['tamaño'] ?> / <?php echo $filaPl['angulo'] ?>
                        <?php echo $filaPl['posicion'] ?> / <?php echo $filaPl['movimiento'] ?> / Cámara <?php echo $filaPl['soporte'] ?>
                    </h4>


                    <h3 class=" col text-dark  flex-wrap font-weight-lighter d-block d-md-none text-justify mt-3" style="line-height:0.5em;">
                        <small><small>
                                <?php echo $filaPl['tamaño'] ?> / <?php echo $filaPl['angulo'] ?>
                                <?php echo $filaPl['posicion'] ?> / <?php echo $filaPl['movimiento'] ?> / Cámara <?php echo $filaPl['soporte'] ?>
                            </small></small>
                    </h3>

                    <!--BOTONES Y MODALS PLANO, BORRAR, EDITAR-->
                    <div class="col  justify-content-center  rounded bg-transparent d-flex-wrap p-1">

                        <!--BOTÓN AÑADIR Storyboard-->
                        <button type="button" class="btn btn-transparent p-1 shadow" data-toggle="modal" data-target=<?php echo '"#strPlForm' . $filaPl['pl_id'] . '"' ?>>
                            <img src="img/subirStory.png" class="img mb-1 mr-1" alt="" width="25px">
                        </button>

                        <!--BOTÓN AÑADIR personaje-->
                        <button type="button" class="btn btn-transparent p-1 align-self-stretch shadow" data-toggle="modal" data-target=<?php echo '"#apPlForm' . $filaPl['pl_id'] . '"' ?>>
                            <img src="img/personajeBlack.png" class="img mb-1 mr-1" alt="" width="25px">
                        </button>

                        <!--BOTÓN AÑADIR atrezzo-->
                        <button type="button" class="btn btn-transparent p-1 align-self-stretch shadow" data-toggle="modal" data-target=<?php echo '"#usoPlForm' . $filaPl['pl_id'] . '"' ?>>
                            <img src="img/atBlack.png" class="img mb-1 mr-1" alt="" width="25px">
                        </button>

                        <!-- MODAL AÑADIR STORY -->
                        <div class="modal" id="strPlForm<?php echo $filaPl['pl_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="strPlForm<?php echo $filaPl['pl_id'] ?>Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="strPlForm<?php echo $filaPl['pl_id'] ?>Label"><img src="img/subirStory.png" class=" " alt="" width="45px">&nbsp;Añadir Storyboard</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="lanzarImagen.php" method="POST" enctype="multipart/form-data">

                                            <input type="text" class="d-none" name="strPryctId" value="<?php echo $id ?>">
                                            <input type="text" class="d-none" name="plStory" value="<?php echo $filaPl['pl_id'] ?>">
                                            <input type="text" class="d-none" name="escId" value="<?php echo $filaEsc['sc_id'] ?>">
                                            <input type="text" class="d-none" name="storyStd" value="<?php echo $filaPl['storyboard'] ?>">

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

                        <!-- MODAL AÑADIR PERSONAJE -->
                        <div class="modal" id="apPlForm<?php echo $filaPl['pl_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="apPlForm<?php echo $filaPl['pl_id'] ?>Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="apPlForm<?php echo $filaPl['pl_id'] ?>Label"><img src="img/personajeBlack.png" class=" " alt="" width="45px">
                                            &nbsp;Añadir personaje al plano # <?php echo $filaEsc['numero'] ?> . <?php echo $filaPl['numeropl'] ?>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="detailPlano.php?id=<?php echo $pId ?>&idPl=<?php echo $filaPl['pl_id'] ?>&idEsc=<?php echo $filaEsc['sc_id'];?>" method="POST">
                                            <select class="custom-select" name="prsnId" required>
                                                <option value="" selected>Elige un personaje</option>
                                                <?php

                                                $resPrsn = selecPersonajeProyecto($_SESSION['proyectoId']);

                                                $contPrsn = mysqli_num_rows($resPrsn);

                                                for ($p = 0; $p < $contPrsn; $p++) {
                                                    $filaPrsn = mysqli_fetch_assoc($resPrsn); ?>


                                                    <option value="<?php echo $filaPrsn['prsn_id']; ?>" style="background-color: <?php echo $filaPrsn['color_prsn']; ?>;"><?php echo $filaPrsn['nombre']; ?></option>

                                                <?php

                                                }

                                                ?>
                                            </select>
                                            <div class="custom-file">

                                                <input type="text" class="d-none" name="apPl" value="<?php echo $filaPl['pl_id'] ?>">
                                                <input type="text" class="d-none" name="escPl" value="<?php echo $filaPl['id_escena'] ?>">
                                                <input type="text" class="d-none" name="pryctPl" value="<?php echo $filaPl['id_proyecto'] ?>">

                                            </div>

                                            <button type="submit" name="submitAp" class="bg-warning text-dark border-0 rounded shadow mt-2">añadir personaje</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- MODAL AÑADIR OBJETO -->
                        <div class="modal" id="usoPlForm<?php echo $filaPl['pl_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="usoPlForm<?php echo $filaPl['pl_id'] ?>Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="usoPlForm<?php echo $filaPl['pl_id'] ?>Label"><img src="img/personajeBlack.png" class=" " alt="" width="45px">
                                            &nbsp;Añadir objeto al plano # <?php echo $filaEsc['numero'] ?> . <?php echo $filaPl['numeropl'] ?>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="detailPlano.php?id=<?php echo $pId ?>&idPl=<?php echo $filaPl['pl_id'] ?>&idEsc=<?php echo $filaEsc['sc_id'] ?>" method="POST">
                                            <select class="custom-select" name="atId">
                                                <option selected>Elige un objeto</option>
                                                <?php

                                                $resAt = selecAtrezzoProyecto($_SESSION['proyectoId']);

                                                $contAt = mysqli_num_rows($resAt);

                                                for ($p = 0; $p < $contPrsn; $p++) {
                                                    $filaAt = mysqli_fetch_assoc($resAt); ?>


                                                    <option value="<?php echo $filaAt['at_id']; ?>" style="background-color: <?php echo $filaAt['color_at']; ?>;"><?php echo $filaAt['objeto']; ?></option>

                                                <?php

                                                }

                                                ?>
                                            </select>
                                            <div class="custom-file">

                                                <input type="text" class="d-none" name="apPl" value="<?php echo $filaPl['pl_id'] ?>">

                                            </div>

                                            <button type="submit" name="submitUs" class="bg-warning text-dark border-0 rounded shadow mt-2">añadir objeto</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--BOTÓN EDITAR PLANO-->
                        <button type="button" id="escIdEdit" class="btn btn-transparent  shadow" data-toggle="modal" data-target="#editPl<?php echo $filaPl['pl_id'] ?>" style="color: black;">
                            <small><i class="fas fa-pencil-alt"></i></small></a>

                        </button>

                        <!-- MODAL EDITAR PLANO-->
                        <div class="modal rounded" id="editPl<?php echo $filaPl['pl_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editPl<?php echo $filaPl['pl_id'] ?>Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <div class="modal-content">

                                    <!--MODAL HEADER EDITAR PLANO-->
                                    <div class="modal-header bg-white ">
                                        <h5 class="modal-title" id="editPl"><img src="img/escenas.png" class="img-fluid mb-1 " alt="" width="45px">
                                            &nbsp; editar plano # <?php echo $filaEsc['numero'] ?> . <?php echo $filaPl['numeropl'] ?>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class=" btn-white" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <!--MODAL BODY EDITAR PLANO-->
                                    <div class="modal-body container-fluid bg-white">

                                        <form action="editarPln.php?id=<?php echo $pId ?>" method="POST">

                                            <!--INPUT OCULTO PL_ID-->
                                            <input type="text" class="d-none" name="plId" value="<?php echo $filaPl['pl_id'] ?>">
                                            <input type="text" class="d-none" name="pId" value="<?php echo $pId ?>">
                                            <input type="text" class="d-none" name="escId" value="<?php echo $filaPl['id_escena'] ?>">

                                            <!--INPUT OCULTO PROYECTO_ID-->
                                            <input type="text" class="d-none" name="idPryct" value="<?php echo $pId ?>">

                                            <div class="row ml-2 w-100">

                                                <!--INPUT NÚMERO PLANO-->
                                                <div class="form-group mr-1">
                                                    <label for="numero">Plano</label>
                                                    <input type="number" class="form-control bg-dark text-light" name="numeroPl" id="numero" placeholder="número" value="<?php echo $filaPl['numeropl'] ?>" min="1" max="100">
                                                </div>

                                                <!--SELECT TAMAÑO PLANO-->
                                                <div class="form-group col-11 pl-1 pl-sm-0 col-sm">
                                                    <label for="numero">Tamaño</label>
                                                    <select class="custom-select bg-dark text-light" name="tamaño">
                                                        <option selected><?php echo $filaPl['tamaño'] ?></option>
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

                                                        <option selected><?php echo $filaPl['angulo'] ?></option>
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

                                                        <option selected><?php echo $filaPl['posicion'] ?></option>
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

                                                        <option selected><?php echo $filaPl['movimiento'] ?></option>
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

                                                        <option selected><?php echo $filaPl['soporte'] ?></option>
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

                                                <label for="descPl"></label>
                                                <textarea type="text" name="descPl" class="form-control bg-dark text-white" id="desPl"><?php echo $filaPl['descripcion_pl'] ?></textarea>

                                            </div>
                                            <div class="modal-footer">

                                                <button type="submit" name="submitPlEdit" class="btn btn-warning">editar plano</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <!--BOTÓN ELIMINAR PLANO-->
                        <button type="button" class="btn btn-transparent shadow" data-toggle="modal" data-target=<?php echo '"#delPl' . $filaPl['pl_id'] . '"' ?> style="color: black;">
                            <small><i class="fas fa-trash-alt" style="color: <?php echo $color ?>"></i></small>
                        </button>

                        <!-- MODAL ELIMINAR PLANO-->
                        <div class="modal" id=<?php echo '"delPl' . $filaPl['pl_id'] . '"' ?> tabindex="-1" role="dialog" aria-labelledby="eliminar escena" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Borrar plano</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-dark text-danger">
                                        ¿Seguro que quieres borrar este plano?<br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary bg-danger" onclick="location.assign('borrarPln.php?id=<?php echo $filaPl['pl_id'] ?>&prId=<?php echo $pId ?>&idSt=<?php echo $filaPl['storyboard'] ?>')">Borrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <?php if (isset($_POST["submitAp"])) {
                        valAparicion();
                    } ?>

                    <?php if (isset($_POST["submitUs"])) {
                        valUso();
                    } ?>

                    <!--SE LANZA  BOTÓN MODAL STORY IMAGEN FULL-->
                    <!--SI HAY IMAGEN-->

                    <button type="button" class="btn row w-100 ml-0 mr-2 p-auto mb-2 p-1 bg-transparent rounded shadow-lg justify-content-center" data-toggle="modal" data-target="#img<?php echo $filaPl['pl_id'] ?>">
                        <img src="/footags/uploads/<?php echo $filaPl['storyboard'] ?>" class="img-thumbnail bg-transparent" onError="this.onerror=null;this.style='display: none; '" name="plStr" style="max-height: 300px;">

                    </button>

                    <div class="modal" id="img<?php echo $filaPl['pl_id'] ?>">

                        <img src="/footags/uploads/<?php echo $filaPl['storyboard'] ?>" class="img-thumbnail bg-transparent" name="plStr" style="width: 70%;">


                    </div>



                    <div class="row w-100 ml-0 mr-2 pb-0 pl-1  pr-0 pt-1 mb-2 bg-transparent rounded shadow-lg">
                        <p class=" text-dark font-weight-lighter d-block  text-justify mt-2">
                            <small>
                                <?php echo $filaPl['descripcion_pl'] ?>
                            </small>
                        </p>


                    </div>

                    <div class="row w-100 ml-0 mr-2 pb-0 pl-1  pr-0 pt-1 mb-2 bg-transparent rounded shadow-lg">


                        <p class="  d-block  text-justify mt-2" style="color: <?php echo $filaEsc['color'] ?>">
                            <small>
                                PERSONAJES
                            </small>
                        </p>
                        <div class="">

                            <?php

                            $resAp = selecPersonajeAparecePlano($filaPl['pl_id']);
                            $contAp = mysqli_num_rows($resAp);

                            for ($a = 0; $a < $contAp; $a++) {

                                $filaAp = mysqli_fetch_assoc($resAp);


                            ?>
                                <button class="btn btn-small mt-2 font-weight-lighter text-white py-0 px-1 ml-1" data-toggle="modal" data-target="#delAp<?php echo $filaPl['pl_id'] ?>" style="background-color: <?php echo $filaAp['color_prsn'] ?>">
                                    <small>
                                        <?php echo $filaAp['nombre'] ?>
                                    </small>
                                </button>

                                <!-- MODAL ELIMINAR APARICION-->
                                <div class="modal" id="delAp<?php echo $filaPl['pl_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="eliminar escena" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Quitar personaje del plano</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body bg-dark text-danger">
                                                ¿Seguro que quieres quitar del plano a este personaje?<br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary bg-danger" onclick="location.assign('borrarAparicion.php?id=<?php echo $filaAp['prsn_id'] ?>&plId=<?php echo $filaPl['pl_id'] ?>&prId=<?php echo $pId ?>&escId=<?php echo $pId ?>')">borrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php

                            }

                            ?>



                        </div>


                    </div>

                    <div class="row w-100 ml-0 mr-2 pb-0 pl-1  pr-0 pt-1 mb-2 bg-transparent rounded shadow-lg">


                        <p class="  d-block  text-justify mt-2" style="color: <?php echo $filaEsc['color'] ?>">
                            <small>
                                ATREZZO
                            </small>

                            <div class="" id="at<?php echo $filaPl['pl_id'] ?>">
                                <?php

                                $resUs = selecObjetoAparecePlano($filaPl['pl_id']);
                                $contUs = mysqli_num_rows($resUs);

                                for ($a = 0; $a < $contUs; $a++) {

                                    $filaUs = mysqli_fetch_assoc($resUs);


                                ?>
                                    <button class="btn btn-small mt-2 font-weight-lighter text-white py-0 px-1 ml-1" data-toggle="modal" data-target="#delUs<?php echo $filaPl['pl_id'] ?>" style="background-color: <?php echo $filaUs['color_at'] ?>">
                                        <small>
                                            <?php echo $filaUs['objeto'] ?>
                                        </small>
                                    </button>

                                    <!-- MODAL ELIMINAR USO-->
                                    <div class="modal" id="delUs<?php echo $filaPl['pl_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="eliminar atrezzo" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Quitar objeto del plano</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body bg-dark text-danger">
                                                    ¿Seguro que quieres quitar este objeto del plano?<br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary bg-danger" onclick="location.assign('borrarUso.php?id=<?php echo $filaUs['at_id'] ?>&plId=<?php echo $filaPl['pl_id'] ?>&prId=<?php echo $pId ?>')">borrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php

                                }

                                ?>
                            </div>
                        </p>

                    </div>

                    <?php include "includes/general/footer.php"; ?>
                                
                    
                </div>
            </div>

        </div>
    </div>

    <?php include "includes/general/src.php"; ?>
</body>

</html>