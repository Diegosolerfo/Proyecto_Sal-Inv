<h1>Estos materiales se le asignaron a <?php echo $respuesta[0]["Nombre_Producto"]; ?></h1>
<h3>Volver a <a href="Material_adm.php">Materiales</a></h3>

<form action="ActualizarMaterial.php" method="post" enctype="multipart/form-data">
    <table>
        
            <th>Nombre Material</th>
            <td><input type="text" readonly name="Nombre_Material" value="<?php echo $respuesta['Nombre_Material']; ?>" required></td>
        
        
            <th>Precio</th>
            <td><input type="number" readonly step="0.01" name="Precio" value="<?php echo $respuesta['Precio']; ?>" required></td>
        
        
            <th>Descripción</th>
            <td><input type="text" readonly name="Descripcion" value="<?php echo $respuesta[0]['Descripcion']; ?>"></td>
        
        
            <th>Cantidad</th>
            <td><input type="number" readonly name="Cantidad" value="<?php echo $respuesta[0]['Cantidad']; ?>" required></td>
        
        
            <th>Fecha Registro</th>
            <td><input type="date" readonly name="Fecha_Registro" value="<?php echo $respuesta[0]['Fecha_Registro']; ?>" required></td>
        
        
            <th>Fecha Compra</th>
            <td><input type="date" readonly name="Fecha_Compra" value="<?php echo $respuesta[0]['Fecha_Compra']; ?>"></td>
                     <th>Valor Unidad</th>
        <input type="number" readonly step="0.01" name="Valor_Unidad" value="<?php echo $respuesta[0]['Valor_Unidad']; ?>" required></td>
            
            <th>Valor Total</th>
        <input type="number" readonly step="0.01" name="Valor_Total" value="<?php echo $respuesta[0]['Valor_Total']; ?>" readonly></td>
        
        
            <th>Salida</th>
        <input type="number"  name="Salida" value="<?php echo $respuesta[0]['Salida']; ?>"></td>
        
        
            <th>Fecha Salida</th>
        <input type="date" readonly name="Fecha_Salida" value="<?php echo $respuesta[0]['Fecha_Salida']; ?>"></td>
        
        
            <th>Total Inventario</th>
        <input type="number" readonly name="Total_Inventario" value="<?php echo $respuesta[0]['Total_Inventario']; ?>" readonly></td>
        
        
            <th>Imagen</th>
        
           <img height="120px" src="data:image/jpeg;base64,<?php echo base64_encode($respuesta[0]['Imagen_Material']); ?>" /><br>
            <input type="file" name="Imagen_Material">
            </td>
          </table>
    <input type="hidden" name="ID_Producto" value="<?php echo $respuesta[0]['ID_Producto']; ?>">
    <button type="submit">Modificar</button>
</form>