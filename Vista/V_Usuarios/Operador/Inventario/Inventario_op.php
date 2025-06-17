<?php
    include "../Principal/ingreso_op.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
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
            <?php
            include("../Principal/Menu_op.php")
            ?>
        </div>
        <div>
        <?php
            include("../../../../Modelos/Mod_Usuario.php");
            $objeto = new usuario(num_doc_f:$_SESSION["num_doc"]);
            $respuesta = $objeto->consultar_usuario_especifi();
            ?>
            Bienvenido operador <?php echo $respuesta[0]["Nombre"]; ?>.
        </div>
        <div>
            <a href="../Principal/Cerrar.php">Cerrar sesion</a>
        </div>
    </nav>     
    <nav class="conjunto-enlaces">
        <a href="Inventario_op.php?accion=her" class="enlaces" style="margin-left: 1%; margin-right: 0;">Herramienta</a>
        <a href="Inventario_op.php?accion=mat" class="enlaces" style="margin-left: 1%; margin-right: 0;">Material</a>
    </nav>
    <?php
        if(!empty($_GET)){
            if($_GET["accion"] == "con_her_gen"){
                include "Herra_con_peticon.php";
            }else if($_GET["accion"] == "pedir"){
                include "form_herra.php";
            }else if($_GET["accion"] == "gua_ped"){
                include "Guardar_pet.php";
            }else if($_GET["accion"] == "eli"){
                include "eliminar_pet.php";
            }else if($_GET["accion"] == "dev"){
                include "devolver.php";
            }else if($_GET["accion"] == "her"){
                include "Herramienta_op.php";
            }else if($_GET["accion"] == "mat"){
                include "Material_op.php";
            }else if($_GET["accion"] == "mod"){
                include "Modificar_mat.php";
            }else if($_GET["accion"] == "gua"){
                include "Mat_gua.php";
            }else if($_GET["accion"] == "eli_mat"){
                include "Eli_mat.php";
            }else{
                //var_dump($_GET);
                
            }
        }else{
            ?>
                <div>
                    <h1>Esto es el inventario de materiales y de herramientas</h1>
                    <h2>Gestión de Inventario</h2>
                    <p>Elige una de las dos opciones para gestionar las herramientas o los materiales.</p>
                    <h2>materiales</h2>
                    <p>En este apartado puedes ver los materiales que están disponibles en el inventario, tambien puedes sacar los materiales que necesites para el producto o proyecto necesarios</p>
                    <h2>herramientas</h2>
                    <p>En este apartado puedes ver las herramientas que tienes en tu inventario o que sacaste anteriormente y devolverlas al inventario, y las herramientas que están disponibles en el inventario, tambien puedes sacar las herramientas que necesites para el producto o proyecto necesarios</p>
                </div>
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

    <script src="../com_index.js"></script>
</body>
</html>