<?php
    var_dump($_GET);
    include ("../../Modelos/Mod_Usuario.php");
        $objeto = new usuario(num_doc_f:$_GET['num_doc']);
        $respuesta = $objeto->eliminar_usuario();
    if(!empty($respuesta)){
        echo "Eliminación exitosa". "<a href='Con_Usuario.php?ti_con=Con_G_U'>Volver a usuarios</a>";
    }
    else{
        echo "Vuelva a intentarlo, el usuario no fue eliminado";
    }
?>