<!DOCTYPE html>
<html lang="es">
<?php include "includes/general/head.php"; ?>
<?php include_once "validar.php"; ?>
<body class="body_admin">
    <?php include "includes/nav/headerHome.php"; ?>
    <div class="col-12 w-100">
    <?php if (isset($_GET['op'])) {
        switch ($_GET['op']) {
            case 'comunidad':
                 include "includes/body/comPblc.php";
            break;
            case 'iniciar sesión':
                include "includes/body/formAcc.php";
            break;
            case 'registrarse':
                include "includes/body/formReg.php";
            break;
        }
    } else {
        include "includes/body/bodyHome.php";
    }
    ?>
    </div>
    <?php include "includes/general/footer.php"; ?>
    <?php include "includes/general/src.php"; ?>
</body>

</html>