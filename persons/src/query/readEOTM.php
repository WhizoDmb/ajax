<?php

use MyApp\data\Database;

require("../../vendor/autoload.php");
$db = new Database;

$query = "SELECT persons.name, persons.phone, workstations.workstation, MONTH(employee_of_the_month.month) as 'month'
FROM persons
JOIN employees ON persons.id = employees.person
JOIN workstations ON workstations.id = employees.workstation
JOIN employee_of_the_month ON employees.id = employee_of_the_month.employee";

$select = $db->seleccionarDatos($query);

?>
<div class="table-responsive">
    <table class="table table-light mt-3">
        <thead>
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">OCUPATTION</th>
                <th scope="col">MONTH</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($select as $fav) {
                $name = $fav["name"];
                $phone = $fav["phone"];
                $workstation = $fav["workstation"];
                $month = $fav["month"];

            ?>

                <tr class="">
                    <td><?php echo $name; ?></td>
                    <td><?php echo $workstation; ?></td>
                    <td><?php echo $month; ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>