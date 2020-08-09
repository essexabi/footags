<?php

	//Configuracion de la conexion a base de datos
    include "bbdd/conexion.php";
    include "bbdd/funciones_bd.php";
    include "validar.php";

	//Variables recibidas por POST de nuestra conexión AJAX
	$idAtrezzo = $_POST['atId'];
	$idPlano = $_POST['apPl'];
    valUso();

    insertUso( $idAtrezzo, $idPlano);


	//Variable donde recogemos el resultado de la consulta
	

	//Realizamos la consulta a la base de datos
    
    /*$res = selecObjetoAparecePlano($idPLano);

    $cont = mysqli_num_rows($res);
    
    for($i=0;$i<$cont;$i++){

        $fila= mysqli_fetch_assoc($res);

        echo '<button class="btn btn-small mt-2 font-weight-lighter text-white py-0 px-1 ml-1" style="background-color: '.$filaUs['color_at'].'">'. $filaUs['objeto'].'</button>';

    }*/

	

	

?>