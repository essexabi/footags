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


<body  class="body_admin"">

    <?php include "includes/nav/headerhome.php" ?>

    <div class="container-fluid align-items-stretch w-100">

        <div class="row d-flex">




            <!--ICONO ESCENAS-->



            <div class="col-12 d-block d-md-none" style="margin-top: 20%;">

                
                <div class="row d-block">
                    <center><img src="img/planRodaje.png" class="img-fluid mb-1 " alt="" width="45px"></center>
                </div>
                <div class="row d-block ">
                    <h5 class=" text-success text-center"><small>PLAN de rodaje </small></h5>
                </div>

            </div>

            <div class="row w-100 d-none d-md-block" style="margin-top: 10%">

                <h2 class="col display-4  text-info text-center "><small>PLAN DE RODAJE</small><img src="img/planRodaje.png" class="img-fluid  ml-3" alt="" width="120px"></h2>
                


            </div>


            <!--TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS----TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS----TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS----TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS-->
            <div class="col-12 col-sm-10  ml-md-5 w-100">

                <!--TÍTULO PROYECTO COL-->
                <div class=" d-block  d-md-none bg-warning  shadow" style="margin-top: 5%;">
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
                <div class=" d-none  d-md-block ml-md-0 bg-warning  shadow" style="margin-top: 5%;">
                    <!--ETIQUETA RECIBE GÉNERO-->
                    <div class='d-flex flex-row justify-content-end w-100'>

                        <span class="badge badge-dark rounded-0 float-right">

                            <small><?php echo $genero ?></small>

                        </span>

                    </div>

                    <!--RECIBE TÍTULO-->
                    <h1 class="font-weight-lighter display-4 text-justify ml-2 mb-2">

                        <?php echo $titulo ?>

                    </h1>

                </div>


                <div class="container-fluid col-12 ml-2 ml-sm-5 ml-md-4 w-100 " style="margin-top: 5%;">



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
                                if ($planDate!="01/01/1970"){ 
                                echo $planDate;}

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

                                <button type="button" id="showPl<?php $filaH['pl_id'] ?>" class="row w-100 mt-1 mr-2 pt-0 pb-0 mb-2 pl-1 rounded bg-transparent border border-white shadow" onclick="location.assign('detailPlanoPublic.php?id=<?php echo $id ?>&idPl=<?php echo $filaH['pl_id'] ?>&idEsc=<?php echo $filaH['sc_id'] ?>')">
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