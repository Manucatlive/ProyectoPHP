<?php
require_once('../model/UsuarioModel.php'); // Incluye el modelo de Usuario

class UserController {
    /**
     * Función para iniciar sesión de un usuario.
     * @param string $name Nombre de usuario.
     * @param string $password Contraseña del usuario.
     */
    public function login($name, $password) { 
        $model = new UserModel(); // Instancia el modelo de Usuario
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = $model->login($name, $hashedPassword);// Obtiene el usuario por su nombre de usuario
        if ($user) { // Verifica la contraseña con password_verify
            session_start(); // Inicia la sesión
            $_SESSION['user'] = array('username' => $username);
 // Almacena el nombre de usuario en la sesión
            header("Location: ../view/bienvenido.php"); // Redirecciona a la página de bienvenida
            exit(); // Termina la ejecución del script
        } else {
            header("Location: ../view/login.php?error=login"); // Redirecciona a la página de login con error
            exit(); // Termina la ejecución del script
        }
    }

    /**
     * Función para registrar un nuevo usuario.
     * @param string $user Nombre de usuario.
     * @param string $password Contraseña del usuario.
     * @param string $confirm_password Confirmación de la contraseña.
     */
    public function register($user, $password, $confirm_password) {
        if ($password != $confirm_password) { // Verifica si las contraseñas coinciden
            echo "Passwords do not match.";
            header("refresh:1;url=../view/registro.php"); // Redirecciona a la página de registro
            exit(); // Termina la ejecución del script
        }
    
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Genera el hash de la contraseña
        $model = new UserModel(); // Instancia el modelo de Usuario
        if ($model->register($user, $hashedPassword)) { // Registra al usuario en la base de datos
            header("Location: ../view/login.php"); // Redirecciona a la página de login
            exit(); // Termina la ejecución del script
        } else {
            echo "Error registering user."; // Muestra un mensaje de error
        }
    }
}

session_start(); // Inicia la sesión

if (isset($_POST['action'])) { // Verifica si se ha enviado la acción desde el formulario
    require_once('UsuarioController.php'); // Incluye el controlador de Usuario
    $controller = new UserController(); // Instancia el controlador de Usuario

    if ($_POST['action'] === 'login') { // Verifica si la acción es para iniciar sesión
        $controller->login($_POST['name'], $_POST['password']); // Ejecuta la función para iniciar sesión
    } elseif ($_POST['action'] === 'register') { // Verifica si la acción es para registrar usuario
        $controller->register($_POST['user'], $_POST['password'], $_POST['confirm_password']); // Ejecuta la función para registrar usuario
    }
}
?>
