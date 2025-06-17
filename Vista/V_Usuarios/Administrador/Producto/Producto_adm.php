<?php
    include "../Principal/ingreso_ad.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    
<style>
        /* Estilos generales */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa; /* Color de fondo suave */
    margin: 0;
    padding: 0;
}

h1, h2, h4 {
    color: #343a40; /* Color de texto */
}

/* Estilo del logo */
.logo {
    width: 100px; /* Ajusta el tamaño del logo según sea necesario */
    margin-right: 20px;
}

/* Estilo de navegación */
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #007bff; /* Color de fondo del nav */
    padding: 15px;
    color: white;
}

nav .Parte-Central {
    flex-grow: 1;
}

.conjunto-enlaces {
    display: flex;
}

.enlaces:hover {
    text-decoration: underline; /* Efecto al pasar el mouse */
}

/* Estilo de secciones */
section {
    margin: 20px;
    padding: 20px;
    background-color: white; /* Fondo blanco para secciones */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra suave */
}

/* Estilo de tablas */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid black; /* Bordes de tabla */
}

/* Estilo de formularios */
form {
    display: flex;
    flex-direction: column;
    margin: 10px 0;
}

form label {
    margin-bottom: 5px;
}

form input {
    padding: 10px;
    border: 1px solid #ced4da; /* Borde de entrada */
    border-radius: 5px; /* Bordes redondeados en entradas */
}

/* Estilo de botones */
button {
    padding: 10px 15px;
    background-color: rgb(168, 78, 46); /* Color de fondo del botón */
    color: white;
    border: none;
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer;
}

button:hover {
    background-color: rgb(255, 106, 0); /* Color al pasar el mouse */
}
    </style>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../est_index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal - Cocinas y Diseños Arquitectónicos San José</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navegación -->
    <nav class="d-flex align-items-center">
        <img src="../../../Imagenes/OIG1.jfif" alt="Logo de la empresa" class="logo">
        <div class="Parte-Central">
                <h1>Cocinas y Diseños Arquitectonicos San Jose</h1>
                    <?php
                        include("../Principal/Menu_Admin.php")
                    ?>
            </div>
        </div>
        <div>
            <?php
            include("../../../../Modelos/Mod_Usuario.php");
            $objeto = new usuario(num_doc_f:$_SESSION["num_doc"]);
            $respuesta = $objeto->consultar_usuario_especifi();
            ?>
            Bienvenido Administrador <?php echo $respuesta[0]["Nombre"]; ?>
        </div>
        <div>
            <a href="../Principal/Cerrar.php">Cerrar sesion</a>
        </div>
    </nav>     
    
    <?php
            if(!empty($_GET)){
                if($_GET["accion"] == "reg"){
                    ?>
                    <form action="Producto_adm.php?accion=gua_r" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                                <legend>Información del Producto</legend>
                                <label for="nom" class="form-label">Nombre del Producto:</label>
                                <input type="text" name="nom" class="form-control" id="nom" required>

                                <label for="pre" class="form-label">Precio:</label>
                                <input type="number" name="pre" class="form-control" id="pre" required>

                                <label for="desc" class="form-label">Descripción:</label>
                                <textarea name="desc" name="descr" class="form-control" id="desc" required></textarea>

                                <label for="espe" class="form-label">Especificaciones:</label>
                                <textarea name="espe" name="espe" class="form-control" id="espe" required></textarea>

                                <label for="IMG_PRO">Imagen del producto</label>
                                <input type="file" name="img_pro" class="form-control" id="IMG_PRO" required>
                            <button type="submit" class="btn btn-primary">Registrar Producto</button>
                        </div>
                    </form>
                    <?php
                }else if($_GET["accion"] == "gua_r"){
                    include "Guardarpro.php";
                }else if($_GET["accion"] == "act"){
                    include "Act_pro.php";
                }else if($_GET["accion"] == "eli"){
                    include "Eli_pro.php";
                }else if($_GET["accion"] == "gua_a"){
                    include "Guardar.php";
                }else if($_GET["accion"] == "con"){
                    include ("../../../../Modelos/Mod_Producto.php");
                    //var_dump($_POST["Con_Pro"]);
                    $objeto=new producto(
                        nombre_f:$_POST["Con_Pro"]
                    );
                    $respuesta = $objeto->consultar_pro_especifico();
                    //var_dump($respuesta);
                ?>
                <section>
                        <h4>Ver producto</h4>
                        <form action="Producto_adm.php?accion=con" method="post">
                            <legend>Cosultar un producto</legend>
                            <input type="text" name="Con_Pro" minlength="3" required>
                            <button type="button">Ver Producto</button>
                        </form>
                        <table>
                            <tr>
                            <th>CÓDIGO</th>
                            <th>NOMBRE PRODUCTO</th>
                            <th>PRECIO</th>
                            <th>DESCRIPCION</th>
                            <th>Especificaciones</th>
                            <td>Numero de documento</td>
                            <td>Nombre del usuario</td>
                            <td>Apellido del usuario</td>
                            <td>Imagenes</td>
                            <th colspan='2'>ACCIONES</th></tr>
                            <?php
                            //var_dump($respuesta);
                                foreach($respuesta as $valor){
                                    echo "<tr>
                                            <td>{$valor['ID_Producto']}</td>
                                            <td>{$valor['NombreProducto']}</td>
                                            <td>{$valor['Precio']}</td>
                                            <td>{$valor['Descripcion']}</td>
                                            <td>{$valor['Especificacion']}</td>
                                            <td>{$valor['Numero_documento']}</td>
                                            <td>{$valor['NombreUsuario']}</td>
                                            <td>{$valor['Apellido']}</td>
                                            <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['Imagen'])."'/></td>
                                            <td><a href='Act_pro.php?Acc_Act=Actualizar&id_pro=$valor[ID_Producto]'>Modificar</a></td>
                                            <td><a href='Eli_pro.php?id_pro=$valor[ID_Producto]'>Eliminar</a></td>
                                        </tr>";
                                }
                            ?>
                        </table>
                </section>
                <?php
                }
            }else{
                include ("../../../../Modelos/Mod_Producto.php");
                $objeto=new producto();
                $respuesta = $objeto->Consultar_producto_general();
                ?>
                <section>
                        <h4>Ver producto</h4>
                        <form action="Producto_adm.php?accion=con" method="post">
                            <legend>Cosultar un producto</legend>
                            <input type="text" name="Con_Pro" minlength="3" required>
                            <button type="button">Ver Producto</button>
                        </form>
                        <table>
                            <tr>
                            <th>CÓDIGO</th>
                            <th>NOMBRE PRODUCTO</th>
                            <th>PRECIO</th>
                            <th>DESCRIPCION</th>
                            <th>Especificaciones</th>
                            <td>Numero de documento</td>
                            <td>Nombre del usuario</td>
                            <td>Apellido del usuario</td>
                            <td>Imagenes</td>
                            <th colspan='2'>ACCIONES</th></tr>
                            <?php
                                foreach($respuesta as $valor){
                                    echo "<tr>
         <td>{$valor['ID_Producto']}</td>
         <td>{$valor['NombreProducto']}</td>
         <td>{$valor['Precio']}</td>
         <td>{$valor['Descripcion']}</td>
         <td>{$valor['Especificacion']}</td>
         <td>{$valor['Numero_documento']}</td>
         <td>{$valor['NombreUsuario']}</td>
         <td>{$valor['Apellido']}</td>
         <td><img height='120px' src='data:image/jpeg;base64," . base64_encode($valor['Imagen']) . "' /></td>
         <td><a href='Producto_adm.php?accion=act&id_pro={$valor['ID_Producto']}'>Modificar</a></td>
         <td><a href='Eli_pro.php?id_pro={$valor['ID_Producto']}'>Eliminar</a></td>
      </tr>";


                                }
                            ?>
                        </table>
                        <a href="Producto_adm.php?accion=reg">
                            Registrar productos
                        </a>
                </section>
                <?php
            }
        ?>

    <!-- Footer -->
    <footer>
        <div>
            <h4>Acerca de Nosotros</h4>
            <p>
                Somos una empresa dedicada a la venta de muebles de cocina, mesas y armarios. Nuestro objetivo es brind
            </p>
        </div>
        <div>
            <h4>Contacto Empresa</h4>
            <p>Teléfono: +123456789</p>
            <p>Email: contacto@empresa.com</p>
        </div>
        <div>
            <h4>Contacto Programadores</h4>
            <p>Teléfonos: +57 3125565319, +57 3106803139</p>
            <p>Email: codecas@gmail.com</p>
            <br>
        </div>
        <div>
            <h4>Redes Sociales</h4>
            <p>
                <a href="#">Facebook</a> | 
                <a href="#">Twitter</a> | 
                <a href="#">LinkedIn</a>
            </p>
        </div>
    </footer>

    <script src="com_index.js"></script>
</body>
</html>