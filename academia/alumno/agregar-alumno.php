<?php
    include '../../conexion.php';

    if (isset($_POST['nombre'])) {
        $vnombre = $_POST['nombre'];
        $vapellido = $_POST['apellido'];
        $vnumero = $_POST['numero'];
        $vfechaNacimiento = $_POST['fechaNacimiento'];
        $vsexo = $_POST['sexo'];

        $cmd = $db->prepare("INSERT INTO alumno(nombre, apellido, numero, fechaNacimiento, sexo) 
                             VALUES (:nombre, :apellido, :numero, :fechaNacimiento, :sexo)");
        $cmd->bindParam(':nombre', $vnombre);
        $cmd->bindParam(':apellido', $vapellido);
        $cmd->bindParam(':numero', $vnumero);
        $cmd->bindParam(':fechaNacimiento', $vfechaNacimiento);
        $cmd->bindParam(':sexo', $vsexo);

        if ($cmd->execute()) {
            echo "Alumno agregado satisfactoriamente";
        } else {
            echo "Error al agregar el alumno";
        }
    }
?>
