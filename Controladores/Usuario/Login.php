<?php
    //Login usuarios
    //var_dump($_POST);
    include("../../Modelos/Mod_Usuario.php");
        $objeto = new usuario(
        num_doc_f:$_POST["Num_Doc"], 
        clave_f:$_POST["Con"]
        );
        $R=$objeto->login();
        //var_dump($R);
        if(!empty($R)){
            $role = $R[0];
            session_start();
            if($role["Rol"]=="Administrador"){
                // Para el administrador
                $_SESSION["id_usuario"] = $R[0]['ID_Usuario'];
                $_SESSION["num_doc"] = $R[0]['Numero_documento'];
                $_SESSION["rol"] = $R[0]['Rol'];
                header("Location: ../../Vista/V_Usuarios/Administrador/principal/vista_pri.php");
            }else if($role["Rol"]=="Operador"){
                //  Para el operador
                $_SESSION["id_usuario"] = $R[0]['ID_Usuario'];
                $_SESSION["num_doc"] = $R[0]['Numero_documento'];
                $_SESSION["rol"] = $R[0]['Rol'];
                header("Location: ../../Vista/V_Usuarios/Operador/principal/vista_op.php");
            }else if($role["Rol"]=="Cliente"){
                // Para el cliente
                $_SESSION["id_usuario"] = $R[0]['ID_Usuario'];
                $_SESSION["num_doc"] = $R[0]['Numero_documento'];
                $_SESSION["rol"] = $R[0]['Rol'];
                header("Location: ../../Vista/V_Usuarios/Cliente/vista_cli.php");
            }else{
                // Error de ingreso, porque no tiene ningun roll, imposible
                header("location: ../../Vista/V_Usuarios/Iniciar_sesion.html");
            }
        }else{
            // Error de datos incorrectos la clave o el num doc no concuerdan
            header("location: ../../index.html");
        }
?>
