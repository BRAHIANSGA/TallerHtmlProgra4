<?php
include("crud5.php"); // Asegúrate de que crud5.php incluya la función obtenerRegistros

// Capturar el valor del filtro si existe
$filtroGeneral = $_GET['filtro_general'] ?? '';
$registros = obtenerRegistros($filtroGeneral);
?>

<html>
<head>
    <title>Formulario y Listado</title>
    <!-- Aquí puedes agregar tu CSS o JavaScript si es necesario -->
</head>

<body>
    <form action="crud5.php" method="post">
        <!-- Lista desplegable múltiple -->
        <label for="">Velocidad</label><br>
        <select name="velocidad[]" multiple>
            <option value="100_mbits">100 Mbits</option>
            <option value="1000_mbits">1000 Mbits</option>
        </select><br>

        <!-- Cuadros de texto -->
        <label for="">Informacion personal</label><br>
        <input type="text" name="dni" placeholder="DNI"><br>
        <input type="text" name="nombre" placeholder="Nombre"><br>
        <input type="text" name="apellidos" placeholder="Apellidos"><br>
        <input type="text" name="email" placeholder="Email"><br>

        <!-- Control para elegir el color -->
        <label for="">Colores</label><br>
        <input type="color" name="color"><br>

        <!-- Textarea -->
        <label for="">Cometario 1</label><br>
        <textarea name="texto" rows="6" cols="49">Por favor, escriba aquí</textarea><br>

        <!-- Checkboxes -->
        <label for="">Procesadores</label><br>
        <input type="checkbox" name="procesador" value="procesadoramd"> AMD<br>
        <input type="checkbox" name="procesador" value="procesadorintel_i5"> Intel i5<br>
        <input type="checkbox" name="procesador" value="procesadorintel_i7"> Intel i7<br>
        <input type="checkbox" name="procesador" value="procesadorintel_i9"> Intel i9<br>

        <!-- Control para indicar la hora -->
        <label for="">Hora1</label><br>
        <input type="time" name="hora"><br>

        <!-- Radiobuttons -->
        <label for="">Tipos de red</label><br>
        <input type="radio" name="red" value="red2g"> 2G<br>
        <input type="radio" name="red" value="red3g"> 3G<br>
        <input type="radio" name="red" value="red4g"> 4G<br>
        <input type="radio" name="red" value="red5g"> 5G<br>

        <!-- Control para elegir ficheros -->
        <input type="file" name="fichero"><br>

        <!-- Checkboxes -->
        <label for="">Asignaturas</label><br>
        <input type="checkbox" name="asignatura" value="asignaturahistoria"> Historia<br>
        <input type="checkbox" name="asignatura" value="asignaturageografia"> Geografía<br>
        <input type="checkbox" name="asignatura" value="asignaturalengua"> Lengua<br>
        <input type="checkbox" name="asignatura" value="asignaturamatematicas"> Matemáticas<br>

        <!-- Control para indicar otra hora -->
        <label for="">Hora 2</label><br>
        <input type="time" name="otraHora"><br>

        <!-- Control para elegir otro fichero -->
        <input type="file" name="otroFichero"><br>

        <!-- Otro Textarea -->
        <label for="">Comentario 2</label><br>
        <textarea name="texto2" rows="8" cols="49">Inserte aquí el texto</textarea><br>

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
                <th>Velocidad</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Color</th>
                <th>Texto</th>
                <th>Procesador</th>
                <th>Hora</th>
                <th>Red</th>
                <th>Fichero</th>
                <th>Asignaturas</th>
                <th>Otra Hora</th>
                <th>Otro Fichero</th>
                <th>Texto2</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $registro): ?>
                <tr>
                    <!-- Mostrar datos del registro -->
                    <td><?php echo htmlspecialchars($registro['Velocidad'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['DNI'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Nombre'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Apellidos'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Email'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Color'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Texto'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Procesador'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Hora'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Red'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Fichero'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Asignaturas'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['OtraHora'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['OtroFichero'] ?? 'No especificado'); ?></td>
                    <td><?php echo htmlspecialchars($registro['Texto2'] ?? 'No especificado'); ?></td>

                    <!-- Botones de Acción -->
                    <td>
                        <form action="formulario_edicion5.php" method="get">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id'] ?? ''); ?>">
                            <input type="submit" name="editar" value="Actualizar">
                        </form>

                        <form action="crud5.php" method="post">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id'] ?? ''); ?>">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($registros)): ?>
                <tr>
                    <td colspan="15">No hay registros para mostrar</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
