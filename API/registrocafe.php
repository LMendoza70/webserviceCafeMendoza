<?php
    header('Content-Type: application/json');
    include_once __DIR__ . '/coneccion.php';

    $nombre = $_POST['nombre'];
    $variedad_de_cafe = $_POST['variedad_de_cafe'];
    $finca_id = $_POST['finca_id'];
    $proceso = $_POST['proceso'];
    $notas_de_cata = $_POST['notas_de_cata'];
    $puntuacion_sca = $_POST['puntuacion_sca'];
    $productor_id = $_POST['productor_id'];
    $altura_siembra = $_POST['altura_siembra'];
    $tostador_id = $_POST['tostador_id'];
    $nombre_imagen = $_POST['nombre_imagen'];

    $consulta = "insert into cafes 
    (nombre, variedad_de_cafe, finca_id, proceso, notas_de_cata, 
    puntuacion_sca, productor_id , altura_siembra, tostador_id, nombre_imagen) 
    values 
    ('$nombre', '$variedad_de_cafe', '$finca_id', '$proceso', '$notas_de_cata', 
    '$puntuacion_sca', '$productor_id', '$altura_siembra', '$tostador_id', '$nombre_imagen')";

    if ($con->query($consulta) === TRUE) {
        echo json_encode([
            'success' => true,
            'message' => 'Cafe registrado correctamente'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error al registrar el cafe'
        ]);
    }
    $con->close();
?>