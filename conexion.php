<?php
    $usuario='root';
    $clave='';
    try {
            $db = new PDO('mysql:host=localhost;dbname=consorcio', $usuario, $clave);
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }



 ?>
