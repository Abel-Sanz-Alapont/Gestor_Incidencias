<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mis Incidencias</title>
</head>

<body>

    <div>
        <header>
            <div>
                <h2>Panel de Incidencias</h2>
                <p>Bienvenido, <strong><?php echo $nombre; ?></strong> (<?php echo $rol; ?>)</p>
            </div>
            <div>
                <p>
                    <a href="index.php?accion=logout">Cerrar Sesión</a>
                    |
                    <a href="index.php?accion=crear"> Añadir Nueva Incidencia</a>
                </p>
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
                            <th>Estado</th>
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
                                <td><?php echo strtoupper(str_replace('_', ' ', $incidencia['estado'])); ?></td>

                                <?php if ($rol === 'administrador'): ?>
                                    <td><?php echo $incidencia['nombre_cliente']; ?></td>
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