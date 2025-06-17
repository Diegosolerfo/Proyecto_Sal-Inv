<?php
//Controlador para la actualizacion de datos de un expericia
    //var_dump($_POST);
if($_GET["Act_Multi"] == "Act_expe"){
    include ("../../Modelos/Mod_Usuario.php");
        $objeto = new usuario(num_doc_f:$_GET['num_doc']);
        $respuesta = $objeto->consultar_certificado();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestión de usuarios</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
            <h3>Datos de la experiencia</h3>
            <section>
            <form method="post" action="Act_Multi.php?Act_Multi=Gua_Expe" enctype="multipart/form-data" style="margin:4%">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nombre:</label>
                    <input type="text" readonly name="nom"  value="<?php echo $respuesta[0]['Nombre']; ?>" min="1000000" max="999999999999" class="form-control" id="nom" required>
                </div>
                <div class="mb-3">
                    <label for="ape" class="form-label">Apellido:</label>
                    <input type="text" readonly name="ape" value="<?php echo $respuesta[0]['Apellido']; ?>" class="form-control" id="ape" required>
                </div>
                <div class="mb-3">
                    <label for="nom_emp" class="form-label">Nombre empresa:</label>
                    <input type="text" name="n1" value="<?php echo $respuesta[0]['Nombre_Empresa']; ?>" class="form-control" id="nom_emp" required>
                </div>
                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo:</label>
                    <input type="email" name="n2" value="<?php echo $respuesta[0]['Cargo']; ?>" class="form-control" id="cargo" required>
                </div>
                <div class="mb-3">
                    <label for="fec_ini" class="form-label">Fecha de inicio</label>
                    <input type="date" name="n3" value="<?php echo $respuesta[0]['Fecha_Inicio']; ?>" class="form-control" id="fec_ini" required>
                </div>
                <div class="mb-3">
                    <label for="fec_fin" class="form-label">Fecha de fin</label>
                    <input type="text" name="n4" value="<?php echo $respuesta[0]['Fecha_Fin']; ?>" class="form-control" id="fec_fin" required>
                </div>
                <div class="mb-3">
                    <label for="obs_emp" class="form-label">Obervacion</label>
                    <input type="text" name="n5" value="<?php echo $respuesta[0]['Observacion']; ?>" class="form-control" id="obs_emp" required>
                </div>
                <div>
                    <label for="tel_emp">Telefono</label>
                    <input type="text" min="3000000000" max="7000000000" name="n6" value="<?php echo $respuesta[0]['Telefono_empresa']; ?>" class="form-control" id="tel_emp" required>
                </div>
                <div class="mb-3">
                    <label for="nom_con" class="form-label">Nombre Contacto</label>
                    <input type="number" name="n7" value="<?php echo $respuesta[0]['Nombre_Contacto']; ?>" class="form-control" id="nom_con" required>
                </div>
                <div>
                    <a href="Act_Usuario.php">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </a>
                </div>           
            </form>
        </section>
    </body>
</html>
    
<?php  
    }
    
    else if($_GET["Act_Multi"]  == "Gua_Exp"){
    session_start(); // Se inicia la sesion
    $id_del_usu = new usuario( // Se crea el objeto
        num_doc_f:$_GET["Num_Doc_Usu"] 
        // Se da el numero de documento para conseguir el ID DEL USUARIO
    );
    $id_del_usu->consultar_usuario_especifi();
    // Se usa la  funcion para obtener el ID del usuario
    if(!empty($id_del_usu["ID_Usuario"])){// Se verifica si hay un valor de respuesta
    $objeto = new usuario( // Se crea e objeto para registrar la experiencia
        id_usuario_f:$id_del_usu["ID_Usuario"], // Se le da el Id para la llave foranea
        datos_expe_f:$expe // Se le da el arreglo con las experiencias
    );
    $objeto->actualizar_expe();
    }
}
else if($_GET["Act_Multi"] == "Act_Cer"){
        //Controlador para la actualizacion de datos de un cliente
        //var_dump($_POST);
        include ("../../Modelos/Mod_Usuario.php");
            $objeto = new usuario(num_doc_f:$_GET['num_doc']);
            $respuesta = $objeto->consultar_experiencia();
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <title>Gestión de usuarios</title>
            <meta charset="utf-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </head>
        <body>
            <section>
                <form method="post" action="Act_Usuario.php?Act=Save_C" enctype="multipart/form-data" style="margin:4%">
                    <div class="mb-3">
                        <label for="documento" readonly class="form-label">Numero de documento</label>
                        <input type="number" name="num_doc"  value="<?php echo $respuesta[0]['Numero_documento']; ?>" min="1000000" max="999999999999" class="form-control" id="documento" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" readonly class="form-label">Nombre</label>
                        <input type="text" name="nombre" value="<?php echo $respuesta[0]['Nombre']; ?>" class="form-control" id="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" readonly class="form-label">Apellido</label>
                        <input type="text" name="apellido" value="<?php echo $respuesta[0]['Apellido']; ?>" class="form-control" id="apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="certificado" class="form-label">Archivo de certificado</label>
                        <input type="email" name="n1" value="<?php echo $respuesta[0]['Correo']; ?>" class="form-control" id="certificado">
                    </div>
                    <div class="mb-3">
                        <label for="nombre_cerf" class="form-label">Nombre del certificado</label>
                        <input type="date" name="n2" value="<?php echo $respuesta[0]['Fecha_nacimiento']; ?>" class="form-control" id="nombre_cert">
                    </div>
                    <div class="mb-3">
                        <label for="organizacion" class="form-label">Organizacion de origen</label>
                        <input type="text" name="n3" value="<?php echo $respuesta[0]['Direccion']; ?>" class="form-control" id="organizacion">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_cert" class="form-label">Fecha del certificado</label>
                        <input type="date" names="n4" value="<?php echo $respuesta[0]['Direccion']; ?>" class="form-control" id="fecha_cert">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>           
                </form>
            </section>
        </body>
    </html>
        
    <?php  
        }else if($_GET["Act_Multi"]  == "Gua_Cer"){
            $objeto = new usuario(
                num_doc_f:$_POST["num_doc"],
                nombre_f:$_POST["nombre"],
                apellido_f:$_POST["apellido"],
                correo_f:$_POST["correo"],
                fecha_nac_f:$_POST["fecha_nac"],
                direccion_f:$_POST["direccion"],
                genero_f:$_POST["genero"],
                telefono_f:$_POST["telefono"]       
            );
            $respuesta = $objeto->actualizar_usuario_cliente(); 
            if(!empty($respuesta)){
                header("Location: Con_Usuario.php");  
            }
            else{
                echo "Vuelva a intentarlo, los datos no se actualizaron";
            }
        }
    