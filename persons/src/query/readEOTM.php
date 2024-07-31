<?php

use MyApp\data\Database;

require("../../vendor/autoload.php");
$db = new Database;

$query = "SELECT persons.id, persons.name, persons.phone, workstations.workstation, MONTH(employee_of_the_month.month) as 'month'
FROM persons
JOIN employees ON persons.id = employees.person
JOIN workstations ON workstations.id = employees.workstation
JOIN employee_of_the_month ON employees.id = employee_of_the_month.employee";

$select = $db->seleccionarDatos($query);

?>
<h6 align="center" class="mt-3">Employees of the month</h6>
<div class="table">
    <table class="table table-light mt-2">
        <thead>
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">M</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($select as $fav) {
                $id = $fav["id"];
                $name = $fav["name"];;
                $month = $fav["month"];

            ?>

                <tr class="">
                    <td><?php echo $name; ?></td>
                    <td><?php echo $month; ?></td>
                    <td><button class="btn btn-danger delete-from-favorites" data-uid="<?php echo $id; ?>">
                            Delete
                        </button></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-from-favorites').on('click', function() {
            const eotmData = {
                uid: $(this).data('uid')
            };

            $.ajax({
                url: 'src/controllers/deleteFromEOTMController.php',
                method: 'POST',
                type: 'DELETE',
                data: eotmData,
                success: function(response) {
                    alert('Empleado eliminado de favoritos');
                },
                error: function() {
                    alert('Error al eliminar de favoritos');
                }
            });
        });
    });
</script>