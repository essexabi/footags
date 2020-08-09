                <!--ENCABEZADO SECCIÓN PERSONAJES-->
                <div class="row mt-4 mb-2 bg-transparent pb-0  shadow">

                    <h1 class=" text-dark text-light ml-3 mb-0"><small>Personajes</small></h1>

                </div>

                <!--BOTÓN AÑADIR PERSONAJE ABRE MODAL FORM PERSONAJE Y BODY MODAL FORM PERSONAJE -->
                <div class="row w-100 col-12 align-items-center">


                    <!--BOTÓN AÑADIR PERSONAJE-->
                    <div class="w-100">
                        <button type="button" class="btn btn-warning btn-sm text-right col-6 col-lg-4 shadow mr-2 mb-2" data-toggle="modal" data-target=<?php echo '"#prsnForm' . $_SESSION['proyectoId'] . '"' ?>>
                            <img src="img/personajeBlack.png" class="img-fluid mb-1 float-left" alt="" width="30px"> <small>añadir personaje</small>
                        </button>
                        <!--MODAL FORMULARIO AÑADIR PERSONAJE-->
                        <div class="modal" id=<?php echo '"prsnForm' . $_SESSION['proyectoId'] . '"' ?> tabindex="-1" role="dialog" aria-labelledby=<?php echo ' "prsnForm' . $_SESSION['proyectoId'] . 'Label"' ?> aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <div class="modal-content">

                                    <!--MODAL HEADER FORMULARIO-->
                                    <div class="modal-header bg-white">
                                        <h5 class="modal-title" id=<?php echo '"prsnForm' . $_SESSION['proyectoId'] . 'Label"' ?>><img src="img/personajeBlack.png" class="img-fluid mb-1 " alt="" width="45px"> Añade un personaje</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class=" btn-light" aria-hidden="true">&times;</span>
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

                                                        <input type="text" class="form-control-sm col-8 bg-dark text-white border-0" id="lugar" placeholder="nombre" name="nombre">
                                                    </div>

                                                   
                                                    <!--INPUT APUNTES-->
                                                    <div class="form-group">
                                                        <textarea type="text" class="form-control bg-dark text-white border-0" id="apuntes" rows="2" placeholder="apuntes" name="apuntes"></textarea>
                                                    </div>
                                                    

                                                </div>

                                                

                                                <div class="col-12 w-100">
                                                        <!--INPUT COLOR-->
                                                    <div class="form-group">
                                                        <label class="text-dark d-inline" for="colorPrsn"><b>elige un color</b></label>
                                                        <input type="color" class="form-control bg-dark text-white border-0 ml-1" id="colorPrsn" name="colorPrsn">
                                                    </div>

                                                </div>

                                            </div>


                                            <!--SUBMIT FORMULARIO E INPUT OCULTO ID_PROYECTO-->
                                            <div class="row border-top-0 float-right">
                                                <!--INPUT OCULTO ID_PROYECTO-->
                                                <input type="text" class="form-control invisible col-6" id="pId" value=<?php echo ' "' . $_SESSION['proyectoId'] . '"' ?> name="idProyecto">

                                                <!--BOTÓN SUBMIT-->
                                                <button type="submit" class="btn btn-sm btn-warning border-0 mr-3" name="submitPrsn">crear personaje</button>
                                            </div>

                                        </form>

                                    </div>



                                </div>
                            </div>

                        </div>
                    </div>
                    <?php if (isset($_POST["submitPrsn"])) {
                        valCrearPersonaje();
                    } ?>
                </div>
                <!--BOTÓN PERSONAJE ABRE MODAL EDITAR Y ELIMINAR PERSONAJE -->
                <div class="row w-100 bg-transparent ml-0">
                    <?php $res = selecPersonajeProyecto($_SESSION['proyectoId']);
                    $cont = mysqli_num_rows($res);
                    for ($i = 0; $i < $cont; $i++) {

                        $fila = mysqli_fetch_assoc($res);
                        $prsnId = $fila['prsn_id'];
                        $nombre = $fila['nombre'];
                        $apuntes = $fila['apuntes'];
                        $colorPrsn = $fila["color_prsn"];


                    ?>
                        <!--BOTON ABRE MODAL EDITAR PERSONAJE-->
                        <div class="">
                            <button type="button" class="btn btn-sm pb-0 mr-2 mb-2 shadow" data-toggle="modal" <?php echo 'data-target="#editPrsn' . $prsnId . '"'; ?> <?php echo "style= 'background-color: " . $colorPrsn . ";'"; ?>>
                                <img src="img/personajeWhite.png" class="img-fluid" width="30px">
                                <p class="text-white text-uppercase mb-0"><small><?php echo $nombre ?></small></p>
                            </button>

                            <!-- MMODAL EDITAR PERSONAJE -->
                            <div class="modal" <?php echo 'id="editPrsn' . $prsnId . '"'; ?> tabindex="-1" role="dialog" aria-labelledby="editar personaje" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="img/personajeBlack.png" class="img-fluid" width="50px">&nbsp; 
                                            <h5 class="modal-title" <?php echo 'id="editPrsn' . $prsnId . 'Label"';?>><?php echo $nombre ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="editarPrsn.php" method="POST">
                                                <!--INPUTS NOMBRE Y APUNTES-->
                                                <div class="row w-100">
                                                    <div class="col-12 w-100">
                                                        <!--INPUT NOMBRE-->
                                                        <div class="form-group">

                                                            <input type="text" class="form-control-sm col-8 bg-dark text-white border-0" id="lugar" value="<?php echo $nombre ?>" name="nombre">
                                                        </div>

                                                    </div>

                                                    <div class="col-12 w-100">
                                                        <!--INPUT APUNTES-->
                                                        <div class="form-group">
                                                            <textarea type="text" class="form-control bg-dark text-secondary border-0" id="apuntes" rows="2" value="<?php echo $apuntes ?>" name="apuntes"><?php echo $apuntes ?></textarea>
                                                        </div>

                                                        <!--INPUT COLOR-->
                                                        <div class="form-group">
                                                            <label class="text-dark d-inline" for="colorPrsn"><b>elige un color</b></label>
                                                            <input type="color" class="form-control bg-dark text-white border-0 ml-1" id="colorPrsn" name="colorPrsn" value="<?php echo $colorPrsn?>">
                                                        </div>

                                                    </div>

                                                </div>

                                                <!--SUBMIT FORMULARIO E INPUT OCULTO ID_PROYECTO-->
                                                <div class="row border-top-0 float-right">
                                                    <!--INPUT OCULTO PRSN_ID-->
                                                    <input type="text" class="form-control invisible col-6" id="prsnId" value=<?php echo ' "' . $prsnId . '"' ?> name="prsnId">

                                                    <!--BOTÓN ELIMINAR PERSONAJE-->
                                                    <button type="button" class="btn btn-dark mr-1" data-toggle="modal" data-target=<?php echo '"#delPrsn' . $prsnId . '"' ?>>
                                                        <small><i class="fas fa-trash-alt "></i></small></a>
                                                    </button>

                                                    <!--BOTÓN SUBMIT-->
                                                    <button type="submit" class="btn btn-sm btn-warning border-0 mr-3" name="submitEditPrsn">editar personaje</button>


                                                    <!-- MODAL ELIMINAR PERSONAJE-->
                                                    <div class="modal" id=<?php echo '"delPrsn' . $prsnId . '"' ?> tabindex="-1" role="dialog" aria-labelledby="eliminar personaje" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id=<?php echo '"delPrsn' . $prsnId . '"' ?>>Borrar personaje</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body bg-dark text-danger">
                                                                    ¿Seguro que quieres borrar a este personaje?<br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary bg-danger" onclick="location.assign('borrarPrsn.php?id=<?php echo $prsnId ?>&prId=<?php echo $pId ?>')">Borrar</button>
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