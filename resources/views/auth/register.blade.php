<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Usuario</title>

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
        .register-container {
            max-width: 400px;
            background: rgba(0, 0, 0, 0.85); /* Fondo oscuro */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            color: white; /* Texto en blanco */
            text-align: center;
        }
    </style>
</head>
<body>

<div class="register-container text-center">
    <h3 class="mb-4">Registrar Nuevo Usuario</h3>

    <!-- Formulario de Registro -->
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <!-- Correo Electrónico -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <!-- Botón de Registrar -->
        <button type="submit" class="btn btn-success w-100">Registrar</button>

        <!-- Volver al Login -->
        <a href="{{ route('login') }}" class="btn btn-secondary w-100 mt-2">Volver al Login</a>
    </form>
</div>

</body>
</html>
