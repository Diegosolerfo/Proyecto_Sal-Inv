<?php
    //registro de un administradores y operadoes
    //var_dump($_POST);
    //Se evalua que tipo de registro es 
//var_dump($_FILES);
if($_GET["Reg_Usu"] == "Usuarios"){
    include ("../../Modelos/Mod_Usuario.php");
    session_start();
    $objeto = new usuario(
        num_doc_f:$_POST["num_doc"], 
        clave_f:$_POST["clave"],
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
        tipo_sangre_f:$_POST["tip_san"],
        registrado_por_f:$_SESSION["id_usuario"]
    );
    $R = $objeto -> registrar_usuario_admop();
    if(!empty($R)){
        header("location: Reg_Multi=Expe_for&numero_doc={$_POST['num_doc']}");
    }
    }
else if($_POST["Reg_Usu"] == "Reg_cli"){
    //registro de un cliente
    //var_dump($_POST);
    include ("../../Modelos/Mod_Usuario.php");
    session_start();
    $objeto = new usuario(
        num_doc_f:$_POST["num_doc"], //1
        clave_f:$_POST["clave"], //2
        nombre_f:$_POST["nombre"], //3
        apellido_f:$_POST["apellido"], //4
        correo_f:$_POST["correo"], //5
        fecha_nac_f:$_POST["fecha_nac"], //6
        direccion_f:$_POST["direccion"], //7
        genero_f:$_POST["genero"], //8
        telefono_f:$_POST["telefono"], //9
        registrado_por:$_POST["num_doc"] //10
    );
    $R = $objeto -> registrar_usuario_cli();
    if(!empty($R)){
        header ("location: ../../vista/V_Usuarios/iniciar_sesion.html");
    }
}else{
    echo "Hubo un error nose registro el usuario";
}
?>