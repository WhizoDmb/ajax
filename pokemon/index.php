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
    .card-sty {
        background-color: darkcyan;
        border: 1;
        border-color: yellow;
    }

    .img-bg {
        background-color: yellow;
    }
</style>

<body>

    <?php
    // Obtener la lista de Pokémon
    $pokemonList = getApiData($pokemonListUrl);

    // Verificar si la respuesta de la API es válida
    if (isset($pokemonList['results'])) {
        // Mostrar los Pokémon y sus imágenes
        echo "<div style='display: flex; flex-wrap: wrap;'>";
    ?>


        <div class="container mt-5">
            <div class="row">
                <?php
                foreach ($pokemonList['results'] as $pokemon) {
                    $pokemonData = getApiData($pokemon['url']);
                    $pokemonImage = $pokemonData['sprites']['front_default'];
                ?>
                    <div class="col-4">
                        <div class="card text-white card-sty">
                            <center>
                                <img class="card-img-top w-50 h-50 img-bg mt-3" src="<?php echo $pokemonImage; ?>" alt="<?php echo $pokemon['name']; ?>" />
                            </center>

                            <div class="card-body">
                                <h4 class="card-title"><?php echo $pokemon['name'] ?></h4>
                                <p class="card-text">Text</p>
                            </div>
                        </div>
                    </div><?php
                        }
                        echo "</div>";
                    } else {
                        echo "Error al obtener la lista de Pokémon.";
                    } ?>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>