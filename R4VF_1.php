<?php
$errores = [];
$nombre = "";

if ($_POST) {
    $nombre = trim($_POST['nombre']);
    
    if (empty($nombre)) {
        $errores['nombre'] = "El nombre es obligatorio";
    } elseif (strlen($nombre) < 3) {
        $errores['nombre'] = "Mínimo 3 caracteres";
    }
    
    if (empty($errores)) {
        echo "¡Formulario correcto! Bienvenido $nombre";
        $nombre = "";
    }
}
?>

<form method="post">
    <p>Nombre: 
        <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        <?php if (isset($errores['nombre'])) echo $errores['nombre']; ?>
    </p>
    
    <input type="submit" value="Enviar">
</form>