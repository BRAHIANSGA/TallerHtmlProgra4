<?php

include("db.php");


function obtenerRegistros($filtroGeneral = '')
{
    global $conn;


    $query = "SELECT * FROM formulario3";

  
    if (!empty($filtroGeneral)) {
        $filtroGeneral = $conn->real_escape_string($filtroGeneral);

     
        $query .= " WHERE Ciclo LIKE '%$filtroGeneral%' 
                    OR Fecha LIKE '%$filtroGeneral%' 
                    OR Texto1 LIKE '%$filtroGeneral%' 
                    OR Hora LIKE '%$filtroGeneral%'
                    OR Asignaturas LIKE '%$filtroGeneral%'
                    OR Color LIKE '%$filtroGeneral%'
                    OR Texto2 LIKE '%$filtroGeneral%'
                    OR AsignaturaFavorita LIKE '%$filtroGeneral%'
                    OR Escritorio LIKE '%$filtroGeneral%'
                    OR Nombre LIKE '%$filtroGeneral%'
                    OR Apellidos LIKE '%$filtroGeneral%'
                    OR Telefono LIKE '%$filtroGeneral%'";
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

 
    $stmt = $conn->prepare("DELETE FROM formulario3 WHERE Id = ?"); 
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Registro eliminado con éxito";

    header("Location: 3.php");
    exit();
}

function insertarRegistro($datos)
{
    global $conn;

    // Recoger y procesar los datos para los nuevos campos
    $ciclo = strtoupper($datos['ciclo']);
    $fecha = $datos['fecha'];
    $texto1 = $datos['texto1'];
    $hora = $datos['hora'];
    $asignaturas = isset($datos['asignatura']) ? strtoupper(implode(',', $datos['asignatura'])) : '';
    $color = $datos['color'];
    $texto2 = $datos['texto2'];
    $escritorio = isset($datos['escritorio']) ? strtoupper(implode(',', $datos['escritorio'])) : '';
    $nombre = strtoupper($datos['nombre']);
    $apellidos = strtoupper($datos['apellidos']);
    $telefono = $datos['telefono'];

    // Preparar y ejecutar la sentencia
    $stmt = $conn->prepare("INSERT INTO formulario3 (Ciclo, Fecha, Texto1, Hora, Asignaturas, Color, Texto2, Escritorio, Nombre, Apellidos, Telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $ciclo, $fecha, $texto1, $hora, $asignaturas, $color, $texto2, $escritorio, $nombre, $apellidos, $telefono);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Registro exitoso";
    header("Location: 3.php");
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
