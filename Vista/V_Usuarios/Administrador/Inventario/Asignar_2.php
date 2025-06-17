<?php
include ("../../../../Modelos/Mod_Inv_Mat.php");
$objeto = new inventario_material();
$respuesta = $objeto->consultar_material();
?>
<section>
    <h1>Darle materiales a <?php echo $_GET["nom"]; ?></h1>
    <h3>Volver a <a href="Material_adm.php">Materiales</a></h3>

    <form action="Material_adm.php?accion_mat=guardar_crea&cod_pro=<?php echo $_GET['id_pro']; ?>" method="post" onsubmit="return validarFormulario()">
        <table>
            <tr>
                <th>Codigo</th>
                <th>Cantidad de material</th>
                <th>Nombre material</th>
                <th>Imagen material</th>
                <th>Salida</th>
            </tr>
            <?php
            $i = 0;
            foreach ($respuesta as $valor) {
                echo "<tr>
                        <td>{$valor['ID_Inventario_M']}</td>
                        <td>{$valor['Cantidad']}</td>
                        <td><input type='text' readonly name='nombre[nombre_{$i}]' value='{$valor['Nombre']}' class='cantidad-input' style='border: none;'></td>
                        <td><img height='120px' src='data:image/jpeg;base64," . base64_encode($valor['Imagen_Material']) . "'/></td>
                        <td><input type='number' name='salida[ID_SALIDA_{$i}]' max='{$valor['Cantidad']}'></td>
                        <td><input type='hidden' name='id_mat[ID_MATERIAL_{$i}]' value='{$valor['ID_Inventario_M']}' min='0' class='cantidad-input'></td>
                        <td><input type='hidden' name='cantidad[ID_CANTIDAD_{$i}]' value='{$valor['Cantidad']}' class='cantidad-input'></td>                    </tr>";
                    $i++;
            }
            ?>
        </table>
        <input type="hidden" name="id_pro" value="<?php echo $_GET['id_pro']; ?>" hidden>
        <input type="hidden" name="nom" value="<?php echo $_GET['nom']; ?>" hidden>
        <button type="submit">Asignar materiales</button>
    </form>
</section>
