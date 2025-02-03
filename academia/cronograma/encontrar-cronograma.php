<?php
    include '../../conexion.php';

    $id = $_POST['id'];

    if (!empty($id)) {
        $cmd = $db->prepare("SELECT id, nombreActividad, fechaInicio, fechaFin, horaInicio, horaFin 
                             FROM cronograma WHERE id = :idcronograma");
        $cmd->bindParam(':idcronograma', $id);
        $cmd->execute();

        if ($cmd) {
            $json = array();
            $registro = $cmd->fetch(); 
            if ($registro) {
                $json[] = array(
                    'idcronograma' => $registro['id'],
                    'nombreActividad' => $registro['nombreActividad'],
                    'fechaInicio' => $registro['fechaInicio'],
                    'fechaFin' => $registro['fechaFin'],
                    'horaInicio' => $registro['horaInicio'],
                    'horaFin' => $registro['horaFin']
                );
                echo json_encode($json[0]);
            } else {
                echo "Cronograma no encontrado";
            }
        } else {
            echo "Error al buscar el cronograma";
        }
    }
?>
