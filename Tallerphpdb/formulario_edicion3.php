<?php


include("db.php"); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $ciclo = $_POST["ciclo"];
    $fecha = $_POST["fecha"];
    $texto1 = $_POST["texto1"];
    $hora = $_POST["hora"];
    $asignaturas = implode(',', $_POST["asignatura"]);
    $color = $_POST["color"];
    $texto2 = $_POST["texto2"];
    $asignaturaFavorita = $_POST["asignaturaFavorita"];
    $escritorio = $_POST["escritorio"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];


    $update_query = "UPDATE formulario3 SET 
                    Ciclo = '$ciclo',
                    Fecha = '$fecha',
                    Texto1 = '$texto1',
                    Hora = '$hora',
                    Asignaturas = '$asignaturas',
                    Color = '$color',
                    Texto2 = '$texto2',
                    AsignaturaFavorita = '$asignaturaFavorita',
                    Escritorio = '$escritorio',
                    Nombre = '$nombre',
                    Apellidos = '$apellidos',
                    Telefono = '$telefono'
                    WHERE Id = $id";


    if ($conn->query($update_query) === TRUE) {
        echo "Registro actualizado correctamente.";

        header("Location: 3.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "SELECT * FROM formulario3 WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $registro = $result->fetch_assoc();

        ?>
        <html>

        <head>
            <title>Formulario de Edición</title>
        </head>

        <body>
            <h2>Editar Registro</h2>
            <form action="" method="post">
                <!-- id oculto -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id']); ?>">

                <!-- Radiobuttons para Ciclo -->
                <input type="radio" name="ciclo" value="ciclosmir" <?php if (isset($registro['Ciclo']) && $registro['Ciclo'] == 'ciclosmir') echo 'checked'; ?>> SMIR<br>
                <input type="radio" name="ciclo" value="cicloasir" <?php if (isset($registro['Ciclo']) && $registro['Ciclo'] == 'cicloasir') echo 'checked'; ?>> ASIR<br>
                <input type="radio" name="ciclo" value="ciclodam" <?php if (isset($registro['Ciclo']) && $registro['Ciclo'] == 'ciclodam') echo 'checked'; ?>> DAM<br>
                <input type="radio" name="ciclo" value="ciclodaw" <?php if (isset($registro['Ciclo']) && $registro['Ciclo'] == 'ciclodaw') echo 'checked'; ?>> DAW<br>

                <!-- Control para indicar la fecha -->
                <input type="date" name="fecha" value="<?php echo isset($registro['Fecha']) ? htmlspecialchars($registro['Fecha']) : ''; ?>"><br>

                <!-- Textarea -->
                <textarea name="texto1" rows="8" cols="57"><?php echo isset($registro['Texto1']) ? htmlspecialchars($registro['Texto1']) : ''; ?></textarea><br>

                <!-- Control para indicar la hora -->
                <input type="time" name="hora" value="<?php echo isset($registro['Hora']) ? htmlspecialchars($registro['Hora']) : ''; ?>"><br>

                <!-- Checkboxes para Asignaturas -->

                <input type="checkbox" name="asignatura[]" value="asignaturageografia" <?php if (isset($registro['Asignaturas']) && in_array('asignaturageografia', explode(',', $registro['Asignaturas']))) echo 'checked'; ?>> Geografía<br>
                <input type="checkbox" name="asignatura[]" value="asignaturalengua" <?php if (isset($registro['Asignaturas']) && in_array('asignaturalengua', explode(',', $registro['Asignaturas']))) echo 'checked'; ?>> Lengua<br>
                <input type="checkbox" name="asignatura[]" value="asignaturamatematicas" <?php if (isset($registro['Asignaturas']) && in_array('asignaturamatematicas', explode(',', $registro['Asignaturas']))) echo 'checked'; ?>> Matemáticas<br>
                <input type="checkbox" name="asignatura[]" value="asignaturahistoria" <?php if (isset($registro['Asignaturas']) && in_array('asignaturahistoria', explode(',', $registro['Asignaturas']))) echo 'checked'; ?>> Historia<br>

                <!-- Control para elegir el color -->
                <input type="color" name="color" value="<?php echo isset($registro['Color']) ? htmlspecialchars($registro['Color']) : ''; ?>"><br>

                <!-- Textarea -->
                <textarea name="texto2" rows="8" cols="57"><?php echo isset($registro['Texto2']) ? htmlspecialchars($registro['Texto2']) : ''; ?></textarea><br>

                <!-- Lista desplegable múltiple para Escritorio -->
                <select name="escritorio[]" multiple>
                    <option value="kde" <?php if (isset($registro['Escritorio']) && in_array('kde', explode(',', $registro['Escritorio']))) echo 'selected'; ?>>KDE</option>
                    <option value="gnome" <?php if (isset($registro['Escritorio']) && in_array('gnome', explode(',', $registro['Escritorio']))) echo 'selected'; ?>>GNOME</option>
                    <option value="unity" <?php if (isset($registro['Escritorio']) && in_array('unity', explode(',', $registro['Escritorio']))) echo 'selected'; ?>>Unity</option>
                </select><br>

                <!-- Cuadros de texto -->
                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo isset($registro['Nombre']) ? htmlspecialchars($registro['Nombre']) : ''; ?>"><br>
                <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo isset($registro['Apellidos']) ? htmlspecialchars($registro['Apellidos']) : ''; ?>"><br>
                <input type="text" name="telefono" placeholder="Telefono" value="<?php echo isset($registro['Telefono']) ? htmlspecialchars($registro['Telefono']) : ''; ?>"><br>

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
