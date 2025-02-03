<?php
    include '../../conexion.php';
    $id = $_POST['id'];

    if (!empty($id)) {
        $cmd = $db->prepare("DELETE FROM cronograma WHERE id = :idcronograma");
        $cmd->bindParam(':idcronograma', $id);

        if ($cmd->execute()) {
            echo "Cronograma eliminado satisfactoriamente";
        } else {
            echo "Error al eliminar el cronograma";
        }
    }
?>
