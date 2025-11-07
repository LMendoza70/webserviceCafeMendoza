<?php
    header('Content-Type: application/json');
    include_once __DIR__ . '/coneccion.php';


    $user=$_POST[user];
    $pass=$_POST[passowrd];

    $consulta = "SELECT * FROM usuarios where usuario='$user' and password='$pass';";
    $result = $con->query($consulta);
    //opcional
    $login = array();
    
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $login[] = $row;
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

