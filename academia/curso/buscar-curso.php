<?php
    include '../../conexion.php';

    $buscar = $_POST['search'];

    if (!empty($buscar)) {
        $cmd = $db->prepare("SELECT * FROM cursos WHERE nombreCurso LIKE :search");
        $cmd->bindValue(':search', $buscar.'%');
        $cmd->execute();

        if ($cmd) {
            $json = array();
            while ($registro = $cmd->fetch()) {
                $json[] = array(
                    'idcurso' => $registro['idcurso'],
                    'nombreCurso' => $registro['nombreCurso'],
                    'nivelCurso' => $registro['nivelCurso'],
                    'precio' => $registro['precio']
                );
            }
            echo json_encode($json);
        } else {
            echo "Error al buscar el curso";
        }
    }
?>
