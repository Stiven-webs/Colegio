<?php
    include '../../conexion.php';

    $id = $_POST['id'];

    if (!empty($id)) {
        $cmd = $db->prepare("SELECT idcurso, nombreCurso, nivelCurso, precio FROM cursos WHERE idcurso = :idcurso");
        $cmd->bindParam(':idcurso', $id);
        $cmd->execute();

        if ($cmd) {
            $json = array();
            $registro = $cmd->fetch(); 
            if ($registro) {
                $json[] = array(
                    'idcurso' => $registro['idcurso'],
                    'nombreCurso' => $registro['nombreCurso'],
                    'nivelCurso' => $registro['nivelCurso'],
                    'precio' => $registro['precio']
                );
                echo json_encode($json[0]); 
            } else {
                echo "Curso no encontrado";
            }
        } else {
            echo "Error al buscar el curso";
        }
    }
?>
