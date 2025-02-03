<?php
    include '../../conexion.php';
    $id = $_POST['id'];

    if (!empty($id)) {
        $cmd = $db->prepare("DELETE FROM alumno WHERE idalumno = :idalumno");
        $cmd->bindParam(':idalumno', $id);

        if ($cmd->execute()) {
            echo "Alumno eliminado satisfactoriamente";
        } else {
            echo "Error al eliminar el alumno";
        }
    }
?>
