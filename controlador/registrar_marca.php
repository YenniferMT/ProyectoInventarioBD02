<?php
    if(isset($_POST['registrarMar'])){
        if(!empty($_POST['nombreMar']) && !empty($_POST['descripcionMar'])){
            $nombre=$_POST['nombreMar'];
            $descripcion=$_POST['descripcionMar'];
            $sql=$conexion->query("INSERT INTO marca(nombre_marca,descripcion_marca) values('$nombre','$descripcion')");
            if($sql==1){
                echo '<div class="div_alerta">Marca registrada</div>';
            }else{
                echo "Marca no registrado";
            }
        }else{
            echo "Los campos estan vacios";
        }
    }
?>