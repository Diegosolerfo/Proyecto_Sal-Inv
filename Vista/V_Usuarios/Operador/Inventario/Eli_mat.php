<?php
ob_start();
include "../../../../Modelos/Mod_Inv_Mat.php";
$objeto = new inventario_material(
    $_GET["id_material"]
);
$respuesta = $objeto->eliminar_inv_mat();
header("location: Inventario_op.php?accion=mat");
?>