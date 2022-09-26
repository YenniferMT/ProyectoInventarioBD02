<?php 
    if(isset($_POST['registrarUsu'])){
        //Si no esta vacio cumple la siguiente condicion 
        if((!empty($_POST['loginUsu'])) && !empty($_POST['nombreUsu']) && !empty($_POST['apellidoUsu']) && !empty($_FILES['fotoUsu']['name']) && !empty($_POST['emailUsu']) && !empty($_POST['sexoUsu']) && !empty($_POST['contrasena1Usu']) && !empty($_POST['Contrasena2Usu']) && !empty($_POST['idRol'])){

            $nombre_foto=$_FILES['fotoUsu']['name'];
            $tipo_foto=$_FILES['fotoUsu']['type'];
            $tamanio_foto=$_FILES['fotoUsu']['size'];
            if($tamanio_foto<=2000000){
                if($tipo_foto=="image/jpeg" || $tipo_foto=="image/jpg" || $tipo_foto=="image/png" || $tipo_foto=="image/gif"){
                    $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/Proyecto_InventarioBD/img_cuentas/';
                    move_uploaded_file($_FILES['fotoUsu']['tmp_name'],$carpeta_destino.$nombre_foto);
                    $login=$_POST['loginUsu'];
                    $nombre=$_POST['nombreUsu'];
                    $apellido=$_POST['apellidoUsu'];
                    $email=$_POST['emailUsu'];
                    $sexo=$_POST['sexoUsu'];
                    $contrasena=$_POST['contrasena1Usu'];
                    $contrasena2=$_POST['Contrasena2Usu'];
                    $idrol=$_POST['idRol'];
                    if($contrasena==$contrasena2){
                        $sql=$conexion->query("INSERT INTO usuario(loginId_usuario,nombres_usuario,apellidos_usuario,foto_usuario,email_usuari,sexo_usuario,constrasena_usuario,id_rol) values('$login','$nombre','$apellido','$nombre_foto','$email','$sexo','$contrasena','$idrol')");
        
                        if($sql==1){
                            echo '<div class="div_alerta">Usuario registrado</div>';
                        }else{
                            echo "Usuario no registrado";
                        }
                    }else{
                        echo "Las contraseñas no coinsiden";
                    }
                }

            }
        }else{
            echo "Los campos estan vacios";
        }
    }
?>