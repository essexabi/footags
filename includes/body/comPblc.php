<div class="row-cols-2 d-none d-md-flex"  style="margin-top: 10%;">
    <div class=" mt-2 ml-4">
        <h3 class="text-monospace text-left float-right mr-4">Comunidad</h3>
    </div>
    <div class=" "><img src="img/comunidad.png" class="img-fluid mt-1 float-left" alt="" width="80px"></div>
</div>
<?php

$res = selecProyecto();
//Los recorre y los organiza seg´n la estructura de article
while ($fila = mysqli_fetch_assoc($res)) {
    $titulo = $fila["titulo"];
    $sinopsis = $fila["sinopsis"];
    $genero = $fila["genero"];
    $nombre = $fila["nombre"];
    $contraseña = $fila["contraseña_pr"];
    $pId = $fila["p_id"];
?>
    
    <div class='col-md-8 container-fluid bg-warning shadow mt-5 mb-4' style = "opacity: 80%;">
    

        <div class='d-flex flex-row justify-content-end w-100'>
            <span class="badge badge-dark rounded-0 float-right">
                <small><?php echo $genero ?></small>
            </span>

            <span class="badge badge-dark rounded-0 float-right ml-1">
                <small><?php echo $nombre ?><img src="img/path2.png" class="img-fluid ml-1 mb-1" alt="userfoo" width="10px"></small>
            </span>
        </div>

        <div class="mb-2 mt-2 d-block d-sm-none" id="accordion" role="tablist">
            <div class="card bg-transparent">
                <div <?php print 'class="card-header bg-dark text-white" role="tab" id="h' . $pId . '"' ?>>
                    <h5 class='col w-100  text-lowercase'>
                        <a <?php print 'class="text-white" data-toggle="collapse" href="#c' . $pId . '" aria-expanded="true"  aria-controls ="c'  . $pId . '"' ?>>
                            <img src="img/comunidad.png" class='' width="24" alt="">&nbsp;<?php echo $titulo ?>
                        </a>
                    </h5>
                </div>
                <div id<?php print '="c' . $pId . '" class="collapse bg-dark text-light text-justify " role="tabpanel" aria-labelledby="h' . $pId . '"' ?>>
                    <div class="card-body">
                        <small><?php echo $sinopsis ?></small>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="mb-2 mt-2 d-none d-sm-block" id="accordion" role="tablist">
            <div class="card bg-transparent">
                <div <?php print 'class="card-header bg-dark text-white" role="tab" id="h' . $pId . '"' ?>>
                    <h5 class='col w-100 text-center  text-lowercase'>
                        <a <?php print 'class="text-white" data-toggle="collapse" href="#c' . $pId . '" aria-expanded="true"  aria-controls ="c'  . $pId . '"' ?>>
                            <img src="img/comunidad.png" class='' width="24" alt="">&nbsp;<?php echo $titulo ?>
                        </a>
                    </h5>
                </div>
                <div id<?php print '="c' . $pId . '" class="collapse show bg-dark text-light text-justify " role="tabpanel" aria-labelledby="h' . $pId . '"' ?>>
                    <div class="card-body">
                        <small><?php echo $sinopsis ?></small>
                    </div>
                </div>
            </div>
            
        </div>

    <?php 
    
    
    if (isset($_POST["submit"]) && ($_POST["pass"] == $contraseña)) {

    
   
        
        echo '<div class="row-w-100 mb-1">
                <!--<input class="col form-control form-control-sm m-auto w-100" type="text" placeholder=".form-control-sm">-->
            <div class="btn-group btn-group-sm  mb-1 w-100" role="group" aria-label="Basic example" style= " height: 90%;">
                <button type="button" class="btn rounded bg-secondary text-light ml-1"><small><b>&nbsp;&nbsp;escenas&nbsp;&nbsp;</b></small></button>
                    &nbsp;&nbsp;<button type="button" class="btn rounded bg-secondary text-light ml-1 mr-1"><small><b>&nbsp;&nbsp;&nbsp;&nbsp;guión&nbsp;&nbsp;&nbsp;&nbsp;</b></small></button>&nbsp;&nbsp;
                <button type="button" class="btn rounded bg-secondary text-light mr-1"><small><b>plan de rodaje</b></small></button>
            </div>
        </div>';
     }else{

        echo '<div class=="w-100">
            <form class="form-inline" action="home.php?op=comunidad" method="POST">
                <input class="col-9 form-control form-control-sm h-50 mr-3 ml-1" type="text" placeholder="contraseña" name="pass">
                <button name="submit" class="col-2 btn btn-sm text-light bg-secondary" type="submit"><small>activar</small></button>
            </form> &nbsp;
        </div>';
    } ?>
    </div>

<?php
}
?>