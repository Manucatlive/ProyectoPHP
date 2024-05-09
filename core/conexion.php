<?php
// Configuración de la base de datos
require_once(__DIR__.'/../config/config.php');
try {
    // Intenta conectarte a la base de datos utilizando MySQLi
    $conexion = new mysqli($host, $dbUsuario, $dbPassword, $dbNombre);

    // Verifica si hay un error de conexión
    if ($conexion->connect_error) {
        die("Connection error: " . $conexion->connect_error);
    }
} catch (Exception $e) {
    // Captura cualquier excepción que ocurra durante la conexión
    die("Connection error: " . $e->getMessage());
}
?>

