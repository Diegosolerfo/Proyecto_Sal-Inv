<?php
if ($_GET["ti_con"] == "Con_G_U") {
    // Controlador para la consulta general de usuarios
    include("../../Modelos/Mod_Usuario.php");
    $objeto = new usuario();
    $respuesta = $objeto->consultar_usuario_general();
    
    if (!empty($respuesta)) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <title>Consulta general</title>
            <meta charset="UTF-8">
            <style>
                table, th, td {
                    border: 1px solid grey;
                }
            </style>
        </head>
        <body>
            <section>
            <table>
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
                        echo "<td><a href='Act_Usuario.php?Act=Act_U&num_doc={$valor['Numero_documento']}'>Modificar</a></td>";
                        echo "<td><a href='Multi/Reg_multi.php?Reg_Multi=Cert&numero_doc={$valor['Numero_documento']}'>Agregar Certificado</a></td>";
                        echo "<td><a href='Multi/Reg_multi.php?Reg_Multi=Expe&numero_doc={$valor['Numero_documento']}'>Agregar Experiencia</a></td>";
                        echo "<td><a href='Multi/Con_multi.php?Con_Multi=Expe&numero_doc={$valor['Numero_documento']}'>Ver Experiencias</a></td>";
                        echo "<td><a href='Multi/Con_multi.php?Con_Multi=Cert&numero_doc={$valor['Numero_documento']}'>Ver Certificados</a></td>";
                    } elseif ($valor["Rol"] == "Cliente") {
                        echo "<td><a href='Act_Usuario.php?Act=Act_Cli&num_doc={$valor['Numero_documento']}'>Modificar</a></td>";
                    }
                    
                    // Enlace para "Eliminar"
                    echo "<td><a href='Eli_Usuario.php?num_doc={$valor['Numero_documento']}'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            </section>
        </body>
        </html>
        <?php
    } else {
        echo "No existen registros de usuario.";
    }
} elseif ($_GET["ti_con"] == "Con_E_U") {
    // Consulta específica del administrador y del operador, para el administerador
    if(!empty($_GET ["num_doc"])) {
        include("../../Modelos/Mod_Usuario.php");
        $objeto = new usuario(num_doc_f: $_GET['num_doc']);
        $respuesta = $objeto->consultar_usuario_especifi();
    }
    else{
        include("../../Modelos/Mod_Usuario.php");
        $objeto = new usuario(num_doc_f: $_POST['num_doc']);
        $respuesta = $objeto->consultar_usuario_especifi();
    }
    if (!empty($respuesta)) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <title>Consulta específica</title>
            <meta charset="UTF-8">
            <style>
                table, th, td {
                    border: 1px solid grey;
                }
            </style>
        </head>
        <body>
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
                                <th rowlspan='6'>ACCIONES:</th>
                                    <td rowspan='3'><a href='Act_Usuario.php?Act=Act_Cli&num_doc={$valor['Numero_documento']}'>Modificar</a></td>
                                    <td rowspan='3'><a href='Eli_Usuario.php?num_doc={$valor['Numero_documento']}'>Eliminar</a></td>
                            </tr>";
                    } else {
                        echo "<tr>
                                <th rowspan='6'>ACCIONES:</th>
                                <td><a href='Act_Usuario.php?Act=Act_U&num_doc={$valor['Numero_documento']}'>Modificar</a></td>
                                <td><a href='Eli_Usuario.php?num_doc={$valor['Numero_documento']}'>Eliminar</a></td>
                                <td><a href='Multi/Reg_multi.php?Reg_Multi=Expe&numero_doc={$valor['Numero_documento']}'>Agregar Experiencia</a></td>
                                <td><a href='Multi/Reg_multi.php?Reg_Multi=Cert&numero_doc={$valor['Numero_documento']}'>Agregar Certificado</a></td>
                                <td><a href='Multi/Con_multi.php?Con_Multi=Expe&numero_doc={$valor['Numero_documento']}'>Ver Expriencias</td>
                                <td><a href='Multi/Con_multi.php?Con_Multi=Cert&numero_doc={$valor['Numero_documento']}'>Ver Certificados</td>
                            </tr>";
                    }
                }
                ?>
            </table>
            </section>
        </body>
        </html>
        <?php
    } else {
        echo "No existen coincidencias para el documento consultado.";
    }
}