<?php session_start();



?> 
<!DOCTYPE html>
<html lang="en">
<?php include "includes/general/head.php"; ?>

<body>
<?php include "includes/nav/headerAdmin.php" ?>

    <div class="row-cols-1 d-md-none mt-2 fixed-top">


        <div class="d-block">
            <center><img src="img/mas.png" class="img-fluid mb-1 " alt="" width="45px"></center>
        </div>
        <div class=" d-block ">
            <h5 class="text-white text-center"><small>EDITAR PROYECTO</small></h5>
        </div>

    </div>
    <div class="row w-100 d-flex d-md-none" style="margin-top:10%;"></div>

    <div class="row w-100 d-none d-md-flex fixed-top">
        <div class="col  mt-2">
            <h4 class="text-white float-right"><small>EDITAR PROYECTO</small></h4>
        </div>
        <div class="col-4 "><img src="img/mas.png" class="img-fluid mt-1" alt="" width="80px"></div>
    </div>
    
    <div class="row">
    <?php include "includes/nav/asideAdmin.php" ?>
        <div class="col"></div>
        <div class="col-8  bg-dark shadow" id='navU' style="margin-top:15%;">
            <?php

            $pId= $_GET['id'];
            $res= selecProyecto($pId);
            $fila = mysqli_fetch_assoc($res);

            $titulo = $fila["titulo"];
            $sinopsis = $fila["sinopsis"];
            $genero = $fila["genero"];
            $contraseña = $fila["contraseña_pr"];

            

            
            ?>
            <!--FORMULARIO-->
            <form role=" form" class="text-mono" action="fooAdmin.php?op=proyectos" method="POST">
                <!--TÍTULO-->
                <div class="form-group text-warning">
                    <label class="mt-2" for="nombre">título</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo ?>">
                </div>
                <div class="form-group text-warning">

                    <!--GÉNERO-->
                    <select class="custom-select text-warning bg-dark" name="genero" >
                        <option selected> <?php echo $genero ?></option>
                        <option value="comedia">comedia</option>
                        <option value="drama">drama</option>
                        <option value="ciencia-ficción">ciencia-ficción</option>
                        <option value="terror">terror</option>
                        <option value="fantasía">fantasía</option>
                        <option value="thriller">thriller</option>
                        <option value="documental">documental</option>
                    </select>
                </div>


                <!--SINOPSIS-->
                <div class="form-group text-warning">
                    <label for="sinopsis">sinopsis</label>
                    <textarea class="form-control" rows="4" name="sinopsis"><?php echo $sinopsis?></textarea>
                </div>



                <!--CONTRASEÑA-->
                <div class="form-group text-warning">
                    <label for="pwd">contraseña</label>
                    <input  class="form-control" name="pass" id="pwd" value="<?php echo $contraseña?>">
                </div>

                <div class="form-group text-warning ">
            <label class="mt-2" for="nombre">idProyecto</label>
            <input type="text" class="form-control" name="idProyecto" id="idU" value="<?php
            echo $_GET["id"] ?>">
        </div>

                <!--BOTÓN DE REGISTRO, AL SER PULSADO LANZA FUNCIÓN "updatePryct"-->
                <center><button name="submitEditPr" class="btn btn-default text-warning border-warning mt-2 mb-4 pb-2" type="submit" id="editPryct">
                        editar
                    </button>
                </center>




            </form>

        </div>
        <div class="col"></div>
    </div>
    <?php include "includes/general/footer.php"; ?>
    <?php include "includes/general/src.php"; ?>
</body>

</html>