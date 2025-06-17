<?php
    include ("../../Modelos/Mod_Pedido.php");
    $objeto = new pedido(
        persona_f:$_POST["nom_cli"]
    );
    $respuesta = $objeto->consultar_ped_especifica();
    ?>
        <section>
            <table>
                <tr>
                    <th>ID Pedido</th>
                    <th>Especificaciones</th>
                    <th>Abono</th>
                    <th>Fecha Solicitud</th>
                    <th>Fecha Entrega</th>
                    <th>Persona</th>
                    <th>ACCIONES</th>
                </tr>
                <?php
                foreach ($respuesta as $valor) {
                    echo "<tr>
                            <td>{$valor['ID_Pedido']}</td>
                            <td>{$valor['Especificaciones']}</td>
                            <td>{$valor['Abono']}</td>
                            <td>{$valor['Fecha_Solicitud']}</td>
                            <td>{$valor['Fecha_Entrega']}</td>
                            <td>{$valor['persona']}</td>
                            <td><a href='Pedidos_op.php?accion=ver_crea&id_pedido={$valor['ID_Pedido']}'>Ver producto y materiales</a></td>
                            <td><a href='Pedidos_op.php?accion=ver_genera&id_pedido={$valor['ID_Pedido']}'>Ver prodcuto y dellates del pedido</a></td>
                            <td><a href='Pedidos_op.php?accion=ver_todo&id_pedido={$valor['ID_Pedido']}'>Ver todo en detalle</a></td>
                        </tr>";
                }
                ?>
            </table>
        </section>
?>