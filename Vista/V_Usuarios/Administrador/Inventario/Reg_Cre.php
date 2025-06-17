<?php
if(isset($_POST)){
    var_dump($_POST);
if($_POST["reg_cre"] == "reg"){
    $o = count($_POST['materiales']);
    session_start();
    include("../../Modelos/Mod_Inv_Mat.php");
    for($i=0; $i<=$o; $i++){
        $tot = $_POST["ti"][$i]-$_POST["v"][$i];
        $objeto=new inventario_material(
            id_inventario_material_f:$_POST["n"][$i],
            registrado_por_f:$_SESSION["id_usuario"],
            salida_f:$_POST["v"][$i],
            total_inventario_f:$tot,
            catidad_f:$tot
        );
        $respuesta = $objeto->registro_detalles_crea();
        if(!empty($respuesta)){
            echo "Delegacion exitosa";
            header("location: ../../../Controladores/Multitablas/HER_USU/Con_Uti.php");
    }
    }
}
}
    else{
    include ("../../Modelos/Mod_Inv_Mat.php");
    $objeto=new inventario_material();
    $respuesta = $objeto->gen_consultar_detalles_crea();
    if(!empty($respuesta)){
        ?>
            <!DOCTYPE html>
            <html lang="es">
                <head>
                    <title>Consulta general</title>
                    <meta charset="UTF-8">
                    <style>
                        table,th,td{
                            border:1px solid grey;
                        }
                    </style>
                </head>
                <body>
                    <section>
                    <form action="registrar_materiales.php?id_pro={<?php echo $respuesta['ID_Producto'];?>}&id_mat={<?php echo $respuesta['ID_Inventario_M'];?>}" method="post">
                        <table>
                            <tr>
                                <td>SELECCIONAR</td>
                                <th>CÓDIGO MATERIAL</th>
                                <th>NOMBRE MATERIAL</th>
                                <th>DESCRIPCION</th>
                                <th>CANTIDAD</th>
                                <th>SACAR</th>
                                <th>IMAGEN MATERIAL</th>
                                <th>FECHA REGISTRO</th>
                                <td>FECHA COMPRA</td>
                                <td>VALOR UNIDAD</td>
                                <td>VALOR TOTAL</td>
                                <td>NOMBRE DEL PRODUCTO</td>
                                <td>PRECIO</td>
                            </tr>
                            <?php
                            foreach ($respuesta as $valor) {
                                echo "
                                <tr>
                                    <td><input type='checkbox' name='n[]' value='{$valor['ID_Inventario_M']}'></td>
                                    <td>{$valor['ID_Inventario_M']}</td>
                                    <td>{$valor['Nombre_Material']}</td>
                                    <td>{$valor['Descripcion']}</td>
                                    <td>{$valor['Cantidad']}</td>
                                    <td><input type='number' name='v[]' min='{$valor['Cantidad']}'></td>
                                    <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['imagen'])."'/></td>
                                    <td>{$valor['Fecha_Registro']}</td>
                                    <td>{$valor['Fecha_Compra']}</td>
                                    <td>{$valor['Valor_Unidad']}</td>
                                    <td>{$valor['Valor_Total']}</td>
                                    <td>{$valor['Fecha_Salida']}</td>
                                    <input type='hidden' name='ti[]' value='{$valor['Total_Inventario']}'>
                                    <td>{$valor['Nombre_Producto']}</td>
                                    <td>{$valor['Precio']}</td>
                                </tr>";
                            }
                            ?>
                        </table>
                        <button type="submit" name='reg_cre' value='reg'>Registrar materiales seleccionados</button>
</form>

                    </section>
                </body>
            </html>
<?php
    }
}

?>