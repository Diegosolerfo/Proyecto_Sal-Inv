<?php
    include "../../../../Modelos/Mod_Inv_Herra.php";
    $objeto = new inventario_herramienta(
        id_inventario_herramienta_f:$_GET["id_herramienta"],
        pedido_por_f:$_GET["id_usuario"]
    );
    $respuesta = $objeto->prestada();  
    //var_dump($respuesta);
?>
<form action="Herramienta_adm.php?accion_her=guardar_fec" method="post">
    <h2>Modifica la fecha en la que se va a entregar el herramienta</h2>
    <div>
    <label for="Herramienta">Nombre herramienta: </label>
    <input type="text" readonly value="<?php echo $respuesta[0]['Nombre_Herramienta']; ?>">
    </div>
<div>
    <label for="Salida">Salida</label>
    <input type="text" readonly value="<?php echo $respuesta[0]['Salida']; ?>"></div>
<div>
    <label for="Fecha_salida">Fecha Salida</label>
    <input type="text" readonly value="<?php echo $respuesta[0]['Fecha_Salida']; ?>"></div>
<div>
    <label for="Usuario">Nombre Operador</label>
    <input type="text" readonly value="<?php echo $respuesta[0]['Nombre_Usuario']; ?>"></div>
<div>
    <label for="Ape_usuario">Apellido Operador</label>
    <input type="text" readonly value="<?php echo $respuesta[0]['Apellido_Usuario']; ?>"></div>
<div>
    <label for="Fecha">Fecha Llegada</label>
    <input type="date"  name="Fec_Lle" value="<?php echo $respuesta[0]['Fecha_Llegada']; ?>"></div>
    <div>
        <input type="hidden" name="id_her" value="<?php echo $_GET["id_herramienta"] ?>">
        <input type="hidden" name="id_usu" value="<?php echo $_GET["id_usuario"] ?>">
        <button type="submit">Guardar</button>
    </div>
</form>
