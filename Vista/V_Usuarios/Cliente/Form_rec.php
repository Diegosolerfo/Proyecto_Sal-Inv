<?php
    $objeto = new usuario(
        num_doc_f:$_POST["num_doc"]
    );
    $respuesta = $objeto->clave();
    //var_dump($respuesta);
?>
<h2>Cambia la contraseña del usuario <?php echo $respuesta[0]['Nombre']; ?></h2>
<form action="Usuario_adm.php?accion=recuperar" method="post">
    <div>
        <label for="Cont">Contraseña nueva: </label>
        <input type="text" name="cont" id="Cont" required>
    </div>
    <div>
        <input type="hidden" name="num_doc" id="num_doc" value="<?php echo $_POST["num_doc"]; ?>" required>
    </div>
    <div>
        <button>
            Cambiar
        </button>
    </div>
</form>