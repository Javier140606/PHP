<?php 
    $errores = [];
    
    if($_SERVER ["REQUEST_METHOD"] == 'POST') {

        if(filter_var($_POST['numero'], FILTER_VALIDATE_INT) === false){
            $errores['numero'] = "El número no es valido";
        }elseif($_POST['numero'] < 1 || $_POST['numero'] > 10){
            $errores['numero'] = "El número debe estar comprendido entre 1 y 10";
        }else{
            $numero = $_POST['numero'];
        }
        if (empty($errores)) {
            echo "Todo es correcto ";
            echo $numero;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="" method= "post">
        <label for="numero">
        Número:
        <input type="text" name="numero" id="numero" value="<?php echo $numero ?? '' ?> " required>
        </label>
        <?php //if(isset($errores['numero'])) echo $errores['numero'] ?>
        <?php echo $errores['numero'] ?? '' ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>