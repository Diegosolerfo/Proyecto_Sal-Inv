<?php
    include ("../../Modelos/Mod_Producto.php");
    // Iniciar la sesión para obtener el ID del usuario
    session_start();
    // Crear el objeto del producto con los datos enviados desde el formulario
    $objeto = new producto(
        nombre_f: $_POST["nom"],
        precio_f: $_POST["pre"],
        descripcion_f: $_POST["desc"],
        especificaciones_f: $_POST["espe"],
        codigo_usuario_f: $_SESSION["id_usuario"],
        imagenes_f: $imagenes  // Agregar las imágenes como un array binario
    );
    // Registrar el producto
    $R = $objeto->registrar_producto();
?>