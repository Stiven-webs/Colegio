<?php
    include '../../conexion.php';

    $cmd = $db->prepare("SELECT idcurso, nombreCurso, nivelCurso, precio FROM cursos");
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
        echo "Error al obtener los cursos";
    }
?>
