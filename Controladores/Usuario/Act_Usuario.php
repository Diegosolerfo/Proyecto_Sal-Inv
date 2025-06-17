<?php
if($_GET["Act"] == "Act_Cli"){
    //Controlador para la actualizacion de datos de un cliente
    //var_dump($_POST);
    include ("../../Modelos/Mod_Usuario.php");
        $objeto = new usuario(num_doc_f:$_GET['num_doc']);
        $respuesta = $objeto->consultar_usuario_especifi();
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
                    <label for="documento" class="form-label">Documento</label>
                    <input type="number" name="num_doc"  value="<?php echo $respuesta[0]['Numero_documento']; ?>" min="1000000" max="999999999999" class="form-control" id="documento" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $respuesta[0]['Nombre']; ?>" class="form-control" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" value="<?php echo $respuesta[0]['Apellido']; ?>" class="form-control" id="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" name="correo" value="<?php echo $respuesta[0]['Correo']; ?>" class="form-control" id="correo">
                </div>
                <div class="mb-3">
                    <label for="fecha_nac" class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nac" value="<?php echo $respuesta[0]['Fecha_nacimiento']; ?>" class="form-control" id="fecha_nac">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" name="direccion" value="<?php echo $respuesta[0]['Direccion']; ?>" class="form-control" id="direccion">
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select name="genero" class="form-control" id="genero">
                        <option value="Femenino" <?php if($respuesta[0]['Genero'] == 'Femenino') {echo 'selected';} ?>>Femenino</option>
                        <option value="Masculino" <?php if($respuesta[0]['Genero'] == 'Masculino') {echo 'selected';} ?>>Masculino</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="number" min="3000000000" max="7000000000" name="telefono" value="<?php echo $respuesta[0]['Telefono']; ?>" class="form-control" id="telefono">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="id_usu" value="<?php echo $respuesta[0]['ID_Usuario'];?>">Guardar</button>
                </div>           
            </form>
        </section>
    </body>
</html>
    
<?php  
    }else if($_GET["Act"]  == "Save_C"){
        include ("../../Modelos/Mod_Usuario.php");
        $objeto = new usuario(
            id_usuario_f:$_POST["id_usu"],
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
            header("Location: Con_Usuario.php?ti_con=Con_E_U&num_doc={$_POST['num_doc']}");  
        }
        else{
            echo "Vuelva a intentarlo, los datos no se actualizaron";
        }
    }
else if($_GET["Act"] == "Act_U"){
    //controlador actualizacion del administrador y el operador espeficica
    //var_dump($_POST);
    include ("../../Modelos/Mod_Usuario.php"); 
        $objeto = new usuario(num_doc_f:$_GET['num_doc']);
        $respuesta = $objeto->consultar_usuario_especifi();
        //var_dump($respuesta);
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
            <form method="post" action="Guardar.php" enctype="multipart/form-data" style="margin:4%">
                <div class="mb-3">
                    <label for="documento" class="form-label">Documento</label>
                    <input type="number" name="num_doc" readonly value="<?php echo $respuesta[0]['Numero_documento']; ?>" min="1000000" max="999999999999" class="form-control" id="documento" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $respuesta[0]['Nombre']; ?>" class="form-control" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" value="<?php echo $respuesta[0]['Apellido']; ?>" class="form-control" id="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" name="correo" value="<?php echo $respuesta[0]['Correo']; ?>" class="form-control" id="correo">
                </div>
                <div class="mb-3">
                    <label for="fecha_nac" class="form-label">Fecha de nacimiento</label>
                    <input type="date"  name="fecha_nac" value="<?php echo $respuesta[0]['Fecha_nacimiento']; ?>" class="form-control" id="fecha_nac">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" name="direccion" value="<?php echo $respuesta[0]['Direccion']; ?>" class="form-control" id="direccion">
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select name="genero" class="form-control" id="genero">
                        <option value="Mujer" <?php if ($respuesta[0]['Genero'] == 'Mujer'){echo 'selected';}?>>Femenino</option>
                        <option value="Hombre" <?php if ($respuesta[0]['Genero'] == 'Hombre'){echo 'selected';}?>>Masculino</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="number" min="3000000000" max="7000000000" name="telefono" value="<?php echo $respuesta[0]['Telefono']; ?>" class="form-control" id="telefono">
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Tipo de usuario</label>
                    <select name="rol" class="form-control" id="rol" <?php if($respuesta[0]['Rol'] != 'Administrador'){echo'disabled';} ?>>
                        <option value="Administrador" <?php if ($respuesta[0]['Rol'] == 'Administrador'){echo 'selected';}?>>Administrador</option>
                        <option value="Operador" <?php if ($respuesta[0]['Rol'] == 'Operador'){echo 'selected';}?>>Operador</option>
                        <option value="Cliente" <?php if ($respuesta[0]['Rol'] == 'Cliente'){echo 'selected';}?>>Cliente</option>
                </select>
                </div>
                <div class="mb-3">
                    <label for="eps" class="form-label">EPS</label>
                    <input type="text" name="eps" value="<?php echo $respuesta[0]['EPS']; ?>" class="form-control" id="eps">
                </div>
                <div class="mb-3">
                    <label for="rh" class="form-label">RH</label><!-- Este es el rh -->
                    <select name="rh" id="rh">
                        <option value="+"<?php if($respuesta[0]['RH']=="+"){echo 'selected'; }?>>+</option>
                        <option value="-"<?php if($respuesta[0]['RH']=="-"){echo 'selected'; }?>>-</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tipo_sangre" class="form-label">Tipo de sangre</label>
                    <select name="Tipo_sangre" id="tipo_sangre">
                        <option value="AB" <?php if ($respuesta[0]['Tipo_sangre'] == 'AB'){ echo 'selected'; }?>>AB</option>
                        <option value="O" <?php if ($respuesta[0]['Tipo_sangre'] == 'O') {echo 'selected'; }?>>O</option>
                        <option value="A" <?php if ($respuesta[0]['Tipo_sangre'] == 'A') {echo 'selected'; }?>>A</option>
                        <option value="B" <?php if ($respuesta[0]['Tipo_sangre'] == 'B') {echo 'selected'; }?>>B</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="id_usu" value="<?php echo $respuesta[0]['ID_Usuario'];?>">Guardar</button>
                </div>           
            </form>
        </section>
    </body>
</html>