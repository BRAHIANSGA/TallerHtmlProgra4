<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operation = $_POST['operation'];

    $resultado = 0;

    if ($operation === 'suma') {
        $resultado = $numero1 + $numero2;
    } elseif ($operation === 'resta') {
        $resultado = $numero1 - $numero2;
    } elseif ($operation === 'division' && $numero2 != 0) {
        $resultado = $numero1 / $numero2;
    } elseif ($operation === 'multiplicacion') {
        $resultado = $numero1 * $numero2;
    }

    echo "Resultado: $resultado POST";
} else if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];
    $operation = $_GET['operation'];

    $resultado = 0;

    if ($operation === 'suma') {
        $resultado = $numero1 + $numero2;
    } elseif ($operation === 'resta') {
        $resultado = $numero1 - $numero2;
    } elseif ($operation === 'division' && $numero2 != 0) {
        $resultado = $numero1 / $numero2;
    } elseif ($operation === 'multiplicacion') {
        $resultado = $numero1 * $numero2;
    }

    echo "Resultado: $resultado GET";
}
?>
