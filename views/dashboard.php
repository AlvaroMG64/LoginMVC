<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>
    <h2>Bienvenido, <?= htmlspecialchars($_SESSION['idusuario']) ?></h2>
    <p>Sesión iniciada correctamente</p>

    <a href="index.php?action=logout">Cerrar sesión</a>
</body>
</html>