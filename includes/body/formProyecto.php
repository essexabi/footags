<div class="row-cols-1 d-md-none mt-2 fixed-top">

    
    <div class="d-block"><center><img src="img/comunidad.png" class="img-fluid mb-1 " alt="" width="45px"></center></div>
    <div class=" d-block ">
        <h5 class="text-warning text-center"><small>CREAR PROYECTO</small></h5>
    </div>
    
</div>

<div class="row w-100 d-none d-md-flex fixed-top">
    <div class="col  mt-2">
        <h4 class="text-warning float-right"><small>CREAR PROYECTO</small></h4>
    </div>
    <div class="col-4 "><img src="img/comunidad.png" class="img-fluid mt-1" alt="" width="80px"></div>
</div>
<div class="row w-100 d-none d-sm-flex" style="margin-top:10%;"></div>
<div class="row h-10 d-block d-md-none" style="margin-top:15%;"></div>

<div class="col bg-dark shadow" id='navU' ">

    <!--FORMULARIO-->
    <form role="form" class="text-mono" action="lanzarPryct.php" method="POST">
        <!--TÍTULO-->
        <div class="form-group text-warning">
            <label class="mt-2" for="nombre">título</label>
            <input type="text" class="form-control" name="titulo" id="titulo">
        </div>
        <div class="form-group text-warning">

            <select class="custom-select text-warning bg-dark" name="genero">
                <option selected> elige un género </option>
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
            <textarea class="form-control" rows="6" name="sinopsis"></textarea>
        </div>



        <!--CONTRASEÑA-->
        <div class="form-group text-warning">
            <label for="pwd">contraseña</label>
            <input type="password" class="form-control" name="pass" id="pwd">
        </div>

        <!--CONFIRMA CONTRASEÑA-->
        <div class="form-group text-warning">
            <label for="pwd">confirma contraseña</label>
            <input type="password" class="form-control" name="passConf" id="confPwd">
        </div>


        <div class="form-group text-warning invisible hidden">
            <label class="mt-2" for="nombre">idUsuario</label>
            <input type="text" class="form-control" name="idUsuario" id="idU" value="<?php
            echo $_SESSION["logueadoId"] ?>">
        </div>

       
        <!--BOTÓN DE REGISTRO, AL SER PULSADO LANZA FUNCIÓN "valReg"-->
        <center><button name="submitPry" class="btn btn-default text-warning border-warning mt-2 mb-4 pb-2" type="submit" id="creaPryct">
                    Añade un nuevo proyecto
                </button>
        </center>




    </form>
    
</div>