<?php
include '../../core/conexion.php'; // Incluye el archivo de conexión

class UserModel {
    /**
     * Función para realizar el inicio de sesión de un usuario.
     * $user Nombre de usuario.
     * $contraseña Contraseña del usuario.
     * return Los datos del usuario si la autenticación es exitosa, o false si falla.
     */
    public function login($user, $contraseña) {
        global $conexion; // Accede a la variable global de conexión
        $sql = "SELECT * FROM usuario WHERE usuario = ? AND contraseña = ?";
        $stmt = $conexion->prepare($sql); // Prepara la consulta SQL
        $stmt->bind_param("ss", $user, $contraseña); // Asigna los parámetros a la consulta preparada
        $stmt->execute(); // Ejecuta la consulta

        $result = $stmt->get_result(); // Obtiene el resultado de la consulta
        return $result->fetch_assoc(); // Devuelve los datos del usuario si la autenticación es exitosa
    }

    /**
     * Función para registrar un nuevo usuario en la base de datos.
     *  $name Nombre de usuario.
     *  $password Contraseña del usuario.
     *  return bool Devuelve true si el registro es exitoso, o false si falla.
     */
    public function register($name, $password) {
        global $conexion; // Accede a la variable global de conexión
        $sql = "INSERT INTO usuario (usuario, contraseña) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql); // Prepara la consulta SQL
        $stmt->bind_param("ss", $name, $password); // Asigna los parámetros a la consulta preparada
        return $stmt->execute(); // Ejecuta la consulta y devuelve true si es exitosa
    }
}
?>
