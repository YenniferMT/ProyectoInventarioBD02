<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estiloLogin.css">
</head>
<body>
    <header>
        <h1><img class="logo" src="img/LogoCentral.png" alt=""></h1>
        <h2>Sistema de Gestion de Inventario</h2>
    </header>
    <section>
        <div class="div_formula">
            <h3>Por favor Inicie Sesión</h3>

            <form action="" method="post">
                <?php
                    include "modelo/conexion.php";
                    include "controlador/login_validar.php"; 
                ?>
                <label for="">Usuario</label><br>
                <input class="form_input" type="text" name="usuario" id="" placeholder="Usuario" required>
                <br>
                <label for="">Constraseña</label><br>
                <input class="form_input" type="password" name="password" id="" placeholder="Password" required>
                <br>
                <label for="">Rol</label><br>
                <select name="idRol" class="form_selec" values="idRol" required>
                    <option value="" disabled="" selected>Seleccionar</option>
                    <?php
                        include "modelo/conexion.php";
                        $con=$conexion;
                        $sql='SELECT * FROM rol';
                        $query=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($query)){
                            $idcat=$row['id_rol'];
                            $nombCat=$row['nombre_rol'];?>
                            <option value="<?php echo $idcat ?>"><?php echo $nombCat?></option>
                    <?php } ?>
                </select>
                <br>
                <input name="inicioSesion" class="form_btn" type="submit" value="Ingresar">
            </form>
            <div class="dato_tiempo">
                <p id="fecha"></p>
                <p id="hora"></p>
                <script>
                    var fech = new Date();
                    var resF = fech.toLocaleDateString('en-US');
                    var resH = fech.toLocaleTimeString();
                    document.getElementById("fecha").innerHTML = 'Fecha Actual: '+resF;
                    document.getElementById("hora").innerHTML = 'Hora Actual: '+resH;
                </script>
            </div>
        </div>
        <div class="div_recupera">
            <hr>
            <a href="#">¿Perdiste tu constraseña?</a><br>
            <a href="">¿Olvidaste tu Usuario?</a>
            <hr>
        </div>
    </section>
    <footer>
        <div class="contactos">
            <h4>Datos de  Contacto:</h4>
            <li><a href="#">desarrollodesf@gmail.com</a></li>
            <li><a href="#">+51987654321</a></li>
            <li><a href="#">Av. Inca Garcilazo 123 - Tamburco<br>Apurimac - Perú</a></li>
        </div>
        <nav class="contactos">

            <a href="#"></a>
        </nav>
        <p class="derechos">&copy; Derechos Recervados - 2022</p>
    </footer>
</body>
</html>