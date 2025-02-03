<?php
    include '../../conexion.php';

    if (isset($_POST['idcronograma'])) {
        $vnombreActividad = $_POST['nombreActividad'];
        $vfechaInicio = $_POST['fechaInicio'];
        $vfechaFin = $_POST['fechaFin'];
        $vhoraInicio = $_POST['horaInicio'];
        $vhoraFin = $_POST['horaFin'];
        $vidcronograma = $_POST['idcronograma'];

        $cmd = $db->prepare("UPDATE cronograma SET nombreActividad = :nombreActividad, 
                                                    fechaInicio = :fechaInicio, 
                                                    fechaFin = :fechaFin, 
                                                    horaInicio = :horaInicio, 
                                                    horaFin = :horaFin 
                             WHERE id = :idcronograma");
        $cmd->bindParam(':nombreActividad', $vnombreActividad);
        $cmd->bindParam(':fechaInicio', $vfechaInicio);
        $cmd->bindParam(':fechaFin', $vfechaFin);
        $cmd->bindParam(':horaInicio', $vhoraInicio);
        $cmd->bindParam(':horaFin', $vhoraFin);
        $cmd->bindParam(':idcronograma', $vidcronograma);

        if ($cmd->execute()) {
            echo "Cronograma actualizado satisfactoriamente";
        } else {
            echo "Error al actualizar el cronograma";
        }
    }
?>
