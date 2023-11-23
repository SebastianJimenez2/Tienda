<?php
#borrarcookies.php?borrar=1
session_start(); #levnatar el servicio de sesiones del servidor 

if(isset($_POST['nombre']) && isset($_POST['clave']) && $_POST["nombre"] != "" && $_POST["clave"] != "") {
    $recordarme = isset($_POST['chkRecordarme']) ? $_POST['chkRecordarme'] : '';
    #Crear sesion
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["clave"] = $_POST["clave"];

    

    if($recordarme != "") {
        setcookie("nombre", $_SESSION["nombre"]);
        setcookie("clave", $_SESSION["clave"]);
        setcookie("chkRecordarme", $recordarme);
        if(!isset($_COOKIE["idioma"])) {
            $idioma = "es";
            setcookie("idioma", $idioma); 
        }
    } else {
        if(isset($_COOKIE)){
            foreach($_COOKIE as $name => $value){
                setcookie($name, "");
            }
        }
    }

    header("Location:panelPrincipal.php");
} else {
    header("Location:index.php");
}
?>