<?php
    include ("../../../Modelos/Mod_Pedido.php");
    $objeto = new pedido(
        persona_f:$_POST["nom_cli"]
    );
    $res = $objeto->ver_genera();
?>
<section>
<table>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th></th>
        <td></td>
        <td><td>
        <td></td>
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