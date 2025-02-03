<?php
    include '../../conexion.php';

    if (isset($_POST['idcurso'])) {
        $vnombreCurso = $_POST['nombreCurso'];
        $vnivelCurso = $_POST['nivelCurso'];
        $vprecio = $_POST['precio'];
        $vidcurso = $_POST['idcurso'];

        $cmd = $db->prepare("UPDATE cursos SET nombreCurso = :nombreCurso, nivelCurso = :nivelCurso, precio = :precio WHERE idcurso = :idcurso");
        $cmd->bindParam(':nombreCurso', $vnombreCurso);
        $cmd->bindParam(':nivelCurso', $vnivelCurso);
        $cmd->bindParam(':precio', $vprecio);
        $cmd->bindParam(':idcurso', $vidcurso);

        if($cmd->execute()){
            echo "Curso actualizado satisfactoriamente";
        } else {
            echo "Error al actualizar el curso";
        }
    }
?>
