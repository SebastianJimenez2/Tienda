<?php
session_start();

if(!isset($_SESSION["nombre"]) && !isset($_SESSION["clave"])){
    header("Location:index.php");
}

if($_COOKIE['chkRecordarme'] == ""){
    foreach($_COOKIE as $name => $value){
        setcookie($name, "");
    }
}

session_destroy(); #Destruir sesion creada
header("Location:index.php");
?>