<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>

    <!-- Agregar Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background: url("{{ asset('images/bg.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            max-width: 400px;
            background: rgba(0, 0, 0, 0.85); /* Fondo oscuro */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            color: white; /* Texto en blanco */
            text-align: center;
        }

        .login-container h3 {
            color: #00ff99; /* Verde brillante */
            font-weight: bold;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn-primary {
            background-color: #00ff99; /* Verde llamativo */
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #00cc77;
        }

        .btn-secondary {
            background-color: #17a2b8; /* Verde-azulado */
            border: none;
            font-weight: bold;
        }

        .btn-secondary:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h3 class="mb-4">Iniciar Sesión</h3>

    <!-- Formulario de Login -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Campo Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <!-- Campo Contraseña -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <!-- Botón de Ingresar -->
        <button type="submit" class="btn btn-primary w-100 mb-2">Ingresar</button>

        <!-- Botón de Registro -->
        <a href="{{ route('register') }}" class="btn btn-secondary w-100" target="_blank">Registrar Nuevo Usuario</a>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
