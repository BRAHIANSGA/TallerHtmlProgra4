<?php

include("db.php");

// Definir función para obtener registros
function obtenerRegistros($filtroGeneral = '')
{
    global $conn;

    // Iniciar la consulta base
    $query = "SELECT * FROM formulario1";

    // Aplicar el filtro si se proporciona
    if (!empty($filtroGeneral)) {
        $filtroGeneral = $conn->real_escape_string($filtroGeneral);

        // Buscar en múltiples campos
        $query .= " WHERE Idioma LIKE '%$filtroGeneral%' 
                    OR Conexion LIKE '%$filtroGeneral%' 
                    OR Nombre LIKE '%$filtroGeneral%' 
                    OR Apellidos LIKE '%$filtroGeneral%' 
                    OR Sexo LIKE '%$filtroGeneral%'     
                    OR sexolistamultiple LIKE '%$filtroGeneral%'";
    }

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "No hay registros";
        return [];
    }
}
function eliminarRegistro($id)
{
    global $conn;

    // Preparar y ejecutar la sentencia
    $stmt = $conn->prepare("DELETE FROM formulario1 WHERE Id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Registro eliminado con éxito";
    header("Location: 1.php");
    exit();
}


function insertarRegistro($datos)
{
    global $conn;

    // Recoger y procesar los datos
    $idioma = strtoupper($datos['idioma']);
    $conexion = strtoupper($datos['conexion']);
    $nombre = strtoupper($datos['nombre']);
    $apellidos = strtoupper($datos['apellidos']);
    $sexo = isset($datos['sexo']) ? strtoupper($datos['sexo']) : null;
    $sexolistamultiple = isset($datos['sexolistamultiple']) ? $datos['sexolistamultiple'] : [];
    $sexolistamultipleStr = strtoupper(implode(',', $sexolistamultiple));
    $fechaNacimiento = $datos['fechaNacimiento'];

    // Preparar y ejecutar la sentencia
    $stmt = $conn->prepare("INSERT INTO formulario1 (Idioma, Conexion, Nombre, Apellidos, Sexo, FechaNacimiento, Sexolistamultiple) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $idioma, $conexion, $nombre, $apellidos, $sexo, $fechaNacimiento, $sexolistamultipleStr);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Registro exitoso";
    header("Location: 1.php");
    exit();
}

// Procesar el formulario si se reciben datos POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] == 'eliminar') {
        eliminarRegistro($_POST['id']);
    } else {
        insertarRegistro($_POST);
    }
}


?>