<form action="procesar.php" method="post">
    <!-- Radios para idioma -->
    <input type="radio" name="idioma" value="idiomaingles"> Inglés<br>
    <input type="radio" name="idioma" value="idiomaaleman"> Alemán<br>
    <input type="radio" name="idioma" value="idiomafrances"> Francés<br>

    <!-- Lista desplegable -->
    <select name="conexion">
        <option value="usb">USB</option>
        <option value="paralelo">Paralelo</option>
        <option value="ps2">PS2</option>
    </select><br>

    <!-- Cuadros de texto -->
    <input type="text" name="nombre" placeholder="Nombre"><br>
    <input type="text" name="apellidos" placeholder="Apellidos"><br>

    <!-- Lista desplegable múltiple -->
    <select name="sexo" multiple>
        <option value="hombre">Hombre</option>
        <option value="mujer">Mujer</option>
    </select><br>

    <!-- Checkbox -->
    <input type="checkbox" name="sexo[]" value="sexomujer"> Mujer<br>
    <input type="checkbox" name="sexo[]" value="sexohombre"> Hombre<br>

    <!-- Fecha de nacimiento -->
    <input type="date" name="fechaNacimiento"><br>

    <input type="submit" value="Enviar">
</form>
