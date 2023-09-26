<?php 
date_default_timezone_set('America/Argentina/Buenos_Aires');

$hora = date("H:i:s");
$fecha = date("Y-m-d");

$fecha_hora = $fecha.$hora;


// tratamiento fecha y hora (2022-05-06 / 16:19:31)

$car_fecha                  = array("-", "/", " ", ":");
$fecha_hora_ingreso         = str_replace($car_fecha,'',$fecha_hora);

//

// Captura datos para actualizar

$session_axios          = $fecha_hora_ingreso;
$record_url_axios       = '';
$batch_name             = (isset($_POST['batch_name'])) ? $_POST['batch_name'] : '';
$load_date              = (isset($_POST['load_date'])) ? $_POST['load_date'] : '';
$result_code            = (isset($_POST['result_code'])) ? $_POST['result_code'] : '';
$attempt                = (isset($_POST['attempt_axios'])) ? $_POST['attempt_axios'] : '';

$pcs_final              = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$dni 				    = (isset($_POST['dni'])) ? $_POST['dni'] : '';
$nombres 			    = (isset($_POST['nombres'])) ? strtoupper($_POST['nombres']) : '';
$apellidos			    = (isset($_POST['apellidos'])) ? strtoupper($_POST['apellidos']) : '';  
$email   	      	    = (isset($_POST['email'])) ? $_POST['email'] : '';

$nombre_compania        = (isset($_POST['nombre_compania'])) ? $_POST['nombre_compania'] : '';
$servicio_icontec       = (isset($_POST['servicio_icontec'])) ? $_POST['servicio_icontec'] : '';
$opcion_gestion		    = (isset($_POST['opcion_gestion'])) ? $_POST['opcion_gestion'] : '';
$tipo_icontec		    = (isset($_POST['tipo_icontec'])) ? $_POST['tipo_icontec'] : '';
$tipo_solicitud 	    = (isset($_POST['tipo_solicitud'])) ? $_POST['tipo_solicitud'] : '';
$estados		        = (isset($_POST['estados'])) ? $_POST['estados'] : '';
$clase_contacto		    = (isset($_POST['clase_contacto'])) ? $_POST['clase_contacto'] : '';
$regional   		    = (isset($_POST['regional'])) ? $_POST['regional'] : '';
$categoria_contacto     = (isset($_POST['categoria_contacto'])) ? $_POST['categoria_contacto'] : '';
$vendedor      			= (isset($_POST['vendedor'])) ? $_POST['vendedor'] : '';
$servicio			    = (isset($_POST['servicio'])) ? $_POST['servicio'] : '';
$fecha_solicitud		= (isset($_POST['fecha_solicitud'])) ? $_POST['fecha_solicitud'] : '';
$observacion    		= (isset($_POST['observacion'])) ? $_POST['observacion'] : '';
$prospecto    		    = (isset($_POST['prospecto'])) ? $_POST['prospecto'] : '';    
$login                  = (isset($_POST['login'])) ? $_POST['login'] : '';

$contacto_destinatario  = (isset($_POST['contacto_destinatario'])) ? $_POST['contacto_destinatario'] : '';

$supervisor     = 'supervisor.icontec@la.icontec.org';
$supervisor2    = 'angelica.rivera@onepeoplebpo.com';

require '../conexion/conexion.php';


// verifica si el session id esta duplicado

	$query              = "SELECT session_id FROM tp_icontec WHERE session_id ='$session_axios'";
    $result             = mysqli_query($conn, $query);
    $resultado          = mysqli_fetch_array($result);
    $count              = mysqli_num_rows($result);

    if ($count > 0){

        $session_id_final   = 'DUPLICADO';

    }else{

        $session_id_final   = $session_axios;
    
    }

    

    // busca correo responsable con su reemplazo
/*
    $query2              = "SELECT * FROM icontec_responsable WHERE id ='$contacto_destinatario'";
    $result2             = mysqli_query($conn, $query2);
    $resultado2          = mysqli_fetch_array($result2);

    $nombre_responsable = $resultado2['encargado'];
    $correo_responsable = $resultado2['correo_enc'];

    $nombre_reemplazo   = $resultado2['reemplazo'];
    $correo_reemplazo   = $resultado2['correo_ree'];*/


    // ingresa los datos de tipificacion 

    $sSQL= "INSERT INTO tp_icontec SET 
    dni='$dni',
    nombre_cliente='$nombres $apellidos',
    correo_cliente='$email',
    nombre_compania='$nombre_compania',
    servicio_icontec='$servicio_icontec',
    gestion='$opcion_gestion',
    tipo_icontec='$tipo_icontec',
    tipo_solicitud='$tipo_solicitud',
    estado='$estados',
    clase_contacto='$clase_contacto',
    regional='$regional',
    categoria_contacto='$categoria_contacto',
    contacto_destinatario='GERMAN SANHUEZA',
    contacto_reemplazo='GERMAN SANHUEZA',
    observacion='$observacion',
    session_id='$session_id_final',
    pcs='$pcs_final',
    record_url='$record_url_axios',
    agente='$login',
    fecha_hora_ingreso='$fecha / $hora',
    fecha_solicitud='$fecha',
    servicio='$servicio',
    prospecto='$prospecto'";


    echo mysqli_query($conn, $sSQL); 


        // enviar correo electronico al responsable y reemplazo

       // include('../includes/mail/index.php');

        // envia los datos a bitrix
    
       // include('../includes/bitrix/index.php');



?> 
