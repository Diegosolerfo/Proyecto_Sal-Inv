<?php
if($_GET["Reg_Multi"] == "Sin_Exp"){
    header("location: Multi/Reg_multi.php?Reg_Multi=Cert&numero_doc={$_GET['num_doc']}");
}
else if($_GET["Reg_Multi"] == "Sin_Cer"){
    header("location: ../../vista/V_Usuario/iniciar_sesion.html");
}
else if($_GET["Reg_Multi"] == "Expe"){
    //var_dump($_POST);
    // Preparación de las experiencias
    $expe = [];
    if(!empty($_POST["n1"])){
        $i = 1;
        while(!empty($_POST["n".$i])){
            $expe[$i] = $_POST["n".$i];
            $i++;
        }
    }
    include ("../../../Modelos/Mod_Usuario.php");
    //var_dump($_GET);
    $id_del_usu = new usuario( // Se crea el objeto
        num_doc_f:$_GET["numero_doc"] 
        // Se da el numero de documento para conseguir el ID DEL USUARIO
    );
    $res = $id_del_usu->consultar_usuario_especifi();
    //var_dump($res);
    // Se usa la  funcion para obtener el ID del usuario
    if(!empty($res)){// Se verifica si hay un valor de respuesta

    $objeto = new usuario( // Se crea e objeto para registrar la experiencia
        id_usuario_f:$res[0]["ID_Usuario"], // Se le da el Id para la llave foranea
        datos_expe_f:$expe // Se le da el arreglo con las experiencias
    );
    $objeto->Registrar_expe();
    // Se registra la experiencia con la funcion de registrar la experincia
    }
    // Se manda el usuario hacia la vista para registrar un certificado si tiene
    header("location: Reg_multi.php?Reg_Multi=Cert_for&numero_doc={$_GET["numero_doc"]}");
} //fin registro de experiencia

#REGISTRO DE CERTIFICADOS
else if($_GET["Reg_Multi"] == "Cert"){
    //var_dump($_POST);
    //var_dump($_FILES);
    // Preparación de los certificados
    $cert = []; 
    $i = 1;
    $aux = 4; // Inicializamos el auxiliar en la posición que tiene el archivo
    if (!empty($_POST['d1'])) {
        while (!empty($_POST["d".$i]) or  !empty($_FILES["d".$i]["name"])) {

            // Validamos si el archivo está en la posición actual
            if ($i == $aux && !empty($_FILES["d".$i]["name"])) {
                // Leemos el archivo si está presente
                $certi_archi = file_get_contents($_FILES['d'.$i]['tmp_name']);
                $cert[$i] = $certi_archi;
                $aux += 4; // Incrementamos para que busque el siguiente archivo
            } else {
                // Guardamos los demás datos del formulario
                $cert[$i] = $_POST["d".$i];
            }
            $i++;
        }
    }
    
    //var_dump($cert);
    include("../../../Modelos/Mod_Usuario.php");
    //var_dump($_GET);
    // Se inica la session 
    // Se crea el obejyo  usuario para obtener el id del usuario
        $id_del_usu = new usuario(
            // Se le da el valor del numerod e documento para conseguir el ID
            num_doc_f:$_GET["numero_doc"]
    );
    // Se usa la funcion de cosnulta especifica en el obejto creado par a el ID
    $rac = $id_del_usu->consultar_usuario_especifi();
    //var_dump($rac[0]["ID_Usuario"]);
    //var_dump($cert);
    // Se obtiene el ID del usuario
    if(!empty($rac)){// Se verifica que haya un valor de retorno 
        //echo  "ID del usuario: ".$rac[0]["ID_Usuario"];
        $objeto = new usuario( // Se crea el objeto
            id_usuario_f:$rac[0]["ID_Usuario"], // Se le da el valor del ID
            datos_certi_f:$cert // Se le de el valor del arreglo
    );
    $objeto->Registrar_cert();
    // Se registra el certificado con la funcion de registrar el certificado
    }
    else{
        echo "hola";
    }
}// Fin registro certificado
else if($_GET["Reg_Multi"] == "Expe_for"){?>
    <!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Registro de experiencia</title>
    <script src="com_adm.js"></script>
</head>
<body>
<form action="Reg_Multi.php?Reg_Multi=Expe&numero_doc=<?php echo $_GET['numero_doc']; ?>" method="post">
        <h2>Registro de usuario existoso, ¿quiere agregar experiencias?</h2>
            <table id="tabla_expe">
                <tr>
                    <!-- Nombre empresa -->
                    <td><label for="nombre_empresa" class="form_multi_l">Nombre empresa</label></td> 
                    <!-- Cargo -->
                    <td><label for="cargo_en_la_empresa" class="form_multi_l">Cargo</label></td> 
                    <!-- Fecha Inicio -->
                    <td><label for="fecha_inicio_expe" class="form_multi_l">Fecha Inicio</label></td> 
                    <!-- Fecha Fin -->
                    <td><label for="fecha_fin_expe" class="form_multi_l">Fecha Fin</label></td> 
                    <!-- Observaciones -->
                    <td><label for="observaciones" class="form_multi_l">Observaciones</label></td>
                    <!-- telefono de contacto -->
                    <td><label for="telefono_de_contacto" class="form_multi_l">Telefono</label></td> 
                    <!-- Nombre de contacto -->
                    <td><label for="nombre_de_cantacto" class="form_multi_l">Nombre de contacto</label></td> 
                </tr>
                <tr>
                    <!-- Nombre empresa -->
                    <td><input type="text" name="n1" id="nombre_empresa" minlength="3" class="form_multi-i"></td> 
                    <!-- Cargo -->
                    <td><input type="text" name="n2" id="cargo_en_la_empresa" minlength="3" class="form_multi-i"></td> 
                    <!-- Fecha Incio -->
                    <td><input type="date" name="n3" id="fecha_inicio_expe" min="1950-01-01" max="2024-12-31" class="form_multi-i"></td> 
                    <!-- Fecha Fin -->
                    <td><input type="date" name="n4" id="fecha_fin_expe" min="1950-01-01" max="2024-12-31" class="form_multi-i"></td> 
                    <!-- Observaciones -->
                    <td><textarea name="n5" id="observaciones" cols="10" rows="1" class="form_multi-i"></textarea></td>
                    <!-- Telefono -->
                    <td><input type="number" name="n6" id="telefono_de_contacto" min="3000000000" max="6999999999" class="form_multi-i"></td>
                    <!-- Nombre de contacto -->
                    <td><input type="text" name="n7" id="nombre_de_cantacto" minlength="3" class="form_multi-i"></td> 
                </tr>
            </table>
        <div>
            <button type="button" onclick="AgregarExpe();">Agregar experiencia de trabajo</button>
            <button type="button" onclick="eliminar_expe();">Eliminar una experiencia</button>
        </div>
        <div>
            <button type="submit">Registrar la experiencia</button>
            <button type="submit" name="Reg_Usu" value="Sin_Exp">No tiene experiencia</button>
        </div>
    </form>
    <script src="com_adm.js"></script>
</body>
</html>
<?php
}// Fin del registro de una experiencia
// Registro de un certificado
else if($_GET["Reg_Multi"] == "Cert_for"){
    //var_dump($_POST);
    //var_dump($_GET);
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="com_adm.j"></script>
</head>
<body>
    <form action="Reg_Multi.php?Reg_Multi=Cert&numero_doc=<?php echo $_GET['numero_doc']?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <h5>Datos de los certificados</h5>
            <table id="tabla_certi">
                <tr>
                    <!-- Nombre del certificado -->
                    <td><label for="Nombre_de_cer" class="form_multi_l">Nombre</label></td> 
                    <!-- Organizacion -->
                    <td><label for="Organizacion" class="form_multi_l">Organizacion</label></td> 
                    <!-- Fecha Expedicion -->
                    <td><label for="Fecha_Expedicion" class="form_multi_l">Fecha Expedicion</label></td> 
                    <!-- Certificado archivo -->
                    <td><label for="Certificado" class="form_multi_l">Certificado</label></td>  
                </tr>
                <tr>
                    <!-- Nombre del certificado -->
                    <td><input type="text" name="d1" id="Nombre_de_cer" minlength="3"></td> 
                    <!-- Organizacion -->
                    <td><input type="text" name="d2" id="Organizacion" minlength="3"></td> 
                    <!-- Fecha Expedicion -->
                    <td><input type="date" name="d3" id="Fecha_Expedicion" min="1950-01-01" max="2024-12-31"></td> 
                    <!-- Certificado archivo -->
                    <td><input type="file" name="d4" id="Certificado"></td> 
                </tr>
            </table>
        </fieldset>
        <div>
            <button type="button" onclick="AgregarCerti();" >Agregar certificado</button>
            <button type="button" onclick="eliminar_cert();">Eliminar certificado</button>
        </div>
        </article>
            <!-- El boton de registro -->
            <div class="btn_ing">
                <label for="boton" class="botoncito">
                    <button type="submit">Registrar Certificado</button>
                    <button type="submit" name="Reg_Usu" value="Sin_Cer">No tiene certificados</button>
                </label>
            </div>
    </form>
    <script src="com_adm1.js"></script>
</body>
</html>
<?php
}
?>