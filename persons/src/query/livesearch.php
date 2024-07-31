<?php

use MyApp\data\Database;

require("../../vendor/autoload.php");
$db = new Database;

if (isset($_POST['input'])) {
    $input = $_POST['input'];

    $query = "SELECT
    p.id,
    p.name,
    p.country,
    p.email,
    p.phone,
    p.age,
    w.workstation
FROM
    persons.employees e
JOIN
    persons.persons p ON e.person = p.id
JOIN
    persons.workstations w ON e.workstation = w.id
    WHERE
    p.name LIKE '$input%'
    OR p.email LIKE '$input%'
    OR p.phone LIKE '$input%'
    OR p.age LIKE '$input%'
    OR w.workstation LIKE '$input%';";

    $select = $db->seleccionarDatos($query);

    if (!empty($select)) {
?>
        <div class="table-responsive">
            <table class="table table-light mt-5">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">AGE</th>
                        <th scope="col">COUNTRY</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">PHONE</th>
                        <th scope="col">OCCUPATION</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($select as $person) {
                    ?>
                        <tr class="">
                            <td scope="row"><?php echo $person['id']; ?></td>
                            <td scope="row"><?php echo $person['name']; ?></td>
                            <td scope="row"><?php echo $person['age']; ?></td>
                            <td scope="row"><?php echo $person['country']; ?></td>
                            <td scope="row"><?php echo $person['email']; ?></td>
                            <td scope="row"><?php echo $person['phone']; ?></td>
                            <td scope="row"><?php echo $person['workstation']; ?></td>
                            <td>
                                <button class="btn btn-primary add-to-favorites" data-id="<?php echo $person['id']; ?>">
                                    Add to favourites
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
<?php
    } else {



        echo "<h6>NO DATA FOUND</h6>";
    }
}
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.add-to-favorites').on('click', function() {
            const employeeData = {
                id: $(this).data('id')
            };

            $.ajax({
                url: 'src/controllers/addToEOTMController.php',
                method: 'POST',
                data: employeeData,
                success: function(response) {
                    alert('Empleado añadido a favoritos');
                },
                error: function() {
                    alert('Error al añadir a favoritos');
                }
            });
        });
    });
</script>