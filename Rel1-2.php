<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Área</title>
</head>
<body>
    <h1>Calculadora del Área de un Triángulo</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoger los datos del formulario
        $base = $_POST['base'];
        $altura = $_POST['altura'];
        
        // Calcular el área
        $area = $base * $altura / 2;

        // Mostrar el resultado
        echo "<p>El área es: $area</p>";
    }
    ?>

    <form method="post" action="">
        <label for="base">Base:</label>
        <input type="text" name="base" id="base">
        
        <label for="altura">Altura:</label>
        <input type="text" name="altura" id="altura">
        
        <input type="submit" value="Calcular">
    </form>

</body>
</html>