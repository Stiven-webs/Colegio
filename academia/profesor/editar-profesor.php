<?php
    include '../../conexion.php';

    if (isset($_POST['idprofesor'])) {
        $vnombre = $_POST['nombre'];
        $vapellido = $_POST['apellido'];
        $vtelefono = $_POST['telefono'];
        $vfechaNacimiento = $_POST['fechaNacimiento'];
        $vsexo = $_POST['sexo'];
        $vidprofesor = $_POST['idprofesor'];

        $cmd = $db->prepare("UPDATE profesores SET nombre = :nombre, apellido = :apellido, telefono = :telefono, 
                            fechaNacimiento = :fechaNacimiento, sexo = :sexo WHERE idprofesor = :idprofesor");
        $cmd->bindParam(':nombre', $vnombre);
        $cmd->bindParam(':apellido', $vapellido);
        $cmd->bindParam(':telefono', $vtelefono);
        $cmd->bindParam(':fechaNacimiento', $vfechaNacimiento);
        $cmd->bindParam(':sexo', $vsexo);
        $cmd->bindParam(':idprofesor', $vidprofesor);

        if ($cmd->execute()) {
            echo "Profesor actualizado satisfactoriamente";
        } else {
            echo "Error al actualizar el profesor";
        }
    }
?>
