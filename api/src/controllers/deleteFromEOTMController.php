<?php


use MyApp\data\Database;

require("../../vendor/autoload.php");
$db = new Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['uid'];

    $query = "DELETE FROM `employee_of_the_month` WHERE `employee` = $id";
    $delete = $db->ejecutarConsulta($query);
    if ($delete) {
        echo "<h6>DATOS ELIMINADOS</h6>";
    } else {
        echo "<h6>Error al eliminar el registro</h6>";
    }
}
