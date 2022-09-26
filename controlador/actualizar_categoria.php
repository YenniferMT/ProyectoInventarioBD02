<?php 
    if(isset($_POST['actualizarCat'])){
        if((!empty($_POST['nombreCat']))){
            $id=$_GET['id'];
            $nombre=$_POST['nombreCat'];
            $sql=$conexion->query("UPDATE categoria SET nombre_categoria='$nombre' where id_categoria=$id" );
            if($sql==1){
                header("location:inicio.php#categoria");
            }else{
                echo "Cliente no Actualizado";
            }
        }else{
            echo "Los campos estan vacios";
        }
    }
?>
