<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Pokedex 2.0</title>
</head>
<body>
<?php
echo 'test';
?>
<form id="searchContainer" method="get">
    <input type="text" name="pokeName" placeholder="pokemon" value="">
    <input type="submit" id="pokeButton">
</form>
<?php
$pokeName = $_GET['pokeName'];

$pokeInfo = file_get_contents('https://pokeapi.co/api/v2/pokemon/' . $pokeName);
var_dump(json_decode($pokeInfo));
?>

</body>.
</html>