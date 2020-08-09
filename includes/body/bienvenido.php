<?php
$nombre = "no login";
if ($_SESSION['logueado'] == $nombre){
    echo '<div class="col w-100 d-block shadow" style= "margin-top: 10%;">
    <div class="col w-100  ">
        <center><img class="img-responsive mt-4" src="img/nologueado.png"></div></center>
    </div>
    <div class="col w-100 bg-warning shadow mt-4 rounded" style="opacity: 80%;">
        <a href="home.php?op=iniciar%20sesión" class= "col w-100 dark" ><h2 class="text-dark text-center ">inicia sesión</h2></a>
        <h2 class="text-dark text-center">o</h2>
        <a href="home.php?op=registrarse" class= "col w-100 dark" ><h2 class="text-dark text-center ">regístrate</h2></a>
    </div>';
}
else{
    echo '<div class="col w-100 d-block shadow" style= "margin-top: 10%;">
    <div class="col w-100  ">
        <center><img class="img-responsive mt-4" src="img/hola.png"></div></center>
    <div class="col w-100">
        <h2 class="text-center text-dark text-monospace w-100">'.$_SESSION["logueado"].'</h2>
    </div>
   
</div>';


} ?>