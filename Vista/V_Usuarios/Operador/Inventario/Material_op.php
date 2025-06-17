<?php
    include ("../../../../Modelos/Mod_Inv_Mat.php");
    $objeto = new inventario_material();
    $respuesta = $objeto->consultar_material();
        ?>
                <section>
                    <h2>Inventario de Materiales</h2>
                    <table>
                        <tr>
                            <th>ID Material</th>
                            <th>Cantidad de material</th>
                            <th>Nombre material</th>
                            <th>Descripcion</th>
                            <th>Imagen material</th>
                            <th>ACCIONES</th>
                        </tr>
                        <?php
                        foreach ($respuesta as $valor) {
                            echo "<tr>
                                    <td>{$valor['ID_Inventario_M']}</td>
                                    <td>{$valor['Cantidad']}</td>
                                    <td>{$valor['Nombre']}</td>
                                    <td>{$valor['Descripcion']}</td>
                                    <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['Imagen_Material'])."'/></td>
                                    <td><a href='Inventario_op.php?accion=mod&nombre={$valor['ID_Inventario_M']}'>Sacar</a></td>
                                </tr>";
                        }
                        ?>
                    </table>
                </section>
                <form action="../../../Controladores/Cons_Multitabla/Producto-Material.php?Prod_Mat=Esp" method="post">
                    <label for="nombre_pro">Nombre de producto:</label>
                    <input type="text" name="nom_pro" id="nombre_pro" required>
                    <button>Buscar producto y sus materiales</button>
                </form>