<?php 
    if(isset($_POST['registrarPro'])){
        //Si no esta vacio cumple la siguiente condicion 
        if((!empty($_POST['nombreProd'])) && !empty($_POST['descripcionPro']) && !empty($_FILES['fotoPro']) && !empty($_POST['precioPro']) && !empty($_POST['stockPro']) && !empty($_POST['pesoPro']) && !empty($_POST['idcategoria']) && !empty($_POST['idmarca']) && !empty($_POST['idproveedor']) && !empty($_POST['idrol'])) {

            $nombre_foto=$_FILES['fotoPro']['name'];
            $tipo_foto=$_FILES['fotoPro']['type'];
            $tamanio_foto=$_FILES['fotoPro']['size'];

            
            if($tamanio_foto<=2000000 && ($tipo_foto=="image/jpeg" || $tipo_foto=="image/jpg" || $tipo_foto=="image/png" || $tipo_foto=="image/gif")){

                $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/Proyecto_InventarioBD/img_producto/';
                move_uploaded_file($_FILES['fotoPro']['tmp_name'],$carpeta_destino.$nombre_foto);
                $nombre=$_POST['nombreProd'];
                $descripcion=$_POST['descripcionPro'];
                $precio=$_POST['precioPro'];
                $stock=$_POST['stockPro'];
                $peso=$_POST['pesoPro'];
                $idcategoria=$_POST['idcategoria'];
                $idmarca=$_POST['idmarca'];
                $idproveedor=$_POST['idproveedor'];
                $idusuario=$_POST['idusuario'];

                $sql=$conexion->query("INSERT INTO producto(nombres_producto,foto_producto,descripcion_producto,precio_producto,stock_producto,peso_producto,id_categoria,id_marca,id_proveedor,id_usuario) values('$nombre',' $nombre_foto','$descripcion','$precio','$stock','$peso','$idcategoria','$idmarca','$idproveedor','$idusuario')");
                if($sql==1){
                    echo '<div class="alert alert-success">Producto registrado</div>';
                }else{
                    echo "Producto no registrado";
                }
            }else{
                echo "El tamaño es demasiado grande o el tipo de imagen no corresponde";
            }
        }else{
            echo "Los campos estan vacios";
        }
    }
?>