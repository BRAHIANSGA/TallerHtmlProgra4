<?php


include("db.php"); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $texto = $_POST["texto"];
    $fecha = $_POST["fecha"];
    $color = $_POST["color"];
    $conectores = implode(',', $_POST["conector"] ?? []);
    $aula = $_POST["aula"];
    $archivo = $_POST["archivo"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];

    $update_query = "UPDATE formulario4 SET 
                    Texto = '$texto',
                    Fecha = '$fecha',
                    Color = '$color',
                    Conectores = '$conectores',
                    Aula = '$aula',
                    Archivos = '$archivo',
                    Nombre = '$nombre',
                    Apellidos = '$apellidos',
                    Direccion = '$direccion'
                    WHERE Id = $id";


    if ($conn->query($update_query) === TRUE) {
        echo "Registro actualizado correctamente.";
        header("Location: 4.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "SELECT * FROM formulario4 WHERE Id = $id";
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
                <!-- id coulto para actualizra base de datos  -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id']); ?>">

                <!-- Textarea -->
                <textarea name="texto" rows="4" cols="52"><?php echo htmlspecialchars($registro['Texto']); ?></textarea><br>

                <!-- Fecha -->
                <input type="date" name="fecha" value="<?php echo htmlspecialchars($registro['Fecha']); ?>"><br>

                <!-- Color -->
                <input type="color" name="color" value="<?php echo htmlspecialchars($registro['Color']); ?>"><br>

                <!-- Checkboxes -->
                <?php
                $conectores = explode(',', $registro['Conectores']);
                ?>
                <input type="checkbox" name="conector[]" value="conectorusb" <?php if (in_array('conectorusb', $conectores)) echo 'checked'; ?>> USB<br>
                <input type="checkbox" name="conector[]" value="conectorparalelo" <?php if (in_array('conectorparalelo', $conectores)) echo 'checked'; ?>> Paralelo<br>
                <input type="checkbox" name="conector[]" value="conectorps2" <?php if (in_array('conectorps2', $conectores)) echo 'checked'; ?>> PS2<br>

                <!-- Lista desplegable -->
                <select name="aula">
                    <option value="a01" <?php if ($registro['Aula'] == 'a01') echo 'selected'; ?>>A01</option>
                    <option value="a02" <?php if ($registro['Aula'] == 'a02') echo 'selected'; ?>>A02</option>
                    <option value="a03" <?php if ($registro['Aula'] == 'a03') echo 'selected'; ?>>A03</option>
                </select><br>

                <!-- Archivo  -->
                <input type="file" name="archivo"><br>

                <!-- Cuadros de texto -->
                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($registro['Nombre']); ?>"><br>
                <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo htmlspecialchars($registro['Apellidos']); ?>"><br>
                <input type="text" name="direccion" placeholder="Dirección" value="<?php echo htmlspecialchars($registro['Direccion']); ?>"><br>

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
