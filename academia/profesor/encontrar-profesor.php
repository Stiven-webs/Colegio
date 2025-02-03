<?php
    include '../../conexion.php';

    $id = $_POST['id'];

    if (!empty($id)) {
        $cmd = $db->prepare("SELECT idprofesor, nombre, apellido, telefono, fechaNacimiento, sexo FROM profesores WHERE idprofesor = :idprofesor");
        $cmd->bindParam(':idprofesor', $id);
        $cmd->execute();

        if ($cmd) {
            $json = array();
            $registro = $cmd->fetch();
            if ($registro) {
                $json[] = array(
                    'idprofesor' => $registro['idprofesor'],
                    'nombre' => $registro['nombre'],
                    'apellido' => $registro['apellido'],
                    'telefono' => $registro['telefono'],
                    'fechaNacimiento' => $registro['fechaNacimiento'],
                    'sexo' => $registro['sexo']
                );
                echo json_encode($json[0]); 
            } else {
                echo "Profesor no encontrado";
            }
        } else {
            echo "Error al buscar el profesor";
        }
    }
?>
