<?php
    //var_dump($_POST);
    include ("../../../../Modelos/Mod_Producto.php");
    // Se pasa por get ya que sale de un boton o un enlace    
    $objeto = new producto(id_pro_f:$_GET['id_pro']);         //
    // Este es el metodo para eliminar productos    
    $respuesta = $objeto->eliminar();
        
    header("location: Producto_adm.php");
?>