<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Incidencia</title>
</head>
<body>

    <div>
        <h2>Crear Nueva Incidencia</h2>
        <p>Usuario: <strong><?php echo $_SESSION['nombre']; ?></strong></p>

        <form action="index.php?accion=crear" method="POST">
            <div>
                <label for="titulo">Título de la incidencia:</label><br>
                <input type="text" name="titulo" id="titulo" required>
            </div>
            <br>
            <div>
                <label for="descripcion">Descripción detallada:</label><br>
                <textarea name="descripcion" id="descripcion" rows="5" cols="40" required placeholder="Explica brevemente el problema..."></textarea>
            </div>
            <br>
            <button type="submit">Enviar Incidencia</button>
            <button type="submit"><a href="index.php?accion=listar" >Cancelar y volver</a></button>
        </form>
    </div>

</body>
</html>