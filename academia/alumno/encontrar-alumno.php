<?php
include '../../conexion.php';

$id = $_POST['id'];

if (!empty($id)) {
    $cmd = $db->prepare("SELECT idalumno, nombre, apellido, numero, fechaNacimiento, sexo FROM alumno WHERE idalumno = :idalumno");
    $cmd->bindParam(':idalumno', $id);
    $cmd->execute();

    if ($cmd) {
        $json = array();
        $registro = $cmd->fetch(); 
        if ($registro) {
            $json[] = array(
                'idalumno' => $registro['idalumno'],
                'nombre' => $registro['nombre'],
                'apellido' => $registro['apellido'],
                'numero' => $registro['numero'],
                'fechaNacimiento' => $registro['fechaNacimiento'],
                'sexo' => $registro['sexo']
            );
            echo json_encode($json[0]); 
        } else {
            echo "Alumno no encontrado";
        }
    } else {
        echo "Error al buscar el alumno";
    }
}
?>
