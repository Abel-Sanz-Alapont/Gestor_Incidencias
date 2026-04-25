<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Incidencias</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .estado-texto {
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
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
                    <?php if ($rol === 'cliente'): ?>
                        | <a href="index.php?accion=crear"><strong>+ Añadir Nueva Incidencia</strong></a>
                    <?php endif; ?>
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

                                <td>
                                    <?php if ($rol === 'administrador'): ?>
                                        <form action="index.php?accion=actualizar" method="POST" style="display:inline;">
                                            <input type="hidden" name="id_incidencia" value="<?php echo $incidencia['id']; ?>">
                                            <select name="nuevo_estado">
                                                <option value="abierta" <?php echo $incidencia['estado'] == 'abierta' ? 'selected' : ''; ?>>Abierta</option>

                                                <option value="en_proceso" <?php echo $incidencia['estado'] == 'en_proceso' ? 'selected' : ''; ?>>En Proceso</option>

                                                <option value="resuelta" <?php echo $incidencia['estado'] == 'resuelta' ? 'selected' : ''; ?>>Resuelta</option>
                                            </select>
                                            <button type="submit">Guardar</button>
                                        </form>
                                    <?php else: ?>
                                        <span class="estado-texto"><?php echo $incidencia['estado']; ?></span>
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
