<?php
$nombreCookieUsuario = 'color_tema' . $_SESSION['id'];
$colorActual = $_COOKIE[$nombreCookieUsuario] ?? '#ffffff';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Incidencias</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body style="background-color: <?php echo $colorActual ?>;">

    <div>
        <header>
            <div>
                <h2>Panel de Incidencias</h2>
                <p>Bienvenido, <strong><?php echo $nombre; ?></strong> (<?php echo $rol; ?>)</p>
            </div>
            <div>
                <p>

                    <a href="index.php?accion=logout">Cerrar Sesión</a>
                    <?php if ($rol === 'cliente'): ?>
                        | <a href="index.php?accion=crear"><strong>+ Añadir Nueva Incidencia</strong></a>
                    <?php endif; ?>
                </p>
            </div>
            <div>
                <form action="index.php?accion=cambiar_color" method="POST">
                    <label for="escogerColor">Ajustes Usuario</label>
                    <input type="color" id="escogerColor" name="color" value="<?php echo $colorActual; ?>">
                    <button type="submit">Cambiar Ajustes</button>
                </form>
            </div>
        </header>

        <main>
            <?php if (empty($incidencias)): ?>
                <p>No hay incidencias registradas en este momento.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                            <?php if ($rol === 'administrador'): ?>
                                <th>Cliente</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($incidencias as $incidencia): ?>
                            <tr>
                                <td>#<?php echo $incidencia['id']; ?></td>
                                <td><?php echo $incidencia['titulo']; ?></td>
                                <td><?php echo $incidencia['descripcion']; ?></td>

                                <td>
                                    <?php if ($rol === 'administrador'): ?>
                                        <form action="index.php?accion=actualizar" method="POST" style="display:inline;">
                                            <input type="hidden" name="id_incidencia" value="<?php echo $incidencia['id']; ?>">
                                            <select name="nuevo_estado">
                                                <option value="abierta" <?php echo $incidencia['estado'] == 'abierta' ? 'selected' : ''; ?>>Abierta</option>

                                                <option value="en_proceso" <?php echo $incidencia['estado'] == 'en_proceso' ? 'selected' : ''; ?>>En Proceso</option>

                                                <option value="resuelta" <?php echo $incidencia['estado'] == 'resuelta' ? 'selected' : ''; ?>>Resuelta</option>
                                            </select>
                                            <button type="submit">Actualizar Registro</button>
                                        </form>
                                        <button type="submit"><a   href="index.php?accion=eliminar&id=<?php echo $incidencia['id']; ?>">Eliminar Registro</a></button>
                                    <?php else: ?>
                                        <?php echo $incidencia['estado']; ?>
                                    <?php endif; ?>
                                </td>

                                <?php if ($rol === 'administrador'): ?>
                                    <td><?php echo $incidencia['nombre_cliente'] ?? 'Usuario Desconocido'; ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </main>
    </div>

</body>

</html>