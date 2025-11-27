<?php
// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    
    if (isset($_POST['satisfaccion'])) {
        $mensaje = "Hola $nombre, gracias por tu valoración: " . $_POST['satisfaccion'];
    } else {
        $mensaje = "Hola $nombre, por favor, elige un nivel de satisfacción.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Encuesta de Satisfacción</title>
</head>
<body>
    <?php if (isset($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
        <a href="R4_1.php">Volver a la encuesta</a><br><br>
    <?php endif; ?>
    
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        
        <label>Satisfacción:</label><br>
        <input type="radio" name="satisfaccion" value="bueno"> Bueno<br>
        <input type="radio" name="satisfaccion" value="regular"> Regular<br>
        <input type="radio" name="satisfaccion" value="malo"> Malo<br>
        <br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>