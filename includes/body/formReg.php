



    <!--DIV FORMULARIO DE REGISTRO -->
    <div class="col-12" id="registro" >
        <center>
            <div class="col-6 col-sm-6 col-md-4 col-lg-4 mb-2 pt-2 pb-4 bg-dark" id="formUser" style="margin-top: 10%;">

                <!--ICONO USUARIO-->
                <center><img src="img/path2.png" class="img img-fluid mt-4 w-25" alt=""></center>
                <center>
                    <p class="col text-warning mt-2 mb-6">REGÍSTRATE</p>
                </center>

                <!--FORMULARIO DE REGISTRO-->
                <form role="form" action="home.php?op=registrarse" method="POST">
                    <!--NOMBRE-->
                    <div class="form-group text-warning">
                        <label for="nombre">nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>

                    <!--'testName' comprueba que el nombre introducido no está en la bd-->
                    
                    <?php 
                    if (isset($_POST["submit"])) {
                        $name = testName();
                    
                        if (isset($_POST["submit"]) && $name == 1) {
                            echo "<p class='text-danger font-weight-bold'>Un usuario ya tiene ese nombre.</p>";
                        }
                    }
                    ?>
                    <!--EMAIL-->
                    <div class="form-group text-warning">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>

                    <!--'testMail' comprueba que el email introducido no está en la bd-->
                    <?php 
                    if (isset($_POST["submit"])) {
                        $mail = testMail();
                    
                        if (isset($_POST["submit"]) && $mail == 1) {
                            echo "<p class='text-danger font-weight-bold'>Un usuario ya tiene ese email.</p>";
                        }
                    }
                    ?>

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

                    <?php

                    if (isset($_POST["submit"])) {

                        valReg();
                    }
                    ?>


                    <!--BOTÓN DE REGISTRO, AL SER PULSADO LANZA FUNCIÓN "valReg"-->
                    <center><button name="submit" class="btn btn-default text-warning border-warning mt-2 mb-2" type="submit">
                            Regístrate en footags
                        </button></center>

                </form>

            </div>
        </center>
    </div>
   