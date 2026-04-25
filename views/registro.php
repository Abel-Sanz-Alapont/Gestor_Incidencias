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
            <label>Registrase como:</label>
            <select name="rol" id="rol">
                <option value="cliente">Cliente</option>
                <option value="administrador">administrador</option>
            </select><br>
                <br>
                <input type="text" name="nombre" required placeholder="Nombre Completo"><br>
                <input type="email" name="email"  required placeholder="Email"><br>
                <input type="password" name="password"  required placeholder="Contraseña"><br>

            <br>
                <label>Clientes:</label><br>
                <input type="text" name="departamento" placeholder="Departamento"><br>
                <input type="text" name="telefono"  placeholder="Telefono"><br>
            <br>
                <label>Administradores:</label><br>
                <input type="text" name="numero_empleado" placeholder="Nº Empleado"><br>
                <input type="text" name="especialidad" placeholder="Especialidad"><br>
            <br>
            <button type="submit">Registrar Usuario</button>
        </form>

        <div>
            <p>¿Ya tienes cuenta? <a href="index.php?accion=login">Inicia sesión aquí</a></p>
        </div>
    </div>

</body>
</html>