<?php
//var_dump($_POST);
//var_dump($_GET);
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
            Bienvenido operador <?php echo $respuesta[0]["Nombre"]; ?>
        </div>
        <div>
            <a href="../Principal/Cerrar.php">Cerrar sesion</a>
        </div>
    </nav>     
    
        <section>
    <?php
if (!empty($_GET)) {
    if ($_GET["accion"] == "reg") {
        include "Gua_ped.php";
    } elseif ($_GET["accion"] == "con") {
        ?>
            <h2>Consulta de Pedido </h2>
        <div>
            <?php
            include "Consulta_ped.php";
            ?>
        </div>
        
        <?php
    }
} else {
    // Controlador para la consulta general de pedidos
            include ("../../../../Modelos/Mod_Pedido.php");
            $objeto = new pedido();
            $respuesta = $objeto->consultar_pedido();
        ?>
                <section>
                    <form action="Pedidos_op.php?accion=con" method="post">
                        <div>
                            <label for="num">Numero de documento del cliente:</label>
                            <input type="number" name="num_doc" id="num">
                        </div>
                        <div>
                            <button>Consultar</button>
                        </div>
                    </form>
                    <table>
    <tr>
        <th>ID Pedido</th>
        <th>Observacion</th>
        <th>Abono</th>
        <th>Fecha Solicitud</th>
        <th>Fecha Entrega</th>
        <th>Nombre Producto</th>
        <th>Espesificaciones</th>
        <th>Numero de documento</th>
        <th>Nombre</th>
        <th>Apellido</th>
    </tr>
    <?php
    foreach ($respuesta as $valor) {
        // Crear una lista de especificaciones
        $especificaciones = [];
        for ($i = 1; $i <= 10; $i++) {
            $especificacion = $valor["Especificacion{$i}"];
            if (!empty($especificacion)) {
                $especificaciones[] = $especificacion;
            }
        }
        // Unir especificaciones con comas
        $listaEspecificaciones = implode(', ', $especificaciones);
        
        echo "<tr>
                <td>{$valor['ID_Pedido']}</td>
                <td>{$valor['Especificacion']}</td>
                <td>{$valor['Abono']}</td>
                <td>{$valor['Fecha_Solicitud']}</td>
                <td>{$valor['Fecha_Entrega']}</td>
                <td>{$valor['NombreProducto']}</td>
                <td>{$listaEspecificaciones}</td>
                <td>{$valor['Numero_documento']}</td>
                <td>{$valor['NombreUsuario']}</td>
                <td>{$valor['Apellido']}</td>
            </tr>";
    }
    ?>
</table>
                </section>
                <?php
        }
    ?>
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