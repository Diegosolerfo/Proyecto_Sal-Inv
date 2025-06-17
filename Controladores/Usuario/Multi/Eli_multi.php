<?php
    var_dump($_GET);
    if($_GET["Eli_Multi"] == "Eli_Cert"){
        include ("../../Modelos/Mod_Usuario.php");
        $objeto = new usuario(num_doc_f:$_GET['numero_doc']);
        $respuesta = $objeto->eliminar_certi();
        if(!empty($respuesta)){
            echo "Eliminación exitosa". "<a href='Con_Multi.php'>Volver a usuarios</a>";
        }
        else{
            echo "Vuelva a intentarlo, el certificado no fue eliminado";
        }
    }
    else if($_GET["Eli_Multi"] == "Eli_Expe"){
        include ("../../Modelos/Mod_Usuario.php");
        $objeto = new usuario(num_doc_f:$_GET['numero_doc']);
        $respuesta = $objeto->eliminar_expe();
        if(!empty($respuesta)){
            echo "Eliminación exitosa". "<a href='Con_Multi.php'>Volver a usuarios</a>";
        }
        else{
            echo "Vuelva a intentarlo, la experiencia no fue eliminada";
        }
    }
?>