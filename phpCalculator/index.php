<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>
<form action="calculadora.php" method="" id="calculator-form">
        <label for="Num1">Numero1</label><br>
        <input type="number" name="numero1"><br>
        <label for="Num2">Numero2</label><br>
        <input type="number" name="numero2"><br><br>
        <select  name="operation" id="drawfs">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="divicion">Divición</option>
            <option value="multiplicacion">Multiplicación</option>
        </select>
        <br>


        <select name="method" id="method">
            <option value="post">POST</option>
            <option value="get">GET</option>
        </select>
        <button type="submit">Calcular</button>
    </form>


    <script>
        document.getElementById("calculator-form").addEventListener("submit", function(event) {
            const methodSelect = document.getElementById("method");
            const selectedMethod = methodSelect.options[methodSelect.selectedIndex].value;
            this.method = selectedMethod;
        });
    </script>
</body>

</html>