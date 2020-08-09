<?php
$userId = $_SESSION['logueadoId'];

$res = selecProyectoAdmin($userId);
$cont = mysqli_num_rows($res);
?>
<?php if (isset($_POST['submitEditPr'])) {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $sinopsis = $_POST['sinopsis'];
    $contraseña = $_POST['pass'];
    $pId = $_POST['idProyecto'];


    updatePryct($pId, $titulo, $sinopsis, $contraseña, $genero);
    //header('location: fooAdmin.php?op=proyectos');
} ?>
<div class="row-cols-1 d-md-none mt-2 fixed-top">

    <!--div encabezado "mis proyectos" tamaño - md-->
    <div class="d-block">
        <center><img src="img/publicP.png" class="img-fluid mb-1 " alt="" width="45px"></center>
    </div>
    <div class=" d-block ">
        <h5 class="text-warning text-center"><small>MIS PROYECTOS</small></h5>
    </div>

</div>

<div class="row w-100 d-flex d-md-none" style="margin-top:20%;"></div>

<!--div encabezado "mis proyectos" tamaño - md-->
<div class="row w-100 d-none d-md-flex fixed-top">
    <div class="col  mt-2">
        <h4 class="text-warning float-right"><small>MIS PROYECTOS</small></h4>
    </div>
    <div class="col-4 "><img src="img/publicP.png" class="img-fluid mt-1" alt="" width="80px"></div>
</div>

<?php if ($cont > 0) {
?>

    <div class="row w-100 d-none d-md-flex" style="margin-top:10%;"></div>

    <!--usamos variables de sesión para encontrar proyecto de cada usuario y realizar consulta-->
    <?php
    $nombre = $_SESSION['logueado'];
    $idUsuario = $_SESSION['logueadoId'];
    $res = selecProyectoAdmin($idUsuario);

    //Los recorre y los organizará según la disposición del div en el que se muestran los proyectos
    while ($fila = mysqli_fetch_assoc($res)) {
        $titulo = $fila["titulo"];
        $sinopsis = $fila["sinopsis"];
        $pId = $fila["p_id"];
        $genero = $fila["genero"];
        $guion = $fila['guion'];

    ?>

        <!--div en el que se muestran los proyectos-->
        <div class='container-fluid w-100 bg-transparent border border-warning mt-2 mb-4 rounded shadow pb-2'>

            <!--BADGE GÉNERO-->
            <div class='d-flex flex-row justify-content-end w-100'>
                <span class="badge badge-dark rounded-0 float-right">
                    <small><?php echo $genero ?></small>
                </span>
            </div>

            <!--TÍTULO, SINOPSIS Y BOTONES EDIT DELETE SINOPSIS TAMAÑO COL-->
            <div class="mb-2 mt-2 d-block d-md-none " id="accordion" role="tablist" style="margin-top:10%;">
                <div class="card bg-transparent mx-2">
                    <div <?php echo 'class="card-header bg-dark text-white shadow" role="tab" id="h' . $pId . '"' ?>>
                        <h6 class='text-lowercase font-weight-lighter float-left'>
                            <a <?php echo 'class=" text-white" data-toggle="collapse" href="#c' . $pId . '" aria-expanded="true"  aria-controls ="c'  . $pId . '"' ?>>
                                <img src="img/publicP.png" class='' width="24" alt="">&nbsp;<?php echo $titulo ?>
                            </a>
                        </h6>
                        <div class="btn-group btn-group-sm float-right">

                            <!--BOTÓN ELIMINAR PROYECTO-->
                            <button type="button" class="btn btn-dark text-danger" data-toggle="modal" data-target=<?php echo '"#deletDec' . $pId . '"' ?>>
                                <small><i class="fas fa-trash-alt "></i></small>
                            </button>

                            <!-- MODAL ELIMINAR PROYECTO-->
                            <div class="modal" id=<?php echo '"deletDec' . $pId . '"' ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Borrar proyecto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body bg-dark text-danger">
                                            ¿Seguro que quieres borrar este proyecto?<br>
                                            Borrarás todos los datos asociados al mismo.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary bg-danger" onclick="location.assign('borrarPryct.php?id=<?php echo $pId ?>&gId= <?php echo $guion ?>')">Borrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--LINK A EDITARPRYCT.PHP-->
                            <?php echo '<a class= "btn   rounded  bg-dark text-warning ml-1 mr-1" href="editarPryct.php?id=' . $pId . '")><small>&nbsp;<i class="fas fa-pencil-alt"></i>&nbsp;</small></a>'; ?>


                        </div>
                    </div>
                    <div id<?php echo '="c' . $pId . '" class="collapse bg-dark text-light text-justify " role="tabpanel" aria-labelledby="h' . $pId . '"' ?>>
                        <div class="card-body">
                            <small><?php echo $sinopsis ?></small>
                        </div>
                    </div>
                </div>

            </div>
            <!--TÍTULO, SINOPSIS Y BOTONES EDIT DELETE SINOPSIS TAMAÑO SM+-->
            <div class="mb-2 mt-2 d-none d-md-block" id="accordion" role="tablist">
                <div class="card bg-transparent">
                    <div <?php echo 'class="card-header bg-dark text-white" role="tab" id="h' . $pId . '"' ?>>
                        <h5 class='text-lowercase font-weight-lighter float-left'>
                            <a <?php echo 'class="text-white" data-toggle="collapse" href="#c' . $pId . '" aria-expanded="true"  aria-controls ="c'  . $pId . '"' ?>>
                                <img src="img/publicP.png" class='' width="24" alt="">&nbsp;<?php echo $titulo ?>
                            </a>
                        </h5>
                        <div class="btn-group btn-group-sm float-right">

                           <!--BOTÓN ELIMINAR PROYECTO-->
                           <button type="button" class="btn btn-dark text-danger" data-toggle="modal" data-target=<?php echo '"#delDec' . $pId . '"' ?>>
                                <small><i class="fas fa-trash-alt "></i></small>
                            </button>

                            <!-- MODAL ELIMINAR PROYECTO-->
                            <div class="modal" id=<?php echo '"delDec' . $pId . '"' ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Borrar decorado</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body bg-dark text-danger">
                                            ¿Seguro que quieres borrar este proyecto?<br>
                                            Borrarás todos los datos asociados al mismo.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary bg-danger" onclick="location.assign('borrarPryct.php?id=<?php echo $pId ?>&gId= <?php echo $guion ?>')">Borrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                            <?php echo '<a class= "btn   rounded  bg-dark text-warning ml-1 mr-1" href="editarPryct.php?id=' . $pId . '")><small>&nbsp;<i class="fas fa-pencil-alt"></i>&nbsp;</small></a>'; ?>


                        </div>
                    </div>
                    <div id<?php echo '="c' . $pId . '" class="collapse show bg-dark text-light text-justify " role="tabpanel" aria-labelledby="h' . $pId . '"' ?>>
                        <div class="card-body">
                            <small><?php echo $sinopsis ?></small>
                        </div>
                    </div>
                </div>

            </div>
            <!--BOTONES ESCENA GUION Y PLAN DE RODAJE-->
            <div class='row ml-2 mr-2 mb-2'>
                <div class="btn-group  mb-1 w-100" role="group" aria-label="Basic example" style=" height: 90%;">
                    <button class="btn rounded btn-sm bg-secondary text-light ml-1 shadow" onclick="location.assign('setRodaje.php?id=<?php echo $pId ?>')">
                        <img src="img/setWhite.png" class="img m-auto d-block d-md-none" alt="" width="30px">
                        <img src="img/setWhite.png" class="img m-auto d-none d-md-block" alt="" width="35px">
                    </button>

                    <button class="btn rounded btn-sm bg-secondary text-light ml-1  shadow" data-toggle="modal" data-target="#guionForm<?php echo $pId ?>">
                        <img src="img/guion.png" class="img m-auto  d-block d-md-none" alt="" width="30px">
                        <img src="img/guion.png" class="img m-auto  d-none d-md-block" alt="" width="35px">
                    </button>

                    <button class="btn rounded btn-sm bg-secondary text-light ml-1 shadow" onclick="location.assign('planRodaje.php?id=<?php echo $pId ?>')">
                        <img src="img/planRodaje.png" class="img m-auto  d-block d-md-none" alt="" width="30px">
                        <img src="img/planRodaje.png" class="img m-auto  d-none d-md-block" alt="" width="35px">
                    </button>

                    <!-- MODAL AÑADIR GUION -->
                    <div class="modal" id="guionForm<?php echo $pId ?>" tabindex="-1" role="dialog" aria-labelledby="strPlForm<?php echo $filaPl['pl_id'] ?>Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="strPlForm<?php echo $filaPl['pl_id'] ?>Label">
                                        <img src="img/guion.png" class="img m-auto" alt="" width="45px">
                                        &nbsp;Añadir guión
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="lanzarPdf.php?id=<?php echo $guion ?>" method="POST" enctype="multipart/form-data">

                                        <input type="text" class="d-none" name="PryctId" value="<?php echo $pId ?>">


                                        <div class="custom-file">

                                            <input type="file" class="custom-file-input" id="customFile" name="guion">
                                            <label class="custom-file-label bg-dark text-white" for="customFile">Sube el guión de tu proyecto</label>
                                        </div>

                                        <button type="submit" name="submitStr" class="bg-warning text-dark border-0 rounded shadow mt-2">subir guión</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php }
} else { ?>
    <div class='d d-sm-none  rounded  float-right' style="opacity: 80%; margin-top: 30%; margin-bottom: 0%">
        <img class="img-fluid m-auto" src="img/primerProyectoSm.png" style="width: 400px;">
    </div>
    <div class='d-none d-sm-block  rounded' style="opacity: 80%; margin-top: 10%;">
        <img class="img-fluid m-auto" src="img/primerProyectoMd.png" style="width: 400px;">
    </div>
<?php } ?>