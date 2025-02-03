<?php
    include '../../conexion.php';

    $id = $_POST['id'];

    if (!empty($id)) {
        $cmd = $db->prepare("DELETE FROM cursos WHERE idcurso = :idcurso");
        $cmd->bindParam(':idcurso', $id);

        if ($cmd->execute()) {
            echo "Curso eliminado satisfactoriamente";
        } else {
            echo "Error al eliminar el curso";
        }
    }
?>
