<?php

use MyApp\data\Database;

require("../../vendor/autoload.php");
$db = new Database;

if ($_REQUEST == $_POST) {

    $name = $_POST['name'];
    $img = $_POST['img'];

    $qry = "SELECT * FROM team WHERE team.name = '$name' AND team.img = '$img'";
    $select = $db->seleccionarDatos($qry);

    if ($select) {
        echo "El Pokémon ya esta en el equipo.";
    } else {
        $qry = "INSERT INTO `team`(`name`, `img`) VALUES ('$name','$img')";
        $insert = $db->ejecutarConsulta($qry);

        if ($insert) {
            echo "El Pokémon se añadió al equipo.";
        } else {
            echo "Error al añadir al Pokémon al equipo.";
        }
    }
}
