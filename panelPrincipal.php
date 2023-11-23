<?php
    session_start();

    if(!isset($_SESSION["nombre"]) && !isset($_SESSION["clave"])){
        header("Location:index.php");
    }

    $file_es = "categorias_es.txt";
    $fp_es = fopen($file_es, "r");
    $contents_es = fread($fp_es, filesize($file_es));

    $file_en = "categorias_en.txt";
    $fp_en = fopen($file_en, "r");
    $contents_en = fread($fp_en, filesize($file_en));

    if(isset($_COOKIE["idioma"])){
        if($_COOKIE["idioma"] == "es"){
            setcookie("idioma", "es");
            header("panelPrincipal.php?idioma=es");
        }else if($_COOKIE["idioma"] == "en"){
            setcookie("idioma", "en");
            header("panelPrincipal.php?idioma=en");
        }
    } 

    $nombre = $_SESSION['nombre'];
    $clave = $_SESSION['clave'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>PANEL PRINCIPAL</h1>
        <h2>Bienvenido: <?php echo $nombre ?> </h2>
        <hr>
        <a href="panelPrincipal.php?idioma=es">ES (Español)</a>
        
        <a href="panelPrincipal.php?idioma=en">EN (Ingles)</a>
        <br>
        <?php
        if(!isset($_GET["idioma"])){
            foreach(explode(",",$contents_es) as $name => $value){
                echo $value."<br>"; 
            }
        }else{
            if($_GET["idioma"]=="es"){
                foreach(explode(",",$contents_es) as $name => $value){
                    echo $value."<br>"; 
                }
            }else if($_GET["idioma"]=="en"){
                foreach(explode(",",$contents_en) as $name => $value){
                    echo $value."<br>"; 
                }
            }
        }
        ?>

        <br>
        <a href="cerrarSesion.php?borrar=1">Cerrar Sesión</a>
    </body>
</html>
