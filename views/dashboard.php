<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | LoginPHP</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f2a52, #1c3b70);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
        }

        .dashboard-card {
            background: #1f3a6f;
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.5);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .dashboard-card h1 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .dashboard-card p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            color: #e0e6f0;
        }

        .btn-logout {
            background: #a03a3a;
            border: none;
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 500;
        }

        .btn-logout:hover {
            background: #7b2b2b;
        }
    </style>
</head>

<body>

<div class="dashboard-card">
    <h1>Panel de inicio</h1>

    <p>
        Bienvenido,
        <strong><?= htmlspecialchars($_SESSION['idusuario']) ?></strong>
    </p>

    <p class="mb-4">
        Ha iniciado sesión correctamente. Desde aquí podrá acceder a las funcionalidades de la aplicación.
    </p>

    <a href="index.php?action=logout" class="btn btn-logout">
        Cerrar sesión
    </a>
</div>

</body>
</html>