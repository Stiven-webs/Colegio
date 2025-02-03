<?php
    include '../../conexion.php';

    if (isset($_POST['nombreCurso'])) {
        $vnombreCurso = $_POST['nombreCurso'];
        $vnivelCurso = $_POST['nivelCurso'];
        $vprecio = $_POST['precio'];

        $cmd = $db->prepare("INSERT INTO cursos(nombreCurso, nivelCurso, precio) VALUES (:nombreCurso, :nivelCurso, :precio)");
        $cmd->bindParam(':nombreCurso', $vnombreCurso);
        $cmd->bindParam(':nivelCurso', $vnivelCurso);
        $cmd->bindParam(':precio', $vprecio);

        if($cmd->execute()){
            echo "Curso agregado satisfactoriamente";
        } else {
            echo "Error al agregar el curso";
        }
    }
?>
