<?php
include ("../../Modelos/Mod_Producto.php");
    $objeto=new producto();
    $respuesta = $objeto->Consultar_producto_general();
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
                        <table>
                            <tr>
                                <td>Producto</td><td></td>
                            </tr>
                            <tr>
                            <td>Numero de documento</td>
                            <td>Nombre del usuario</td>
                            <td>Apellido del usuario</td>
                            <th>CÓDIGO</th>
                            <th>NOMBRE PRODUCTO</th>
                            <th>PRECIO</th>
                            <th>DESCRIPCION</th>
                            <th>Especificaciones</th>
                            <td>Imagenes</td>
                            <th colspan='2'>ACCIONES</th></tr>
                            <?php
                                foreach($respuesta as $valor){
                                    echo "<tr>
                                            <td>$valor[Numero_documento]</td>
                                            <td>$valor[NombreUsuario]</td>
                                            <td>$valor[Apellido]</td>
                                            <td>$valor[ID_Producto]</td>
                                            <td>$valor[NombreProducto]</td>
                                            <td>$valor[Precio]</td>
                                            <td>$valor[Descripcion]</td>
                                            <td>$valor[Especificacion]</td>
                                            <td>"for($i=0;$i<=count($valor['imagen']); $i++){
                                                "<img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['imagen'])."'/>
                                            "}"</td>
                                            <td><a href='Act_pro.php?Acc_Act=Actualizar&id_pro=$valor[ID_Producto]'>Modificar</a></td>
                                            <td><a href='Eli_pro.php?id_pro=$valor[ID_Producto]'>Eliminar</a></td>
                                        </tr>";
                                }
                            ?>
                        </table>
                        <form action="../../../Controladores/Cons_Multitabla/Pedido-Producto.php" method="post">
                            <label for="nom_pro">Nombre del producto: </label>
                            <input type="text" name="nom_pro" id="nom_pro" required>
                            <button>Buscar productos con especificaciones</button>
                        </form>
                    </section>
                </body>
            </html>
            <?php}

?>