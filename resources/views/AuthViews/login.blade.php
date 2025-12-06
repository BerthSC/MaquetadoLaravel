<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 p-4 bg-white rounded shadow">

            <h3 class="mb-4 text-center">Iniciar sesión</h3>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" name="correo_electronico" class="form-control" placeholder="Correo electrónico" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="contrasennia" class="form-control" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('forgot') }}">¿Olvidaste tu contraseña?</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
