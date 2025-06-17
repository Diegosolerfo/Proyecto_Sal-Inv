<?php
    include "ingreso_op.php";
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
<body style="min-height: 100vh;">
    <!-- Navegación -->
    <nav class="d-flex align-items-center">
        <img src="../../../Imagenes/OIG1.jfif" alt="Logo de la empresa" class="logo">
            <?php
            include("../Principal/Menu_op.php")
            ?>
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
    <!-- Vista de presentacion del operador -->
    <section style="margin: 2%; padding: 2%; background-color: #f8f9fa; border-radius: 5px;">
        <h2>
            Bienvenido operador ¿como estas hoy?
        </h2>
        <p>Navega por el menu para realizar tus tareas segun tus necesitades</p>
        <h2>Inicio</h2>
        <p>Si le das a l incio podras ver la pantalla en la que lees esto, donde te explicamos un poco que puedes hacer en cada seccion</p>
        <h2>Usuario</h2>
        <p>Si seleccionas usuario veras tu propio perfil y podras modificarlo, si es necesario</p>
        <h2>Inventario</h2>
        <p>En el inventario podras ver las herramientas y hacer la peticion de las herramientas, o ver los materiales que estan registrados en el sistema</p>
        <h2>Pedido</h2>
        <p>Veras los pedidos que estan registrados</p>
    </section>
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
    </footer style="margin-bottom: 0%;">

    <script src="../com_index.js"></script>
</body>
</html>