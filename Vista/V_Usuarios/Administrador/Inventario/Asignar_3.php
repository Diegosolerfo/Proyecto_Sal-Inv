<?php
    #var_dump($_POST);
    include "../../../../Modelos/Mod_Inv_Mat.php";
    //var_dump($_POST["id_mat"]);
    for ($i = 0; $i < count($_POST['operador']); $i++) {
        $objeto = new inventario_material(
            id_pro_f: $_POST['id_pro'],
            id_inventario_material_f: $_POST['id_mat'][$i],
            salida_f: $_POST['salida'][$i],
            total_inventario_f: $_POST['cantidad'][$i],
            lo_tiene_f: $_POST['operador'][$i]
        );
        $respuesta = $objeto->registro_detalles_crea();    
    }
    header("Location: Material_adm.php");
?>