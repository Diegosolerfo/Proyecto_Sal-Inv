<?php
    include "../../../../Modelos/Mod_Inv_Herra.php";
    $objeto = new inventario_herramienta(
        id_inventario_herramienta_f:$_POST["id_her"],
        pedido_por_f:$_POST["id_usu"],
        fecha_entrega_f:$_POST["Fec_Lle"]
    );
    $respuesta = $objeto->guardar();
    //var_dump($respuesta);
    header("location: Herramienta_adm.php?accion_her=prestadas");
?>