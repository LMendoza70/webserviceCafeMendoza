<?php
    header('Content-Type: application/json');
    include_once __DIR__ . '/coneccion.php';

    $consulta = "select
                    cafes.nombre,
                    cafes.variedad_de_cafe,
                    productores.nombre as productor_nombre,
                    cafes.proceso,
                    cafes.notas_de_cata,
                    cafes.puntuacion_sca,
                    cafes.altura_siembra,
                    tostadores.nombre as tostador_nombre,
                    cafes.nombre_imagen
                from
                    cafes
                    join productores on cafes.productor_id = productores.id
                    join tostadores on cafes.tostador_id = tostadores.id";

    $result = $con->query($consulta);

    $cafes = array();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cafes[] = $row;
        }
        echo json_encode($cafes, JSON_UNESCAPED_UNICODE);
    } else {
        //envia mensaje de error
        echo json_encode([
            'error' => 'No se encontraron cafes'
        ]);
    }
    $con->close();
?>