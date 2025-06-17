<?php
     header("Content-Type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=Reporte_Material.xls");
     header("Pragma: no-cache");
     header("Expires: 0"); 
     
     include ("../../../../Modelos/Mod_Inv_Mat.php");
    $objeto = new inventario_material();
    $respuesta = $objeto->consultar_material();    
?>
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
                                <th>Registrado por</th>
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
                                        <td>{$valor['Codigo_Usuario']}</td>
                                    </tr>";
                            }
                            ?>
                        </table>