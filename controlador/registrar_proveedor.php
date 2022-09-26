<?php 
    if(isset($_POST['registrarProve'])){
        //Si no esta vacio cumple la siguiente condicion 
        if((!empty($_POST['nombreProve'])) && !empty($_POST['apellidoProve']) && !empty($_POST['emailProve']) && !empty($_POST['empresaProve']) && !empty($_POST['descripcionProve'])){

            $nombre=$_POST['nombreProve'];
            $apellido=$_POST['apellidoProve'];
            $email=$_POST['emailProve'];
            $empresa=$_POST['empresaProve'];
            $descripcion=$_POST['descripcionProve'];
            

            $sql=$conexion->query("INSERT INTO proveedor(nombres_proveedor,apellidos_proveedor,email_proveedor,empresa_proveedor,descripcion_proveedor) values('$nombre','$apellido','$email','$empresa','$descripcion')");

            if($sql==1){
                echo '<div class="div_alerta">Proveedor registrado</div>';
            }else{
                echo "Proveedor no registrado";
            }
        }else{
            echo "Los campos estan vacios";
        }
    }
?>