<?php
// Archivo: formulario_editar.php

include("db.php"); // Incluye tu archivo de conexión a la base de datos

// Procesar actualización si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $asignatura = $_POST["asignatura"];
    $editorDeTexto = implode(',', $_POST["editor"]); // Maneja múltiples selecciones
    $comentarios = $_POST["comentarios"];
    $procesador = $_POST["procesador"];

    // Consulta SQL para actualizar el registro
    $update_query = "UPDATE formulario2 SET 
                    Asignatura = '$asignatura',
                    EditorDeTexto = '$editorDeTexto',
                    Comentarios = '$comentarios',
                    Procesador = '$procesador'
                    WHERE Id = $id";

    // Ejecutar la consulta de actualización
    if ($conn->query($update_query) === TRUE) {
        echo "Registro actualizado correctamente.";
        // Otra opción es redirigir después de la actualización
        header("Location: 2.php"); // Asegúrate de que esta redirección sea correcta
        exit();
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

// Verificar si se proporcionó un ID en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Realizar la consulta a la base de datos
    $query = "SELECT * FROM formulario2 WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $registro = $result->fetch_assoc();
        ?>
        <html>

        <head>
            <title>Formulario de Edición</title>
            <!-- Aquí puedes agregar tu CSS o JavaScript si es necesario -->
        </head>

        <body>
            <h2>Editar Registro</h2>
            <form action="" method="post">
                <!-- Hidden input para enviar el ID en el formulario -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id']); ?>">

                <!-- Radios para asignatura -->
                <input type="radio" name="asignatura" value="asignaturalengua" <?php if (isset($registro['Asignatura']) && $registro['Asignatura'] == 'asignaturalengua') echo 'checked'; ?>> Lengua<br>
                <input type="radio" name="asignatura" value="asignaturamatematicas" <?php if (isset($registro['Asignatura']) && $registro['Asignatura'] == 'asignaturamatematicas') echo 'checked'; ?>> Matemáticas<br>
                <input type="radio" name="asignatura" value="asignaturahistoria" <?php if (isset($registro['Asignatura']) && $registro['Asignatura'] == 'asignaturahistoria') echo 'checked'; ?>> Historia<br>
                <input type="radio" name="asignatura" value="asignaturageografia" <?php if (isset($registro['Asignatura']) && $registro['Asignatura'] == 'asignaturageografia') echo 'checked'; ?>> Geografía<br>

                <!-- Checkboxes para editor de texto -->
                <?php $editoresSeleccionados = explode(',', $registro['EditorDeTexto']); ?>
                <input type="checkbox" name="editor[]" value="editornotepad" <?php if (in_array('editornotepad', $editoresSeleccionados)) echo 'checked'; ?>> Notepad<br>
                <input type="checkbox" name="editor[]" value="editoremacs" <?php if (in_array('editoremacs', $editoresSeleccionados)) echo 'checked'; ?>> Emacs<br>
                <input type="checkbox" name="editor[]" value="editorotro" <?php if (in_array('editorotro', $editoresSeleccionados)) echo 'checked'; ?>> Otro<br>

                <!-- Textarea para comentarios -->
                <textarea name="comentarios" rows="5" cols="59"><?php echo htmlspecialchars($registro['Comentarios']); ?></textarea><br>

                <!-- Lista desplegable para procesador -->
                <select name="procesador">
                    <option value="amd" <?php if (isset($registro['Procesador']) && $registro['Procesador'] == 'amd') echo 'selected'; ?>>AMD</option>
                    <option value="intel_i5" <?php if (isset($registro['Procesador']) && $registro['Procesador'] == 'intel_i5') echo 'selected'; ?>>Intel i5</option>
                    <option value="intel_i7" <?php if (isset($registro['Procesador']) && $registro['Procesador'] == 'intel_i7') echo 'selected'; ?>>Intel i7</option>
                    <option value="intel_i9" <?php if (isset($registro['Procesador']) && $registro['Procesador'] == 'intel_i9') echo 'selected'; ?>>Intel i9</option>
                </select><br>

                <input type="submit" value="Actualizar">
            </form>
        </body>

        </html>
        <?php
    } else {
        echo "Registro no encontrado.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "ID no proporcionado.";
}
?>
