<?php
try {
    $cadena= new PDO ('mysql:host=localhost; dbname=proyecto_cafe', 'root','');
    /* echo "La conexion a la base de datos a sido un exito!!"; */
} catch (Exception $error) {
   die('Error en la conexion a la base'. $error->getMessage());
}
?>