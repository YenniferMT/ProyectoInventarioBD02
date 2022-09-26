<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JQuery.js"></script>
    <title>Inicio - Inventario</title>
    <link rel="stylesheet" href="estiloInici.css">
    <script src="css/all.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#menu-items .item a:first").addClass("active")
            $("#main-container section").hide();
            $("#main-container section:first").show();

            $("#menu-items .item a").click(function(){
                $("#menu-items .item a").removeClass("active");
                $(this).addClass("active");
                $("#main-container section").hide();

                var activeTab = $(this).attr("href");
                $(activeTab).show();
                return false;
            });
        });
    </script>
</head>
<body>
    <script>
        function eliminar(){
            var respuesta=confirm("¿Seguro que desea elimnar?");
            return respuesta;
        }
    </script>
    <header>
        <div id="sidemenu" class="menu-collapsed">
            <div id="header">
                <div id="title"><span><img src="img/LogoFinal.png" alt="" class="logo"></span></div>
                <div id="menu-btn">
                    <div class="btn-hamburger"></div>
                    <div class="btn-hamburger"></div>
                    <div class="btn-hamburger"></div>
                </div>
            </div>
            <!-- PERFINL USUSARIO -->
            <div id="profile">
                <div id="photo"><img src="img/foto.jpg" alt=""></div>
                <div id="name"><span>Nombre Usuario</span></div>
            </div>
            <!-- Menu de opcciones -->
            <nav id="menu-items">
                <div class="item">
                    <a href="#inicio">
                        <div class="icon"><img src="iconos/inicio.svg" alt=""></div>
                        <div class="title"><span>Inicio</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#categoria">
                        <div class="icon"><img src="iconos/categoria.svg" alt=""></div>
                        <div class="title"><span>Categorias</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#marca">
                        <div class="icon"><img src="iconos/marca.png" alt=""></div>
                        <div class="title"><span>Marcas</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#productos">
                        <div class="icon"><img src="iconos/producto.png" alt=""></div>
                        <div class="title"><span>Productos</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#proveedor">
                        <div class="icon"><img src="iconos/proveedpr.png" alt=""></div>
                        <div class="title"><span>Proveedor</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#reporte">
                        <div class="icon"><img src="iconos/reporte.png" alt=""></div>
                        <div class="title"><span>Reportes</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#cuentas">
                        <div class="icon"><img src="iconos/admCuent.svg" alt=""></div>
                        <div class="title"><span>Admistrar Cuentas</span></div>
                    </a>
                </div>
                <div class="item separador"></div>
                <div class="item">
                    <a href="#cerrarsesion">
                        <div class="icon"><img src="iconos/salir.svg" alt=""></div>
                        <div class="title"><span>Cerrar</span></div>
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <main id="main-container">
        <section id="inicio">
            <h1>Inventario Bodega XYZ</h1>
            <h2>Mision</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis cum rem commodi doloremque ullam explicabo, voluptate nihil repellat unde porro similique saepe odit alias placeat quae in aliquam sint veritatis magni tempore. Maiores autem dolorem et unde optio atque dignissimos ad earum quae, quam maxime tempora! Porro quo voluptas nobis!</p>
            <h2>Vision</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis unde maiores eum voluptas, similique quam, hic distinctio, culpa explicabo nihil accusantium nulla consectetur. Laboriosam minus suscipit quo. Maiores labore culpa nihil nesciunt rerum, nostrum animi sed suscipit corrupti, sunt fugiat qui vero dolor quasi beatae vel, magni eveniet tempore! Impedit iure voluptatum obcaecati harum reprehenderit debitis aut unde mollitia! Neque illo veniam nostrum delectus! Consequatur velit nostrum similique natus aliquid?</p>
            <h2>Quienes Somos</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur quam optio possimus vitae eos aliquid ab! Placeat sapiente quam obcaecati numquam molestiae, veritatis omnis autem, labore sint voluptatibus esse vitae temporibus corporis ipsam.</p>
        </section>
        <section id="categoria">
            <div class="cabeza_menu">
                <h2>Gestion de las Categorias</h2>
            </div>
            <div class="form_divCon">
                <form action="" method="post">
                    <h3>Registro de Categoria</h3>
                    <?php
                        include "modelo/conexion.php";
                        include "controlador/registrar_categoria.php"; 
                    ?>
                    <div class="">
                        <label  class="form-label">Nombre de la Categoria</label><br>
                        <input type="text" class="form-control" name="nombreCat">
                    </div>
                    <button type="submit" class="" name="registrarCat">Registrar</button>
                </form>
                <div class="">
                    <?php
                        include "controlador/eliminar_categoria.php"
                    ?>
                    <table class="table">
                        <thead>
                            <th scope="col">id</th>
                            <th scope="col">Categoria</th>
                        </thead>
                        <tbody>
                            <?php
                                include "modelo/conexion.php";
                                $sql=$conexion->query("SELECT * FROM categoria");
                                //mistras existan datos se esjutara el WHILE
                                while($datos=$sql->fetch_object()){?>
                                    <tr>
                                        <th><?= $datos->id_categoria ?></th>
                                        <td><?= $datos->nombre_categoria ?></td>
                                        <td><a href="actualizarCategoria.php?id=<?= $datos->id_categoria ?>"class=""><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a  onclick="return eliminar()" href="inicio.php?id=<?= $datos->id_categoria ?>"class=""><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section id="marca">
            <div class="cabeza_menu">
                <h2>Gestion de las Marcas</h2>
            </div>
            <div class="form_divCon">
                <form action="" method="post">
                    <h3>Registro de Marca</h3>
                    <?php
                        include "modelo/conexion.php";
                        include "controlador/registrar_marca.php"; 
                    ?>
                    <div class="">
                        <label  class="form-label">Nombre de la Marca</label><br>
                        <input type="text" class="form-control" name="nombreMar">
                    </div>
                    <div class="">
                        <label  class="form-label">Descripcion de la Marca</label><br>
                        <input type="text" class="form-control" name="descripcionMar">
                    </div>
                    <button type="submit" class="" name="registrarMar">Registrar</button>
                </form>
                <div class="">
                    <table class="table">
                        <thead>
                            <th scope="col">id</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Descripcion</th>
                        </thead>
                        <tbody>
                            <?php
                                include "modelo/conexion.php";
                                $sql=$conexion->query("SELECT * FROM marca");
                                //mistras existan datos se esjutara el WHILE
                                while($datos=$sql->fetch_object()){?>
                                    <tr>
                                        <th><?= $datos->id_marca ?></th>
                                        <td><?= $datos->nombre_marca ?></td>
                                        <td><?= $datos->descripcion_marca ?></td>
                                        <td><a href=""class=""><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href=""class=""><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section id="productos">
            <div class="cabeza_menu">
                <h2>Gestion de los Productos</h2>
            </div>
            <div class="form_divCon">
                <form class="" action="" method="post">
                    <h3>Registro de Producto</h3>
                    <?php
                        include "modelo/conexion.php";
                        include "controlador/registrar_productos.php"; 
                    ?>
                    <div class="">
                        <label  class="form-label">Nombre del Producto</label><br>
                        <input type="text" class="form-control" name="nombrePro">
                    </div>
                    <div class="">
                        <label  class="form-label">Foto del Producto</label><br>
                        <input type="file" class="form-control" name="fotoPro">
                    </div>
                    <div class="">
                        <label  class="form-label">Descripcion del Producto</label><br>
                        <textarea class="form-control" name="descripcionPro" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="">
                        <label  class="form-label">Precio del Producto</label><br>
                        <input type="number" class="form-control" name="precioPro">
                    </div>
                    <div class="">
                        <label  class="form-label">Stock del Producto</label><br>
                        <input type="number" class="form-control" name="stockPro">
                    </div>
                    <div class="">
                        <label  class="form-label">Peso del Producto</label><br>
                        <input type="number" class="form-control" name="pesoPro">
                    </div>
                    <div class="">
                        <label  class="form-label">Categoria del Producto</label><br>
                        <select name="idcategoria" class="form_selec" values="idcategoria" required>
                            <option value="" disabled="" selected>Seleccionar</option>
                            <?php
                                include "modelo/conexion.php";
                                $con=$conexion;
                                $sql='SELECT * FROM categoria';
                                $query=mysqli_query($con,$sql);
                                while($row=mysqli_fetch_array($query)){
                                    $idcat=$row['id_categoria'];
                                    $nombCat=$row['nombre_categoria'];?>
                                    <option value="<?php echo $idcat ?>"><?php echo $nombCat?></option>
                            <?php } ?>
                         </select>
                    </div>
                    <div class="">
                        <label  class="form-label">Marca del Producto</label><br>
                        <select name="idmarca" class="form_selec" values="idmarca" required>
                            <option value="" disabled="" selected>Seleccionar</option>
                            <?php
                                include "modelo/conexion.php";
                                $con=$conexion; 
                                $sql='SELECT * FROM marca';
                                $query=mysqli_query($con,$sql);
                                while($row=mysqli_fetch_array($query)){
                                    $idmar=$row['id_marca'];
                                    $nombmar=$row['nombre_marca'];?>
                                    <option value="<?php echo $idmar ?>"><?php echo $nombmar?></option>
                            <?php } ?>
                         </select>
                    </div>
                    <div class="">
                        <label  class="form-label">Proveedor del Producto</label><br>
                        <select name="idproveedor" class="form_selec" values="idproveedor" required>
                            <option value="" disabled="" selected>Seleccionar</option>
                            <?php
                                include "modelo/conexion.php";
                                $sql='SELECT * FROM proveedor';
                                $query=mysqli_query($con,$sql);
                                while($row=mysqli_fetch_array($query)){
                                    $idprov=$row['id_proveedor'];
                                    $nombprov=$row['nombres_proveedor'];
                                    $apellprov=$row['apellidos_proveedor'];
                                    ?>
                                    <option value="<?php echo $idprov ?>"><?php echo $nombprov." ".$apellprov?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="">
                        <label  class="form-label">Usuario que Registra el Producto</label><br>
                        <input value="Hola" type="text" class="form-control" name="idusuario" id=""disabled>
                    </div>
                    <div class="">
                        <label  class="form-label">Descripcion</label><br>
                        <textarea name="presentacioPro" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="" name="registrarPro">Registrar</button>
                </form>
                <div class="">
                    <!-- MOSTRAR LOS DATOS -->
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">foto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "modelo/conexion.php";
                                $sql=$conexion->query("SELECT * FROM producto");
                                //mistras existan datos se esjutara el WHILE
                                //(nombres_producto,foto_usuario,descripcion_producto,precio_producto,stock_producto,peso_producto,id_categoria,id_marca,id_proveedor,id_usuario,id_presentacion) 
                                while($datos=$sql->fetch_object()){?>
                                    <tr>
                                        <th><?= $datos->id_producto ?></th>
                                        <th><?= $datos->nombres_producto ?></th>
                                        <th><img src="<?= $datos->foto_producto ?>" alt=""></th>
                                        <th><?= $datos->descripcion_producto ?></th>
                                        <th><?= $datos->precio_producto ?></th>
                                        <th><?= $datos->stock_producto ?></th>
                                        <th><?= $datos->peso_producto ?></th>
                                        <td><?= $datos->id_categoria ?></td>
                                        <td><?= $datos->id_marca ?></td>
                                        <td><?= $datos->id_proveedor ?></td>
                                        <td><?= $datos->id_usuario ?></td>
                                        <td><a href=""class=""><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href=""class=""><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section id="proveedor">
            <div class="cabeza_menu">
                <h2>Gestion de los Proveedores</h2>
            </div>
            <div class="form_divCon">
                <form class="" action="" method="post">
                    <h3>Registro de Proveedor</h3>
                    <?php
                        include "modelo/conexion.php";
                        include "controlador/registrar_proveedor.php"; 
                    ?>
                    <div class="">
                        <label  class="form-label">Nombres</label><br>
                        <input type="text" class="form-control" name="nombreProve">
                    </div>
                    <div class="">
                        <label  class="form-label">Apellidos</label><br>
                        <input type="text" class="form-control" name="apellidoProve">
                    </div>
                    <div class="">
                        <label  class="form-label">Email</label><br>
                        <input type="email" class="form-control" name="emailProve">
                    </div>
                    <div class="">
                        <label  class="form-label">Empresa</label><br>
                        <input type="text" class="form-control" name="empresaProve">
                    </div>
                    <div class="">
                        <label  class="form-label">Descripcion</label><br>
                        <textarea name="descripcionProve" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="" name="registrarProve">Registrar</button>
                </form>
                <div class="">
                    <!-- MOSTRAR LOS DATOS -->
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Descripccion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "modelo/conexion.php";
                                $sql=$conexion->query("select * from proveedor");
                                //mistras existan datos se esjutara el WHILE
                                while($datos=$sql->fetch_object()){?>
                                    <tr>
                                        <th><?= $datos->id_proveedor ?></th>
                                        <td><?= $datos->nombres_proveedor ?></td>
                                        <td><?= $datos->apellidos_proveedor ?></td>
                                        <td><?= $datos->email_proveedor ?></td>
                                        <td><?= $datos->empresa_proveedor ?></td>
                                        <td><?= $datos->descripcion_proveedor ?></td>
                                        <td><a href=""class=""><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href=""class=""><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section id="reporte">
            <div class="cabeza_menu">
                <h2>Generar Reportes</h2>
                <!-- <nav class="contenido">
                    <a href="#reporte_producto">Reporte por Producto</a>
                    <a href="#reporte_proveedor">Reporte por Proveedor</a>
                    <a href="#reporte_categoria">Reporte por Categoria</a>
                    <a href="#reporte_marca">Reporte por Marca</a>
                    <a href="#reporte_Usuario">Reporte por Usuario</a>
                </nav> -->
            </div>
        </section>
        <section id="cuentas">
            <div class="cabeza_menu">
                <h2>Gestion de Cuentas</h2>
            </div>
            <div class="form_divCon">
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <h3>Registro de de Cuentas</h3>
                    <?php
                        include "modelo/conexion.php";
                        include "controlador/registrar_cuenta.php"; 
                    ?>
                    <div class="">
                        <label  class="form-label">Nombre de Login</label><br>
                        <input type="text" class="form-control" name="loginUsu">
                    </div>
                    <div class="">
                        <label  class="form-label">Nombres</label><br>
                        <input type="text" class="form-control" name="nombreUsu">
                    </div>
                    <div class="">
                        <label  class="form-label">Apellidos</label><br>
                        <input type="text" class="form-control" name="apellidoUsu">
                    </div>
                    <div class="">
                        <label  class="form-label">Foto</label><br>
                        <input type="file" class="form-control" name="fotoUsu">
                    </div>
                    <div class="">
                        <label  class="form-label">Email</label><br>
                        <input type="email" class="form-control" name="emailUsu">
                    </div>
                    <div class="">
                        <label  class="form-label">Email</label><br>
                        <select name="sexoUsu" id="">
                            <option value="" disabled="" selected>Seleccionar</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="">
                        <label  class="form-label">Contraseña</label><br>
                        <input type="password" class="form-control" name="contrasena1Usu">
                    </div>
                    <div class="">
                        <label  class="form-label">Confirmar Contraseña</label><br>
                        <input type="password" class="form-control" name="Contrasena2Usu">
                    </div>
                    <div class="">
                        <label  class="form-label">Rol</label><br>
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
                        
                    </div>
                    <button type="submit" class="" name="registrarUsu">Registrar</button>
                </form>
                <div class="">
                    <!-- MOSTRAR LOS DATOS -->
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Login</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Email</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "modelo/conexion.php";
                                $con=$conexion;
                                $sql='SELECT * FROM usuario INNER JOIN rol ON usuario.id_rol=rol.id_rol';
                                $query=mysqli_query($con,$sql);
                                //mistras existan datos se esjutara el WHILE
                                while($row=mysqli_fetch_array($query)){
                                    $idCuen=$row['id_usuario'];
                                    $loginCuen=$row['loginId_usuario'];
                                    $nombreCuen=$row['nombres_usuario'];
                                    $apellidoCuen=$row['apellidos_usuario'];
                                    $fotoCuen=$row['foto_usuario'];
                                    $emailCuen=$row['email_usuari'];
                                    $sexoCuen=$row['sexo_usuario'];
                                    $contraCuen=$row['constrasena_usuario'];
                                    $rolCuen=$row['nombre_rol'];
                                    ?>
                                    <tr>
                                        <th><?php echo $idCuen; ?></th>
                                        <td><?php echo $loginCuen; ?></td>
                                        <td><?php echo $nombreCuen; ?></td>
                                        <td><?php echo $apellidoCuen;?></td>
                                        <td><img class="foto_tama" width="200px" src="img_cuentas/<?php echo $fotoCuen; ?>" alt=""></td>
                                        <td><?php echo $emailCuen;?></td>
                                        <td><?php echo $sexoCuen;?></td>
                                        <td><?php echo $contraCuen; ?></td>
                                        <td><?php echo $rolCuen; ?></td>
                                        <td><a href=""class=""><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href=""class=""><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div>
            <div class="div_flex">
                <div class="parte3">
                    <h3>BodegaXYZ</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum fugiat sit eum ad eligendi doloremque corporis.</p>
                </div>
                <div class="parte3">
                    <h3>Datos de contacto</h3>
                    <ul>
                        <li><a href="#">Javierolviare@email.com</a></li>
                        <li><a href="#">+5198695474</a></li>
                        <li><a href="#">Av. Univercitario 1234 - Pueblo Liebre<br>Lima - Perú</a></li>
                    </ul>
                </div>
                <div class="parte3">
                    <h3>Redes Sociales</h3>
                    <ul>
                        <li><a href="#"><img class="red" src="iconos/facebook.png" alt="">Facebook</a></li>
                        <li><a href="#"><img class="red" src="iconos/instagram.png" alt="">Instagram</a></li>
                        <li><a href="#"><img class="red" src="iconos/twiter.png" alt="">Twiter</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <p>&copy; Derechos Recervados - 2022</p>
            </div>
        </div>
    </footer>
    <script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#sidemenu');
        btn.addEventListener('click', function(){
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");
            document.querySelector('body').classList.toggle('body-expanded');
        });
    </script>
</body>
</html>