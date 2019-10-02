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
$apiURL = 'https://pokeapi.co/api/v2';

function apiFetch($link) {
    $json = file_get_contents($link);
    return json_decode($json, true);
}

$pokeInfo = apiFetch($apiURL . '/pokemon/' . $pokeID);
//var_dump($pokeInfo);

$sprite = $pokeInfo[sprites][front_default];
$name = $pokeInfo[name];
//echo $pokeInfo[species][url];
echo $pokeInfo[moves][1][0];
echo $pokeInfo[moves][1][1];

?>
<h1>PHPokedex 1.0</h1>
<h2><?php echo $name; ?></h2>
<img src="<?php echo $sprite; ?>" alt="sprite">

</body>.
</html>