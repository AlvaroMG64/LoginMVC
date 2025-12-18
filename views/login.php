<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login PHP</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Estilos -->
  <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #0f2a52, #1c3b70);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
    }

    .login-card {
        background: #1f3a6f;
        border-radius: 20px;
        padding: 50px 40px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.5);
        max-width: 500px;
        width: 100%;
    }

    .login-card h1 {
        font-weight: 600;
        margin-bottom: 35px;
        text-align: center;
    }

    .form-control {
        background-color: #2a4a85;
        border: 1px solid #3d5f9c;
        color: #fff;
    }

    .form-control::placeholder {
        color: #cfd6e0;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #66a3ff;
        background-color: #2a4a85;
        color: #fff;
    }

    .form-label {
        color: #e0e6f0;
        font-weight: 500;
    }

    .form-text {
        font-size: 0.85rem;
        color: #cfd6e0;
    }

    .btn-login {
        background: #66a3ff;
        color: white;
        font-weight: 500;
        width: 100%;
        padding: 14px;
        border-radius: 10px;
    }

    .btn-login:hover {
        background: #4d8de0;
    }
  </style>

  <!-- JS validaciones -->
  <script src="public/js/validaciones.js" defer></script>
</head>

<body>

<div class="login-card">
    <h1>Iniciar sesión</h1>

    <form action="index.php?action=authenticate" method="post">

        <!-- Error desde sesión -->
        <?php
        if (!empty($_SESSION['error'])) {
            echo "<div class='alert alert-danger mb-3'>";
            echo $_SESSION['error'];
            echo "</div>";
            unset($_SESSION['error']);
        }
        ?>

        <!-- CSRF -->
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <!-- Usuario -->
        <div class="mb-3">
            <label for="identificador" class="form-label">Nombre de usuario</label>
            <input type="text"
                   name="identificador"
                   id="identificador"
                   class="form-control form-control-lg"
                   placeholder="Tu usuario"
                   required>
            <div class="form-text">
                Requerido, 8-15 caracteres (letras, números o _)
            </div>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password"
                   name="password"
                   id="password"
                   class="form-control form-control-lg"
                   placeholder="********"
                   required>
            <div class="form-text">
                Debe tener mayúsculas, minúsculas, dígitos y caracteres especiales (!@#$%&*?-)
            </div>
        </div>

        <button type="submit" class="btn btn-login btn-lg mt-3">
            Acceder
        </button>

    </form>
</div>

</body>
</html>