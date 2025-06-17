<?php
// Inicia el código PHP inmediatamente sin espacios o saltos de línea antes

// Crea el objeto usuario
$objeto = new usuario(
    clave_f: $_POST["cont"],        // Contraseña del usuario
    num_doc_f: $_POST["num_doc"]    // Número de documento del usuario
);
//var_dump($_POST);

// Llama al método cambiar
$respuesta = $objeto->cambiar();
//var_dump($respuesta);
// Realiza la redirección solo si hay respuesta y evita salida previa
?>
<a href="Usuario_adm.php">Volver a la usuarios</a>
