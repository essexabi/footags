<?php

session_start();
if ($_SESSION['logueadoId'] == TRUE) {

    header("Location: fooAdmin.php");
    
} else {
    
    
    header("Location: home.php");
    
}
?>
