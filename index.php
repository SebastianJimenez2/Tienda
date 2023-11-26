<?php
    $nombre = "";
    $clave = "";
    $recordarme = false;

    if (isset($_COOKIE['chkRecordarme']) && $_COOKIE['chkRecordarme'] != "") {
        $nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : "";
        $clave = isset($_COOKIE['clave']) ? $_COOKIE['clave'] : "";
        $recordarme = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cookiesYSesion.php" method="POST">
        <fieldset>
        <h1>LOGIN</h1>
                Usuario:<br>
                <input type="text" value="<?php echo $nombre ?>" name="nombre"/><br>

                Clave:<br>
                <input type="password" value="<?php echo $clave ?>" name="clave"/><br>
                <br>
                <input type="checkbox" name="chkRecordarme"> <?php echo ($recordarme)?"checked" : "" ?> Recordarme?
                <br>
                <br>
                <input type="submit" value="Enviar"/><br>
        </fieldset>
    </form>
</body>
</html>