<!--DIV CONTIENE ICONO PROYECTOS COMUNIDAD-->
<div class="row-cols-1 d-md-none mt-2 fixed-top">

    
    <div class="d-block"><center><img src="img/comunidad.png" class="img-fluid mb-1 " alt="" width="45px"></center></div>
    <div class=" d-block ">
        <h5 class="text-warning text-center"><small>COMUNIDAD</small></h5>
    </div>
    
</div>

<div class="row w-100 d-none d-md-flex fixed-top">
    <div class="col  mt-2">
        <h4 class="text-warning float-right"><small>COMUNIDAD</small></h4>
    </div>
    <div class="col-4 "><img src="img/comunidad.png" class="img-fluid mt-1" alt="" width="80px"></div>
</div>
<div class="row w-100 d-none d-sm-flex" style="margin-top:10%;"></div>
<div class="row h-10 d-block d-md-none" style="margin-top:20%;"></div>

<?php

$res = selecProyectoPlusUsuario();
//Los recorre y los organiza seg´n la estructura de article
while ($fila = mysqli_fetch_assoc($res)) {
    $titulo = $fila["titulo"];
    $sinopsis = $fila["sinopsis"];
    $genero = $fila["genero"];
    $nombre = $fila["nombre"];
    $contraseña = $fila["contraseña_pr"];
    $pId = $fila["p_id"];
    $guion=$fila['guion'];




?>
    <!--DIV CONTIENE PROYECTOS-->
    <div class='container-fluid w-100 bg-transparent border border-warning shadow mb-4 rounded'">
    

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
                    <h5 class='col w-100  text-lowercase font-weight-lighter'>
                        <a  class="text-white " data-toggle="collapse" href=<?php print '"#c' . $pId . '" aria-expanded="true"  aria-controls ="c'  . $pId . '"' ?>>
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
                    <h5 class='col w-100 text-center  text-lowercase font-weight-lighter'>
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
    
    
    if (isset($_POST["submit".$pId.""]) && ($_POST["pass"] == $contraseña)) {

    
   
        
    ?>
        <div class="row ml-2 mr-3 ">
            <a type=button class="btn rounded col btn-sm mb-1 bg-secondary text-light ml-1 shadow"  href="descargarPdf.php?pdf=<?php echo $guion ?>">
                <img src="img/guion.png" class="img m-auto  d-block d-md-none" alt="" width="30px">
                <img src="img/guion.png" class="img m-auto  d-none d-md-block" alt="" width="35px">
            </a>
            <button class="btn rounded col btn-sm mb-1 bg-secondary text-light ml-1 shadow" onclick="location.assign('planRodajePublic.php?id=<?php echo $pId ?>')">
                <img src="img/planRodaje.png" class="img m-auto  d-block d-md-none" alt="" width="30px">
                <img src="img/planRodaje.png" class="img m-auto  d-none d-md-block" alt="" width="35px">
            </button>
        </div>
     <?php }else{ ?>

        <div class="w-100">
            <form class="form-inline" action="fooAdmin.php?op=comunidad" method="POST">
                <input class="col-9 form-control form-control-sm h-50 mr-3 ml-1" type="password" placeholder="contraseña" name="pass">
                <button name="submit<?php echo $pId?>" class="col-2 btn btn-sm text-light bg-secondary" type="submit"><small>activar</small></button>
            </form> &nbsp;
        </div>
   <?php } ?>
    </div>

<?php
}
?>