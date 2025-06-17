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
            Bienvenido Administrador <?php echo $respuesta[0]['Nombre']; ?>
        </div>
        <div>
            <a href="../Principal/Cerrar.php">Cerrar sesion</a>
        </div>
        
    </nav>
    <nav class="conjunto-enlaces">
        <a href="Herramienta_adm.php" class="enlaces" style="margin-left: 1%; margin-right: 0;">Herramienta</a>
        <a href="Material_adm.php" class="enlaces" style="margin-left: 1%; margin-right: 0;">Material</a>
    </nav>
    
    <section>
        <!-- Explicacion de el modulo de inventario -->
         <h1>Inventario</h1>
         <p>Este es el apartado del inventario donde se almacenan las herramientas y los materiales para realizar los productos
            que se ofrecen en la empresa. En este apartado se podra agregar, eliminar y modificar los materiales y herramientas
            que se necesiten para la fabricacion de los productos.

            <br>
            Para gestionar cualquiera de los dos tipos de inventario, da click arriba en su nombre para acceder a la seccion
            correspondiente.
            <br>
            <h2>Inventario de herramientas:</h2>
            <p>En esta sección podrás gestionar todas las herramientas disponibles en el inventario, es decir que podras: registrar, consultar,
            modificar y eliminar herramientas. Para ello, puedes utilizar el formulario de registro de herramientas que se encuentra
            a continuación. Asegúrate de ingresar todos los datos requeridos para un registro exitoso. Si presemtas alguna duda, no dudes
            en consultar el manual de usuario o contactar a los programadores del sistema.
            </p>
            <h2>Inventario de materiales:</h2>
            <p>En esta sección podrás gestionar todos los materiales disponibles en el inventario, es decir que podras: registrar, consultar,
            modificar y eliminar materiales. Para ello, puedes utilizar el formulario de registro de materiales que se encuentra
            a continuación. Asegúrate de ingresar todos los datos requeridos para un registro exitoso. Si presentas alguna duda, no dudes
            en consultar el manual de usuario o contactar a los programadores del sistema.
            </p>
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
    </footer>

    <script src="com_index.js"></script>
</body>
</html>