<?php
include ("../../../../Modelos/Mod_Inv_Herra.php");
$objeto = new inventario_herramienta();
$respuesta = $objeto->consultar_general_inv_h();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Consulta General de Inventario de Herramientas</title>
        <meta charset="UTF-8">
        <style>
            table, th, td {
                border: 1px solid grey;
                margin: 20px 0;
            }
        </style>
    </head>
    <body>
        <section>
            <h2>Inventario de Herramientas</h2>
            <table>
                <tr>
                    <th>ID Herramienta</th>
                    <th>Nombre</th>
                    <th>Tipo de herramienta</th>
                    <th>Cantidad</th>
                    <th>Disponivilidad</th>
                    <th>Imagen de la Herramienta</th>
                    <th>Pedir</th>
                </tr>
                <?php
                foreach ($respuesta as $valor) {
                    echo "<tr>
        <td>{$valor['ID_Inventario_H']}</td>
        <td>{$valor['Nombre']}</td>
        <td>{$valor['Tipo_Herramienta']}</td>
        <td>{$valor['Cantidad']}</td>";
                if ($valor['Cantidad'] == 0) {
                    echo "<td style='background-color: red;'><p>No disponible</p></td>";
                } else {
                    echo "<td style='background-color: green;'><p>Disponible</p></td>";
                }

                echo "
                        <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['Imagen_Herramienta'])."'/></td>
                        <td><a href='Inventario_op.php?accion=pedir&id_her={$valor['ID_Inventario_H']}&Cantidad={$valor['Cantidad']}'>Pedir</a></td>
                    </tr>";
                }
                ?>
            </table>
        </section>
    </body>
</html>