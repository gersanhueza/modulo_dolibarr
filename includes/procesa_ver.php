<?php

   require('../conexion/conexion.php');

    $objeto     = new Conexion();
    $conexion   = $objeto->Conectar();

    $opcion     = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $session_id = (isset($_POST['session_id'])) ? $_POST['session_id'] : '';

    switch($opcion){

        case 1:

            $consulta = "SELECT * FROM tp_icontec WHERE MONTH(fecha_hora_ingreso)  = MONTH(CURRENT_DATE()) AND YEAR(fecha_hora_ingreso)  = YEAR(CURRENT_DATE())";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;