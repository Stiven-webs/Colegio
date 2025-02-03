<?php
    include '../../conexion.php';

    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['fechaNacimiento']) && isset($_POST['sexo'])) {
        $vnombre = $_POST['nombre'];
        $vapellido = $_POST['apellido'];
        $vtelefono = $_POST['telefono'];
        $vfechaNacimiento = $_POST['fechaNacimiento'];
        $vsexo = $_POST['sexo'];

        $cmd = $db->prepare("INSERT INTO profesores(nombre, apellido, telefono, fechaNacimiento, sexo) 
                             VALUES (:nombre, :apellido, :telefono, :fechaNacimiento, :sexo)");
        $cmd->bindParam(':nombre', $vnombre);
        $cmd->bindParam(':apellido', $vapellido);
        $cmd->bindParam(':telefono', $vtelefono);
        $cmd->bindParam(':fechaNacimiento', $vfechaNacimiento);
        $cmd->bindParam(':sexo', $vsexo);

        if ($cmd->execute()) {
            echo "Profesor agregado satisfactoriamente";
        } else {
            echo "Error al agregar el profesor";
        }
    }
?>
