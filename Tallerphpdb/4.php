<?php
include("crud4.php");

// Capturar el valor del filtro si existe
$filtroGeneral = $_GET['filtro_general'] ?? '';
$registros = obtenerRegistros($filtroGeneral);
?>

<html>

<head>
    <title>Formulario y Listado</title>
</head>

<body>
    <a href="index.html">
        <button style="border: 5px solid rgb(128, 30, 0); width: 5% ;">Inicio</button>
    </a>
    <div style="border: 3px solid black; width: 50%; margin-left: 25%;">
        <form action="crud4.php" method="post">
            <!-- Textarea -->
            <textarea name="texto" rows="4" cols="52">Utilice este cuadro para escribir</textarea><br>

            <!-- Control para indicar la fecha -->
            <input type="date" name="fecha"><br>

            <!-- Control para elegir el color -->
            <input type="color" name="color"><br>

            <!-- Checkboxes para conectores -->
            <input type="checkbox" name="conector[]" value="conectorusb"> USB<br>
            <input type="checkbox" name="conector[]" value="conectorparalelo"> Paralelo<br>
            <input type="checkbox" name="conector[]" value="conectorps2"> PS2<br>

            <!-- Lista desplegable para aula -->
            <select name="aula">
                <option value="a01">A01</option>
                <option value="a02">A02</option>
                <option value="a03">A03</option>
            </select><br>

            <!-- Control para elegir archivos -->
            <input type="file" name="archivo"><br>

            <!-- Cuadros de texto -->
            <input type="text" name="nombre" placeholder="Nombre"><br>
            <input type="text" name="apellidos" placeholder="Apellidos"><br>
            <input type="text" name="direccion" placeholder="Dirección"><br>

            <input type="submit" value="Enviar">
        </form>

        <form action="" method="get">
            <input type="text" name="filtro_general" placeholder="Buscar...">
            <input type="submit" value="Filtrar">
        </form>

        <!-- Tabla para mostrar los datos -->
        <table border="1">
            <thead>
                <tr>
                    <th>Texto</th>
                    <th>Fecha</th>
                    <th>Color</th>
                    <th>Conectores</th>
                    <th>Aula</th>
                    <th>Archivo</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($registro['Texto'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Fecha'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Color'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Conectores'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Aula'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Archivo'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Nombre'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Apellidos'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Direccion'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <!-- Botones de Actualizar y Eliminar -->
                            <form action="formulario_edicion4.php" method="get">
                                <input type="hidden" name="id"
                                    value="<?php echo htmlspecialchars($registro['Id'] ?? ''); ?>">
                                <input type="submit" name="editar" value="Actualizar">
                            </form>

                            <form action="crud4.php" method="post">
                                <input type="hidden" name="id"
                                    value="<?php echo htmlspecialchars($registro['Id'] ?? ''); ?>">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($registros)): ?>
                    <tr>
                        <td colspan="9">No hay registros para mostrar</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>