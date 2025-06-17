<?php
    include "../../../../Modelos/Mod_Producto.php";
    // Si se envía el formulario, actualiza los datos
    $img = null;
    if(!empty($_FILES['imagen']['name'])){
        $img = file_get_contents($_FILES['imagen']['tmp_name']);
    }else{
        $objeto = new producto(
            id_pro_f: $_POST["id_pro"] // ID del producto
        );
        $respuesta = $objeto->imagen();
        #var_dump($respuesta);
        $img = $respuesta[0]['IMAGEN'];
    }
    $objeto = new producto(
        id_pro_f: $_POST["id_pro"], // ID del producto
        nombre_f: $_POST["nombre"], // Nombre del producto
        precio_f: $_POST["precio"], // Precio del producto
        descripcion_f: $_POST["descr"], // Cantidad del producto
        especificaciones_f: $_POST["espec"],
        imagen_pro_f: $img, // Imagen del producto
    );
    $respuesta = $objeto->actualizar();
    header ("location: Producto_adm.php"); 
?>