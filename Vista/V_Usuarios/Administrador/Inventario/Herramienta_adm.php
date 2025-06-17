<?php
    ob_start();
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
            <a href="../../../Controladores/Cerrar.php">Cerrar sesion</a>
        </div>
    </nav>
    <nav class="nav_inventario" class="conjunto-enlaces">
        <a href="Herramienta_adm.php" class="enlaces" style="margin-left: 1%; margin-right: 0;">Herramienta</a>
        <a href="Material_adm.php" class="enlaces" style="margin-left: 1%; margin-right: 0;">Material</a>
    </nav>
    <?php
        if(!empty($_GET)){
            if($_GET["accion_her"] == "reg"){
                ?>
                <section>
                    <form action="Herramienta_adm.php?accion_her=reg_g" method="post" enctype="multipart/form-data">
                        <div>
                            <label>Nombre de herramienta:</label>
                            <input type="text" name="nombre" required>
                        </div>
                        <div>
                        <label for="tip_her">Tipo Herramienta:</label>
                <select name="tip_her" id="tip_her">
                    <option value="Herramienta de Mano">Herramienta de Mano</option>
                    <option value="Herramienta de Instalacion">Herramienta de Instalacion</option>
                    <option value="Herramienta de Taller">Herramienta de Taller</option>
                    <option value="Herramienta de Oficina">Herramienta de Oficina</option>
                    <option value="Maquinaria pesada">Maquinaria pesada</option>
                </select>
                        </div>
                        <div>
                            <label>Cantidad:</label>
                            <input type="number" name="cantidad" class="form-control" required>
                        </div>
                        <div>
                            <label>Imagen herramienta:</label>
                            <input type="file" name="ima_her" class="form-control">
                        </div>
                        <div>
                            <button type="submit" name="accion_her" value="reg_g" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </section>
                <?php
            }else if($_GET["accion_her"] == "reg_g"){
                // Se crea el espacio para el registro de una imagen de una herramienta
                $imagen_h = null;
                // Se revisa si hay un archivo en el arreglo FILES
                if(!empty($_FILES['ima_her']['name'])){
                    //Se convierte la imagen en una cadena binaria
                    $imagen_h = file_get_contents($_FILES['ima_her']['tmp_name']);  
                    // La imagen se convierte a una cadena binaria
                    //var_dump($imagen_h);
                }
                include ("../../../../Modelos/Mod_Inv_Herra.php");
                $objeto = new inventario_herramienta(
                    nombre_f:$_POST["nombre"],
                    tipo_herramienta_f:$_POST["tip_her"],
                    cantidad_f:$_POST["cantidad"],
                    imagen_herramienta_f:$imagen_h,
                    registrado_por_f:$_SESSION["id_usuario"]
                );
                //var_dump($objeto);
                $R = $objeto -> registrar_inv_h();
                if(!empty($R)){
                    header("location: Herramienta_adm.php");
                }
            }
            else if($_GET["accion_her"] == "con"){
                include ("../../../../Modelos/Mod_Inv_Herra.php");
                $objeto = new inventario_herramienta(nombre_f:$_POST["nom_h"]);
                $respuesta = $objeto->consultar_especifica_inv_h();
                ?>
                <section>
                    <h2>Detalles de la Herramienta</h2>
                    <table>
                    <tr>
                        <th>ID Herramienta</th>
                        <th>Nombre</th>
                        <th>Tipo de herramienta</th>
                        <th>Cantidad</th>
                        <th>Imagen de la Herramienta</th>
                        <th colspan='2'>ACCIONES</th>
                    </tr>
                    <?php
                    foreach ($respuesta as $valor) {
                        echo "<tr>
                                <td>{$valor['ID_Inventario_H']}</td>
                                <td>{$valor['Nombre']}</td>
                                <td>{$valor['Tipo_Herramienta']}</td>
                                <td>{$valor['Cantidad']}</td>
                                <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['Imagen_Herramienta'])."'/></td>
                                <td><a href='Herramienta_adm.php?accion_her=act&id_herramienta={$valor['ID_Inventario_H']}'>Modificar</a></td>
                                <td><a href='Herramienta_adm.php?accion_her=eli&id_herramienta={$valor['ID_Inventario_H']}'>Eliminar</a></td>
                            </tr>";
                    }
                    ?>
                    </table>
                </section>
                <?php            
            }else if($_GET["accion_her"] == "act"){
                include "../../../../Modelos/Mod_Inv_Herra.php";
                $objeto = new inventario_herramienta(
                    id_inventario_herramienta_f:$_GET["id_herramienta"]
                );
                $respuesta = $objeto->consultar_especifica_inv_her();
                ?>
                <section>
                    <form action="Herramienta_adm.php?accion_her=gua" enctype="multipart/form-data"  method="post">
                        <div>
                            <input type="hidden" readonly name="id_her" value="<?php echo $_GET["id_herramienta"]; ?>"> 
                        </div>
                        <div>
                            <label>Nombre:</label>
                            <input type="text" name="nombre" value="<?php echo $respuesta[0]['Nombre']; ?>" class="form-control" required>
                        </div>
                        <div>
                        <label for="tip_her">Tipo Herramienta:</label>
                <select name="tip_her" id="tip_her">
                    <option value="Herramienta de Mano">Herramienta de Mano</option>
                    <option value="Herramienta de Instalacion">Herramienta de Instalacion</option>
                    <option value="Herramienta de Taller">Herramienta de Taller</option>
                    <option value="Herramienta de Oficina">Herramienta de Oficina</option>
                    <option value="Maquinaria pesada">Maquinaria pesada</option>
                </select>
                        </div>
                        <div>
                            <label>Cantidad:</label>
                            <input type="number" name="cantidad" value="<?php echo $respuesta[0]['Cantidad']; ?>" class="form-control" required>
                        </div>
                        <div>
                            <img height="120" src="data:image/jpeg;base64,<?php echo base64_encode($respuesta[0]['Imagen_Herramienta']); ?>">
                            <input type="file" name="imagen" class="form-control">
                        </div>
                        <div>
                            <button type="submit" name="accion_her" value="gua" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </section>
                <?php
            }else if($_GET["accion_her"] == "gua" or $_POST['accion_her'] == 'gua'){
                include("Herra_gua.php");
                
            }else if($_GET["accion_her"] == "eli"){
                include "../../../../Modelos/Mod_Inv_Herra.php";
                $objeto = new inventario_herramienta(
                    id_inventario_herramienta_f:$_GET["id_herramienta"]
                );
                $respuesta = $objeto->eliminar_inv_h();
                header("location: Herramienta_adm.php");
            }else if($_GET["accion_her"] == "prestadas"){
                include "Prestadas.php";
            }else if($_GET["accion_her"] == "mod_pre"){
                include "Modificar.php";
            }else if($_GET["accion_her"] == "guardar_fec"){
                include "Gua_Mod_Ped.php";
            }
        }else{
            include ("../../../../Modelos/Mod_Inv_Herra.php");
            $objeto = new inventario_herramienta();
            $respuesta = $objeto->consultar_general_inv_h(); 
            //var_dump($respuesta);          
            ?>
            <section>
                <div>
                    <a href="Herramienta_adm.php?accion_her=reg">Registrar Herramienta</a>
                    <br>
                    Ver las herramientas prestadas <a href="Herramienta_adm.php?accion_her=prestadas">Aqui</a>
                </div>
                <div>
                    <form action="Herramienta_adm.php?accion_her=con" method="post">
                        <div>
                            <label for="NOM_HER">Nombre de la herramienta:</label>
                            <input type="text" name="nom_h" id="NOM_HER">
                        </div>
                        <div>
                            <button>Buscar</button>
                        </div>
                    </form>
                </div>
                <h2>Inventario de Herramientas</h2>
                <table>
                    <tr>
                        <th>ID Herramienta</th>
                        <th>Nombre</th>
                        <th>Tipo de herramienta</th>
                        <th>Cantidad</th>
                        <th>Imagen de la Herramienta</th>
                        <th colspan='2'>ACCIONES</th>
                    </tr>
                    <?php
                    //var_dump($respuesta);
                    //var_dump($respuesta["Imagen_Herramienta"]);
                    foreach ($respuesta as $valor) {
                        echo "<tr>
                                <td>{$valor['ID_Inventario_H']}</td>
                                <td>{$valor['Nombre']}</td>
                                <td>{$valor['Tipo_Herramienta']}</td>
                                <td>{$valor['Cantidad']}</td>
                                <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['Imagen_Herramienta'])."'/></td>
                                <td><a href='Herramienta_adm.php?accion_her=act&id_herramienta={$valor['ID_Inventario_H']}'>Modificar</a></td>
                                <td><a href='Herramienta_adm.php?accion_her=eli&id_herramienta={$valor['ID_Inventario_H']}'>Eliminar</a></td>
                            </tr>";
                    }
                    ?>
                </table>
                <a href="Reporte_herra.php">
                    <button>Generar reporte de herramientas</button>
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