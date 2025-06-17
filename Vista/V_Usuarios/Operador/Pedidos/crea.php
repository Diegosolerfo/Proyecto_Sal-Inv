<?php
    include ("../../Modelos/Mod_Inv_Mat.php");
    $objeto=new inventario_material(
        nombre_f:$_POST["nom_pro"]
    );
    $respuesta = $objeto->esp_consultar_detalles_crea();
?>
<section>
    <table>
    <tr>
        <th>CÓDIGO MATERIAL</th>
        <th>NOMBRE MATERIAL</th>
        <th>DESCRIPCION</th>
        <th>CANTIDAD</th>
        <th>IMAGEN MATERIAL</th>
        <th>FECHA REGISTRO</th>
        <td>FECHA COMPRA</td>
        <td>VALOR UNIDAD</td>
        <td>VALOR TOTAL</td>
        <td>SALIDA</td>
        <th>FECHA SALIDA</th>
        <td>TOTAL INVENTARIO</td>
        <td>NOMBRE DEL PRODUCTO</td>
        <td>PRECIO</td>
        <?php
        if($_SESSION["rol"] == "Administrador"){
            ?>
            <th colspan='2'>ACCIONES</th>
            <?php
        }
        ?>
    </tr>
        <?php
            foreach($respuesta as $valor){
                echo "<tr>
                        <td>$valor[ID_Inventario_M]</td>
                        <td>$valor[Nombre_Material]</td>
                        <td>$valor[Descripcion]</td>
                        <td>$valor[Cantidad]</td>
                        <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['imagen'])."'/></td>
                        <td>$valor[Fecha_Registro]</td>
                        <td>$valor[Fecha_Compra]</td>
                        <td>$valor[Valor_Unidad]</td>
                        <td>$valor[Valor_Total]</td>
                        <td>$valor[Salida]</td>
                        <td>$valor[Fecha_Salida]</td>
                        <td>$valor[Total_Inventario]</td>
                        <td>$valor[Nombre_Producto]</td>
                        <td>$valor[Precio]</td>
                        "if($_SESSION["rol"] == "Administrador"){"
                        <td><a href='Act_Cre.php?id_pro={$valor[ID_Producto]}id_mat{$valor[ID_InventarioM]}}'>Modificar</a></td>
                        <td><a href='Eli_Cre.php?id_pro={$valor[ID_Producto]}id_mat{$valor[ID_InventarioM]}}'>Eliminar</a></td>
                        "}"
                    </tr>";
            }
        ?>
    </table>
</section>