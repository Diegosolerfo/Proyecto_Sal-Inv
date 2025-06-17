<?php
    include "../../../../Modelos/Mod_Inv_Herra.php";
    $can_f = $_GET['hay'] + $_GET['mas'];
    $objeto = new inventario_herramienta(
        id_inventario_herramienta_f: $_GET['id_her'],
        salida_f: $can_f,
        cant_f: $_GET['hay']
    );
    $res = $objeto->devolver();
    if(!empty($res)){
        header('location: Inventario_op.php');
    }
?>