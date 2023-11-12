<?php

include("../php/db.php");

// Recoger datos del formulario
$idioma = $_POST['idioma'];
$conexion = $_POST['conexion'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$sexo = implode(',', $_POST['sexo']); // Esto concatena los valores de los checkbox
$fechaNacimiento = $_POST['fechaNacimiento'];

// Preparar y ejecutar sentencia
$stmt = $conn->prepare("INSERT INTO formulario1 (Idioma, Conexion, Nombre, Apellidos, Sexo, FechaNacimiento) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $idioma, $conexion, $nombre, $apellidos, $sexo, $fechaNacimiento);

$stmt->execute();

echo "Registro exitoso";

$stmt->close();
$conn->close();
?>
?>