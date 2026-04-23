<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Registro de Cliente</title>
</head>
<body>

    <div>
        <h2>Crear Cuenta de Cliente</h2>

        <form action="index.php?accion=registro" method="POST">
            <div>
                <label for="nombre">Nombre completo:</label><br>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <br>
            <div>
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" required>
            </div>
            <br>
            <div>
                <label for="password">Contraseña:</label><br>
                <input type="password" name="password" id="password" required>
            </div>
            <br>
            <div>
                <label for="departamento">Departamento:</label><br>
                <input type="text" name="departamento" id="departamento">
            </div>
            <br>
            <div>
                <label for="telefono">Teléfono:</label><br>
                <input type="text" name="telefono" id="telefono">
            </div>
            <br>
            <button type="submit">Registrarme</button>
        </form>

        <div>
            <p>¿Ya tienes cuenta? <a href="index.php?accion=login">Inicia sesión aquí</a></p>
        </div>
    </div>

</body>
</html>