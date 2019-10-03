<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/dexicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>PHPokedex 0.1</title>
</head>
<body>
<?php
$currentID = $_GET['pokeID'];
$apiURL = 'https://pokeapi.co/api/v2/pokemon/';

function apiFetch($link)
{
    $json = file_get_contents($link);
    return json_decode($json, true);
}

$currentInfo = apiFetch($apiURL . $currentID);
$speciesInfo = apiFetch($currentInfo[species][url]);

$currentName = ucfirst($currentInfo[name]);
$currentID = $currentInfo[id];
$currentType = $currentInfo[types][0][type][name];
$currentSprite = $currentInfo[sprites][front_default];


$currentMoves = $currentInfo[moves];

$randMoves = array_rand($currentMoves, count($currentMoves));


$prevoName = ucfirst($speciesInfo[evolves_from_species][name]);
$prevoInfo = apiFetch($apiURL . lcfirst($prevoName));

$prevoID = $prevoInfo[id];
$prevoType = $prevoInfo[types][0][type][name];
$prevoSprite = $prevoInfo[sprites][front_default];

$prevoMoves = $prevoInfo[moves];
$randPrevoMoves = array_rand($prevoMoves, 4);


?>
<!--<h1>PHPokedex 1.0</h1>
<h2>Current Pokemon</h2>
<h3><?php echo ucfirst($currentName); ?></h3>
<img src="<?php echo $currentSprite; ?>" alt="current-sprite">
<p><?php echo $currentMoves[$randMoves[0]][move][name] ?></p>
<p><?php echo $currentMoves[$randMoves[1]][move][name] ?></p>
<p><?php echo $currentMoves[$randMoves[2]][move][name] ?></p>
<p><?php echo $currentMoves[$randMoves[3]][move][name] ?></p>

<h2>Previous Evolution</h2>
<h3><?php echo ucfirst($prevoName); ?></h3>
<img src="<?php echo $prevoSprite; ?>" alt="prevo-sprite">
<p><?php echo $prevoMoves[$randPrevoMoves[0]][move][name] ?></p>
<p><?php echo $prevoMoves[$randPrevoMoves[1]][move][name] ?></p>
<p><?php echo $prevoMoves[$randPrevoMoves[2]][move][name] ?></p>
<p><?php echo $prevoMoves[$randPrevoMoves[3]][move][name] ?></p>

<hr>
<hr>
-->
<aside class="profile-card" id="dex">

    <header>

        <h1>
            PHPokeDex 0.1
        </h1>

    </header>

    <section class="container" id="midSection">

        <div class="container" id="headMidSection">

            <header class="container" style="align-self: center" id="pokedex">
                <h1>PokeDex</h1>
            </header>

        </div>

        <div class="container" id="bottomMidSection">

            <div class="container" style="align-self: flex-start" id="leftContainer">

                <div class="container" id="pokeImgContainer">
                    <h2 id="targetName"><?php echo $currentName ?></h2>

                    <img alt="image of current pokemon" id="pokeImg" src=
                        <?php if ($currentSprite == null) {
                            echo "./assets/pokeball.png";
                        } else {
                            echo $currentSprite;
                        }
                        ?>>


                    <h5 id="targetIdNr"><?php echo $currentID . " " . $currentType ?></h5>
                </div>

                <div class="container" style="align-self: flex-start" id="evoContainer">
                    <h2 id="targetNameTwo"><?php echo $prevoName ?></h2>
                    <img alt="image of previous evolution" id="evoImg" src=
                    <?php if ($prevoSprite == false) {
                        echo "./assets/pokemonegg.jpg";
                    } else {
                        echo $prevoSprite;
                    } ?>
                    >
                    <h5 id="targetIdNrTwo"><?php echo $prevoID . " " . $prevoType ?></h5>
                </div>


            </div>

            <div class="container" style="align-self: flex-end" id="rightContainer">

                <div class="container" id="textArea">

                    <div class="container">
                        <h2 id="targetMoveOne">Move One</h2>
                    </div>

                    <div class="container">
                        <h2 id="targetMoveTwo">Move Two</h2>
                    </div>

                    <div class="container">
                        <h2 id="targetMoveThree">Move Three</h2>
                    </div>

                    <div class="container">
                        <h2 id="targetMoveFour">Move Four</h2>
                    </div>

                </div>

                <form class="container" id="searchContainer" method="get">
                    <input type="text" name="pokeID" class="form-control" value="">
                    <input type="submit" id="pokeButton" class="btn btn-light">
                </form>

            </div>

        </div>

    </section>

</aside>


</body>
</html>