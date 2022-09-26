<?php
    include("conectar.php");
    //Prueba de conexion a la base de datos INVENTARIO
    if($conexion){
        echo "Se conecto correctamente a la base de datos";
    }else{
        echo "No se pudo conectar a la base de datos";
    }
?>