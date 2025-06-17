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
            Bienvenido Administrador <?php echo $respuesta[0]["Nombre"]; ?>
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
            if($_GET["accion_mat"] == "con"){
                include ("../../../../Modelos/Mod_Inv_Mat.php");
                $objeto = new inventario_material(nombre_f:$_POST["nom_mat"]);
                $respuesta = $objeto->consultar_inv_mat();
                ?>
                <section>
                    <h2>Detalles del Material</h2>
                    <table>
                        <tr>
                            <th>ID Material</th>
                            <th>Fecha de registro</th>
                            <th>Cantidad de material</th>
                            <th>Nombre material</th>
                            <th>Descripcion</th>
                            <th>Fecha_Compra</th>
                            <th>Valor unidad</th>
                            <th>Valor total</th>
                            <th>Imagen material</th>
                            <th>Registrado por</th>
                            <th colspan='2'>ACCIONES</th>
                        </tr>
                        <?php
                        foreach ($respuesta as $valor) {
                            echo "<tr>
                                    <td>{$valor['ID_Inventario_M']}</td>
                                    <td>{$valor['Fecha_Registro']}</td>
                                    <td>{$valor['Cantidad']}</td>
                                    <td>{$valor['Nombre']}</td>
                                    <td>{$valor['Descripcion']}</td>
                                    <td>{$valor['Fecha_Compra']}</td>
                                    <td>{$valor['Valor_Unidad']}</td>
                                    <td>{$valor['Valor_Total']}</td>
                                    <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['Imagen_Material'])."'/></td>
                                    <td>{$valor['Codigo_Usuario']}</td>
                                    <td><a href='Material_adm.php?accion_mat=act&id_material={$valor['ID_Inventario_M']}'>Modificar</a></td>
                                    <td><a href='Material_adm.php?accion_mat=eli&id_material={$valor['ID_Inventario_M']}'>Eliminar</a></td>
                                </tr>";
                        }
                        ?>
                    </table>
                </section>
                <?php
            }else if($_GET["accion_mat"] == "act"){
                include ("../../../../Modelos/Mod_Inv_Mat.php");
                $objeto = new inventario_material(
                    $_GET['id_material']
                );
                $respuesta = $objeto->consulta_especifica();
                //var_dump($respuesta);
                ?>
                <section>
                    <form action="Material_adm.php?accion_mat=gua" method="post" enctype="multipart/form-data">
                        <div> <!-- Id de material -->
                            <label>ID del material:</label>
                            <input type="number" readonly name="id_material" value="<?php echo $respuesta[0]['ID_Inventario_M']; ?>">
                        </div>
                        <div> <!-- fecha registro de material -->
                            <label>Fecha de registro:</label>
                            <input type="date" readonly name="fecha_reg" value="<?php echo $respuesta[0]['Fecha_Registro']; ?>" class="form-control" required>
                        </div>
                        <div> <!-- cantidad del material -->
                            <label>Cantidad:</label>
                            <input type="number" name="cant" value="<?php echo $respuesta[0]['Cantidad']; ?>" class="form-control" required>
                        </div>
                        <div> <!-- nombre  del material -->
                            <label>Nombre:</label>
                            <input type="text" name="nom" value="<?php echo $respuesta[0]['Nombre']; ?>" class="form-control" required>
                        </div>
                        <div> <!-- descripcion del material -->
                            <label>Descripcion:</label>
                            <input type="text" name="descr" value="<?php echo $respuesta[0]['Descripcion']; ?>" class="form-control" required>
                        </div>
                        <div> <!-- feccha de compra del material -->
                            <label>Fecha de compra:</label>
                            <input type="date" name="fec_com" value="<?php echo $respuesta[0]['Fecha_Compra']; ?>" class="form-control" required>
                        </div>
                        <div> <!-- valor unidad del material -->
                            <label>Valor unidad:</label>
                            <input type="number" name="val_uni" value="<?php echo $respuesta[0]['Valor_Unidad']; ?>" class="form-control" required>
                        </div>
                        <div> <!-- iamgen del material -->
                            <label>Imagen:</label>
                            <input type="file" name="ima_m" class="form-control" >
                        </div>
                        <!-- Se hace la divicion de los dos inventarios -->
                        <div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </section>
                <?php 
            }else if($_GET["accion_mat"] == "reg"){
                ?>
                <section>
                    <form action="Material_adm.php?accion_mat=guardar" method="post" enctype="multipart/form-data">
                        <h4>Registrar un material</h4>
                        <div>
                            <!-- Cantidad -->
                        <label for="cantidad"> Cantidad: 
                            <input type="number" name="cant_m" id="cantidad" required>
                        </label>
                        </div>
                        <div>
                            <!-- Nombre -->
                        <label for="nombre"> Nombre:
                            <input type="text" name="nom_m" id="nombre" required>
                        </label>
                        </div>
                        <div>
                            <!-- Descripcion -->
                        <label for="descripcion"> Descripcion: 
                            <textarea name="descr_m" id="descripcion" cols="20" rows="2"  required></textarea>
                        </label>
                        </div>
                        <div>
                            <!-- Fecha_Compra -->
                        <label for="fecha_compra"> Fecha de compra:
                            <input type="date" name="fec_com_m" id="fecha_compra"  required>
                        </label>
                        </div>
                        <div>
                            <!-- Valor_Unidad -->
                        <label for="val_uni"> Valor Unidad:
                            <input type="number" name="val_uni" id="val_uni"  required>
                        </label>
                        </div>
                        <div>
                            <!-- Imagen_Material -->
                        <label for="Imagen_material"> Imagen de material
                            <input type="file" name="ima_m" id="Imagen_material">
                        </label>
                        </div>
                        <!-- Botón de Envío -->
                        <div>
                            <button name="Reg_Inv" value="Inv_M" type="submit">Registrar Material</button>
                        </div>
                    </form>
                </section>
                <?php
            }else if($_GET["accion_mat"] == "guardar"){
                include "../../../../Modelos/Mod_Inv_Mat.php";
                $tot = $_POST["cant_m"]*$_POST["val_uni"];
                $imagen_m = null;
                //var_dump($tot);
                if(!empty($_FILES["ima_m"]["name"])){
                    $imagen_m = file_get_contents($_FILES['ima_m']['tmp_name']);  //Se convierte la imagen en una cadena binaria
                }
                $objeto = new inventario_material(
                    cantidad_f:$_POST["cant_m"],
                    nombre_f:$_POST["nom_m"],
                    descripcion_f:$_POST["descr_m"],
                    fecha_compra_f:$_POST["fec_com_m"],
                    valor_unidad_f:$_POST["val_uni"],
                    valor_total_f:$tot,
                    imagen_material_f:$imagen_m,
                    registrado_por_f:$_SESSION["id_usuario"]
                );
                $respuesta = $objeto->registrar_material();
                header("location: Material_adm.php");
            }else if($_GET["accion_mat"] == "asignar_f"){
                include "Asignar_mat.php";
            }else if($_GET["accion_mat"] == "asig_form"){
                include "Asignar_2.php";
            }else if($_GET["accion_mat"] == "guardar_crea"){
                include "Guardar_crea.php";
            }else if($_GET["accion_mat"] == "ver_mat"){
                include "Materiales.php";
            }else if($_GET["accion_mat"] == "act_pro_mat"){
                include "Formact.php";
            }else if($_GET["accion_mat"] == "gua_act_pro_mat"){
                include "Guardar_act_crea.php";
            }else if($_GET["accion_mat"] == "guardar_2"){
                include "Asignar_3.php";
            }else if($_GET["accion_mat"] == "ir_actu"){
                include "Actualizar_crea.php";
            }
            else if($_GET["accion_mat"] == "gua"){
                include "../../../../Modelos/Mod_Inv_Mat.php";
                $tot = $_POST["cant"]*$_POST["val_uni"];
                $imagen_m = null;
                if(!empty($_FILES["ima_m"]["name"])){
                    $imagen_m = file_get_contents($_FILES['ima_m']['tmp_name']);  //Se convierte la imagen en una cadena binaria
                }else{
                    $objeto = new inventario_material(
                        id_inventario_material_f:$_POST["id_material"]
                    );
                    $respuesta = $objeto->conseguir_imagen();
                    $imagen_m = $respuesta[0]['Imagen_Material'];
                }
                $objeto = new inventario_material(
                    id_inventario_material_f:$_POST["id_material"],
                    cantidad_f:$_POST["cant"],
                    nombre_f:$_POST["nom"],
                    descripcion_f:$_POST["descr"],
                    fecha_compra_f:$_POST["fec_com"],
                    valor_unidad_f:$_POST["val_uni"],
                    valor_total_f:$tot,
                    imagen_material_f:$imagen_m
                );
                $respuesta = $objeto->actualizar_inv_mat();
                header("location: Material_adm.php");
            }else if($_GET["accion_mat"] == "eli"){
                include "../../../../Modelos/Mod_Inv_Mat.php";
                $objeto = new inventario_material(
                    $_GET["id_material"]
                );
                $respuesta = $objeto->eliminar_inv_mat();
                header("location: Material_adm.php");
            }
            else{
                header ("location: Material_adm.php");
            }
        }else{
            ?>
        <section class="Material">
            <!-- material -->
            <div>
                <?php
                        include ("../../../../Modelos/Mod_Inv_Mat.php");
                        $objeto = new inventario_material();
                        $respuesta = $objeto->consultar_material(); // Asegúrate de que el método existe en el modelo                
                        ?>
                <section>
                        Da click <a href="Material_adm.php?accion_mat=reg">aqui</a> para registrar materiales
                        <p>Ir a el formulario para <a href="Material_adm.php?accion_mat=asignar_f">asignar</a> materiales</p>
                        <form action="Material_adm.php?accion_mat=con" method="post">
                            <div>
                                <label for="NOM_MAT"></label>
                                <input type="text" name="nom_mat" minlenght="2" maxlenght="50"  id="NOM_MAT" required>
                            </div>
                            <div>
                                <button type="submit" name="accion_mat" value="con">Ver material</button>
                            </div>
                        </form>
                        <h2>Inventario de Materiales</h2>
                        <table>
                            <tr>
                                <th>ID Material</th>
                                <th>Fecha de registro</th>
                                <th>Cantidad de material</th>
                                <th>Nombre material</th>
                                <th>Descripcion</th>
                                <th>Fecha_Compra</th>
                                <th>Valor unidad</th>
                                <th>Valor total</th>
                                <th>Imagen material</th>
                                <th>Registrado por</th>
                                <th colspan='2'>ACCIONES</th>
                            </tr>
                            <?php
                            foreach ($respuesta as $valor) {
                                echo "<tr>
                                        <td>{$valor['ID_Inventario_M']}</td>
                                        <td>{$valor['Fecha_Registro']}</td>
                                        <td>{$valor['Cantidad']}</td>
                                        <td>{$valor['Nombre']}</td>
                                        <td>{$valor['Descripcion']}</td>
                                        <td>{$valor['Fecha_Compra']}</td>
                                        <td>{$valor['Valor_Unidad']}</td>
                                        <td>{$valor['Valor_Total']}</td>
                                        <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['Imagen_Material'])."'/></td>
                                        <td>{$valor['Codigo_Usuario']}</td>
                                        <td><a href='Material_adm.php?accion_mat=act&id_material={$valor['ID_Inventario_M']}'>Modificar</a></td>
                                        <td><a href='Material_adm.php?accion_mat=eli&id_material={$valor['ID_Inventario_M']}'>Eliminar</a></td>
                                    </tr>";
                            }
                            ?>
                        </table>
                    </section>
            </div>
            <a href="Reporte_mate.php">
                    <button>Generar reporte de materiales</button>
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