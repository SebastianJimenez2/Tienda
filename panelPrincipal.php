<?php
    session_start();

    if(!isset($_SESSION["nombre"]) && !isset($_SESSION["clave"])){
        header("Location:index.php");
    }
    
    if(!isset($_COOKIE["idioma"])){
        $file_es = "categorias_es.txt";
        $fp_es = fopen($file_es, "r");
        $contents_es = fread($fp_es, filesize($file_es));
        
        if($_GET["idioma"] == "es" && isset($_GET["idioma"])){
            $file_es = "categorias_es.txt";
            $fp_es = fopen($file_es, "r");
            $contents_es = fread($fp_es, filesize($file_es));
            header("panelPrincipal.php?idioma=es");
        }
    
        if($_GET["idioma"] == "en" && isset($_GET["idioma"])){
            $file_en = "categorias_en.txt";
            $fp_en = fopen($file_en, "r");
            $contents_en = fread($fp_en, filesize($file_en));
            header("panelPrincipal.php?idioma=en");
        }
    } else {
        if($_COOKIE["idioma"] == "es"){
            $file_es = "categorias_es.txt";
            $fp_es = fopen($file_es, "r");
            $contents_es = fread($fp_es, filesize($file_es));
        }
    
        if($_COOKIE["idioma"] == "en"){
            $file_en = "categorias_en.txt";
            $fp_en = fopen($file_en, "r");
            $contents_en = fread($fp_en, filesize($file_en));
        }
    }
/*
    if(isset($_GET["idioma"])){
        if($_GET["idioma"] == "es"){
            $_COOKIE["idioma"] == "es";
            setcookie("idioma", "es");
            header("panelPrincipal.php?idioma=es");
        } 

        if($_GET["idioma"] == "en"){
            $_COOKIE["idioma"] == "en";
            setcookie("idioma", "en");
            header("panelPrincipal.php?idioma=en");
        } 
    }

    if($_COOKIE["idioma"] == "es"){
        $file_es = "categorias_es.txt";
        $fp_es = fopen($file_es, "r");
        $contents_es = fread($fp_es, filesize($file_es));
    }

    if($_COOKIE["idioma"] == "en"){
        $file_en = "categorias_en.txt";
        $fp_en = fopen($file_en, "r");
        $contents_en = fread($fp_en, filesize($file_en));
    }
*/
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

        <?php
        echo $contents_es; 
        if($_GET["idioma"] == "es" && isset($_GET["idioma"])) {
            echo $contents_es; 
        } 
        if($_GET["idioma"] == "en" && isset($_GET["idioma"])) {
            echo $contents_en;
        }
        ?>

        <br>
        
        <a href="cerrarSesion.php?borrar=1">Cerrar Sesión</a>
    </body>
</html>
