<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="public/js/validaciones.js" defer></script>
</head>

<body>

<div class="login-card">
    <h1>Iniciar sesión</h1>

    <form method="post" action="index.php?action=authenticate">

        <?php
        if (!empty($_SESSION['error'])) {
            echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']);
        }
        ?>

        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <div>
            <label>Nombre de usuario</label>
            <input type="text" name="identificador" id="identificador" required>
        </div>

        <div>
            <label>Contraseña</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Acceder</button>
    </form>
</div>

</body>
</html>