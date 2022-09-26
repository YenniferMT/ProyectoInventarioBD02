<?php
    if(isset($_POST['registrarCat'])){
        if(!empty($_POST['nombreCat'])){
            $categoria=$_POST['nombreCat'];
            $sql=$conexion->query("INSERT INTO categoria(nombre_categoria) values('$categoria')");
            if($sql==1){
                echo '<div class="div_alerta">Categoria registrada</div>';
            }else{
                echo "Categoria no registrado";
            }
        }else{
            echo "Los campos estan vacios";
        }
    }
?>