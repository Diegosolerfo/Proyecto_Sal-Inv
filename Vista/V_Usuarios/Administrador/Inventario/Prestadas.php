<?php
    include "../../../../Modelos/Mod_Inv_Herra.php";
    $objeto = new inventario_herramienta();
    $respuesta = $objeto->prestadas();    
    //var_dump($respuesta);
?>  
    <style>
            table, th, td {
                border: 1px solid grey;
                margin: 20px 0;
            }
    </style>
    <h5>Volver a <a href="Herramienta_adm.php">Herramientas</a>.</h5>
    <table>
                <tr>
                    <th>Nombre Herramienta</th>
                    <th>Tipo de herramienta</th>
                    <th>Imagen de la Herramienta</th>
                    <th>Salida</th>
                    <th>Fecha salida</th>
                    <th>Fecha llegada</th>
                    <th>Nombre usuario</th>
                    <th>Apellido</th>
                    <th>Disponibilidad</th>
                    <th>Modificar</th>
                </tr>
                <?php
                foreach ($respuesta as $valor) {
                    echo "<tr>
                            <td>{$valor['Nombre_Herramienta']}</td>
                            <td>{$valor['Tipo_Herramienta']}</td>
                            <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['Imagen_Herramienta'])."'/></td>
                            <td>{$valor['Salida']}</td>
                            <td>{$valor['Fecha_Salida']}</td>
                            <td>{$valor['Fecha_Llegada']}</td>
                            <td>{$valor['Nombre_Usuario']}</td>
                            <td>{$valor['Apellido_Usuario']}</td>
                            ";
                if ($valor['Cantidad'] == 0) {
                    echo "<td style='background-color: red;'><p>Sin herramientas</p></td>";
                } else {
                    echo "<td style='background-color: green;'><p>Aun Disponible</p></td>";
                }

                echo "
                        <td><a href='Herramienta_adm.php?accion_her=mod_pre&id_herramienta={$valor['ID_Inventario_H']}&id_usuario={$valor['ID_Usuario']}'>Modificar</a></td>
                    </tr>";
                }
                ?>
            </table>