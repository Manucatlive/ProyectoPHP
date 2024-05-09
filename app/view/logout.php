<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se desea eliminar la sesión actual, también se debe eliminar la cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión
session_destroy();

// Redireccionar al usuario a la página de inicio de sesión
header("Location: login.php");
exit();
?>
