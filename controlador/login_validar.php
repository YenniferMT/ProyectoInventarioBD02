<?php
    if(isset($_POST['inicioSesion'])){
        if(!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['idRol'])){
            $usuario=$_POST['usuario'];
            $contrasenia=$_POST['password'];
            $idrol=$_POST['idRol'];
            $sql=$conexion->query("SELECT * FROM usuario WHERE loginId_usuario='$usuario' AND constrasena_usuario='$contrasenia' AND id_rol='$idrol'");
            $fila=mysqli_num_rows($sql);
            if($fila){
                header("location:inicio.php");
            }else{
                echo "No fue posible iniciar sesion";
            }
        }else{
            echo "Los datos estan vacios";
        }

    }
?>