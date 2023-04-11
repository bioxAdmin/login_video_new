<?php
if(!empty($_POST["btningresar"])){
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["password"])) {
        echo '<div class="alerta">Llene todos los campos</div>';
    } else {
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $clave=$_POST["password"];
        $sql=$conexion->query("select * from administrador where clave_ad='$clave'");
        if ($datos=$sql->fetch_object()) {
            $sql=$conexion->query("insert into usuarios(nombre, apellido)values('$nombre','$apellido')");
            if ($sql==1) {
                echo '<div class="access">guardado exitosamente</div>';
                header("location:inicio/inicio.php");

            } else {
                echo('<div class="error">fallo al guardar</div>');
            }
            
        } else {
            $sql=$conexion->query("select * from estudiante where clave_es='$clave'");
            if ($datos=$sql->fetch_object()) {
                $sql=$conexion->query("insert into usuarios(nombre, apellido)values('$nombre','$apellido')");
                if ($sql==1) {
                echo('<div class="access">guardado exitosamente</div>');
                header("location:inicio/inicio_Es.php");

            } else {
                echo('<div class="error">fallo al guardar</div>');
            }
            } else {
                echo('<div class="error">Acceso denegado clave incorrecta</div>');

            }
            
        }
        
    }
    
}
?>