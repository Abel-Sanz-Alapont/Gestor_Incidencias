<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>

    <div>
        <h2>Acceso al Sistema</h2>

        <form action="index.php?accion=login" method="POST">
            <div>
                <label for="email">Correo Electrónico:</label><br>
                <input type="text" name="email" id="email" required>
            </div>
            <br>
            <div>
                <label for="password">Contraseña:</label><br>
                <input type="password" name="password" id="password" required>
            </div>
            <br>
            <button type="submit">Iniciar Sesión</button>
        </form>

        <div>
            <p>¿No tienes cuenta? <a href="index.php?accion=registro">Regístrate aquí</a></p>
        </div>
    </div>

</body>
</html>