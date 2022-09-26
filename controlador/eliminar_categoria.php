<?php
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $sql=$conexion->query("DELETE FROM categoria where id_categoria=$id");
        if($sql==1){
            header("location:inicio.php#categoria");
        }else{
            echo "El cliente no se a Elimnado";
        }

    }
?>