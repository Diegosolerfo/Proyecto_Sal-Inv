<?php
// Consulta específica del administrador y del operador, para el administerador
    $objeto = new usuario(num_doc_f: $_SESSION['num_doc']);
    $respuesta = $objeto->consultar_usuario_especifi();

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
                            <th rowspan='6'>ACCIONES:</th>
                                <td rowspan='3'><a href='Act_Usuario.php?Act=Act_Cli&num_doc={$valor['Numero_documento']}'>Modificar</a></td>
                                <td rowspan='3'><a href='Eli_Usuario.php?num_doc={$valor['Numero_documento']}'>Eliminar</a></td>
                        </tr>";
                } else {
                    echo "<tr>
                            <th rowspan='6'>ACCIONES:</th>
                        </tr>
                            <tr><td><a href='../../../../Controladores/Usuario/Act_Usuario.php?Act=Act_U&num_doc={$valor['Numero_documento']}'>Modificar</a></td></tr>
                        ";
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

?>