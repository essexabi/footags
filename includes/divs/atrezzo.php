                <!--ENCABEZADO SECCIÓN ATREZZO-->
                <div class="row mt-4 mb-2 bg-transparent pb-0  shadow">

                    <h1 class=" text-dark text-light ml-3 mb-0"><small>Atrezzo</small></h1>

                </div>

                <!--BOTÓN AÑADIR ATREZZO ABRE MODAL FORM ATREZZO Y BODY MODAL FORM ATREZZO -->
                <div class="row w-100 col-12 align-items-center">


                    <!--BOTÓN AÑADIR ATREZZO-->
                    <div class="w-100">
                        <button type="button" class="btn btn-warning btn-sm text-right col-6 col-lg-4 shadow mr-2 mb-2" data-toggle="modal" data-target=<?php echo '"#atForm' . $_SESSION['proyectoId'] . '"' ?>>
                            <img src="img/atBlack.png" class="img-fluid mb-1 float-left" alt="" width="32px"> <small>añadir objeto</small>
                        </button>
                        <!--MODAL FORMULARIO AÑADIR ATREZZO-->
                        <div class="modal" id=<?php echo '"atForm' . $_SESSION['proyectoId'] . '"' ?> tabindex="-1" role="dialog" aria-labelledby=<?php echo ' "atForm' . $_SESSION['proyectoId'] . 'Label"' ?> aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <div class="modal-content">

                                    <!--MODAL HEADER FORMULARIO-->
                                    <div class="modal-header bg-white border-bottom-0">
                                        <h5 class="modal-title" id=<?php echo '"atForm' . $_SESSION['proyectoId'] . 'Label"' ?>><img src="img/atBlack.png" class="img-fluid mb-1 " alt="" width="45px"> Añade un objeto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class=" btn-white" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <!--MODAL BODY FORMULARIO-->
                                    <div class="modal-body container-fluid bg-white">
                                        <form action="setRodaje.php?id=<?php echo $_SESSION['proyectoId'] ?>" method="POST">

                                            <!--INPUTS NOMBRE Y APUNTES-->
                                            <div class="row w-100">
                                                <div class="col-12 w-100">
                                                    <!--INPUT NOMBRE-->
                                                    <div class="form-group">

                                                        <input type="text" class="form-control-sm col-8 bg-dark text-white border-0" id="objeto" placeholder="objeto" name="objeto">
                                                    </div>




                                                </div>



                                                <div class="col-12 w-100">
                                                    <!--INPUT COLOR-->
                                                    <div class="form-group">
                                                        <label class="text-dark d-inline" for="colorAt"><b>elige un color</b></label>
                                                        <input type="color" class="form-control bg-dark text-white border-0 ml-1" id="colorAt" name="colorAt">
                                                    </div>

                                                </div>

                                            </div>


                                            <!--SUBMIT FORMULARIO E INPUT OCULTO ID_PROYECTO-->
                                            <div class="row border-top-0 float-right">
                                                <!--INPUT OCULTO ID_PROYECTO-->
                                                <input type="text" class="form-control invisible col-6" id="pId" value=<?php echo ' "' . $_SESSION['proyectoId'] . '"' ?> name="idProyecto">

                                                <!--BOTÓN SUBMIT-->
                                                <button type="submit" class="btn btn-sm btn-warning border-0 mr-3" name="submitAt">crear objeto</button>
                                            </div>

                                        </form>

                                    </div>



                                </div>
                            </div>

                        </div>
                    </div>
                    <?php if (isset($_POST["submitAt"])) {
                        valCrearAtrezzo();
                    } ?>
                </div>
                <!--BOTÓN ATREZZO ABRE MODAL EDITAR Y ELIMINAR ATREZZO -->
                <div class="row w-100 bg-transparent ml-0">
                    <?php $res = selecAtrezzoProyecto($_SESSION['proyectoId']);
                    $cont = mysqli_num_rows($res);
                    for ($i = 0; $i < $cont; $i++) {

                        $fila = mysqli_fetch_assoc($res);
                        $atId = $fila['at_id'];
                        $objeto = $fila['objeto'];
                        $colorAt = $fila['color_at'];



                    ?>
                        <!--BOTON ABRE MODAL EDITAR ATREZZO-->
                        <div class="">
                            <button type="button" class="btn btn-sm pb-0 mr-2 mt-1" data-toggle="modal" <?php echo 'data-target="#editAt' . $atId . '"'; ?> <?php echo "style= 'background-color: " . $colorAt . ";'"; ?>>
                                <p class="text-white text-uppercase mb-0"><small><?php echo $objeto ?></small></p>
                            </button>

                            <!-- Modal -->
                            <div class="modal" <?php echo 'id="editAt' . $atId . '"'; ?> tabindex="-1" role="dialog" aria-labelledby="editar personaje" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="img/atBlack.png" class="img-fluid" width="50px">
                                            <h5 class="modal-title" <?php echo 'id="editAt' . $atId . 'Label"'; ?>>&nbsp; <?php echo $objeto ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="editarAtrzz.php" method="POST">
                                                <!--INPUTS NOMBRE Y APUNTES-->
                                                <div class="row w-100">
                                                    <div class="col-12 w-100">
                                                        <!--INPUT NOMBRE-->
                                                        <div class="form-group">

                                                            <input type="text" class="form-control-sm col-8 bg-dark text-white border-0" id="lugar" value="<?php echo $objeto ?>" name="objeto">
                                                        </div>

                                                    </div>

                                                    <div class="col-12 w-100">
                                    

                                                        <!--INPUT COLOR-->
                                                        <div class="form-group">
                                                            <label class="text-dark d-inline" for="colorSet"><b>elige un color</b></label>
                                                            <input type="color" class="form-control bg-dark text-white border-0 ml-1" id="colorAt" name="colorAt" value="<?php echo $colorAt?>">
                                                        </div>

                                                    </div>

                                                </div>

                                                <!--SUBMIT FORMULARIO E INPUT OCULTO ID_ATREZZO-->
                                                <div class="row border-top-0 float-right">
                                                    <!--INPUT OCULTO PRSN_ID-->
                                                    <input type="text" class="form-control invisible col-6" id="atId" value=<?php echo ' "' . $atId . '"' ?> name="atId">

                                                    <!--BOTÓN ELIMINAR ATREZZO-->
                                                    <button type="button" class="btn btn-dark mr-1" data-toggle="modal" data-target=<?php echo '"#delAt' . $atId . '"' ?>>
                                                        <small><i class="fas fa-trash-alt "></i></small></a>
                                                    </button>

                                                    <!--BOTÓN SUBMIT-->
                                                    <button type="submit" class="btn btn-sm btn-warning border-0 mr-3" name="submitEditAt">
                                                        editar atrezzo
                                                    </button>


                                                    <!-- MODAL ELIMINAR ATREZZO-->
                                                    <div class="modal" id=<?php echo '"delAt' . $atId . '"' ?> tabindex="-1" role="dialog" aria-labelledby="eliminar objeto" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id=<?php echo '"delAt' . $atId . 'Label"' ?>>Borrar objeto</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body bg-dark text-danger">
                                                                    ¿Seguro que quieres borrar este objeto?<br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary bg-danger" onclick="location.assign('borrarAtrzz.php?id=<?php echo $atId ?>&prId=<?php echo $pId ?>')">Borrar</button>
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


                    <?php
                    }
                    ?>
                </div>