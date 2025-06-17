<?php
include("../../../../Modelos/Mod_Inv_Herra.php");
    if(!empty($_FILES['imagen']['name'])){
        $img = file_get_contents($_FILES['imagen']['tmp_name']);
        $objeto = new inventario_herramienta(
            id_inventario_herramienta_f: $_POST['id_her'],
            nombre_f: $_POST['nombre'],
            tipo_herramienta_f: $_POST['tip_her'],
            cantidad_f: $_POST['cantidad'],
            imagen_herramienta_f: $img
        );
        $respuesta = $objeto->actualizar_inv_h();
        header("location: Herramienta_adm.php");
    }else {
        $objeto = new inventario_herramienta(
            id_inventario_herramienta_f: $_POST['id_her'],
        );
        $respuesta = $objeto->conseguir_imagen();
        #var_dump($respuesta);
        $objeto_2 = new inventario_herramienta(
            id_inventario_herramienta_f: $_POST['id_her'],
            nombre_f: $_POST['nombre'],
            tipo_herramienta_f: $_POST['tip_her'],
            cantidad_f: $_POST['cantidad'],
            imagen_herramienta_f: $respuesta[0]['Imagen_Herramienta']
        );
        $respuesta = $objeto_2->actualizar_inv_h();
        header("location: Herramienta_adm.php");
    }
?>