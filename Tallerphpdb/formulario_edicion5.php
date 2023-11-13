<?php
// Archivo: formulario_editar.php
include("db.php"); // Incluye tu archivo de conexión a la base de datos

// Procesar actualización si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $velocidad = implode(',', $_POST["velocidad"] ?? []);
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $color = $_POST["color"];
    $texto = $_POST["texto"];
    $procesador = implode(',', $_POST["procesador"] ?? []);
    $hora = $_POST["hora"];
    $red = $_POST["red"];
    $fichero = $_POST["fichero"];
    $asignaturas = implode(',', $_POST["asignatura"] ?? []);
    $otraHora = $_POST["otraHora"];
    $otroFichero = $_POST["otroFichero"];
    $texto2 = $_POST["texto2"];

    // Consulta SQL para actualizar el registro
    $update_query = "UPDATE formulario5 SET 
                    Velocidad = '$velocidad',
                    DNI = '$dni',
                    Nombre = '$nombre',
                    Apellidos = '$apellidos',
                    Email = '$email',
                    Color = '$color',
                    Texto = '$texto',
                    Procesador = '$procesador',
                    Hora = '$hora',
                    Red = '$red',
                    Fichero = '$fichero',
                    Asignaturas = '$asignaturas',
                    OtraHora = '$otraHora',
                    OtroFichero = '$otroFichero',
                    Texto2 = '$texto2'
                    WHERE Id = $id";

    // Ejecutar la consulta de actualización
    if ($conn->query($update_query) === TRUE) {
        echo "Registro actualizado correctamente.";
        header("Location: 5.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

// Verificar si se proporcionó un ID en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Realizar la consulta a la base de datos
    $query = "SELECT * FROM formulario5 WHERE Id = $id";
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

                <!-- Lista desplegable múltiple para Velocidad -->
                <select name="velocidad[]" multiple>
                    <option value="100_mbits" <?php if (in_array('100_mbits', explode(',', $registro['Velocidad']))) echo 'selected'; ?>>100 Mbits</option>
                    <option value="1000_mbits" <?php if (in_array('1000_mbits', explode(',', $registro['Velocidad']))) echo 'selected'; ?>>1000 Mbits</option>
                </select><br>

                <!-- Cuadros de texto para DNI, Nombre, Apellidos, Email -->
                <input type="text" name="dni" value="<?php echo htmlspecialchars($registro['DNI']); ?>" placeholder="DNI"><br>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($registro['Nombre']); ?>" placeholder="Nombre"><br>
                <input type="text" name="apellidos" value="<?php echo htmlspecialchars($registro['Apellidos']); ?>" placeholder="Apellidos"><br>
                <input type="text" name="email" value="<?php echo htmlspecialchars($registro['Email']); ?>" placeholder="Email"><br>

                <!-- Control para elegir el color -->
                <input type="color" name="color" value="<?php echo htmlspecialchars($registro['Color']); ?>"><br>

                <!-- Textarea -->
                <textarea name="texto" rows="6" cols="49"><?php echo htmlspecialchars($registro['Texto']); ?></textarea><br>

                <!-- Checkboxes para Procesador -->
                <input type="checkbox" name="procesador[]" value="procesadoramd" <?php if (in_array('procesadoramd', explode(',', $registro['Procesador']))) echo 'checked'; ?>> AMD<br>
                <input type="checkbox" name="procesador[]" value="procesadorintel_i5" <?php if (in_array('procesadorintel_i5', explode(',', $registro['Procesador']))) echo 'checked'; ?>> Intel i5<br>
                <input type="checkbox" name="procesador[]" value="procesadorintel_i7" <?php if (in_array('procesadorintel_i7', explode(',', $registro['Procesador']))) echo 'checked'; ?>> Intel i7<br>
                <input type="checkbox" name="procesador[]" value="procesadorintel_i9" <?php if (in_array('procesadorintel_i9', explode(',', $registro['Procesador']))) echo 'checked'; ?>> Intel i9<br>

                <!-- Control para indicar la hora -->
                <input type="time" name="hora" value="<?php echo htmlspecialchars($registro['Hora']); ?>"><br>

                <!-- Radiobuttons para Red -->
                <input type="radio" name="red" value="red2g" <?php if ($registro['Red'] == 'red2g') echo 'checked'; ?>> 2G<br>
                <input type="radio" name="red" value="red3g" <?php if ($registro['Red'] == 'red3g') echo 'checked'; ?>> 3G<br>
                <input type="radio" name="red" value="red4g" <?php if ($registro['Red'] == 'red4g') echo 'checked'; ?>> 4G<br>
                <input type="radio" name="red" value="red5g" <?php if ($registro['Red'] == 'red5g') echo 'checked'; ?>> 5G<br>

                <!-- Control para elegir ficheros -->
                <input type="file" name="fichero" value="<?php echo htmlspecialchars($registro['Fichero']); ?>"><br>

                <!-- Checkboxes para Asignaturas -->
                <input type="checkbox" name="asignatura[]" value="asignaturahistoria" <?php if (in_array('asignaturahistoria', explode(',', $registro['Asignaturas']))) echo 'checked'; ?>> Historia<br>
                <input type="checkbox" name="asignatura[]" value="asignaturageografia" <?php if (in_array('asignaturageografia', explode(',', $registro['Asignaturas']))) echo 'checked'; ?>> Geografía<br>
                <input type="checkbox" name="asignatura[]" value="asignaturalengua" <?php if (in_array('asignaturalengua', explode(',', $registro['Asignaturas']))) echo 'checked'; ?>> Lengua<br>
                <input type="checkbox" name="asignatura[]" value="asignaturamatematicas" <?php if (in_array('asignaturamatematicas', explode(',', $registro['Asignaturas']))) echo 'checked'; ?>> Matemáticas<br>

                <!-- Otro control para indicar la hora -->
                <input type="time" name="otraHora" value="<?php echo htmlspecialchars($registro['OtraHora']); ?>"><br>

                <!-- Otro control para elegir ficheros -->
                <input type="file" name="otroFichero" value="<?php echo htmlspecialchars($registro['OtroFichero']); ?>"><br>

                <!-- Otro Textarea -->
                <textarea name="texto2" rows="8" cols="49"><?php echo htmlspecialchars($registro['Texto2']); ?></textarea><br>

                <input type="submit" value="Actualizar">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Registro no encontrado.";
    }
    $conn->close();
} else {
    echo "ID no proporcionado.";
}
?>
