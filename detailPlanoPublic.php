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

<body  class="body_admin">

    <?php include "includes/nav/headerhome.php" ?>
    <div class="container-fluid align-items-stretch w-100">

        <div class="row d-flex">




            <!--DIV CONTIENE ICONO PROYECTOS COMUNIDAD-->
            <div class="row  d-block d-md-none" style="margin-top:20%;"></div>
            <div class="col-12 d-block d-md-none" style="margin-top: 20%;">

                
                <div class="row d-block">
                    <center><img src="img/planos.png" class="img-fluid mb-1 " alt="" width="45px"></center>
                </div>
                <div class="row d-block ">
                    <h5 class=" text-success text-center"><small>PLANO # <?php echo $filaEscNum['numero'] ?> . <?php echo $filaPl['numeropl'] ?> </small></h5>
                </div>

            </div>
            <div class="row w-100 d-none d-md-flex" style="margin-top:10%;"></div>
            <div class="row w-100 d-none d-md-flex ">
                <div class="col  mt-2">
                    <h4 class=" display-4 text-success text-center"><small>PLANO # <?php echo $filaEscNum['numero'] ?> . <?php echo $filaPl['numeropl'] ?> </small><img src="img/planos.png" class="img-fluid mt-1" alt="" width="80px"></h4>
                </div>
                
            </div>
            <div class="row w-100 d-none d-sm-flex" style="margin-top:5%;"></div>
            <div class="row h-10 d-block d-md-none" style="margin-top: 10%;"></div>
            <div class="col-12 w-100">
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