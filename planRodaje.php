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
$guion = $fila['guion'];
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
                    <center><img src="img/planRodaje.png" class="img-fluid mb-1 " alt="" width="45px"></center>
                </div>
                <div class=" d-block d-md-none">
                    <h5 class=" text-info text-center"><small>PLAN DE RODAJE</small></h5>
                </div>

                <div class="row w-100 d-none d-md-flex fixed-top">
                    <div class="col  mt-2">
                        <h4 class="text-info float-right"><small>PLAN DE RODAJE</small></h4>
                    </div>
                    <div class="col-4 "><img src="img/planRodaje.png" class="img-fluid mt-1" alt="" width="80px"></div>
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
                <div class=" d-none  d-md-block ml-md-0 bg-warning  shadow" style="margin-top: 15%;">
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


                <div class="container-fluid col-12 ml-2 ml-sm-5 ml-md-0 w-100 ">

                    <?php if (isset($_POST['submitRecPl'])) {
                        valHoraDia();
                    } ?>

                    <div class="bg-transparent border border-warning d-none d-md-block rounded pr-1 mb-2 pl-0 shadow">
                        <form action="planRodaje.php?id=<?php echo $pId ?>" method="POST">
                            <div class="row ml-2 mt-3 mb-2">

                                <h4 class="font-weight-lighter">Organiza las jornadas de rodaje</h4>

                            </div>
                            <div class="row mt-3 ml-1 mb-2">
                                <select class="col custom-select bg-dark text-white mb-2 float-left shadow" name="numPl" required>
                                    <option selected="">Número de plano</option>
                                    <?php
                                    //SELECCIONAR DATOS ESCENAS Y PLANOS PARA SELECT CON VALUE PL_ID
                                    $res = selecPlanosProyecto($pId);
                                    $cont = mysqli_num_rows($res);

                                    for ($i = 0; $i < $cont; $i++) {
                                        $fila = mysqli_fetch_assoc($res); ?>

                                        <option value="<?php echo $fila['pl_id'] ?>" style=" background-color:<?php echo $fila['color'] ?>;"> Plano # <?php echo $fila['numero'] ?> . <?php echo $fila['numeropl'] ?></option>';
                                    <?php } ?>
                                </select>
                                <div class="col mt-0 mb-2">
                                    <select class="col custom-select bg-dark text-white mb-2 float-left shadow" name="hora" required>


                                        <option value="0">00:00</option>
                                        <option value="1">01:00</option>
                                        <option value="2">02:00</option>
                                        <option value="3">03:00</option>
                                        <option value="4">04:00</option>
                                        <option value="5">05:00</option>
                                        <option value="6">06:00</option>
                                        <option value="7">07:00</option>
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option value="18">18:00</option>
                                        <option value="19">19:00</option>
                                        <option value="20">20:00</option>
                                        <option value="21">21:00</option>
                                        <option value="22">22:00</option>
                                        <option value="23">23:00</option>



                                    </select>



                                </div>
                                <div class="col  mt-0 mb-2">

                                    <input type="date" class="col bg-dark text-white pt-2 pb-1 border-0 rounded shadow" name="dia" placeholder="<?php echo date("d") ?>/<?php echo date("m") ?>/<?php echo date("Y") ?>" min="<?php echo date("d") ?>/<?php echo date("m") ?>/<?php echo date("Y") ?>" required>
                                    <input type="text" class="d-none" name=pId value="<?php echo $pId ?>">
                                </div>

                            </div>
                            <div class="row ml-1 mb-2">

                                <button type="submit" class="btn btn-small font-weight-lighter text-dark bg-warning" name="submitRecPl">

                                    añadir al plan

                                </button>

                            </div>


                        </form>
                    </div>
                    <button type="button" class="btn bg-transparent shadow mt-2 mb-2 d-block d-md-none float-right" data-toggle="modal" data-target="#modalPlanR">
                        <img class="img-fluid ml-1 " src="img/planRodaje.png" alt="mas" width="35px">
                    </button>


                    <div class="modal" id="modalPlanR" tabindex="-1" role="dialog" modalPlanR aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalPlanRLabel">Organiza las jornadas de rodaje</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="bg-transparent border border-warning d-block d-md-none rounded pr-1 mb-2 pl-0 shadow">
                                        <form action="planRodaje.php?id=<?php echo $pId ?>" method="POST">
                                            <div class="row ml-2 mt-3 mb-2">



                                            </div>
                                            <div class="row  mt-3 ml-1 mb-2">
                                                <select class="row custom-select bg-dark text-white mb-2 ml-2 mr-4 float-left shadow" name="numPl" required>
                                                    <option selected="">Número de plano</option>
                                                    <?php
                                                    //SELECCIONAR DATOS ESCENAS Y PLANOS PARA SELECT CON VALUE PL_ID
                                                    $res = selecPlanosProyecto($pId);
                                                    $cont = mysqli_num_rows($res);

                                                    for ($i = 0; $i < $cont; $i++) {
                                                        $fila = mysqli_fetch_assoc($res); ?>

                                                        <option value="<?php echo $fila['pl_id'] ?>" style=" background-color:<?php echo $fila['color'] ?>;"> Plano # <?php echo $fila['numero'] ?> . <?php echo $fila['numeropl'] ?></option>';
                                                    <?php } ?>
                                                </select>
                                                <div class="row w-100 mt-0 ml-2 p-auto mb-2">
                                                    <select class="col-5 custom-select bg-dark text-white mb-2 shadow" name="hora" required>


                                                        <option value="0">00:00</option>
                                                        <option value="1">01:00</option>
                                                        <option value="2">02:00</option>
                                                        <option value="3">03:00</option>
                                                        <option value="4">04:00</option>
                                                        <option value="5">05:00</option>
                                                        <option value="6">06:00</option>
                                                        <option value="7">07:00</option>
                                                        <option value="8">08:00</option>
                                                        <option value="9">09:00</option>
                                                        <option value="10">10:00</option>
                                                        <option value="11">11:00</option>
                                                        <option value="12">12:00</option>
                                                        <option value="13">13:00</option>
                                                        <option value="14">14:00</option>
                                                        <option value="15">15:00</option>
                                                        <option value="16">16:00</option>
                                                        <option value="17">17:00</option>
                                                        <option value="18">18:00</option>
                                                        <option value="19">19:00</option>
                                                        <option value="20">20:00</option>
                                                        <option value="21">21:00</option>
                                                        <option value="22">22:00</option>
                                                        <option value="23">23:00</option>



                                                    </select>


                                                    <input type="date" class="col-5 ml-1 bg-dark text-white border-0 mb-2 rounded shadow" name="dia" placeholder="<?php echo date("d") ?>/<?php echo date("m") ?>/<?php echo date("Y") ?>" min="<?php echo date("d") ?>/<?php echo date("m") ?>/<?php echo date("Y") ?>" required>

                                                </div>


                                                <input type="text" class="d-none" name=pId value="<?php echo $pId ?>">


                                            </div>
                                            <div class="row ml-1 mb-2">

                                                <button type="submit" class="btn btn-small font-weight-lighter text-dark bg-warning" name="submitRecPl">

                                                    añadir al plan

                                                </button>

                                            </div>


                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                    <?php
                    $resD = selecPlanosDistDia($id);
                    $contD = mysqli_num_rows($resD);

                    for ($i = 0; $i < $contD; $i++) {

                        $filaD = mysqli_fetch_assoc($resD);
                    ?>

                        <div class="row w-100 bg-transparent border border-warning border-top-0 border-left-0 mb-2 border-right-0 shadow">
                            <h4 class="font-weight-light">

                                <?php
                                //CAMBIAR ORDEN DATE
                                $dbDate = $filaD['dia'];
                                $planDate = date("d/m/Y", strtotime($dbDate));

                                if ($planDate != "01/01/1970") {
                                    echo $planDate;
                                }

                                ?>

                                


                            </h4>
                        </div>

                        <?php $resH = selecPlanosProyectoDia($pId, $filaD['dia']);
                        $contH = mysqli_num_rows($resH);

                        for ($j = 0; $j < $contH; $j++) {

                            $filaH = mysqli_fetch_assoc($resH); ?>

                            <div class="row w-100 border border-top-0 border-left-0 border-right-0 mb-2 p-1 rounded shadow" style="background-color: <?php echo $filaH['color'] ?>">

                                <div class="row w-50 border border-white bg-transparent pl-3 text-white rounded  shadow">
                                    <?php echo "" . $filaH['hora'] . " : 00" ?>
                                </div>

                                <button type="button" id="showPl<?php $filaH['pl_id'] ?>" class="row w-100 mt-1 mr-2 pt-0 pb-0 mb-2 pl-1 rounded bg-transparent border border-white shadow" onclick="location.assign('detailPlano.php?id=<?php echo $id ?>&idPl=<?php echo $filaH['pl_id'] ?>&idEsc=<?php echo $filaH['sc_id'] ?>')">
                                    <h6 class="col-1 text-white text-center mt-2 mr-1 mb-0 d-none d-md-block">#<?php echo $filaH['numero'] ?>.<?php echo $filaH['numeropl'] ?></h6>
                                    <p class="col-1 text-white text-center mt-2 mr-1 mb-0 d-block d-md-none"><small>#<?php echo $filaH['numero'] ?>.<?php echo $filaH['numeropl'] ?></small></p>

                                    <!--SE LANZA DIV ESPECIFICACIONES PLANO-->

                                    <h6 class=" col text-white font-weight-lighter d-none d-md-block text-justify mt-2">
                                        <?php echo $filaH['tamaño'] ?> / <?php echo $filaH['angulo'] ?>
                                        <?php echo $filaH['posicion'] ?> / <?php echo $filaH['movimiento'] ?> / Cámara <?php echo $filaH['soporte'] ?>
                                    </h6>


                                    <p class=" col text-white  flex-wrap font-weight-lighter d-block d-md-none text-justify mt-3" style="line-height:0.5em;">
                                        <small><small>
                                                <?php echo $filaH['tamaño'] ?> / <?php echo $filaH['angulo'] ?>
                                                <?php echo $filaH['posicion'] ?> / <?php echo $filaH['movimiento'] ?> / Cámara <?php echo $filaH['soporte'] ?>
                                            </small></small>
                                    </p>




                                </button>

                            </div>
                        <?php } ?>

                    <?php

                    }

                    ?>








                </div>

                <?php include "includes/general/footer.php"; ?>

            </div>






        </div>



        <?php include "includes/general/src.php" ?>
</body>

</html>