<?php
    //Se dividen las consultas en dos, en este caso experiencia de un usuario
    if($_GET["Con_Multi"] == "Expe"){
        // Consulta específica del administrador y del operador que muestra las experiencias
    include("../../Modelos/Mod_Usuario.php");
    $objeto = new usuario(num_doc_f: $_GET["numero_doc"]);
    $respuesta = $objeto->consultar_experiencia();
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
                <tr>
                    <th>CODIGO USUARIO:</th>
                    <th>NOMBRE EMPRESA:</th>
                    <th>CARGO:</th>
                    <th>FECHA INICIO:</th>
                    <th>FECHA FIN:</th>
                    <th>FECHA FIN:</th>
                    <th>TELEFONO EMPRESA:</th>
                    <th>NOMBRE DE CONTACTO:</th>
                    <th colspan='2'>ACCIONES:</th>

                </tr>
                <?php
                foreach ($respuesta as $valor) {
                    echo "<tr>
                            
                            <td>{$valor['Codigo_Usuario']}</td>
                        </tr>
                        <tr>
                            <td>{$valor['Nombre_Empresa']}</td>
                        </tr>
                        <tr>
                            <td>{$valor['Cargo']}</td>
                        </tr>
                        <tr>
                            <td>{$valor['Fecha_Inicio']}</td>
                        </tr>
                        <tr>
                            <td>{$valor['Fecha_Fin']}</td>
                        </tr>
                        <tr>
                            <td>{$valor['Telefono_empresa']}</td>
                        </tr>
                        <tr>
                            <td>{$valor['Nombre_Contacto']}</td>
                        </tr>
                        <tr>
                            <td><a href='Act_Multi.php?Act_Multi=Act_Expe&num_doc={$valor['Codigo_Usuario']}'>Actualizar</a></td>
                            <td><a href='Eli_Multi.php?Eli_Multi=Eli_Expe&num_doc={$valor['Codigo_Usuario']}>Eliminar</a></td>
                        </tr>
                        ";
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
    //En este caso se muestra el certificado de un usuario
    else if($_GET["Con_Multi"] == "Cert"){
        // Consulta específica del administrador y del operador que muestra las experiencias
    include("../../../Modelos/Mod_Usuario.php");
    $objeto = new usuario(num_doc_f: $_GET["numero_doc"]);
    $respuesta = $objeto->consultar_certificado();
    var_dump($_GET);
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
                <tr>
                    <th>CODIGO USUARIO:</th>
                    <th>CERTIFICADO:</th>
                    <th>NOMBRE CERTIFICADO:</th>
                    <th>ORGANIZACION DE ORIGEN:</th>
                    <th>FECHA DEL CERTIFICADO:</th>
                    <th>ACCIONES:</th>
                </tr>
                <?php
                foreach ($respuesta as $valor) {
                    echo "
                        <tr>
                            <td>{$valor['Codigo_Usuario']}</td>
                        </tr>
                        <tr>
                            <td>{$valor['Nombre_Certificado']}</td>
                        </tr>
                        <tr>
                            <td>{$valor['Organizacion_Emisora']}</td>
                        </tr>
                        <tr>
                            <td>{$valor['Fecha_Expedicion']}</td>
                        </tr>
                        <tr>
                            <td>{$valor['Certificacion']}</td>
                        </tr>
                        <tr>
                            <td><a href='Act_Multi.php?Act_Multi=Act_Cert&num_doc={$valor['Codigo_Usuario']}'>Actualizar</a></td>
                            <td><a href='Eli_Multi.php?Eli_Multi=Ali_Cert&num_doc={$valor['Codigo_Usuario']}>Eliminar</a></td>
                        </tr>
                        ";
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
?>