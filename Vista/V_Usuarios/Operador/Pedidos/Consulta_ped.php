<?php

include ("../../../../Modelos/Mod_Pedido.php");
$objeto = new pedido (
    num_doc_f: $_POST['num_doc']
);
$respuesta = $objeto->consultar_ped_especifico();
?>
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
        <tr>
            <td><?php echo $respuesta[0]['ID_Pedido']; ?></td>
            <td><?php echo $respuesta[0]['Especificacion']; ?></td>
            <td><?php echo $respuesta[0]['Abono']; ?></td>
            <td><?php echo $respuesta[0]['Fecha_Solicitud']; ?></td>
            <td><?php echo $respuesta[0]['Fecha_Entrega']; ?></td>
            <td><?php echo $respuesta[0]['NombreProducto']; ?></td>
            <td>
                <?php
                // Crear una lista de especificaciones
                $especificaciones = [];
                for ($i = 1; $i <= 10; $i++) {
                    $especificacion = $respuesta[0]["Especificacion{$i}"];
                    if (!empty($especificacion)) {
                        $especificaciones[] = $especificacion;
                    }
                }
                // Unir especificaciones con comas
                echo implode(', ', $especificaciones);
                ?>
            </td>
            <td><?php echo $respuesta[0]['Numero_documento']; ?></td>
            <td><?php echo $respuesta[0]['NombreUsuario']; ?></td>
            <td><?php echo $respuesta[0]['Apellido']; ?></td>
        </tr>
        