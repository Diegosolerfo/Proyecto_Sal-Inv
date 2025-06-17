<?php
include("../../../../Modelos/Mod_Usuario.php");
$objeto = new usuario(
            id_usuario_f:$_POST['id_usu'],
            num_doc_f:$_POST["num_doc"],
            nombre_f:$_POST["nombre"],
            apellido_f:$_POST["apellido"],
            correo_f:$_POST["correo"],
            fecha_nac_f:$_POST["fecha_nac"],
            direccion_f:$_POST["direccion"],
            genero_f:$_POST["genero"],
            telefono_f:$_POST["telefono"],
            rol_f:$_POST["rol"],
            eps_f:$_POST["eps"],
            rh_f:$_POST["rh"],
            tipo_sangre_f:$_POST["Tipo_sangre"]         
        );
        $respuesta = $objeto->actualizar_usuario_admin_ope(); 
        var_dump($respuesta);
        var_dump($_POST);
        if(!empty($respuesta)){
            header("Location: ver_perfil.php");            
        }
        else{
            echo "Vuelva a intentarlo, los datos no se actualizaron";
        }
?>