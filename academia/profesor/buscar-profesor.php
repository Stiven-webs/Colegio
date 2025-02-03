<?php
    include '../../conexion.php';
    $buscar = $_POST['search'];

    if (!empty($buscar)) {
        $cmd = $db->prepare("SELECT * FROM profesores WHERE nombre LIKE :search OR apellido LIKE :search");
        $cmd->bindValue(':search', $buscar.'%');
        $cmd->execute();

        if ($cmd) {
            $json = array();
            while ($registro = $cmd->fetch()) {
                $json[] = array(
                    'idprofesor' => $registro['idprofesor'],
                    'nombre' => $registro['nombre'],
                    'apellido' => $registro['apellido'],
                    'telefono' => $registro['telefono'],
                    'fechaNacimiento' => $registro['fechaNacimiento'],
                    'sexo' => $registro['sexo']
                );
            }
            echo json_encode($json);
        } else {
            echo "Error al buscar el profesor";
        }
    }
?>
