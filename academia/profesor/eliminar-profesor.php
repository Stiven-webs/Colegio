<?php
    include '../../conexion.php';
    $id = $_POST['id'];

    if (!empty($id)) {
        $cmd = $db->prepare("DELETE FROM profesores WHERE idprofesor = :idprofesor");
        $cmd->bindParam(':idprofesor', $id);

        if ($cmd->execute()) {
            echo "Profesor eliminado satisfactoriamente";
        } else {
            echo "Error al eliminar el profesor";
        }
    }
?>
