<?php
    include '../../conexion.php';
    $buscar = $_POST['search'];

    if (!empty($buscar)){
        $cmd = $db->prepare("SELECT * FROM cronograma WHERE nombreActividad LIKE :search");
        $cmd->bindValue(':search', $buscar.'%');
        $cmd->execute();

        if ($cmd) {
            $json = array();
            while ($registro = $cmd->fetch()) {
                $json[] = array(
                    'idcronograma' => $registro['id'],
                    'nombreActividad' => $registro['nombreActividad'],
                    'fechaInicio' => $registro['fechaInicio'],
                    'fechaFin' => $registro['fechaFin'],
                    'horaInicio' => $registro['horaInicio'],
                    'horaFin' => $registro['horaFin']
                );
            }
            echo json_encode($json);
        } else {
            echo "Error al buscar el cronograma";
        }
    }
?>
