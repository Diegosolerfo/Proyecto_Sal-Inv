<?php
/*
ORDEN: 
id_producto, 
id_inventario, 
salida(cuanto va a sacar), 
cuanto habia antes, 
id_usuario(quien lo saco en este caso el mismo usuario que registra aqui)
*/ 
var_dump($_POST);
include "../../../../Modelos/Mod_Inv_Mat.php";
$objeto = new inventario_material(
    id_pro_f:$_POST["id_producto"],
    id_inventario_material_f:$_POST["id_material"],
    salida_f:$_POST["cant_sacar"],
    total_inventario_f:$_POST["cant_antes"],
    lo_tiene_f:$_POST["quien_saco"]
);
$respuesta = $objeto->sacar();
header("location: Inventario_op.php?accion=mat");
?>