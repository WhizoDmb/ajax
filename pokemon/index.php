<?php
// URL de la API para obtener la lista de Pokémon
$pokemonListUrl = "https://pokeapi.co/api/v2/pokemon?limit=3"; // Puedes ajustar el límite según tus necesidades

// Función para hacer una solicitud GET a la API
function getApiData($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}

// Obtener la lista de Pokémon
$pokemonList = getApiData($pokemonListUrl);

// Verificar si la respuesta de la API es válida
if (isset($pokemonList['results'])) {
    // Obtener los detalles de todos los Pokémon en una sola llamada
    $pokemonDetails = [];
    foreach ($pokemonList['results'] as $pokemon) {
        $pokemonData = getApiData($pokemon['url']);
        $pokemonDetails[] = [
            'name' => $pokemon['name'],
            'image' => $pokemonData['sprites']['front_default']
        ];
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>PokeApi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<style>
    body {
        background-color: #6fabf3;
    }

    .card-sty {
        background-color: #2a67a0;
        border: 1;
        border-radius: 10%;
    }

    .img-bg {
        border-radius: 40%;
        background-color: #feda54;
    }

    .custom-width {
        width: 9%;
        height: 8%;
    }

    .title {
        width: 28%;
        height: 26%;
    }
</style>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="custom-width" src="src\resources\vecteezy_pokemon-logo-png-pokemon-icon-transparent-png_27127591.png">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <button class="nav-link active btn btn-dark" id="team">Equipo</button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <div class="container">
            <div class="row">
                <div class="col" id="#teamresult">

                </div>
            </div>
        </div>
        <center><img class=" title" src="src\resources\vecteezy_pokemon-logo-png-pokemon-icon-transparent-png_27127591.png"></center>
        <div class="row">
            <?php
            if (isset($pokemonDetails)) {
                foreach ($pokemonDetails as $pokemon) {
            ?>
                    <div class="col-4 mt-2">
                        <div class="card text-white card-sty">
                            <center>
                                <img class="card-img-top w-50 h-50 img-bg mt-3" src="<?php echo $pokemon['image']; ?>" alt="<?php echo $pokemon['name']; ?>" />
                            </center>
                            <div class="card-body">
                                <h4 class="card-title" align="center"><?php echo $pokemon['name'] ?></h4>
                                <button id="add-team" data-name="<?php echo $pokemon['name']; ?>" data-img="<?php echo $pokemon['image']; ?>" type="button" class="btn col-12 add-team" style=" background-color: #feda54; color:#003A70;">
                                    Añadir a equipo
                                </button>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Error al obtener la lista de Pokémon.";
            }
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-team').on('click', function() {
                const pkmData = {
                    name: $(this).data('name'),
                    img: $(this).data('img')
                };

                $.ajax({
                    url: 'src/controllers/addTeamController.php',
                    method: 'POST',
                    data: pkmData,
                    success: function(response) {
                        console.log(response);
                        alert(response);
                    },
                    error: function() {
                        alert('Error al agregar al pokemon a tu equipo');
                    }
                });

            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#team').click(function() {
                // Realiza la petición AJAX cada 5 segundos
                //setInterval(function() {
                $.ajax({
                    url: 'src/controllers/readTeam.php',
                    method: 'GET',
                    success: function(response) {
                        $('#teamresult').html(response);
                    },
                    error: function() {
                        alert('Error al cargar equipo.');
                    }
                });
                //}, 1500); // Intervalo de 5000 milisegundos (5 segundos)
            });
        });
    </script>
</body>

</html>