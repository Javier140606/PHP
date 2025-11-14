<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Peso con Formulario</title>
</head>
<body>
    <h1>Calculadora de Peso</h1>

    <?php
    // Definir constante de gravedad
    define("GRAVEDAD", 9.8);

    // Inicializar variables
    $masa = '';
    $peso = '';
    $mostrar_resultado = false;

    // Verificar si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoger la masa del formulario
        $masa = $_POST['masa'];
        
        // Calcular el peso
        $peso = $masa * GRAVEDAD;
        $mostrar_resultado = true;
    }
    ?>

    <!-- Formulario para ingresar la masa -->
    <form method="post" action="">
        <label for="masa">Masa del objeto (kg):</label><br>
        <input type="number" name="masa" id="masa" value="<?php echo $masa; ?>" step="0.1"><br><br>
        
        <input type="submit" value="Calcular Peso">
    </form>

    <?php
    // Mostrar resultado si se calculó
    if ($mostrar_resultado) {
        echo "<h2>Resultado:</h2>";
        echo "<p>Un objeto de " . $masa . " kg tiene un peso de " . $peso . " newtons</p>";
    }
    ?>

</body>
</html>