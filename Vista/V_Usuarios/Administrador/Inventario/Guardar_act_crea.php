<?php
include "../../../../Modelos/Mod_Inv_Mat.php"; // Incluir el modelo correspondiente

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $veces = count($_POST['cant']);
    for ($i = 0; $i < $veces; $i++) {
        // Obtener cantidades y salida
        $cantidadAnt = $_POST['cant_ant']['CANTIDAD_ANTERIOR_'.$i];
        $cantidadNva = $_POST['cant']['ID_CANTIDAD_'.$i];
        $salida = $_POST['salida']['ID_SALIDA_'.$i];

        // Calcular la cantidad final
        $total = $cantidadAnt - $cantidadNva;
        if ($total <= $salida) {
            $cantFinal = $cantidadNva - ($salida - $total);
        } else {
            $cantFinal = $cantidadAnt - ($cantidadNva - $salida);
        }

        // Crear el objeto para la actualización
        $objeto = new inventario_material(
            id_pro_f: $_GET['id_pro'],
            salida_f: $salida,
            total_inventario_f: $cantidadNva,
            cantidad_f: $cantFinal,
            id_inventario_material_f: $_POST['COD_MAT']['CODIGO_INVENTARIO_'.$i]
        );

        // Ejecutar la actualización
        $respuesta = $objeto->actualizar_detalles();
    }
    
    // Redirigir a la página de materiales
}
echo "<p>Operación completada. Haz clic <a href='Material_Adm.php'>aquí</a> para regresar.</p>";

?>
