<?php
    $objeto = new usuario(
        id_usuario_f: $_POST["id_usuario"],
        num_doc_f: $_POST["num_doc"],
        nombre_f: $_POST["nombre"],
        apellido_f: $_POST["apellido"],
        correo_f: $_POST["correo"],
        fecha_nac_f: $_POST["fecha_nac"],
        direccion_f: $_POST["direccion"],
        genero_f: $_POST["genero"],
        telefono_f: $_POST["telefono"],
        rol_f: $_POST["rol"],
        eps_f: $_POST["eps"],
        rh_f: $_POST["rh"],
        tipo_sangre_f: $_POST["tip_san"]
    );
    $respuesta = $objeto->act_usu();
    header("location: Usuario_adm.php");
?>