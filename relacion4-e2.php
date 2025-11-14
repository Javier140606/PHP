<?php
// =============================================================================
// 1. PREPARACIÓN (Arriba del todo)
// =============================================================================

// Variables para almacenar los datos saneados
$nombre = $email = $password = $telefono = $edad = '';

// Array para guardar errores
$errores = [];

// =============================================================================
// 2. DETECCIÓN DE ENVÍO
// =============================================================================

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // =========================================================================
    // 3. PROCESO DE VALIDACIÓN (Dentro del if)
    // =========================================================================

    // --------------------------
    // Nombre
    // --------------------------
    if (empty($_POST['nombre'])) {
        $errores['nombre'] = "El nombre es obligatorio.";
    } else {
        $nombre = trim($_POST['nombre']);
        // Validar longitud y caracteres permitidos (letras y espacios)
        if (mb_strlen($nombre) < 3 || mb_strlen($nombre) > 50) {
            $errores['nombre'] = "El nombre debe tener entre 3 y 50 caracteres.";
        } elseif (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nombre)) {
            $errores['nombre'] = "Solo se permiten letras y espacios.";
        }
    }

    // --------------------------
    // Correo Electrónico
    // --------------------------
    if (empty($_POST['email'])) {
        $errores['email'] = "El correo electrónico es obligatorio.";
    } else {
        $email = trim($_POST['email']);
        // Validar formato de email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "El formato del correo electrónico no es válido.";
        }
    }

    // --------------------------
    // Contraseña
    // --------------------------
    if (empty($_POST['password'])) {
        $errores['password'] = "La contraseña es obligatoria.";
    } else {
        $password = $_POST['password'];
        // Validar longitud mínima
        if (strlen($password) < 8) {
            $errores['password'] = "La contraseña debe tener al menos 8 caracteres.";
        }
    }

    // --------------------------
    // Teléfono
    // --------------------------
    if (empty($_POST['telefono'])) {
        $errores['telefono'] = "El teléfono es obligatorio.";
    } else {
        $telefono = trim($_POST['telefono']);
        // Validar que sean exactamente 10 dígitos
        if (!preg_match('/^\d{10}$/', $telefono)) {
            $errores['telefono'] = "El teléfono debe tener exactamente 10 dígitos.";
        }
    }

    // --------------------------
    // Edad
    // --------------------------
    if (empty($_POST['edad'])) {
        $errores['edad'] = "La edad es obligatoria.";
    } else {
        $edad = trim($_POST['edad']);
        // Validar que sea un número entero entre 0 y 120
        if (!filter_var($edad, FILTER_VALIDATE_INT, ["options" => ["min_range" => 0, "max_range" => 120]])) {
            $errores['edad'] = "La edad debe ser un número entero entre 0 y 120.";
        }
    }

    // =========================================================================
    // 4. DECISIÓN FINAL
    // =========================================================================

    if (empty($errores)) {
        // ¡Éxito! Todos los datos son válidos.
        $mensaje_exito = "¡Registro exitoso!<br>Datos ingresados:<br>";
        $mensaje_exito .= "<b>Nombre:</b> " . htmlspecialchars($nombre) . "<br>";
        $mensaje_exito .= "<b>Email:</b> " . htmlspecialchars($email) . "<br>";
        $mensaje_exito .= "<b>Teléfono:</b> " . htmlspecialchars($telefono) . "<br>";
        $mensaje_exito .= "<b>Edad:</b> " . htmlspecialchars($edad) . "<br>";
        // La contraseña no se muestra por seguridad

        // Limpiar los campos después del éxito
        $nombre = $email = $password = $telefono = $edad = '';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        .error { color: red; font-size: 0.9em; }
        .exito { color: green; font-size: 1.1em; margin-bottom: 20px; }
        input { display: block; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Registro de Usuario</h1>

    <?php if (!empty($mensaje_exito)): ?>
        <div class="exito"><?php echo $mensaje_exito; ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
        <?php if (isset($errores['nombre'])): ?>
            <div class="error"><?php echo $errores['nombre']; ?></div>
        <?php endif; ?>

        <label for="email">Correo Electrónico:</label>
        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
        <?php if (isset($errores['email'])): ?>
            <div class="error"><?php echo $errores['email']; ?></div>
        <?php endif; ?>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">
        <?php if (isset($errores['password'])): ?>
            <div class="error"><?php echo $errores['password']; ?></div>
        <?php endif; ?>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo htmlspecialchars($telefono); ?>">
        <?php if (isset($errores['telefono'])): ?>
            <div class="error"><?php echo $errores['telefono']; ?></div>
        <?php endif; ?>

        <label for="edad">Edad:</label>
        <input type="text" name="edad" id="edad" value="<?php echo htmlspecialchars($edad); ?>">
        <?php if (isset($errores['edad'])): ?>
            <div class="error"><?php echo $errores['edad']; ?></div>
        <?php endif; ?>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>