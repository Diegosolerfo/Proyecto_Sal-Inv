<?php
     header("Content-Type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=Reporte_Herramientas.xls");
     header("Pragma: no-cache");
     header("Expires: 0"); 

     include ("../../../../Modelos/Mod_Inv_Herra.php");
        $objeto = new inventario_herramienta();
        $respuesta = $objeto->consultar_general_inv_h();    
?>
<table>
                    <tr>
                        <th>ID Herramienta</th>
                        <th>Nombre</th>
                        <th>Tipo de herramienta</th>
                        <th>Cantidad</th>
                    </tr>
                    <?php
                    foreach ($respuesta as $valor) {
                        echo "<tr>
                                <td>{$valor['ID_Inventario_H']}</td>
                                <td>{$valor['Nombre']}</td>
                                <td>{$valor['Tipo_Herramienta']}</td>
                                <td>{$valor['Cantidad']}</td>
                            </tr>";
                    }
                    ?>
                </table>
