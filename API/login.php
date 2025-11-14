<?php
    header('Content-Type: application/json');
    include_once __DIR__ . '/coneccion.php';
    $alias = $_POST['alias'];
    $contraseña = $_POST['contrasena'];

    $sql = "SELECT alias, contraseña, nombre_completo, rol 
    FROM users 
    WHERE alias = '$alias' AND contraseña = '$contraseña'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $row['success'] = true;
        echo json_encode($row);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Usuario no encontrado'
        ]);
    }
    
    $con->close();    
?>

