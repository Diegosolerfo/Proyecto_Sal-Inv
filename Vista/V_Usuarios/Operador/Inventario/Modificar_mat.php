<?php
    include ("../../../../Modelos/Mod_Inv_Mat.php");
    include ("../../../../Modelos/Mod_Producto.php");
                $objeto = new inventario_material(
                    $_GET['nombre']
                );
                $respuesta = $objeto->consulta_especifica();
                //var_dump($respuesta);
                $objeto2 = new producto();
                $respuesta2 = $objeto2->todos_productos();
                //var_dump($respuesta2);
                $son = count($respuesta2);

                ?>
                <section>
                    <form action="Inventario_op.php?accion=gua" method="post" enctype="multipart/form-data">
                        <div>
                            <!-- Seleccionar producto -->
                            <label>¿Para que producto lo necesitas?:</label>
                            <select name="id_producto" id="nom_pro" required>
                                <?php foreach ($respuesta2 as $producto): ?>
                                    <option value="<?php echo $producto['ID_Producto']; ?>"><?php echo $producto['nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div> <!-- Id de material -->
                            <label>ID del material:</label>
                            <input type="number" readonly name="id_material" value="<?php echo $respuesta[0]['ID_Inventario_M']; ?>">
                        </div>
                        <div> <!-- cantidad del material -->
                            <label>Cantidad:</label>
                            <input type="number" readonly name="cant_antes" value="<?php echo $respuesta[0]['Cantidad']; ?>" class="form-control" required>
                        </div>
                        <div> <!-- nombre  del material -->
                            <label>Nombre:</label>
                            <input type="text" readonly name="nom_material" value="<?php echo $respuesta[0]['Nombre']; ?>" class="form-control" required>
                        </div>
                        <div> <!-- descripcion del material -->
                            <label>Descripcion:</label>
                            <input type="text" readonly name="descr_material" value="<?php echo $respuesta[0]['Descripcion']; ?>" class="form-control" required>
                        </div>
                        <div> <!-- iamgen del material -->
                            <label>Imagen:</label>
                            <img height='120px' src='data:image/jpeg;base64,<?php echo base64_encode($respuesta[0]['Imagen_Material']); ?>'>
                        </div>
                        <div> <!-- cantidad a sacar del material -->
                            <label>Cantidad a sacar:</label>
                            <input type="number" name="cant_sacar" class="form-control" max="<?php echo $respuesta[0]['Cantidad']; ?>" min="1" required>
                        </div>
                        <div>
                            <!-- ¿quien lo saco? -->
                            <input type="hidden" name="quien_saco" value="<?php echo $_SESSION["id_usuario"]; ?>" class="form-control" required>
                        </div>
                        <div>
                            <button type="submit">Guardar</button>
                        </div>
                    </form>
                </section>