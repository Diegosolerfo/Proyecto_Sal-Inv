<?php
    include ("../../../Modelos/Mod_Inv/Her.php");
    $objeto = new inventario_herramienta(
        id_her_f:$_GET["id_her"]
    );
    $res = $objeto->devolver();
    
?>