<?php
    $objeto = new usuario(num_doc_f: $_GET["num_doc"]);
    $respuesta = $objeto->eliminar_usuario();
    header("location: Usuario_adm.php");
?>