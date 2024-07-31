<?php

use MyApp\data\Database;

require("../../vendor/autoload.php");
$db = new Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = "SELECT * FROM `employee_of_the_month` WHERE `employee`=$id";
    $exists = $db->seleccionarDatos($query);

    if (!empty($exists)) {
        return ("<script>
        console.log('El empleado ya es empleado del mes');
        </script>");
    } else {

        $date = date("Y-m-d");
        $query = "INSERT INTO `persons`.`employee_of_the_month` (`employee`, `month`) VALUES ($id, '$date');";
        $insert = $db->ejecutarConsulta($query);
        if ($insert) {
            echo "<h6>DATOS eliminados</h6>";
        } else {
            echo "<h6>Error al eliminar el registro</h6>";
        }
    }
}
