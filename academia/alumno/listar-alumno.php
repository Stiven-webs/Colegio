<?php
    include '../../conexion.php';

    $cmd = $db->prepare("SELECT idalumno, nombre, apellido, numero, fechaNacimiento, sexo FROM alumno");
    $cmd->execute();

    if ($cmd) {
        $json = array();
        while ($registro = $cmd->fetch()) {
            $json[] = array(
                'idalumno' => $registro['idalumno'],
                'nombre' => $registro['nombre'],
                'apellido' => $registro['apellido'],
                'numero' => $registro['numero'],
                'fechaNacimiento' => $registro['fechaNacimiento'],
                'sexo' => $registro['sexo']
            );
        }
        echo json_encode($json);
    } else {
        echo "Error al obtener los alumnos";
    }
?>
