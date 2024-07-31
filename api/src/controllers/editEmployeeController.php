<?php

use MyApp\data\Database;

require("../../vendor/autoload.php");
$db = new Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = "SELECT
    p.id,
    p.name,
    p.country,
    p.email,
    p.phone,
    p.age,
    w.workstation,
FROM
    persons.employees e
JOIN
    persons.persons p ON e.person = p.id
JOIN
    persons.workstations w ON e.workstation = w.id
    WHERE e.id = $id";
}
