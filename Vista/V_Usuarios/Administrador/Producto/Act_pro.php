<?php
    include "../../../../Modelos/Mod_Producto.php";
    $objeto = new producto(
        id_pro_f:$_GET["id_pro"]
    );
    $respuesta = $objeto->consultar_act();
?>
<section>
        <form action="Producto_adm.php?accion=gua_a" method="post" enctype="multipart/form-data">
            <!-- Id de producto -->
        <label for="id_pro">ID del Producto</label>
        <input type="number" readonly name="id_pro" value="<?php echo $respuesta[0]['ID_Producto']; ?>">
        <!-- Nombre de producto -->
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $respuesta[0]['Nombre']; ?>" class="form-control" id="nombre" required>
        <!-- Precio de producto -->
        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="<?php echo $respuesta[0]['Precio']; ?>" class="form-control" id="precio" required>
        <!-- Descripcoion del producto -->
        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descr" value="<?php echo $respuesta[0]['Descripcion']; ?>" class="form-control" id="cantidad" required>
        <!-- Especificaciones del producto -->
        <label for="cantidad">Especificacion:</label>
        <input type="text" name="espec" value="<?php echo $respuesta[0]['Especificacion']; ?>" class="form-control" id="cantidad" required>
        <a href="Act_pro.php?Acc_Act=Guardar">
        <!-- Imagen del producto -->
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" class="form-control" id="imagen">
            <div>
                <button type="submit">Guardar</button>
        </div>
        </a>         
    </form>
</section>