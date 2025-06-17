<?php
include "../../../../Modelos/Mod_Producto.php";
$img = null;
if(isset($_FILES["img_pro"])){
    $img = file_get_contents($_FILES['img_pro']['tmp_name']);
}
        $objeto = new producto(
            nombre_f: $_POST["nom"],        // Nombre del producto
            precio_f: $_POST["pre"],        // Precio del producto
            descripcion_f: $_POST["desc"],  // Descripción del producto
            especificaciones_f: $_POST["espe"], // Especificaciones del producto
            imagen_pro_f: $img,           // Nombre de la imagen
            codigo_usuario_f: $_SESSION["id_usuario"]
        );
    $respuesta = $objeto->registrar_producto();
    header("location: Producto_adm.php");
?>