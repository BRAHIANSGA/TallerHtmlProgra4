<?php
include("db.php");


function obtenerRegistros($filtroGeneral = '')
{
    global $conn;


    $query = "SELECT * FROM formulario4";

    if (!empty($filtroGeneral)) {
        $filtroGeneral = $conn->real_escape_string($filtroGeneral);

  
        $query .= " WHERE Texto LIKE '%$filtroGeneral%' 
                    OR Fecha LIKE '%$filtroGeneral%' 
                    OR Color LIKE '%$filtroGeneral%' 
                    OR Conectores LIKE '%$filtroGeneral%' 
                    OR Aula LIKE '%$filtroGeneral%' 
                    OR Nombre LIKE '%$filtroGeneral%' 
                    OR Apellidos LIKE '%$filtroGeneral%' 
                    OR Direccion LIKE '%$filtroGeneral%'";
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


    $stmt = $conn->prepare("DELETE FROM formulario4 WHERE Id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Registro eliminado con éxito";
    header("Location: 4.php");
    exit();
}

function insertarRegistro($datos)
{
    global $conn;

    // Recoger y procesar los datos
    $texto = $datos['texto'];
    $fecha = $datos['fecha'];
    $color = $datos['color'];
    $conectores = implode(',', $datos['conector'] ?? []);
    $aula = $datos['aula'];
    $archivo = $datos['archivo']; 
    $nombre = $datos['nombre'];
    $apellidos = $datos['apellidos'];
    $direccion = $datos['direccion'];

    // Preparar y ejecutar la sentencia
    $stmt = $conn->prepare("INSERT INTO formulario4 (Texto, Fecha, Color, Conectores, Aula, Archivos, Nombre, Apellidos, Direccion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $texto, $fecha, $color, $conectores, $aula, $archivo, $nombre, $apellidos, $direccion);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Registro exitoso";
    header("Location: 4.php"); 
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] == 'eliminar') {
        eliminarRegistro($_POST['id']);
    } else {
        insertarRegistro($_POST);
    }
}
?>
