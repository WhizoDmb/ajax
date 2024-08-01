<?php
// URL de la API para obtener la lista de Pokémon
$pokemonListUrl = "https://pokeapi.co/api/v2/pokemon?limit=100"; // Puedes ajustar el límite según tus necesidades

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

// Mostrar los Pokémon y sus imágenes
echo "<div style='display: flex; flex-wrap: wrap;'>";
foreach ($pokemonList['results'] as $pokemon) {
    $pokemonData = getApiData($pokemon['url']);
    $pokemonImage = $pokemonData['sprites']['front_default'];
    echo "<div style='margin: 10px; text-align: center;'>";
    echo "<img src='{$pokemonImage}' alt='{$pokemon['name']}' />";
    echo "<p>{$pokemon['name']}</p>";
    echo "</div>";
}
echo "</div>";
