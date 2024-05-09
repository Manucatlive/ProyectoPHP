<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redireccionar si no hay sesión activa
    exit();
}
$nameUser = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Wellcome</h2>
                <p class="text-center">¡Helo, <?php echo $nameUser; ?>! Welcome to our platform.</p>
                <p class="text-center"><a href="logout.php" class="btn btn-primary">Sign off</a></p>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
