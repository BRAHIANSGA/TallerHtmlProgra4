<?php
include("crud3.php");

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
    <div style="border: 3px solid black; width: 80%; margin-left: 12%;">
        <form action="crud3.php" method="post">
            <!-- Radios para ciclo -->
            <label for="cicl">Ciclo</label><br>
            <input type="radio" name="ciclo" value="ciclosmir"> SMIR<br>
            <input type="radio" name="ciclo" value="cicloasir"> ASIR<br>
            <input type="radio" name="ciclo" value="ciclodam"> DAM<br>
            <input type="radio" name="ciclo" value="ciclodaw"> DAW<br>

            <!-- Control para indicar la fecha -->
            <label for="fech">Fecha</label><br>
            <input type="date" name="fecha"><br>

            <!-- Textarea -->
            <label for="comen">Comentarios</label><br>
            <textarea name="texto1" rows="8" cols="57">Inserte aqui el texto</textarea><br>

            <!-- Control para indicar la hora -->
            <label for="hor">Hora</label><br>
            <input type="time" name="hora"><br>

            <!-- Checkboxes para asignaturas -->
            <label for="asig">Asignatura</label><br>
            <input type="checkbox" name="asignatura[]" value="asignaturageografia"> Geografía<br>
            <input type="checkbox" name="asignatura[]" value="asignaturalengua"> Lengua<br>
            <input type="checkbox" name="asignatura[]" value="asignaturamatematicas"> Matemáticas<br>
            <input type="checkbox" name="asignatura[]" value="asignaturahistoria"> Historia<br>

            <!-- Control para elegir el color -->
            <label for="col">Color</label><br>
            <input type="color" name="color"><br>

            <!-- Textarea -->
            <label for="obse">Observaciones</label><br>
            <textarea name="texto2" rows="8" cols="57">Inserte aqui el texto</textarea><br>

            <!-- Lista desplegable múltiple -->
            <label for="list">Lista Desplegable Múltiple</label><br>
            <select name="escritorio[]" multiple>
                <option value="kde">KDE</option>
                <option value="gnome">GNOME</option>
                <option value="unity">Unity</option>
            </select><br>

            <!-- Cuadros de texto -->
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" placeholder="Nombre"><br>
            <input type="text" name="apellidos" placeholder="Apellidos"><br>
            <input type="text" name="telefono" placeholder="Telefono"><br>

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
                    <th>Ciclo</th>
                    <th>Fecha</th>
                    <th>Texto 1</th>
                    <th>Hora</th>
                    <th>Asignaturas</th>
                    <th>Color</th>
                    <th>Texto 2</th>
                    <th>Escritorio</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($registro['Ciclo'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Fecha'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Texto1'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Hora'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Asignaturas'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Color'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Texto2'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Escritorio'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Nombre'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Apellidos'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Telefono'] ?? 'No especificado') ?>
                        </td>

                        <td>
                            <!-- Botón de Actualizar -->
                            <form action="formulario_edicion3.php" method="get">
                                <input type="hidden" name="id"
                                    value="<?php echo htmlspecialchars($registro['Id'] ?? ''); ?>">
                                <input type="submit" name="editar" value="Actualizar">
                            </form>

                            <!-- Botón de Eliminar -->
                            <form action="crud3.php" method="post">
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
                        <td colspan="11">No hay registros para mostrar</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>