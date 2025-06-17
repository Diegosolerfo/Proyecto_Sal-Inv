<?php
// … recibir $_GET['id_usuario'], cargar $respuesta …

$datos = [];
$i = 0;
$aux = 4;
var_dump($_POST);
if (isset($_POST['n0'])) {
    while (isset($_POST["n{$i}"]) || isset($_FILES["n{$i}"])) {
        // Cada 4º índice (i % 4 === 3) es la imagen
        if ($i % 4 === 3) {
            // Prioriza archivo subido
            if (isset($_FILES["n{$i}"]) && $_FILES["n{$i}"]['error'] === UPLOAD_ERR_OK) {
                $datos[$i] = file_get_contents($_FILES["n{$i}"]['tmp_name']);
            } else {
                // Si no, usa el hidden base64
                $datos[$i] = base64_decode($_POST["actual_n{$i}"] ?? '');
            }
        } else {
            // Campos de texto / fecha
            if($i == $aux && isset($_POST["n{$i}"])) {
                $blob = file_get_contents($_FILES["n{$i}"]['tmp_name']); // o $_FILES[$key]['tmp_name']
                $datos[$i] = $blob;
                $aux += 4;
            }
            $datos[$i] = $_POST["n{$i}"];
        }
        $i++;
    }
}
echo "<br><br><br><br>";
var_dump($datos);
// Ahora invocas al modelo
$obj = new Usuario(
    id_usuario_f: intval($_POST['n0']),
    datos_certi_f: $datos
);
$obj->actualizar_cert();

// redirección u otro flujo…
