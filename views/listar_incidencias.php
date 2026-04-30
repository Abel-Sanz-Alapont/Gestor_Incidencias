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
            <div class="usuario">
                <h1>Panel de Incidencias</h1>
                <div>
                    <?php if (isset($_SESSION['id'])): ?>
                        Bienvenido, <b><?= $_SESSION['nombre'] ?></b> (<?= $_SESSION['rol'] ?>) |
                        <a href="index.php?accion=logout">Cerrar Sesión</a>
                        <?php if ($_SESSION['rol'] === 'cliente'): ?>
                            | <a href="index.php?accion=crear">Añadir Nueva Incidencia</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <form action="index.php?accion=cambiar_color" method="POST">
                    <label for="escogerColor">Seleccionar color fondo</label>
                    <input type="color" id="escogerColor" name="color" value="<?php echo $colorActual; ?>">
                    <button type="submit">Cambiar</button>
                </form>
            </div>
        </header>

        <main>
            <div class= "panel-busqueda">
                <?php if ($_SESSION['rol'] === 'administrador'): ?>
                    <div >
                        <form method="POST" action="index.php?accion=buscar">
                            <label for="id_busqueda">BUSCAR ID DEL CLIENTE</label><br><hr>
                            <input type="number" id="id_busqueda" name="id_busqueda" placeholder="Introduce ID cliente"><br><br>
                            <button type="submit">Buscar</button>
                            <a href="index.php?accion=listar">Listar todas</a>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
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
                            <?php if ($_SESSION['rol']  === 'administrador'): ?>
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
                                    <?php if ($_SESSION['rol']  === 'administrador'): ?>
                                        <form action="index.php?accion=actualizar" method="POST" style="display:inline;">
                                            <input type="hidden" name="id_incidencia" value="<?php echo $incidencia['id']; ?>">
                                            <select name="nuevo_estado">
                                                <option value="abierta" <?php echo $incidencia['estado'] == 'abierta' ? 'selected' : ''; ?>>Abierta</option>

                                                <option value="en_proceso" <?php echo $incidencia['estado'] == 'en_proceso' ? 'selected' : ''; ?>>En Proceso</option>

                                                <option value="resuelta" <?php echo $incidencia['estado'] == 'resuelta' ? 'selected' : ''; ?>>Resuelta</option>
                                            </select>
                                            <button type="submit">Actualizar Registro</button>
                                        </form>
                                        <button type="submit"><a href="index.php?accion=eliminar&id=<?php echo $incidencia['id']; ?>">Eliminar Registro</a></button>
                                    <?php else: ?>
                                        <?php echo $incidencia['estado']; ?>
                                    <?php endif; ?>
                                </td>

                                <?php if ($_SESSION['rol']  === 'administrador'): ?>
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