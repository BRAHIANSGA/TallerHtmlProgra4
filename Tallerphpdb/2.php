<?php
include("crud2.php"); // Asegúrate de que crud2.php incluya la función obtenerRegistros
// Capturar el valor del filtro si existe
$filtroGeneral = $_GET['filtro_general'] ?? '';
$registros = obtenerRegistros($filtroGeneral);
?>

<html>
<head>
    <title>Formulario y Listado</title>
    <!-- Aquí puedes agregar tu CSS o JavaScript si es necesario -->
</head>
<body>
    <form action="crud2.php" method="post">
        <!-- Radios para asignatura -->
        <label for="asignatura">Asignatura: </label><br />
        <input type="radio" name="asignatura" value="asignaturalengua"> Lengua<br>
        <input type="radio" name="asignatura" value="asignaturamatematicas"> Matemáticas<br>
        <input type="radio" name="asignatura" value="asignaturahistoria"> Historia<br>
        <input type="radio" name="asignatura" value="asignaturageografia"> Geografía<br>

        <!-- Checkboxes para editor de texto -->
        <label for="editortexto">Editor de Texto: </label><br />
        <input type="checkbox" name="editor[]" value="editornotepad"> Notepad<br>
        <input type="checkbox" name="editor[]" value="editoremacs"> Emacs<br>
        <input type="checkbox" name="editor[]" value="editorotro"> Otro<br>

        <!-- Textarea para comentarios -->
        <label for="comentario">Comentario</label><br>
        <textarea name="comentarios" rows="5" cols="59">Escriba aquí, por favor</textarea><br>

        <!-- Lista desplegable para procesador -->
        <label for="lista">Procesadores</label><br>
        <select name="procesador">
            <option value="amd">AMD</option>
            <option value="intel_i5">Intel i5</option>
            <option value="intel_i7">Intel i7</option>
            <option value="intel_i9">Intel i9</option>
        </select><br>

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
                <th>Asignatura</th>
                <th>Editor de Texto</th>
                <th>Comentarios</th>
                <th>Procesador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $registro): ?>
                <tr>
                    <td><?php echo htmlspecialchars($registro['Asignatura'] ?? 'No especificado') ?></td>
                    <td><?php echo htmlspecialchars($registro['EditorDeTexto'] ?? 'No especificado') ?></td>
                    <td><?php echo htmlspecialchars($registro['Comentarios'] ?? 'No especificado') ?></td>
                    <td><?php echo htmlspecialchars($registro['Procesador'] ?? 'No especificado') ?></td>
                    <td>
                        <!-- Botón de Actualizar -->
                        <form action="formulario_edicion2.php" method="get">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id'] ?? ''); ?>">
                            <input type="submit" name="editar" value="Actualizar">
                        </form>

                        <!-- Botón de Eliminar -->
                        <form action="crud2.php" method="post">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id'] ?? ''); ?>">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($registros)): ?>
                <tr>
                    <td colspan="5">No hay registros para mostrar</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
