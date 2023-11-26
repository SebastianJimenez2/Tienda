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
        if(!isset($_GET["idioma"])){
            if(isset($_COOKIE["idioma"])&&$_COOKIE["idioma"]!=""){
                if($_COOKIE["idioma"] == "es"){
                    header("Location:panelPrincipal.php?idioma=es");
                }else if($_COOKIE["idioma"] == "en"){
                    header("Location:panelPrincipal.php?idioma=en");
                }
            }else{
                echo "<h3>Lista de productos</h3>";
                foreach(explode("\n",$contents_es) as $name => $value){
                    echo $value."<br>"; 
                }
            }
        }else{
            if($_GET["idioma"]=="es"){
                if(isset($_COOKIE["idioma"])){
                    setcookie("idioma", "es");
                }
                echo "<h3>Lista de productos</h3>";
                foreach(explode("\n",$contents_es) as $name => $value){
                    echo $value."<br>"; 
                }
            }else if($_GET["idioma"]=="en"){
                if(isset($_COOKIE["idioma"])){
                    setcookie("idioma", "en");
                }
                echo "<h3>Product list</h3>";
                foreach(explode("\n",$contents_en) as $name => $value){
                    echo $value."<br>"; 
                }
            }
        }
        ?>

        <br>
        
        <a href="cerrarSesion.php?borrar=1">Cerrar Sesión</a>
    </body>
</html>
