<?php
// Preparación de las experiencias
$expe = [];
if (!empty($_POST["n1"])) {
    $i = 1;
    while (!empty($_POST["n" . $i])) {
        $expe[$i] = $_POST["n" . $i];
        $i++;
    }
}

// Obtener el ID del usuario
$id_del_usu = new usuario(num_doc_f: $_GET["numero_doc"]);
$res = $id_del_usu->consultar_usuario_especifi();

if (!empty($res)) {
    $objeto = new usuario(
        id_usuario_f: $res[0]["ID_Usuario"],
        datos_expe_f: $expe
    );
    $objeto->Registrar_expe();
}

header("location: Usuario_adm.php?accion=Cert_for&numero_doc={$_GET["numero_doc"]}");
exit;
?>