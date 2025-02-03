<?php
    include '../../conexion.php';

    $cmd = $db->prepare("SELECT id, nombreActividad, fechaInicio, fechaFin, horaInicio, horaFin FROM cronograma");
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
        echo "Error al obtener los cronogramas";
    }
?>
