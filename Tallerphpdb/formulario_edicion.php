<?php


include("db.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $id = $_POST["id"];
    $idioma = strtoupper($_POST["idioma"]);
    $conexion = strtoupper($_POST["conexion"]);
    $nombre = strtoupper($_POST["nombre"]);
    $apellidos = strtoupper($_POST["apellidos"]);
    $sexolistamultiple = implode(',', array_map('strtoupper', $_POST["sexolistamultiple"]));
    $sexo = isset($_POST["sexo"]) ? strtoupper($_POST["sexo"]) : '';
    $fechaNacimiento = $_POST["fechaNacimiento"];

 
    $update_query = "UPDATE formulario1 SET 
                    Idioma = '$idioma',
                    Conexion = '$conexion',
                    Nombre = '$nombre',
                    Apellidos = '$apellidos',
                    sexolistamultiple = '$sexolistamultiple',
                    Sexo = '$sexo',
                    FechaNacimiento = '$fechaNacimiento'
                    WHERE Id = $id";

    
    if ($conn->query($update_query) === TRUE) {
        echo "Registro actualizado correctamente.";

         header("Location: 1.php");
         exit();
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "SELECT * FROM formulario1 WHERE id = $id";
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

                <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id']); ?>">

                <!-- Radios para idioma -->
                <input type="radio" name="idioma" value="INGLES" <?php if (isset($registro['Idioma']) && $registro['Idioma'] == 'INGLES')
                    echo 'checked'; ?>> Inglés<br>
                <input type="radio" name="idioma" value="ALEMAN" <?php if (isset($registro['Idioma']) && $registro['Idioma'] == 'ALEMAN')
                    echo 'checked'; ?>> Alemán<br>
                <input type="radio" name="idioma" value="FRANCES" <?php if (isset($registro['Idioma']) && $registro['Idioma'] == 'FRANCES')
                    echo 'checked'; ?>> Francés<br>

                <!-- Lista desplegable -->
                <select name="conexion">
                    <option value="USB" <?php if (isset($registro['Conexion']) && $registro['Conexion'] == 'USB')
                        echo 'selected'; ?>>USB</option>
                    <option value="PARALELO" <?php if (isset($registro['Conexion']) && $registro['Conexion'] == 'PARALELO')
                        echo 'selected'; ?>>Paralelo</option>
                    <option value="PS2" <?php if (isset($registro['Conexion']) && $registro['Conexion'] == 'PS2')
                        echo 'selected'; ?>>PS2</option>
                </select><br>

                <!-- Cuadros de texto -->
                <input type="text" name="nombre" placeholder="Nombre"
                    value="<?php echo isset($registro['Nombre']) ? htmlspecialchars($registro['Nombre']) : ''; ?>"><br>
                <input type="text" name="apellidos" placeholder="Apellidos"
                    value="<?php echo isset($registro['Apellidos']) ? htmlspecialchars($registro['Apellidos']) : ''; ?>"><br>

                <!-- Lista desplegable múltiple-->
                <select name="sexolistamultiple[]" multiple>
                    <option value="HOMBRE" <?php if (isset($registro['sexolistamultiple']) && in_array('HOMBRE', explode(',', $registro['sexolistamultiple'])))
                        echo 'selected'; ?>>Hombre</option>
                    <option value="MUJER" <?php if (isset($registro['sexolistamultiple']) && in_array('MUJER', explode(',', $registro['sexolistamultiple'])))
                        echo 'selected'; ?>>Mujer</option>
                </select><br>

                <!-- Checkbox  -->
                <input type="checkbox" name="sexo" value="MUJER" <?php if (isset($registro['Sexo']) && $registro['Sexo'] == 'MUJER')
                    echo 'checked'; ?>> Mujer<br>
                <input type="checkbox" name="sexo" value="HOMBRE" <?php if (isset($registro['Sexo']) && $registro['Sexo'] == 'HOMBRE')
                    echo 'checked'; ?>> Hombre<br>

                <!-- Fecha de nacimiento -->
                <input type="date" name="fechaNacimiento"
                    value="<?php echo isset($registro['FechaNacimiento']) ? htmlspecialchars($registro['FechaNacimiento']) : ''; ?>"><br>

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