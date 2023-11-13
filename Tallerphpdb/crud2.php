<?php
include("db.php");

// Definir función para obtener registros
function obtenerRegistros($filtroGeneral = '')
{
    global $conn;

    // Iniciar la consulta base
    $query = "SELECT * FROM formulario2"; // Cambiado a formulario2

    // Aplicar el filtro si se proporciona
    if (!empty($filtroGeneral)) {
        $filtroGeneral = $conn->real_escape_string($filtroGeneral);

        // Buscar en múltiples campos
        $query .= " WHERE Asignatura LIKE '%$filtroGeneral%' 
                    OR EditorDeTexto LIKE '%$filtroGeneral%' 
                    OR Comentarios LIKE '%$filtroGeneral%' 
                    OR Procesador LIKE '%$filtroGeneral%'";
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
    $stmt = $conn->prepare("DELETE FROM formulario2 WHERE Id = ?"); // Cambiado a formulario2
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Registro eliminado con éxito";
    header("Location: 2.php"); // Asegúrate de que esta redirección sea correcta
    exit();
}

function insertarRegistro($datos)
{
    global $conn;

    // Recoger y procesar los datos
    $asignatura = strtoupper($datos['asignatura']);
    $editorDeTexto = isset($datos['editor']) ? strtoupper(implode(',', $datos['editor'])) : ''; // Cambio para manejar array
    $comentarios = $datos['comentarios'];
    $procesador = strtoupper($datos['procesador']);

    // Preparar y ejecutar la sentencia
    $stmt = $conn->prepare("INSERT INTO formulario2 (Asignatura, EditorDeTexto, Comentarios, Procesador) VALUES (?, ?, ?, ?)"); // Cambiado a formulario2
    $stmt->bind_param("ssss", $asignatura, $editorDeTexto, $comentarios, $procesador);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Registro exitoso";
    header("Location: 2.php"); // Asegúrate de que esta redirección sea correcta
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