<?php

include("db.php");


function obtenerRegistros($filtroGeneral = '')
{
    global $conn;


    $query = "SELECT * FROM formulario5";


    if (!empty($filtroGeneral)) {
        $filtroGeneral = $conn->real_escape_string($filtroGeneral);

  
        $query .= " WHERE DNI LIKE '%$filtroGeneral%' 
                OR Nombre LIKE '%$filtroGeneral%' 
                OR Apellidos LIKE '%$filtroGeneral%' 
                OR Email LIKE '%$filtroGeneral%'
                OR Velocidad LIKE '%$filtroGeneral%'
                OR Color LIKE '%$filtroGeneral%'
                OR Texto LIKE '%$filtroGeneral%'
                OR Procesador LIKE '%$filtroGeneral%'
                OR Red LIKE '%$filtroGeneral%'
                OR Fichero LIKE '%$filtroGeneral%'
                OR Asignaturas LIKE '%$filtroGeneral%'
                OR OtroFichero LIKE '%$filtroGeneral%'
                OR Texto2 LIKE '%$filtroGeneral%'";
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


    $stmt = $conn->prepare("DELETE FROM formulario5 WHERE Id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Registro eliminado con éxito";
    header("Location: 5.php");
    exit();
}


function insertarRegistro($datos)
{
    global $conn;

    // Recoger y procesar los datos
    $velocidadStr = implode(',', $datos['velocidad']);
    $dni = $datos['dni'];
    $nombre = $datos['nombre'];
    $apellidos = $datos['apellidos'];
    $email = $datos['email'];
    $color = $datos['color'];
    $texto = $datos['texto'];
    $procesador = $datos['procesador'] ?? null;
    $hora = $datos['hora'];
    $red = $datos['red'] ?? null;
    $fichero = $datos['fichero'] ?? null;
    $asignaturasStr = implode(',', $datos['asignatura'] ?? []);
    $otraHora = $datos['otraHora'] ?? null;
    $otroFichero = $datos['otroFichero'] ?? null;
    $texto2 = $datos['texto2'];

    // Preparar y ejecutar la sentencia
    $stmt = $conn->prepare("INSERT INTO formulario5 (Velocidad, DNI, Nombre, Apellidos, Email, Color, Texto, Procesador, Hora, Red, Fichero, Asignaturas, OtraHora, OtroFichero, Texto2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssss", $velocidadStr, $dni, $nombre, $apellidos, $email, $color, $texto, $procesador, $hora, $red, $fichero, $asignaturasStr, $otraHora, $otroFichero, $texto2);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Registro exitoso";
    header("Location: 5.php");
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