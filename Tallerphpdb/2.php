
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller 2 Formularios HTML</title>
    <style>
        body {
            background-image: url('img/fondo.jpg');
            /* ruta  imagen */
            background-size: cover;
            /* Ajusta el tamaño de la imagen al contenedor */
            background-repeat: no-repeat;
            /* Evita que la imagen se repita */
            background-attachment: fixed;
            /* Fija la imagen de fondo al desplazarse */
            /* Otros estilos que desees aplicar al body */
            font-family: 'Montserrat';
            font-size: 18px;

        }
        button{
           
            margin-left: 6.5%;
            font-family: 'Montserrat';
            font-size: 18px;
        }
        button:hover{
            background-color: blueviolet;
        }

        form {
            width: 70%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select,
        input[type="date"] {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        select[multiple] {
            height: 80px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        .arrow {
            width: 0;
            height: 0;
            border-left: 20px solid transparent;
            border-right: 20px solid transparent;
            border-bottom: 40px solid red;
            position: absolute;
            left: 9.5%;
            top: 10%;
            animation: bounce 2s infinite;
            transform: translateX(-50%) translateY(-50%);
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateX(-50%) translateY(-50%);
            }
            50% {
                transform: translateX(-50%) translateY(-50%) translateY(-10px);
            }
        }
    </style>
</head>

<body>
    <a href="index.php">
        <button style="border: 5px solid rgb(128, 30, 0); width: 5% ;">Inicio</button>
    </a>
    <div style="border: 3px solid black; width: 50%; margin-left: 25%;">
        <div
            style="background-color: rgba(0, 0, 0, 0.877); color: white; display:flex;align-items:center;justify-content: center;flex-direction: column; margin: 3%;">
            <img src="img/logo.png" alt="logo ucp" style="width: 30%;">
            <h1 class="text-center">Taller Formularios HTML </h1>
            <hr style="width: 90%;">
            <form>
                <p>Asignatura:</p>
                <label><input type="radio" name="asignatura" value="asignaturalengua"> Lengua</label><br>
                <label><input type="radio" name="asignatura" value="asignaturamatematicas"> Matemáticas</label><br>
                <label><input type="radio" name="asignatura" value="asignaturahistoria"> Historia</label><br>
                <label><input type="radio" name="asignatura" value="asignaturageografia"> Geografía</label><br>
                
                <p>Editor de texto:</p>
                <label><input type="checkbox" name="editor" value="editornotepad"> Notepad</label><br>
                <label><input type="checkbox" name="editor" value="editoremacs"> Emacs</label><br>
                <label><input type="checkbox" name="editor" value="editorotro"> Otro</label><br>
                
                <p>Comentarios:</p>
                <textarea rows="5" cols="59" style="width: 98%;">Escriba aquí, por favor</textarea><br>
                
                <p>Procesador:</p>
                <select name="procesador">
                    <option value="amd">AMD</option>
                    <option value="intel_i5">Intel i5</option>
                    <option value="intel_i7">Intel i7</option>
                    <option value="intel_i9">Intel i9</option>
                </select><br>
                
                <input type="submit" value="Enviar">
            </form>
            <br><br>
            <div class="arrow"></div>

        </div>


    </div>

</body>

</html>