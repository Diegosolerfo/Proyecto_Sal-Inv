<?php
    include "../../../../Modelos/Mod_Inv_Mat.php";
    $objeto = new inventario_material(
        id_pro_f:$_GET["id_pro"]
    );
    $respuesta = $objeto->esp_consultar_detalles_crea();
    //var_dump($respuesta);
?>

<h1>Estos materiales se le asignaron a <?php echo $_GET['nom']; ?></h1>
<h3>Volver a <a href="Material_adm.php">Materiales</a></h3>
<table>
    <tr>
        <th>Nombre Material</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Fecha Registro</th>
        <th>Fecha Compra</th>
        <th>Valor Unidad</th>
        <th>Valor Total</th>
        <th>Salida</th>
        <th>Fecha Salida</th>
        <th>Total Inventario</th>
        <th>Imagen</th>
    </tr>
    <?php
    $i = 0;
        // Suponiendo que $respuesta contiene el resultado de la consulta
        foreach ($respuesta as $valor) {
            $maximo = $valor['Salida'] + $valor['Cantidad'];
            echo "<tr>
                    <td>{$valor['Nombre_Material']}</td>
                    <td>{$valor['Descripcion']}</td>
                    <td>{$valor['Cantidad']}</td>
                    <td>{$valor['Fecha_Registro']}</td>
                    <td>{$valor['Fecha_Compra']}</td>
                    <td>{$valor['Valor_Unidad']}</td>
                    <td>{$valor['Valor_Total']}</td>
                    <td>{$valor['Salida']}</td>
                    <td>{$valor['Fecha_Salida']}</td>
                    <td>{$valor['Total_Inventario']}</td>
                    <td><img height='120px' src='data:image/jpeg;base64," . base64_encode($valor['Imagen_Material']) . "'/></td>
                    <td><input type='hidden' class='material-checkbox' name='material_seleccionado[{$i}]' value='{$valor['ID_Inventario_M']}'></td>
                    </tr>";
                    $i++;
        }
    ?>    
    <h3>Precio del producto <?php echo $respuesta[0]["Precio"]; ?></h3>
</table>
<?php
echo "<a href='Material_adm.php?accion_mat=ir_actu&id_pro={$_GET["id_pro"]}'>Modificar Materiales Asignados</a>";
?>