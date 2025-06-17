<?php
        include("../../../../Modelos/Mod_Inv_Herra.php");
        $can_f = $_POST["cantidad"] - $_POST["canti_sali"];
        $objeto = new inventario_herramienta(
            registrado_por_f:$_SESSION["id_usuario"],
            id_inventario_herramienta_f:$_POST["id_her"],
            salida_f:$_POST["canti_sali"],
            cantidad_f:$can_f,
            fecha_entrega_f:$_POST["fec_ent"]
        );
        $res = $objeto->registrar_peticion_herramienta();
        if(!empty($res)){
            echo "Herramienta pedida";
            header("location: Inventario_op.php?");
        }
?>