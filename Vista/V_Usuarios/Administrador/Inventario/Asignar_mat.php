<?php
   include ("../../../../Modelos/Mod_Producto.php");
   $objeto=new producto();
   $respuesta = $objeto->Consultar_producto_general();
   ?>
   <section>
   <h3>Volver a <a href="Material_adm.php">Materiales</a></h3>
           <table>
               <tr>
               <th>Nombre Producto</th>
               <th>Precio</th>
               <th>Descripcion</th>
               <td>Nombre del usuario</td>
               <td>Apellido del usuario</td>
               <td>Imagenes</td>
               <th>Asingar materiales</th>
               <th>Material asignado</th>
            </tr>
               <?php
                   foreach($respuesta as $valor){
                       echo "<tr>
                               <td>{$valor['NombreProducto']}</td>
                               <td>{$valor['Precio']}</td>
                               <td>{$valor['Descripcion']}</td>
                               <td>{$valor['NombreUsuario']}</td>
                               <td>{$valor['Apellido']}</td>
                               <td><img height='120px' src='data:image/jpeg;base64,".base64_encode($valor['Imagen'])."'/></td>
                               <td><a href='Material_adm.php?id_pro=$valor[ID_Producto]&nom={$valor['NombreProducto']}&accion_mat=asig_form'>Asignar</a></td>
                                <td><a href='Material_adm.php?id_pro=$valor[ID_Producto]&nom={$valor['NombreProducto']}&accion_mat=ver_mat'>Ver materiales</a></td>
                               </tr>";
                   }
               ?>
           </table>
           <a href="Producto_adm.php?accion=reg">
               Registrar productos
           </a>
   </section>
   <?php