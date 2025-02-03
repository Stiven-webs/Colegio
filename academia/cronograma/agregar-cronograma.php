<?php
    include '../../conexion.php';

    if (isset($_POST['nombreActividad'])) {
        $vnombreActividad = $_POST['nombreActividad'];
        $vfechaInicio = $_POST['fechaInicio'];
        $vfechaFin = $_POST['fechaFin'];
        $vhoraInicio = $_POST['horaInicio'];
        $vhoraFin = $_POST['horaFin'];

        $cmd = $db->prepare("INSERT INTO cronograma(nombreActividad, fechaInicio, fechaFin, horaInicio, horaFin) 
                             VALUES (:nombreActividad, :fechaInicio, :fechaFin, :horaInicio, :horaFin)");
        $cmd->bindParam(':nombreActividad', $vnombreActividad);
        $cmd->bindParam(':fechaInicio', $vfechaInicio);
        $cmd->bindParam(':fechaFin', $vfechaFin);
        $cmd->bindParam(':horaInicio', $vhoraInicio);
        $cmd->bindParam(':horaFin', $vhoraFin);

        if($cmd->execute()){
            echo "Cronograma agregado satisfactoriamente";
        } else {
            echo "Error al agregar el cronograma";
        }
    }
?>
