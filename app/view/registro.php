<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration of people</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid row">
        <form action="../controller/UsuarioController.php" method="post" class="col-4 p-3">
            <input type="hidden" name="action" value="register">
            <h3 class="text-center text-secondary">Registration of people</h3>
            <div class="mb-3">
                <label for="usuario" class="form-label">User name</label>
                <input type="text" class="form-control" id="user" name="user" required>
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="contraseña2" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok" >Registrar</button>
        </form>
    </div>
    <p><a href="login.php" class="btn btn-link">Do you already have an account?</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
