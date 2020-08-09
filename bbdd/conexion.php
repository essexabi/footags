
<?php
//Parámetros de conexión
$host = "localhost";
$bd = "foodb";
$user = "root";
$pass = "";

//Conexión a nuestra BBDD con los parámetros de conexión

$con = mysqli_connect($host, $user, $pass);

//Si la conexión falla salta mensaje
if (mysqli_connect_errno()) {
    echo "<h1>La conexión ha fallado</h1>";
    exit();
}
//else{echo "conectado";}

//Conexión a la base de datos en la que realizaremos las consultas
mysqli_select_db($con, $bd) or die("<h1>Error de conexión a Base de Datos</h1>");


?>
    