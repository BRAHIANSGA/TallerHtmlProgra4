
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

        a {
            color: green;
        }

        a:hover {
            color: blueviolet;
        }

        ul {
            display: flex;

        }
    </style>
</head>

<body>

    <div style="border: 2px solid black; width: 50%; margin-left: 25%;">
        <div
            style="background-color: rgba(0, 0, 0, 0.877); color: white; display:flex;align-items:center;justify-content: center;flex-direction: column; margin: 3%;">
            <br>
            <img src="img/logo.png" alt="logo ucp" style="width: 30%;">
            <h1 class="text-center">Taller Formularios HTML </h1>
            <br>
            <h2>Presentado por:</h2>
            <p><strong id="student">Brahian Stiven Gil Arias</strong><br>
                <em id="student">Cc: 1007577760</em><br>
                <em id="student">Ingenieria en Sistemas y Telecomunicaciones</em><br>
                <strong id="student">Universidad Católica de pereira </strong><br>
                Pereira <br>
                21/08/2023
            </p>
            <div>
                <ul>
                    <a href="1.php">
                        <li
                            style="border: 4px solid white; padding: 1%; display: flex;justify-content: center; text-align: center;">
                            Formulario 1
                        </li>
                        <a href="2.php">
                            <li
                                style="border: 4px solid white; padding: 1%; display: flex;justify-content: center; text-align: center;">
                                Formulario 2
                            </li>
                        </a>
                        <a href="3.php">
                            <li
                                style="border: 4px solid white; padding: 1%; display: flex;justify-content: center; text-align: center;">
                                Formulario 3
                            </li>
                        </a>
                        <a href="4.php">
                            <li
                                style="border: 4px solid white; padding: 1%; display: flex;justify-content: center; text-align: center;">
                                Formulario 4
                            </li>
                        </a>
                        <a href="5.php">
                            <li
                                style="border: 4px solid white; padding: 1%; display: flex;justify-content: center; text-align: center;">
                                Formulario 5
                            </li>
                        </a>


                </ul>
            </div>





        </div>


    </div>

</body>

</html>