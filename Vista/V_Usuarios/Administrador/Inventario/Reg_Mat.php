<form action="../../../Controladores/Inventario/Reg_Invent.php" method="post" enctype="multipart/form-data">
    <h4>Registrar un material</h4>
    <div>
        <!-- Cantidad -->
    <label for="cantidad"> Cantidad: 
        <input type="number" name="cant_m" id="cantidad" required>
    </label>
    </div>
    <div>
        <!-- Nombre -->
    <label for="nombre"> Nombre:
        <input type="text" name="nom_m" id="nombre" required>
    </label>
    </div>
    <div>
        <!-- Descripcion -->
    <label for="descripcion"> Descripcion: 
        <textarea name="descr_m" id="descripcion" cols="20" rows="2"  required></textarea>
    </label>
    </div>
    <div>
        <!-- Fecha_Compra -->
    <label for="fecha_compra"> Fecha de compra:
        <input type="date" name="fec_com_m" id="fecha_compra"  required>
    </label>
    </div>
    <div>
        <!-- Valor_Unidad -->
    <label for="val_uni"> Valor Unidad:
        <input type="number" name="val_uni" id="val_uni"  required>
    </label>
    <div>
    </div>
    <!-- Valor_Total -->
    <label for="val_tot"> Valor Total: 
        <input type="text" name="val_tot" id="val_tot"  required>
    </label>
    </div>
    <div>
        <!-- Imagen_Material -->
    <label for="Imagen_material"> Imagen de material
        <input type="file" name="Ima_m" id="Imagen_material">
    </label>
    </div>
    <!-- Botón de Envío -->
    <div>
        <button name="Reg_Inv" value="Inv_M" type="submit">Registrar Material</button>
    </div>
</form>