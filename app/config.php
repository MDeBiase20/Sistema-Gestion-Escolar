<?php
/*
Vamos a tener todas las variables globales que son todas las variables
que se van a repetir en todo el proyecto incluyendo la conexión a la base de datos
*/
define('SERVER', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('BD', 'sistemagestionescolar');

define('APP_NAME', 'SISTEMA GESTION ESCOLAR');
define('APP_URL', 'http://localhost/sistemagestionescolar2');

//Para colocar la key_api de GoogleMaps
define('KEY_API_MAPS', '');

$servidor = "mysql:dbname=".BD.";host=".SERVER;

try {
    $pdo = new PDO($servidor, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "conexión exitosa a la base de datos";
} catch (PDOException $th) {
    print_r($th);
    echo "Error no se pudo conectar a la base de datos";
}

//hora y fecha del sistema
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha_hora = date('Y-m-d H:i:s');

$fecha_actual = date('Y-m-d');

$dia_actual = date('d');
$mes_actual = date('m');
$year_actual = date('Y');

$estado_registro = '1';

?>