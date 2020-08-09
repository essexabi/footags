<?php
session_start();
$noLog = "no login";
if (isset ($_SESSION['logueado'])&& ($_SESSION['logueado'] == TRUE)){ ?>
<!DOCTYPE html>
<html lang="es">
<?php include "includes/general/head.php";?>
<body class=" bg-light">
        
    <?php include "includes/nav/headerAdmin.php" ?>
    <div class="container-fluid align-items-stretch w-100"  >
        
        <div class="row"'>
            
                <?php include "includes/nav/asideAdmin.php" ?>
            
            <div class="col-12 col-md-8 col-md-10 col-lg-8 w-100">
                <?php if (isset($_GET['op'])) {
                    switch ($_GET['op']) {
                        case 'crear':
                            if ($_SESSION['logueado'] == $nombre){
                                echo $userId;
                                include "includes/body/bienvenido.php";
                            } elseif($_SESSION['logueadoId'] == TRUE) {
                            include "includes/body/formProyecto.php";}
                            break;
                        case 'proyectos':
                            if ($_SESSION['logueado'] == $nombre){
                                include "includes/body/bienvenido.php";
                            } elseif($_SESSION['logueadoId'] == TRUE) {
                            include "includes/body/proyectosUser.php";}
                            break;
                        case 'comunidad':
                            include "includes/body/proyectosComunidad.php";
                            break;

                        case 'salir':
                            
                            break;

                    }
                } else {
                   include "includes/body/bienvenido.php";
                }
                ?>
               <?php include "includes/general/footer.php";?> 
            </div>
           
            
        </div>
        
    </div>
   
    <?php include "includes/general/src.php" ?>
</body>
<?php }else{
    
    $_SESSION["logueado"]= $noLog; 
    
    }?>
    
</html>