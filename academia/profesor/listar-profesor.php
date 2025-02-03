<?php
    include '../../conexion.php';

    $cmd = $db->prepare("SELECT idprofesor, nombre, apellido, telefono, fechaNacimiento, sexo FROM profesores");
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
        echo "Error al obtener los profesores";
    }
?>
