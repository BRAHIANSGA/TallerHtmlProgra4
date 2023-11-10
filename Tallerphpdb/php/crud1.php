<?php
// Inicio del bloque PHP

// Incluye el archivo de configuración de la base de datos
include("../php/db.php");

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $idioma = $_POST["idioma"];
    $conexion = $_POST["conexion"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $sexo = implode(", ", $_POST["sexo"]); // Si es un array, conviértelo en una cadena
    $fechaNacimiento = $_POST["fecha"];

    // Prepara la consulta SQL para la inserción
    $query = "INSERT INTO formulario1 (Idioma, Conexion, Nombre, Apellidos, Sexo, FechaNacimiento) VALUES ('$idioma', '$conexion', '$nombre', '$apellidos', '$sexo', '$fechaNacimiento')";

    // Ejecuta la consulta
    $result = mysqli_query($conexion, $query);

    // Verifica si la inserción fue exitosa
    if ($result) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
}
?>