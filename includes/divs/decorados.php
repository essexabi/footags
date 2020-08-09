<!--ENCABEZADO SECCIÓN DECORADOS-->
<div class="row mt-4 mb-2 bg-transparent pb-0  shadow">


    <h1 class=" text-dark text-light ml-3 mb-0"><small>Decorados</small></h1>

</div>

<!--BOTÓN AÑADIR DECORADO ABRE MODAL FORM DECORADO Y BODY MODAL FORM DECORADO -->
<div class="row w-100 col-12 align-items-center">


    <!--BOTÓN AÑADIR DECORADO-->
    <div class="w-100">
        <button type="button" class="btn btn-warning btn-sm text-right col-6 col-lg-4 shadow mr-2 mb-2" data-toggle="modal" data-target=<?php echo '"#decForm' . $_SESSION['proyectoId'] . '"' ?>>
            <img src="img/decBlack.png" class="img-fluid mb-1 float-left" alt="" width="30px"> <small>añadir decorado</small>
        </button>
        <!--MODAL FORMULARIO AÑADIR DECORADO-->
        <div class="modal" id=<?php echo '"decForm' . $_SESSION['proyectoId'] . '"' ?> tabindex="-1" role="dialog" aria-labelledby=<?php echo ' "decForm' . $_SESSION['proyectoId'] . 'Label"' ?> aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <!--MODAL HEADER FORMULARIO-->
                    <div class="modal-header bg-white">
                        <h5 class="modal-title" id=<?php echo '"decForm' . $_SESSION['proyectoId'] . 'Label"' ?>><img src="img/decBlack.png" class="img-fluid mb-1 " alt="" width="45px">&nbsp; añade un decorado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class=" btn-white" aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!--MODAL BODY FORMULARIO-->
                    <div class="modal-body container-fluid bg-white">
                        <form action="setRodaje.php?id=<?php echo $_SESSION['proyectoId'] ?>" method="POST">

                            <!--INPUTS LUGAR Y COLOR-->
                            <div class="row w-100">
                                <div class="col-12 w-100">
                                    <!--INPUT LUGAR-->
                                    <div class="form-group">

                                        <input type="text" class="form-control-sm col-8 bg-dark text-white border-0 ml-1" id="lugar" placeholder="lugar" name="lugar" min="1" max="20">
                                    </div>

                                </div>

                                <div class="col-12 w-100">
                                    <!--INPUT COLOR-->
                                    <div class="form-group">
                                        <label class="text-dark d-inline" for="colorSet">&nbsp;elige un color</label>
                                        <input type="color" class="form-control bg-dark text-white border-0 ml-1" id="colorSet" name="colorSet" min="1" max="20">
                                    </div>

                                </div>

                                <!--INPUT CARACTERÍSTICAS-->
                                <div class="col-12 w-100">
                                    <div class="form-group">
                                        <label class="text-dark d-inline" for="caracteristicast">&nbsp;características</label>
                                        <textarea type="text" class="form-control bg-dark text-white border-0 ml-1" id="caracteristicas" name="caracteristicas"></textarea>

                                    </div>
                                </div>

                            </div>



                            <!--SUBMIT FORMULARIO E INPUT OCULTO ID_PROYECTO-->
                            <div class="row border-top-0 float-right">
                                <!--INPUT OCULTO ID_PROYECTO-->
                                <input type="text" class="form-control invisible col-6" id="pId" value=<?php echo ' "' . $_SESSION['proyectoId'] . '"' ?> name="idProyecto">

                                <!--BOTÓN SUBMIT-->
                                <button type="submit" class="btn btn-sm btn-warning border-0 mr-3" name="submitDec">crear decorado</button>
                            </div>

                        </form>

                    </div>



                </div>
            </div>

        </div>
    </div>
    <?php if (isset($_POST["submitDec"])) {
        valCrearDecorado();
    } ?>


    <?php if (isset($_POST["submitEsc"])) {
        valCrearEscena();
    } ?>

</div>


<!--BOTÓN DECORADO ABRE MODAL FORMULARIO EDITAR DECORADO Y  BOTÓN ABRE MODAL FORM ESCENA -->
<div class="row w-100 align-items-center">
    <?php $res = selecDecoradoProyecto($_SESSION['proyectoId']);
    $cont = mysqli_num_rows($res);
    for ($i = 0; $i < $cont; $i++) {

        $fila = mysqli_fetch_assoc($res);
        $decId = $fila['dec_id'];
        $lugar = $fila['lugar'];
        $color = $fila['color'];
        $caracteristicas = $fila['caracteristicas'];


    ?>
        <!--BOTÓN EDITAR DECORADO Y AÑADIR ESCENA-->

        <div class="row col-12 col-md-8 col-lg-5 col-xl-4 rounded  pl-2 pr-0 pb-0 pt-2 ml-2 mr-2 mb-2 shadow" <?php echo "style= 'background-color: " . $color . ";'"; ?>>

            <!--BOTÓN EDITAR DECORADO-->
            <button type="button" class="btn btn-dark btn-sm col-8 text-center text-uppercase mb-1 pt-2 pb-0 w-100" data-toggle="modal" data-target=<?php echo '"#editDec' . $decId . '"' ?> <?php echo "style= 'border-width: 1px; border-style: solid; border-color: white; background-color: " . $color . ";'"; ?>>
                <img src="img/decWhite.png" class="img-fluid mb-1 float-left" alt="" width="30px">
                <p><small><?php echo $lugar ?></small></p>
            </button>

            <div class="col-2"></div>

            <!--BOTÓN AÑADIR ESCENA-->
            <button type="button" class="btn btn-sm btn-transparent border border-light shadow mb-1" data-toggle="modal" data-target=<?php echo '"#escForm' . $decId . '"' ?>>
                <img src="img/escenas.png" class="d-none d-sm-block" width="35px">
                <img src="img/escenas.png" class="d-block d-sm-none" width="30px">
            </button>

            <!-- MODAL ELIMINAR DECORADO Y MODAL EDITAR DECORADO-->
            <div class="btn-group btn-group-sm mb-1 col rounded w-100">

                <!-- MODAL EDITAR DECORADO-->
                <div class="modal" id=<?php echo '"editDec' . $decId . '"' ?> tabindex="-1" role="dialog" aria-labelledby=<?php echo ' "editDec' . $decId . 'Label"' ?> aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content">

                            <!--MODAL HEADER EDITAR DECORADO-->
                            <div class="modal-header bg-white ">
                                <h5 class="modal-title" id=<?php echo '"editDec' . $decId . 'Label"' ?>><img src="img/decBlack.png" class="img-fluid mb-1 " alt="" width="45px">&nbsp; <?php echo $lugar ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class=" btn-white" aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <!--MODAL BODY EDITAR DECORADO Y BOTÓN ELIMINAR DECORADO-->
                            <div class="modal-body container-fluid bg-white">
                                <form action="editarDec.php" method="POST">

                                    <!--INPUTS LUGAR Y COLOR-->
                                    <div class="row w-100">
                                        <div class="col-12 w-100">
                                            <!--INPUT LUGAR-->
                                            <div class="form-group">

                                                <input type="text" class="form-control-sm col-8 bg-dark text-white border-0" id="lugar" value="<?php echo $lugar ?>" name="lugar" min="1" max="20">
                                            </div>

                                        </div>

                                        <div class="col-12 w-100">
                                            <!--INPUT COLOR-->
                                            <div class="form-group">
                                                <label class="text-dark d-inline ml-1" for="colorSet">elige un color</label>
                                                <input type="color" class="form-control bg-dark text-white border-0 ml-1" id="colorSet" name="colorSet" value="<?php echo $color ?>">
                                            </div>

                                        </div>

                                        <!--INPUT CARACTERÍSTICAS-->
                                        <div class="col-12 w-100">
                                            <div class="form-group">

                                                <label class="text-dark d-inline" for="caracteristicas">&nbsp;características</label>
                                                <textarea type="text" class="form-control bg-dark text-white text-justify border-0 ml-1" id="caracteristicas" name="caracteristicas" rows="2"><?php echo $caracteristicas ?></textarea>

                                            </div>
                                        </div>

                                    </div>


                                    <!--SUBMIT FORMULARIO E INPUT OCULTO ID_PROYECTO-->
                                    <div class="row border-top-0 float-right">
                                        <!--INPUT OCULTO DEC_ID-->
                                        <input type="text" class="form-control invisible col-6" id="pId" value=<?php echo ' "' . $decId . '"' ?> name="decId">

                                        <!--BOTÓN ELIMINAR DECORADO-->
                                        <button type="button" class="btn btn-dark mr-1" data-toggle="modal" data-target=<?php echo '"#delDec' . $decId . '"' ?>>
                                            <small><i class="fas fa-trash-alt " style="color:<?php echo $color ?>;"></i></small></a>
                                        </button>

                                        <!--BOTÓN SUBMIT-->
                                        <button type="submit" class="btn btn-sm btn-warning border-0 mr-3" name="submitEditDec">editar decorado</button>



                                        <!-- MODAL ELIMINAR DECORADO-->
                                        <div class="modal" id=<?php echo '"delDec' . $decId . '"' ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Borrar decorado</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body bg-dark text-danger">
                                                        ¿Seguro que quieres borrar este decorado?<br>
                                                        Borrarás todas las escenas y planos asociados.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary bg-danger" onclick="location.assign('borrarDec.php?id=<?php echo $decId ?>&prId=<?php echo $pId ?>')">Borrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>


                    </div>
                </div>


            </div>

            <!--MODAL FORMULARIO AÑADIR ESCENA-->
            <div class="modal" id=<?php echo '"escForm' . $decId . '"' ?> tabindex="-1" role="dialog" aria-labelledby=<?php echo '' . $lugar . '' ?> aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <!--MODAL HEADER FORMULARIO ESCENA-->
                        <div class="modal-header bg-white">
                            <h5 class="modal-title text-dark" id=<?php echo '"escForm' . $decId . 'Label"' ?>>
                                <img src="img/escenas.png" class="img-fluid mb-1 " alt="" width="45px">
                                Crea una escena en el decorado "<?php echo $lugar ?>"
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class=" btn-white" aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!--MODAL BODY FORMULARIO ESCENA-->
                        <div class="modal-body container-fluid bg-white">

                            <!--FORM ESCENA-->
                            <div class="row bg-white ml-2 mr-2 p-auto shadow">
                                <form class=" w-100 " action="setRodaje.php?id=<?php echo $_SESSION['proyectoId'] ?>" method="POST">
                                    <div class="w-100 p-auto">

                                        <!--INPUT NÚMERO ESCENA-->
                                        <div class="form-group d-block mt-2 w-100">

                                            <div class="container w-100">

                                                <input type="number" class="form-control-sm w-100 bg-dark text-white border-0" id="lugar" placeholder="número escena" name="numero" min="1" max="20">
                                            </div>

                                        </div>

                                        <!--RADIO INT-EXT Y DÍA-NOCHE-->
                                        <div class="form-group d-block w-100">
                                            <!--RADIO INT-EXT-->
                                            <div class="container w-100">

                                                <label class="radio-inline " for="ext"><img src="img/exterior.png" class="img-fluid mb-1 ml-2 float-right" alt="" width="45px">

                                                    <input type="radio" id="ext" name="extInt" value="exterior" checked>

                                                </label>

                                                <label class="radio-inline ml-2 p-1" for="int"><img src="img/interior.png" class="img-fluid mb-1 ml-2 float-right" alt="" width="45px">

                                                    <input type="radio" id="int" class="" name="extInt" value="interior">

                                                </label>

                                            </div>
                                            <!--RADIO TIEMPO-->
                                            <div class="container w-100">


                                                <label class="radio-inline pb-2" for="dia"><img src="img/dia.png" class="img-fluid  ml-2 float-right" alt="" width="35px">

                                                    <input type="radio" id="dia" class="" name="tiempo" value="día" checked>

                                                </label>



                                                <label class="radio-inline ml-2 p-1" for="noche"><img src="img/noche.png" class="img-fluid mb-1 ml-2 float-right" alt="" width="38px">

                                                    <input type="radio" id="noche" class="" name="tiempo" value="noche">

                                                </label>


                                            </div>

                                        </div>

                                        <!--INPUT DESCRIPCIÓN-->
                                        <div class="form-group d-block w-100">
                                            <div class="container w-100">
                                                <textarea class="form-control-sm border-0 bg-dark w-100 text-white" rows="5" name="descripcion" placeholder="descripción"></textarea>
                                            </div>
                                        </div>

                                        <!--INPUT OCULTO ID_DECORADO ID_PROYECTO-->
                                        <div class="form-group">
                                            <!--INPUT OCULTO ID_PROYECTO-->
                                            <input type="text" class="form-control invisible col-6" id="pId" value=<?php echo ' "' . $_SESSION['proyectoId'] . '"' ?> name="idProyecto">

                                            <!--INPUT OCULTO ID_DECORADO-->
                                            <input type="text" class="form-control-sm d-none" id="decId" value="<?php echo $decId ?>" name="idDecorado">
                                        </div>

                                        <!--BOTÓN SUBMIT-->
                                        <div class="form-group w-100 ">
                                            <div class="container w-100">
                                                <button type="submit" class="btn-sm btn-warning border-0" name="submitEsc">crear escena</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>



                    </div>

                </div>

            </div>










        </div>
    <?php } ?>


</div>