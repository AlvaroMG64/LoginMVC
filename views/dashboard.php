<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel de control | LoginMVC</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        background: #f5f6fa;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Sidebar compacto */
    #sidebar {
        width: 200px;
        background: #1f3a6f;
        color: #fff;
        border-radius: 15px;
        padding: 20px;
        margin-right: 20px;
        flex-shrink: 0;
        height: auto;
    }

    #sidebar .nav-link {
        color: #cfd6e0;
        font-size: 0.9rem;
        padding: 6px 10px;
    }

    #sidebar .nav-link:hover {
        background: #29487e;
        color: #fff;
        border-radius: 6px;
    }

    #sidebar .sidebar-header {
        font-size: 1.3rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 15px;
    }

    /* Contenido central */
    #content {
        flex-grow: 1;
        max-width: 700px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        padding: 15px;
        text-align: center;
    }

    .btn-logout {
        background: #a03a3a;
        border: none;
        color: #fff;
        font-size: 0.9rem;
        width: 100%;
        padding: 8px;
        border-radius: 8px;
    }
    .btn-logout:hover {
        background: #7b2b2b;
    }

    @media (max-width: 768px) {
        body {
            flex-direction: column;
            align-items: stretch;
        }
        #sidebar {
            width: 100%;
            margin-bottom: 15px;
        }
        #content {
            max-width: 100%;
        }
    }
</style>
</head>
<body>

<!-- Panel lateral -->
<nav id="sidebar" class="d-flex flex-column">
    <div class="sidebar-header">
        Panel de control
    </div>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <span class="nav-link">Usuario: <strong><?= htmlspecialchars($_SESSION['idusuario']) ?></strong></span>
        </li>
        <li class="nav-item mb-2">
            <span class="nav-link">Nombre: <?= htmlspecialchars($_SESSION['nombre']) ?> <?= htmlspecialchars($_SESSION['apellidos']) ?></span>
        </li>
        <li class="nav-item mt-3">
            <button onclick="location.href='index.php?action=logout'" class="btn btn-logout">Cerrar sesión</button>
        </li>
    </ul>
</nav>

<!-- Contenido central -->
<div id="content">
    <h2 class="mb-4 text-center">Bienvenido al panel de control</h2>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card">
                <h6>Estadísticas</h6>
                <p>Total de usuarios: 2</p>
                <p>Último login: <?= date("d/m/Y H:i") ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h6>Información rápida</h6>
                <p>Usuarios activos: 2</p>
                <p>Sesiones activas: 1</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <h6>Notas importantes</h6>
                <p>Este panel de control es compacto y centrado.</p>
                <p>No contiene enlaces a otras páginas.</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>