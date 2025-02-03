<?php
    include '../../conexion.php';

    if (isset($_POST['idalumno'])) {
        $vnombre = $_POST['nombre'];
        $vapellido = $_POST['apellido'];
        $vnumero = $_POST['numero'];
        $vfechaNacimiento = $_POST['fechaNacimiento'];
        $vsexo = $_POST['sexo'];
        $vidalumno = $_POST['idalumno'];

        $cmd = $db->prepare("UPDATE alumno SET nombre = :nombre, apellido = :apellido, numero = :numero, 
                             fechaNacimiento = :fechaNacimiento, sexo = :sexo WHERE idalumno = :idalumno");
        $cmd->bindParam(':nombre', $vnombre);
        $cmd->bindParam(':apellido', $vapellido);
        $cmd->bindParam(':numero', $vnumero);
        $cmd->bindParam(':fechaNacimiento', $vfechaNacimiento);
        $cmd->bindParam(':sexo', $vsexo);
        $cmd->bindParam(':idalumno', $vidalumno);

        if ($cmd->execute()) {
            echo "Alumno actualizado satisfactoriamente";
        } else {
            echo "Error al actualizar el alumno";
        }
    }
?>
