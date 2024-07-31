<?php

use MyApp\data\Database;

require("../../vendor/autoload.php");
$db = new Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $date = date("Y-m-d");
    $query = "INSERT INTO `persons`.`employee_of_the_month` (`employee`, `month`) VALUES ($id, '$date');";
    $insert = $db->ejecutarConsulta($query);
    if ($insert) {
        echo "<h6>DATOS INSERTADOS</h6>";
    } else {
        echo "<h6>Error al insertar el registro</h6>";
    }
}
