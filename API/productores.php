<?php
    header('Content-Type: application/json');
    include_once __DIR__ . '/coneccion.php';

    $consulta = "SELECT * FROM productores ORDER BY nombre ASC;";
    $result = $con->query($consulta);

    $productores = array();
    
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productores[] = $row;
            }
            echo json_encode($productores, JSON_UNESCAPED_UNICODE);
        } else {
            //envia mensaje cuando no hay productores
            echo json_encode([
                'error' => 'No se encontraron productores'
            ]);
        }
    } else {
        //envia mensaje de error en la consulta
        echo json_encode([
            'error' => 'Error al ejecutar la consulta: ' . $con->error
        ]);
    }
    
    $con->close();
?>

