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
            <a href="../Principal/Cerrar.php">Cerrar sesion</a>
        </div>
    </nav>
    
    
    <!-- Vista principal del usuario -->
    <?php
    // Conjunto primario de condiciones
        if(!empty($_GET)){
            // Conjunto secundario de condiciones
            if($_GET["accion"] == "reg"){
                ?>
                <section>
                    <?php
                        include "Usuarios.php";
                    ?>
                </section>
                <?php
            }else if($_GET["accion"] == "reg_multi"){
                ?>
                <section>
                    <?php
                    $objeto = new usuario(
                        num_doc_f:$_POST["num_doc"], 
                        clave_f:$_POST["clave"],
                        nombre_f:$_POST["nombre"],
                        apellido_f:$_POST["apellido"],
                        correo_f:$_POST["correo"],
                        fecha_nac_f:$_POST["fecha_nac"],
                        direccion_f:$_POST["direccion"],
                        genero_f:$_POST["genero"],
                        telefono_f:$_POST["telefono"],
                        rol_f:$_POST["rol"],
                        eps_f:$_POST["eps"],
                        rh_f:$_POST["rh"],
                        tipo_sangre_f:$_POST["tip_san"],
                        registrado_por_f:$_SESSION["id_usuario"]
                    );
                    $R = $objeto -> registrar_usuario_admop();
                    if(!empty($R)){
                            header("location: Usuario_adm.php");
                    }
                    ?>
                </section>
                <?php
            }else if ($_GET["accion"] == "act") {
                ?>
                <section>
                <?php
                include("actualizar.php");
                ?>
                </section>
                <?php
            }else if ($_GET["accion"] == "guardar") {
                ?>
                <section>
                <?php
                include("guardar_usu.php");
                ?>
                </section>
                <?php
            }else if ($_GET["accion"] == "Sin_Exp") {
                ?>
                <section>
                <?php
                header("location: Multi/Reg_multi.php?Reg_Multi=Cert&numero_doc={$_GET['num_doc']}");
                ?>
                </section>
                <?php
            } else if ($_GET["accion"] == "Sin_Cer") {
                ?>
                <section>
                <?php
                header("location: Usuario_adm.php");
                ?>
                </section>
                <?php
            } else if ($_GET["accion"] == "Expe") {
                ?>
                <section>
                <?php
                include("Experiencia.php");
                ?>
                </section>
                <?php
            } else if ($_GET["accion"] == "Cert") {
                ?>
                <section>
                <?php
                include("Certificado.php");
                ?>
                </section>
                <?php
            } else if ($_GET["accion"] == "Expe_for") {
                ?>
                <section>
                <?php
                include("form_experiencia.php");
                ?>
                </section>
                <?php
            } else if ($_GET["accion"] == "Cert_for") {
                ?>
                <section>
                <?php
                include("form_certificado.php");
                ?>
                </section>
                <?php
            }else if ($_GET["accion"] == "Expe_con") {
                ?>
                <section>
                <?php
                include("Con_Experiencia.php");
                ?>
                </section>
                <?php
            } else if ($_GET["accion"] == "Cert_con") {
                ?>
                <section>
                <?php
                include("Con_Certificado.php");
                ?>
                </section>
                <?php
            } else if($_GET["accion"] == "recu_cla"){
                ?>
                <section>
                <?php
                include("Form_rec.php");
                ?>
                </section>
                <?php
            } else if($_GET["accion"] == "recuperar"){
                ?>
                <section>
                <?php
                include("cambio.php");
                ?>
                </section>
                <?php
            }else if($_GET["accion"] == "act_cert"){
                ?>
                <section>
                <?php
                include("actualizar_certificado.php");
                ?>
                </section>
                <?php
            }else if($_GET["accion"] == "act_expe"){
                ?>
                <section>
                <?php
                include("cambio.php");
                ?>
                </section>
                <?php
            }
            else if($_GET["accion"] == "eli"){
                include ("eliminar.php");
                }
        }
        // Hace parte del conjunto primario
        else if(!empty($_POST)){
            if($_POST["accion"] == "usu_esp"){
                $objeto = new usuario(num_doc_f: $_POST['num_doc']);
                $respuesta = $objeto->consultar_usuario_especifi();
                ?>
                <section>
                    <table>
                        <?php
                        foreach ($respuesta as $valor) {
                            echo "<tr>
                                    <th>NÚMERO DE DOCUMENTO:</th>
                                    <td>{$valor['Numero_documento']}</td>
                                </tr>
                                <tr>
                                    <th>NOMBRE:</th>
                                    <td>{$valor['Nombre']}</td>
                                </tr>
                                <tr>
                                    <th>APELLIDO:</th>
                                    <td>{$valor['Apellido']}</td>
                                </tr>
                                <tr>
                                    <th>CORREO ELECTRÓNICO:</th>
                                    <td>{$valor['Correo']}</td>
                                </tr>
                                <tr>
                                    <th>FECHA DE NACIMIENTO:</th>
                                    <td>{$valor['Fecha_nacimiento']}</td>
                                </tr>
                                <tr>
                                    <th>DIRECCIÓN:</th>
                                    <td>{$valor['Direccion']}</td>
                                </tr>
                                <tr>
                                    <th>GÉNERO:</th>
                                    <td>{$valor['Genero']}</td>
                                </tr>
                                <tr>
                                    <th>TELÉFONO:</th>
                                    <td>{$valor['Telefono']}</td>
                                </tr>";

                            if ($valor["Rol"] == "Administrador" || $valor["Rol"] == "Operador") {
                                echo "<tr>
                                        <th>ROL:</th>
                                        <td>{$valor['Rol']}</td>
                                    </tr>
                                    <tr>
                                        <th>EPS:</th>
                                        <td>{$valor['EPS']}</td>
                                    </tr>
                                    <tr>
                                        <th>RH:</th>
                                        <td>{$valor['RH']}</td>
                                    </tr>
                                    <tr>
                                        <th>Tipo de Sangre:</th>
                                        <td>{$valor['Tipo_sangre']}</td>
                                    </tr>";
                            }
                            if ($valor["Rol"] == "Cliente") {
                                echo "<tr>
                                        <th rowlspan='2'>ACCIONES:</th>
                                            <td><a href='Act_Usuario.php?Act=Act_Cli&num_doc={$valor['Numero_documento']}'>Modificar</a></td>
                                            <td><a href='Eli_Usuario.php?num_doc={$valor['Numero_documento']}'>Eliminar</a></td>
                                    </tr>";
                            } else {
                                echo "<tr>
                                        <th rowlspan='6'>ACCIONES:</th>
                                        <td><a href='Usuario_adm.php?accion=act&num_doc={$valor['Numero_documento']}'>Modificar</a></td>
                                        <td><a href='Usuario_adm.php?accion=eli&num_doc={$valor['Numero_documento']}'>Eliminar</a></td>
                                    </tr>";
                            }
                        }
                        ?>
                    </table>
                </section>
                <?php
            }
        }else{  
    ?>
    <!-- Consulta de la tabla usuario -->
    <section>
        <!--  Boton y formulario para ver a un usuario unico -->
    <div>
        <form action="Usuario_adm.php" method="post">
            <div>
            <label for="NUM_DOC">Digite el numero de documento para buscar a este usuario: </label>
            <input type="number" name="num_doc" min="1000000000" max="999999999999" id="NUM_DOC" required>
            </div>
            <div>
                <button type="submit" name="accion" value="usu_esp">
                    Ver usuario
                </button>
            </div>
        </form>
        </div>
        <div>
            <h2>Aqui puedes ver a todos los usuarios</h2>
        </div>
        <div class="usuarios_consulta_contenedor" style="overflow-x: auto;">
        <table class="usuarios_consulta">
                <tr>
                    <th>CÓDIGO</th>
                    <th>NÚMERO DE DOCUMENTO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>CORREO ELECTRÓNICO</th>
                    <th>FECHA NACIMIENTO</th>
                    <th>DIRECCIÓN</th>
                    <th>GÉNERO</th>
                    <th>TELÉFONO</th>
                    <th>PERFIL</th>
                    <th>EPS</th>
                    <th>RH</th>
                    <th>Tipo de sangre</th>
                    <th colspan="4">ACCIONES</th>
                </tr>
                <?php
                $objeto = new usuario();
                $respuesta = $objeto->consultar_usuario_general();
                foreach ($respuesta as $valor) {
                    echo "<tr>
                            <td>{$valor['ID_Usuario']}</td>
                            <td>{$valor['Numero_documento']}</td>
                            <td>{$valor['Nombre']}</td>
                            <td>{$valor['Apellido']}</td>
                            <td>{$valor['Correo']}</td>
                            <td>{$valor['Fecha_nacimiento']}</td>
                            <td>{$valor['Direccion']}</td>
                            <td>{$valor['Genero']}</td>
                            <td>{$valor['Telefono']}</td>
                            <td>{$valor['Rol']}</td>
                            <td>{$valor['EPS']}</td>
                            <td>{$valor['RH']}</td>
                            <td>{$valor['Tipo_sangre']}</td>";
                    
                    // Condicional para el enlace según el rol
                    if ($valor["Rol"] == "Administrador" || $valor["Rol"] == "Operador") {
                        echo "<td><a href='Usuario_adm.php?accion=act&num_doc={$valor['Numero_documento']}'>Modificar</a></td>";
                    } elseif ($valor["Rol"] == "Cliente") {
                        echo "<td><a href='Usuario_adm.php?accion=act&num_doc={$valor['Numero_documento']}'>Modificar</a></td>";
                    }
                    
                    // Enlace para "Eliminar"
                    echo "<td><a href='Usuario_adm.php?accion=eli&num_doc={$valor['Numero_documento']}'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <!-- Boton de registro de un nuevo usuario-->
        <div>
            <a href="Usuario_adm.php?accion=reg">
                <button>Registrar un nuevo usuario</button>
            </a>
        </div>
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
            <a href="https://www.facebook.com/story.php/?story_fbid=800389882092382&id=100063641332693" target="_blank" class="text-dark me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/c.d.a.sanjose/p/CExYrsaHpaq/" target="_blank" class="text-dark me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>
                </a>
            </p>
        </div>
    </footer>
    
<script src="com_adm_c.js"></script>
</body>
</html>