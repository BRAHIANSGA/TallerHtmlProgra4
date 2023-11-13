<?php
include("crud1.php");

$filtroGeneral = $_GET['filtro_general'] ?? '';
$registros = obtenerRegistros($filtroGeneral);
?>

<html>

<head>
    <title>Formulario y Listado</title>
</head>

<body>
    <a href="index.html">
        <button style="border: 5px solid rgb(128, 30, 0); width: 5% ;">Inicio</button>
    </a>
    <div style="border: 3px solid black; width: 50%; margin-left: 25%;">
        <form action="crud1.php" method="post">
            <!-- Radios para idioma -->
            <label for="">Idiomas</label><br>
            <input type="radio" name="idioma" value="ingles"> Inglés<br>
            <input type="radio" name="idioma" value="aleman"> Alemán<br>
            <input type="radio" name="idioma" value="frances"> Francés<br>

            <!-- Lista desplegable -->
            <label for="">Conexiones</label><br>
            <select name="conexion">
                <option value="usb">USB</option>
                <option value="paralelo">Paralelo</option>
                <option value="ps2">PS2</option>
            </select><br>

            <!-- Cuadros de texto -->
            <label for="">Datos Perosnales</label><br>
            <input type="text" name="nombre" placeholder="Nombre"><br>
            <input type="text" name="apellidos" placeholder="Apellidos"><br>

            <!-- Lista desplegable múltiple -->
            <label for="">Sexo</label><br>
            <select name="sexolistamultiple[]" multiple>
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
            </select><br>

            <!-- Checkbox -->
            <label for="">Sexo</label><br>
            <input type="checkbox" name="sexo" value="mujer"> Mujer<br>
            <input type="checkbox" name="sexo" value="hombre"> Hombre<br>

            <!-- Fecha de nacimiento -->
            <label for="">Fecha</label><br>
            <input type="date" name="fechaNacimiento"><br>

            <input type="submit" value="Enviar">
        </form>


        <form action="" method="get">
            <input type="text" name="filtro_general" placeholder="Buscar...">
            <input type="submit" value="Filtrar">
        </form>


        <!-- Tabla para mostrar los datos -->
        <table border="1">
            <thead>
                <tr>
                    <th>Idioma</th>
                    <th>Conexión</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Sexo</th>
                    <th>Fecha Nacimiento</th>
                    <th>Sexo Lista Múltiple</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($registro['Idioma'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Conexion'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Nombre'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Apellidos'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['Sexo'] ?? 'No especificado') ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['FechaNacimiento'] ?? 'No especificado'); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($registro['sexolistamultiple'] ?? 'No especificado'); ?>
                        </td>

                        <td>

                            <form action="formulario_edicion.php" method="get">
                                <input type="hidden" name="id"
                                    value="<?php echo htmlspecialchars($registro['Id'] ?? ''); ?>">
                                <input type="submit" name="editar" value="Actualizar">
                            </form>

                            <form action="crud1.php" method="post">
                                <input type="hidden" name="id"
                                    value="<?php echo htmlspecialchars($registro['Id'] ?? ''); ?>">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="submit" value="Eliminar">
                            </form>

                        </td>


                    </tr>
                <?php endforeach; ?>
                <?php if (empty($registros)): ?>
                    <tr>
                        <td colspan="7">No hay registros para mostrar</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>