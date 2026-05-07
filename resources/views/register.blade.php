<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e9ecef, #cfd9df);
            min-height: 100vh;
        }

        .hero {
            padding: 80px 0;
        }

        .box {
            background: white;
            border-radius: 18px;
            padding: 40px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }

        .feature {
            background: white;
            border-radius: 12px;
            padding: 20px;
            height: 100%;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Sistema de Pruebas</span>

        <a href="{{ route('login') }}" class="btn btn-primary">
            Login
        </a>
    </div>
</nav>

<!-- CONTENIDO (TODO EN UNA SOLA PÁGINA) -->
<div class="container hero">

    <!-- BIENVENIDA -->
    <div class="box text-center mb-5">
        <h1 class="mb-3">Bienvenido 👋</h1>

        <p class="text-muted">
            Esta es una aplicación de prueba para validar el sistema de login en Laravel.
            Aquí podrás acceder, autenticar usuarios y probar el flujo de inicio de sesión.
        </p>

        <a href="{{ route('login') }}" class="btn btn-dark btn-lg mt-3">
            Ir al Login
        </a>
    </div>

    <!-- INFORMACIÓN -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="feature">
                <h5>🔐 Autenticación</h5>
                <p class="text-muted mb-0">
                    Sistema de acceso seguro mediante usuarios registrados.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature">
                <h5>👤 Usuarios</h5>
                <p class="text-muted mb-0">
                    Gestión básica de cuentas y sesiones activas.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature">
                <h5>⚙️ Pruebas</h5>
                <p class="text-muted mb-0">
                    Entorno de desarrollo para probar funcionalidades.
                </p>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>