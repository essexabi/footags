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
$guion= $fila['guion'];
$pId = $fila['p_id'];
$_SESSION['proyectoId'] = $pId;


?>


<body class=" bg-light">

    <?php include "includes/nav/headerPryctAdmin.php" ?>

    <div class="container-fluid align-items-stretch w-100">

        <div class="row">

            <?php include "includes/nav/asidePryctAdmin.php"; ?>

            <div class="col-12 col-md-10 col-lg-10 w-100">
                <div class="row-cols-1 d mt-2 fixed-top">


                    <div class="d-block d-md-none">
                        <center><img src="img/setWhite.png" class="img-fluid mb-1 " alt="" width="45px"></center>
                    </div>
                    <div class=" d-block d-md-none">
                        <h5 class="text-white text-center"><small>SET DE RODAJE</small></h5>
                    </div>

                    <div class="row w-100 d-none d-md-flex fixed-top">
                        <div class="col  mt-2">
                            <h4 class="text-white float-right"><small>SET DE RODAJE</small></h4>
                        </div>
                        <div class="col-4 "><img src="img/setWhite.png" class="img-fluid mt-1" alt="" width="80px"></div>
                    </div>

                </div>

                <!--TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS----TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS----TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS----TÍTULO PROYECTO - ENCABEZADO - BOTONES - FORMULARIOS - VISTAS-->
                <div class="col-12">

                    <!--TÍTULO PROYECTO COL-->
                    <div class=" d-block  d-md-none bg-warning  shadow" style="margin-top: 20%;">
                        <div class='d-flex flex-row justify-content-end w-100'>

                            <span class="badge badge-dark rounded-0 float-right">

                                <small><?php echo $genero ?></small>

                            </span>

                        </div>

                        <h1 class="font-weight-lighter text-dark mb-0">
                            <?php echo $titulo ?>
                        </h1>


                    </div>

                    <!--TÍTULO PROYECTO MD-XL-->
                    <div class=" d-none  d-md-block bg-warning shadow" style="margin-top: 10%;">
                        <!--ETIQUETA RECIBE GÉNERO-->
                        <div class='d-flex flex-row justify-content-end w-100'>

                            <span class="badge badge-dark rounded-0 float-right">

                                <small><?php echo $genero ?></small>

                            </span>

                        </div>

                        <!--RECIBE TÍTULO-->
                        <h4 class="display-4 text-dark mb-0">
                            <?php echo $titulo ?>
                        </h4>

                    </div>
                    <a type=button class="btn-sm bg-dark text-white font-weight-lighter mt-2" href="descargarPdf.php?pdf=<?php echo $guion ?>">Descargar guión</a>
                    <!--DIV SECCIÓN PERSONAJES-->
                    <?php include "includes/divs/personajes.php"; ?>
                    <!--DIV SECCIÓN ATREZZO-->
                    <?php include "includes/divs/atrezzo.php"; ?>

                    <!--DIV SECCIÓN DECORADOS-->
                    <?php include "includes/divs/decorados.php"; ?>
                    
                    
                    <?php include "includes/general/footer.php"; ?>
                </div>
                
            </div>

            

        </div>
    </div>
    <?php include "includes/general/src.php" ?>
</body>

</html>