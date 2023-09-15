<?php 

    class Conexion{   
        public static function Conectar() {        
            define('servidor', 'localhost');
            define('nombre_bd', 'dolibarr');
            define('usuario', 'root');
            define('password', '');                     
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');            
            try{
                $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);            
                return $conexion;
            }catch (Exception $e){
                die("El error de Conexión es: ". $e->getMessage());
            }
        }
    }


    $conn = new mysqli("localhost","root","","dolibarr"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

 	mysqli_set_charset($conn,"utf8");


	if(mysqli_connect_errno()){

		echo 'Conexion Fallida : ', mysqli_connect_error();

		exit();

	}

?>