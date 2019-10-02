<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Pokedex 2.0</title>
</head>
<body>
<form id="searchContainer" method="get">
    <input type="text" name="pokeID" placeholder="pokemon" value="" label="pokeInput">
    <input type="submit" id="pokeButton" label="pokeInput">
</form>
<?php
$pokeID = $_GET['pokeID'];
$apiURL = 'https://pokeapi.co/api/v2/pokemon/';

function apiFetch($link) {
    $json = file_get_contents($link);
    return json_decode($json, true);
}

$pokeInfo = apiFetch($apiURL . $pokeID);
$speciesInfo = apiFetch($pokeInfo[species][url]);
//var_dump($pokeInfo);
var_dump($speciesInfo[evolves_from_species][name]);

$sprite = $pokeInfo[sprites][front_default];

$name = $pokeInfo[name];

$move1 = $pokeInfo[moves][0][move][name];
$move2 = $pokeInfo[moves][1][move][name];
$move3 = $pokeInfo[moves][2][move][name];
$move4 = $pokeInfo[moves][3][move][name];

$prevo = $speciesInfo[evolves_from_species][name];

//echo $pokeInfo[species][url];
//echo $pokeInfo[moves][0][move][name];

?>
<h1>PHPokedex 1.0</h1>
<h2>Current Pokemon</h2>
<h3><?php echo $name; ?></h3>
<img src="<?php echo $sprite; ?>" alt="sprite">
<p><?php echo $move1 ?></p>
<p><?php echo $move2 ?></p>
<p><?php echo $move3 ?></p>
<p><?php echo $move4 ?></p>
<h2>Previous Evolution</h2>
<h3><?php echo $prevo; ?></h3>

</body>
</html>
