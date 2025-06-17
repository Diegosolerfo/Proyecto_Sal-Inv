<?php
            include("../../../../Modelos/Mod_Inv_Herra.php");
            $objeto = new inventario_herramienta(
                registrado_por_f:$_SESSION["id_usuario"]
            );
            $res = $objeto->consultar_peticion_herramientas_general();
            //var_dump($res);
            if($res == NULL){
                ?>
                <h2>No tienes herramientas pedidas</h2>
                <p>
                    Pide herramientas en el inventario y aqui se veran las que pidas
                </p>
                <br>
                <p>Ve a <a href="Inventario_op.php?accion=con_her_gen">Herramientas</a> y haz la peticion de cuantas necesitas</p>
                <?php
            }else{
            ?>
            <section>
                <h2>Si quieres pedir mas herramientas</h2>
                <p>
                    Pide herramientas en el inventario y aqui se veran las que pidas
                </p>
                <br>
                <p>Ve a <a href="Inventario_op.php?accion=con_her_gen">Herramientas</a> y haz la peticion de cuantas necesitas</p>
                <h2>Mis herramientas</h2>
                <table>
                    <tr>
                        <th>ID Herramienta</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Imagen de la Herramienta</th>
                        <th>Nombre Herramienta</th>
                        <th>Tipo de herramienta</th>
                        <th>Salida</th>
                        <th>Devolver</th>
                    </tr>
                    <?php
                    foreach ($res as $valor) {
                        echo "<tr>
                                <td>{$valor['ID_Inventario_H']}</td>
                                <td>{$valor['NombreUsuario']}</td>
                                <td>{$valor['ApellidoUsuario']}</td>
                                <td>{$valor['NombreHerramienta']}</td>
                                <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['Imagen_Herramienta'])."'/></td>
                                <td>{$valor['Tipo_Herramienta']}</td>
                                <td>{$valor['Salida']}</td>
                                <td><a href='Inventario_op.php?accion=dev&id_her={$valor['ID_Inventario_H']}&hay={$valor['Salida']}&mas={$valor['Cantidad']}'>Devolver</a></td>
                            </tr>";
                    }
                    ?>
                </table>
            </section>
            <?php
            }
            ?>