

    
    <!--CONTIENE FORMULARIO DE ACCESO QUE SE OCULTA AL PULSAR BOTÓN "REGÍSTRATE" Y APARECE FORMULARIO DE REGISTRO-->
    <div class="col-12" id="acceso" >
        <center>
            <div class="col-8 col-sm-6 col-md-4 col-lg-4 mb-2 pt-2 pb-4 bg-dark" id="formUser" style="margin-top: 10%;">

                <!--ICONO USUARIO-->
                <center><img src="img/path2.png" class="img img-fluid mt-4 w-25" alt=""></center>
                <center>
                    <p class="col text-warning mt-2 mb-6">INICIA SESIÓN</p>
                </center>

                <!--FORMULARIO DE INICIO DE SESIÓN-->
                <form role="form" action="home.php?op=iniciar sesión" method="POST">
                    <!--CAMPO USUARIO-->
                    <div class="form-group text-warning">
                        <label for="nombre">usuario</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>



                    <!--CAMPO CONTRASEÑA-->
                    <div class="form-group text-warning">
                        <label for="pwd">contraseña</label>
                        <input type="password" class="form-control" name="pass" id="pwd">
                    </div>




                   
                    <!--BOTÓN ACCEDER FOOTAGS-->
                    <center><button name="submit" type="submit" class="btn btn-default border-warning text-warning">
                          Entra a footags 
                        </button></center>
                </form>

                <center>
                    <p class="col text-warning">o</p>
                </center>

                <!--BOTÓN REGÍSTRATE -> DIV FORMULARIO REGISTRO-->
                <center><button type="button" class="btn btn-default border-warning text-warning" id="regButton" onclick="location='home.php?op=iniciar sesión'">
                        Regístrate
                    </button></center>
                <?php

                if (isset($_POST["submit"])) {

                    valLogin();
                }
                ?>
            </div>
        </center>
    </div>
  