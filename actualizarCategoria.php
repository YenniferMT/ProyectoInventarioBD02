<?php
    include "modelo/conexion.php";
    $id = $_GET['id'];
    $sql=$conexion->query("select * from categoria where id_categoria=$id");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <form class="" action="" method="post">
        <?php
            include "controlador/actualizar_categoria.php";
        ?>
        <h3>Actualizar Datos de la Categoria</h3>
            <!-- HIDDEN: nos muestra ese campo -->
        <input type="text" name="id" hidden id="" value="<?= $_GET['id'] ?>">
            <?php while($datos=$sql->fetch_object()){ ?>
                <div class="">
                    <label  class="form-label">Nombres</label>
                    <input type="text" class="form-control" name="nombreCat" value="<?= $datos->nombre_categoria ?>">
                </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary" name="actualizarCat">Actualizar</button>
        </form>
</body>
</html>